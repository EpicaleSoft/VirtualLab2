<?php
/**
 * Created by PhpStorm.
 * User: lilsa
 * Date: 06/03/2018
 * Time: 14:59
 */
class examenesModel extends  Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function getExamenesTipos(){
        $post = $this->_db->query("SELECT Id_Tipo_Examen, Codigo, Descripcion , Habilitado FROM tipos_examenes ORDER BY Codigo");
        return $post->fetchAll();
    }
}