<?php
namespace src\Controller;

use lib\Controller\BaseController;
use src\Model\Domain\Usuario;
use src\Model\DAO\SoftwareDAO;
use src\Model\DAO\ProveedorDAO;
use src\Model\DAO\TipoincidenteDAO;
use src\Model\Domain\Incidente;
use src\Model\DAO\IncidenteDAO;
use lib\Helper\MySQLHelper;
use lib\Route\Url;

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


            $model['Incidente'] = $oIncidenteDAO->SelectAllInfoByPrimaryKey($IDIncidente);

            if (\count($model['Incidente']) == 0) {
                  parent::toView('Error', 'PageNotFound');
            }

            if ($model['Incidente']['PK_IDCliente'] != $_SESSION['UsuarioLogueado']['ID']) {
                  parent::toView('Error', 'PageNotFound');
            }


            parent::View($model);
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
