<?php
/**
 * Created by PhpStorm.
 * User: lilsa
 * Date: 17/01/2018
 * Time: 15:04
 */

class loginController extends Controller
{
    private $_login;
    public function __construct()
    {
        parent::__construct();
        $this->_login=$this->loadModel('login');
    }

    public function index()
    {
        //$this->_view->setJs(array('maruti.login'));
        $this->_view->titulo= 'Inicio de Sesión';
        $this->_view->tagline = APP_SLOGAN;
        $this->_view->company = APP_COMPANY;
        $this->_view->_error= '';
        //$niveluser;
        if($this->getInt('enviar')==1){
            $this->_view->datos=$_POST;

            $this->_login->getUserPin(
                $this->getInt('mPin'),
                $this->getInt('mPin2'));
            if(!Sessions::get('level')){
                //$this->_view->_error = 'Usuario y/o Contraseña incorrecto.' . $this->getSql('mPassword') ;
                $this->_view->renderizar('index', 'login');
                exit;
            }

            Sessions::set('autenticado',true);
            Sessions::set('tiempo',time());
            if (Sessions::get('id_cliente')>0){
                $this->redireccionar('resultados/download');
            }
            else{
                $this->redireccionar('index');
            }
        }
        $this->_view->renderizar('index','login');
    }
    public function backend()
    {
        //$this->_view->setJs(array('maruti.login'));
        $this->_view->titulo= 'Inicio de Sesión';
        $this->_view->tagline = APP_SLOGAN;
        $this->_view->company = APP_COMPANY;
        $this->_view->_error= '';
        //$niveluser;
        if($this->getInt('enviar')==1){
            $this->_view->datos=$_POST;

            $this->_login->getUser(
                $this->getInt('mPin'));
            if(!Sessions::get('level')){
                //$this->_view->_error = 'Usuario y/o Contraseña incorrecto.' . $this->getSql('mPassword') ;
                $this->_view->renderizar('backend', 'login');
                exit;
            }

            Sessions::set('autenticado',true);
            Sessions::set('tiempo',time());
            if (Sessions::get('id_cliente')>0){
                $this->redireccionar('resultados/download');
            }
            else{
                $this->redireccionar('index');
            }

        }

        $this->_view->renderizar('backend','login');
    }
    public function mostrar(){
        echo 'Nivel: '.Sessions::get('level') . '<br>';
        echo 'Estado: '.Sessions::get('autenticado') . '<br>';
        echo 'Conect: '.Sessions::get('error') . '<br>';
    }
    public function logout(){
        Sessions::destroy();
        $this->redireccionar();
    }
}