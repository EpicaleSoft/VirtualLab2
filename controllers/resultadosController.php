<?php
/**
 * Created by PhpStorm.
 * User: lilsa
 * Date: 05/03/2018
 * Time: 21:43
 */
class resultadosController extends Controller{

    private $_resultados;
    public function __construct()
    {
        parent::__construct();
        $this->_resultados=$this->loadModel('resultados');
    }

    public function index()
    {

    }
    public function uploadfile(){
        if($this->getInt('guardar')==1){
            if (empty($_FILES['mArchivo']['name'])){
                $this->_view->_error='Seleccione Archivo';
                $this->_view->renderizar('upload','resultados');
                exit;
            }
            $id= Sessions::get('id_pac');
            $con=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            $binario_contenido =  mysqli_real_escape_string($con,(file_get_contents($_FILES['mArchivo']['tmp_name'])));
            $binario_nombre=$_FILES['mArchivo']['name'];
            $binario_tipo=$_FILES['mArchivo']['type'];
            $titulo= $_POST['mTitulo'];
            //$this->_view->_error=  $binario_nombre.' ' .$binario_tipo . ' ' .$binario_contenido;

            $this->_resultados->insertarArchivo(
                $id,
                $titulo,
                $binario_contenido,
                $binario_tipo
            );

            $this->redireccionar('index');
        }
    }
    public function upload($id){
        Sessions::acceso('Administrador');
        $this->_view->_error='';
        $this->_view->titulo=APP_NAME;
        $this->_view->tagline=APP_SLOGAN;
        $this->_view->company='Resultados';
        Sessions::set('id_pac',$id);
        $this->_view->renderizar('upload');
    }
    public function download(){
        Sessions::acceso('Cliente');
        $id = Sessions::get('id_cliente');
        $this->_view->resultadosfiles = $this->_resultados->getResultados($id);
        $this->_view->titulo = APP_NAME;
        $this->_view->tagline = APP_SLOGAN;
        $this->_view->company = 'Resultados';
        $this->_view->renderizar('download');
    }
    public function getfile($id){
        Sessions::acceso('Cliente');

        if(!$this->filtrarInt($id))
        {
            $this->redireccionar('resultados/download');
        }

        $filedata = $this->_resultados->getFile($this->filtrarInt($id));
        $type = $filedata['tipo'];
        $file= $filedata['titulo'];
        header("Content-type: $type");
        header("Content-Disposition: attachment; filename=$file");
        echo $filedata['contenido'];
    }
}