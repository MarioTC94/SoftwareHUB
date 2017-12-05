<?php
namespace src\Controller;

use lib\Controller\BaseController;
use Asphyo\src\Model\Domain\Usuario;
use Asphyo\src\Model\DAO\UsuarioDAO;
use src\Model\DAO\TiposoftwareDAO;
use src\Model\DAO\SoftwareDAO;
use src\Model\Domain\Software;
use src\Model\DAO\IncidenteDAO;
use src\Model\DAO\ComentariosDAO;

class ProveedorController extends BaseController
{

      public function validate() //Validate logued user before load the page;
      {
            \session_start();
            if (isset($_SESSION['UsuarioLogueado'])) {
                  if ($_SESSION['UsuarioLogueado']['Rol'] == 'Proveedor') {
                        return true;
                  } else {
                        parent::toView('Cliente', 'Index');
                        exit();
                  }
            } else
                  parent::toView('Home', 'Index');
      }

      public function Index()
      {
            self::validate();;
            $model = array();
            $oTipoSoftwareDAO = new TiposoftwareDAO();
            $model['TipoSoftware'] = $oTipoSoftwareDAO->SelectAll();

            $IncidenteDAO = new IncidenteDAO();
            $model['Incidentes'] = \array_reverse($IncidenteDAO->SelectAllByProveedor($_SESSION['UsuarioLogueado']['ID']));

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

      public function Detalles($IDIncidente = null)
      {

            self::validate();
            if ($IDIncidente == null) {
                  parent::toView('Proveedor', '');
            }
            $model = array();

            $oIncidenteDAO = new IncidenteDAO();
            $oComentarioDAO = new ComentariosDAO();

            $model['Incidente'] = $oIncidenteDAO->SelectAllInfoByPrimaryKey($IDIncidente);

            if (\count($model['Incidente']) == 0) {
                  parent::toView('Error', 'PageNotFound');
            }

            if ($model['Incidente']['PK_IDProveedor'] != $_SESSION['UsuarioLogueado']['ID']) {
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



      public function Software()
      {
            self::validate();;
            $model = array();
            $oTipoSoftwareDAO = new TiposoftwareDAO();
            $oSoftwareDAO = new SoftwareDAO();

            $model['TipoSoftware'] = $oTipoSoftwareDAO->SelectAll();
            $model['Software'] = $oSoftwareDAO->SelectAllByProvider($_SESSION['UsuarioLogueado']['ID']);

            parent::View($model);
      }

      public function AddSoftware() //Ajax Function
      {
            if (!isset($_POST["DatosSoftware"])) {
                  parent::toView('Error', 'PageNotFound');
            }

            self::validate();

            $DataSoftware = \json_decode($_POST["DatosSoftware"], true);
            $Software = new Software();
            $SoftwareDao = new SoftwareDAO();
            $Software->setActivo(1);
            $Software->setNombreSoftware($DataSoftware["NombreSoftware"]);
            $Software->setDescripcionSoftware($DataSoftware["DescripcionSoftware"]);
            $Software->setIDProveedor($_SESSION['UsuarioLogueado']['ID']);
            $Software->setTipoSoftware($DataSoftware['TipoSoftware']);

            if ($SoftwareDao->Add($Software)) {
                  echo \json_encode(array('Codigo' => 1, 'Mensaje' => 'Software insertado correctamente'));
            } else {
                  echo \json_encode(array('Codigo' => 2, 'Mensaje' => 'Error al insertar software'));
            }

      }

      public function LogOut() //Logout function
      {
            \session_start();
            \session_destroy();
            parent::toView("Home", "Index");
      }
}
?>