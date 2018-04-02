<?php
/**
 * Created by PhpStorm.
 * User: lilsa
 * Date: 07/03/2018
 * Time: 18:32
 */

class pacientesModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPacientes(){
        $post = $this->_db->query("SELECT b.id_cliente,b.pin, b.primer_nombre, b.segundo_nombre, b.dni,
   c.descripcion sexo, b.direccion,a.descripcion tipo, b.telefono, b.fecha_nacimiento
FROM clientes b
  INNER JOIN tipos_pacientes a ON a.id_tipo = b.tipo
  INNER JOIN generales c on c.valor= b.sexo");
        return $post->fetchAll();
    }
    public function getPacienteByDNI($dni){
        $post = $this->_db->query("SELECT id_cliente, primer_nombre, segundo_nombre, dni,
  sexo,direccion, tipo, telefono, fecha_nacimiento, correo
FROM clientes WHERE id_cliente = $dni");
        return $post->fetch();
    }
    public function getTiposPacientes(){
        $post = $this->_db->query("SELECT id_tipo, descripcion 
FROM tipos_pacientes ");
        return $post->fetchAll();
    }

    public function getGenerales($mTipo){
        $post = $this->_db->query("SELECT valor, descripcion 
FROM generales WHERE tipo =$mTipo ");
        return $post->fetchAll();
    }

    public function insertPaciente($primer_nombre ,$segundo_nombre ,$dni ,$sexo ,$direccion ,$tipo ,$telefono ,$fecha_nacimiento, $correo,$pin)
    {
        $this->_db->prepare("INSERT INTO clientes(  primer_nombre ,segundo_nombre ,dni ,sexo ,direccion ,tipo ,telefono ,fecha_nacimiento, correo, pin)
VALUES(:primer_nombre ,:segundo_nombre ,:dni ,:sexo ,:direccion ,:tipo ,:telefono ,CAST(:fecha_nacimiento AS DATE ), :correo, :pin)")
            ->execute(array(
                ':primer_nombre'=>$primer_nombre,
                ':segundo_nombre'=>$segundo_nombre,
                ':dni'=>$dni,
                ':sexo'=>$sexo,
                ':direccion'=>$direccion,
                ':tipo'=>$tipo,
                ':telefono'=>$telefono,
                ':fecha_nacimiento'=>$fecha_nacimiento,
                ':correo'=>$correo,
                ':pin'=>$pin
            ));
    }

    public function updatePaciente($id,$primer_nombre ,$segundo_nombre ,$sexo ,$direccion ,$tipo ,$telefono ,$fecha_nacimiento, $correo)
    {
        $this->_db->prepare("UPDATE clientes set  primer_nombre =:primer_nombre ,segundo_nombre=:segundo_nombre  ,sexo=:sexo
 ,direccion=:direccion  ,tipo=:tipo ,telefono=:telefono ,fecha_nacimiento=CAST(:fecha_nacimiento AS DATE ), correo=:correo WHERE id_cliente= $id")
            ->execute(array(
                ':primer_nombre'=>$primer_nombre,
                ':segundo_nombre'=>$segundo_nombre,
                ':sexo'=>$sexo,
                ':direccion'=>$direccion,
                ':tipo'=>$tipo,
                ':telefono'=>$telefono,
                ':fecha_nacimiento'=>$fecha_nacimiento,
                ':correo'=>$correo
            ));
    }
}