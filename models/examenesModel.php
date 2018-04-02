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

    public function getPacientes(){
        $post = $this->_db->query("SELECT b.id_cliente,b.pin, b.primer_nombre, b.segundo_nombre, b.dni,
   c.descripcion sexo, b.direccion,a.descripcion tipo, b.telefono, b.fecha_nacimiento
FROM clientes b
  INNER JOIN tipos_pacientes a ON a.id_tipo = b.tipo
  INNER JOIN generales c on c.valor= b.sexo");
        return $post->fetchAll();
    }
}