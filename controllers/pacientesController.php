<?php
/**
 * Created by PhpStorm.
 * User: lilsa
 * Date: 07/03/2018
 * Time: 19:25
 */
class pacientesController extends Controller{

    private $_pacientes;
    public function __construct()
    {
        parent::__construct();
        $this->_pacientes = $this->loadModel('pacientes');
    }
    public function index()
    {
        Sessions::acceso('Usuario');
        $this->_view->pacientes = $this->_pacientes->getPacientes();
        $this->_view->titulo = 'Pacientes';
        $this->_view->tagline = APP_SLOGAN;
        $this->_view->company = APP_COMPANY;
        $this->_view->renderizar('index');
    }
    public function nuevo(){
        Sessions::acceso('Usuario');

        $this->_view->setJs(array('nuevo'));

        $this->_view->titulo="Agregar Paciente";
        $this->_view->tagline=APP_SLOGAN;
        $this->_view->company=APP_COMPANY;
        $this->_view->tipospac = $this->_pacientes->getTiposPacientes();
        $this->_view->tiposexo = $this->_pacientes->getGenerales(1);

        if($this->getInt('guardar')==1)
        {
            $this->_view->datos=$_POST;
            if(!$this->getInt('mTipo'))
            {
                $this->_view->_error='Registre un turno válido';
                $this->_view->renderizar('nuevo','paciente');
                exit;
            }

            $this->_pacientes->insertPaciente(
                $this->getTexto('mNombres'),
                $this->getTexto('mApellido'),
                $this->getTexto('mDni'),
                $this->getInt('mSexo'),
                $this->getTexto('mDir'),
                $this->getInt('mTipo'),
                $this->getTexto('mTel'),
                $this->getTexto('datepicker'),
                $this->getTexto('mMail')
            );

            $this->redireccionar('pacientes');
            exit;
        }

        $this->_view->renderizar('nuevo');
    }
    public function edit($id){
        Sessions::acceso('Usuario');

        $this->_view->setJs(array('nuevo'));

        $this->_view->titulo="Editar Paciente";
        $this->_view->tagline=APP_SLOGAN;
        $this->_view->company=APP_COMPANY;
        $this->_view->datos = $this->_pacientes->getPacienteByDNI($id);
        $this->_view->tipospac = $this->_pacientes->getTiposPacientes();
        $this->_view->tiposexo = $this->_pacientes->getGenerales(1);
        $this->_view->id=$id;
        if($this->getInt('guardar')==1)
        {
            $this->_view->datos=$_POST;
            if(!$this->getInt('mTipo'))
            {
                $this->_view->_error='Registre un turno válido';
                $this->_view->renderizar('edit','paciente', $id);
                exit;
            }

            $this->_pacientes->updatePaciente(
                $id,
                $this->getTexto('mNombres'),
                $this->getTexto('mApellido'),
                $this->getInt('mSexo'),
                $this->getTexto('mDir'),
                $this->getInt('mTipo'),
                $this->getTexto('mTel'),
                $this->getTexto('datepicker'),
                $this->getTexto('mMail')
            );

            $this->redireccionar('pacientes');
            exit;
        }

        $this->_view->renderizar('edit','paciente', $id);
    }
}