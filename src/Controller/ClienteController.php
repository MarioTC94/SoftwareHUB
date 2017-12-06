<?php
namespace src\Controller;

use lib\Controller\BaseController;
use src\Model\Domain\Usuario;
use src\Model\DAO\SoftwareDAO;
use src\Model\DAO\ProveedorDAO;
use src\Model\DAO\TipoincidenteDAO;
use src\Model\Domain\Incidente;
use src\Model\DAO\IncidenteDAO;
use src\Model\DAO\ComentariosDAO;
use lib\Helper\MySQLHelper;
use lib\Route\Url;
use src\Model\Domain\Documentos;
use src\Model\DAO\DocumentosDAO;

class ClienteController extends BaseController
{
      public function Index()
      {
            self::validate();
            $model = self::getData();

            $IncidenteDAO = new IncidenteDAO();
            $model['Incidentes'] = \array_reverse($IncidenteDAO->SelectAllByCliente($_SESSION['UsuarioLogueado']['ID']));

            for ($i = 0; $i < \count($model['Incidentes']); $i++) {
                  switch ($model['Incidentes'][$i]['DescripcionTipoIncidente']) {
                        case 'Bug':
                              $model['Incidentes'][$i]['LabelTipoIncidente'] = 'label-danger';
                              break;
                        case 'Mejora':
                              $model['Incidentes'][$i]['LabelTipoIncidente'] = 'label-success';
                              break;
                        case 'Pregunta':
                              $model['Incidentes'][$i]['LabelTipoIncidente'] = 'label-info';
                              break;
                        case 'Ayuda':
                              $model['Incidentes'][$i]['LabelTipoIncidente'] = 'label-warning';
                              break;

                        default:
                              $model['Incidentes'][$i]['LabelTipoIncidente'] = 'label-default';
                              break;
                  }

                  switch ($model['Incidentes'][$i]['DescripcionEstadoIncidente']) {
                        case 'Abierto':
                              $model['Incidentes'][$i]['LabelEstadoIncidente'] = 'label-success';
                              break;
                        case 'En Proceso':
                              $model['Incidentes'][$i]['LabelEstadoIncidente'] = 'label-warning';
                              break;
                        case 'Cerrado':
                              $model['Incidentes'][$i]['LabelEstadoIncidente'] = 'label-danger';
                              break;
                        case 'Duplicado':
                              $model['Incidentes'][$i]['LabelEstadoIncidente'] = 'label-warning';
                              break;
                        case 'Solucionado':
                              $model['Incidentes'][$i]['LabelEstadoIncidente'] = 'label-success';
                              break;
                        default:
                              $model['Incidentes'][$i]['LabelEstadoIncidente'] = 'label-default';
                              break;
                  }
            }

            parent::View($model);

      }

      public function validate() //User Logued
      {
            \session_start();
            if (isset($_SESSION['UsuarioLogueado'])) {
                  if ($_SESSION['UsuarioLogueado']['Rol'] == 'Cliente') {
                        return true;
                  } else {
                        parent::toView('Proveedor', 'Index');
                  }
            } else
                  parent::toView('Home', 'Index');
      }

      public function AddIncident() //AJAX
      {

            if (!isset($_POST["DatosIncidente"])) {
                  echo \json_encode(array('Codigo' => 3, 'Mensaje' => 'Error al crear incidente'));
                  exit();
            }

            $DataIncidente = \json_decode($_POST["DatosIncidente"], true);

            $oIncidenteDAO = new IncidenteDAO();
            $oIncidente = new Incidente();

            session_start();
            $oIncidente->setActivo(1);
            $oIncidente->setNombreIncidente($DataIncidente["NombreIncidente"]);
            $oIncidente->setTipoIncidente($DataIncidente["TipoIncidente"]);
            $oIncidente->setProveedor($DataIncidente['Proveedor']);
            $oIncidente->setIDSoftware($DataIncidente['Software']);
            $oIncidente->setDescripcionIncidente($DataIncidente["DescripcionIncidente"]);
            $oIncidente->setEstadoIncidente(1);
            $oIncidente->setCliente($_SESSION['UsuarioLogueado']['ID']);
            $oIncidente->setFechaIncidente(\date('Y-m-d H:i:s'));

            if (!$oIncidenteDAO->Add($oIncidente)) {
                  echo \json_encode(array('Codigo' => 2, 'Mensaje' => 'Error al crear incidente'));
                  exit();
            }

            $Primary = MySQLHelper::getLastID();
            $Data = $oIncidenteDAO->SelectAllInfoByPrimaryKey($Primary);


            $Data['URLDetalle'] = Url::toAction('Cliente', 'Detalles', $Primary);

            switch ($Data['DescripcionTipoIncidente']) {
                  case 'Bug':
                        $Data['LabelTipoIncidente'] = 'label-danger';
                        break;
                  case 'Mejora':
                        $Data['LabelTipoIncidente'] = 'label-success';
                        break;
                  case 'Pregunta':
                        $Data['LabelTipoIncidente'] = 'label-info';
                        break;
                  case 'Ayuda':
                        $Data['LabelTipoIncidente'] = 'label-warning';
                        break;
                  default:
                        $Data['LabelTipoIncidente'] = 'label-default';
                        break;
            }

            switch ($Data['DescripcionEstadoIncidente']) {
                  case 'Abierto':
                        $Data['LabelEstadoIncidente'] = 'label-success';
                        break;
                  case 'En Proceso':
                        $Data['LabelEstadoIncidente'] = 'label-warning';
                        break;
                  case 'Cerrado':
                        $Data['LabelEstadoIncidente'] = 'label-danger';
                        break;
                  case 'Duplicado':
                        $Data['LabelEstadoIncidente'] = 'label-warning';
                        break;
                  case 'Solucionado':
                        $Data['LabelEstadoIncidente'] = 'label-success';
                        break;
                  default:
                        $Data['LabelEstadoIncidente'] = 'label-default';
                        break;
            }

            echo \json_encode(array('Codigo' => 1, 'Mensaje' => 'Exito, Incidente Creado', 'Data' => $Data));
      }

      public function Detalles($IDIncidente = null)
      {

            self::validate();
            if ($IDIncidente == null) {
                  parent::toView('Cliente', '');
            }
            $model = self::getData();

            $oIncidenteDAO = new IncidenteDAO();
            $oComentarioDAO = new ComentariosDAO();

            $model['Incidente'] = $oIncidenteDAO->SelectAllInfoByPrimaryKey($IDIncidente);

            if (\count($model['Incidente']) == 0) {
                  parent::toView('Error', 'PageNotFound');
            }

            if ($model['Incidente']['PK_IDCliente'] != $_SESSION['UsuarioLogueado']['ID']) {
                  parent::toView('Error', 'PageNotFound');
            }

            $model['Comentarios'] = $oComentarioDAO->SelectAllByIncident($IDIncidente);

            for ($i = 0; $i < count($model['Comentarios']); $i++) {
                  $model['Comentarios'][$i]['FechaComentario'] = self::time_ago($model['Comentarios'][$i]['FechaComentario']);

                  if ($model['Comentarios'][$i]['Usuario'] == $_SESSION['UsuarioLogueado']['ID']) {
                        $model['Comentarios'][$i]['Posicion'] = 'right';
                        $model['Comentarios'][$i]['PosicionTiempo'] = 'left';
                  } else {
                        $model['Comentarios'][$i]['Posicion'] = 'left';
                        $model['Comentarios'][$i]['PosicionTiempo'] = 'right';
                  }
            }


            parent::View($model);
      }

      public function Documentos()
      {
            $DataDocumento = \json_decode($_POST["DatosDocumento"], true);

            $Documento = new Documentos();
            $DocumentoDAO = new DocumentosDAO();

            $Documento->setActivo(1);
            $Documento->setDescripcionDocumentos($DataDocumento[$_FILES["SubirDocumento"]["name"]]);
            $Documento->setIncidente()

                  if ($DocumentoDAO->Add($Documento)) {

            }

      }
      private function time_ago($date)
      {
            if (empty($date)) {
                  return "No date provided";
            }
            $periods = array("segundo", "minuto", "hora", "dia", "semana", "mes", "año", "decada");
            $lengths = array("60", "60", "24", "7", "4.35", "12", "10");
            $now = time();
            $unix_date = strtotime($date);
        // check validity of date
            if (empty($unix_date)) {
                  return "Bad date";
            }
        // is it future date or past date
            if ($now > $unix_date) {
                  $difference = $now - $unix_date;
                  $tense = "atrás";
            } else {
                  $difference = $unix_date - $now;
                  $tense = "from now";
            }
            for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
                  $difference /= $lengths[$j];
            }
            $difference = round($difference);
            if ($difference != 1) {
                  if ($periods[$j] == "mes") {
                        $periods[$j] .= "es";
                  } else {
                        $periods[$j] .= "s";
                  }
            }
            return "$difference $periods[$j] {$tense}";
      }

      public function LogOut()
      {
            \session_start();
            \session_destroy();
            parent::toView("Home", "Index");
      }

      private function getData()
      {
            $model = array();
            $oSoftwareDAO = new SoftwareDAO();
            $oTipoIncidente = new TipoincidenteDAO();
            $oProveedorDAO = new ProveedorDAO();

            $model['TipoIncidente'] = $oTipoIncidente->SelectAll();
            $model['Proveedor'] = $oProveedorDAO->SelectAll();
            $model['Software'] = $oSoftwareDAO->SelectAllByProvider($model['Proveedor'][0]['PK_IDProveedor']);

            return $model;
      }

      public function getSoftwareByID()
      {
            if (!isset($_POST["IDProveedor"])) {
                  parent::toView('Error', 'PageNotFound');
            }
            $IDProveedor = $_POST["IDProveedor"];

            $oSoftwareDAO = new SoftwareDAO();
            $Data = $oSoftwareDAO->SelectAllByProvider($IDProveedor);
            echo \json_encode(array('Codigo' => 1, 'Data' => $Data));
      }
}
?>
