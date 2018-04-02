<?php
/**
 * Created by PhpStorm.
 * User: lilsa
 * Date: 06/03/2018
 * Time: 14:57
 */
class examenesController extends Controller {
    private $_examenes;

    public function __construct()
    {
        parent::__construct();
        $this->_examenes = $this->loadModel('examenes');
    }

    public function index(){
        Sessions::acceso('Usuario');
        $this->_view->examenes = $this->_examenes->getExamenesTipos();
        $this->_view->titulo = 'Tipos de Examenes';
        $this->_view->tagline = APP_SLOGAN;
        $this->_view->company = APP_COMPANY;
        $this->_view->renderizar('index');
    }
    public function cargadatos(){
        Sessions::acceso('Usuario');
        $this->_view->pacientes = $this->_examenes->getPacientes();
        $this->_view->titulo = 'Carga de Datos';
        $this->_view->tagline = APP_SLOGAN;
        $this->_view->company = APP_COMPANY;
        $this->_view->renderizar('cargadatos');
    }

    public function carganuevo($id){
        Sessions::acceso('Usuario');
        //$this->_view->pacientes = $this->_examenes->getPacientes();
        $this->_view->titulo = 'Carga de Datos';
        $this->_view->tagline = APP_SLOGAN;
        $this->_view->company = APP_COMPANY;
        $this->_view->renderizar('carganuevo');
    }
}