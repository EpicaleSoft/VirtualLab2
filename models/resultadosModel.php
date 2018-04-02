<?php
/**
 * Created by PhpStorm.
 * User: lilsa
 * Date: 26/03/2018
 * Time: 16:00
 */

class resultadosModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }
    public function insertarArchivo($id ,$titulo ,$contenido ,$tipo)
    {
        $this->_db->prepare("INSERT INTO resultados (id_cliente ,titulo ,contenido ,tipo)  
            VALUES(:id_cliente ,:titulo ,:contenido ,:tipo)")
            ->execute(array(
                'id_cliente'=>$id,
                ':titulo'=>$titulo,
                ':contenido'=>$contenido,
                ':tipo'=>$tipo
            ));
    }
    public function getResultados($id){
        $post = $this ->_db->query("SELECT * FROM resultados WHERE id_cliente= $id");
        return $post->fetchAll();
    }

    public function getFile($id){
        $post = $this ->_db->query("SELECT * FROM resultados WHERE id_resultado= $id");
        return $post->fetch();
    }
}