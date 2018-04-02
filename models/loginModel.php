<?php
/**
 * Created by PhpStorm.
 * User: lilsa
 * Date: 18/01/2018
 * Time: 12:15
 */
class loginModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getUserPin($pin, $pin2){
        $con=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        $querystr=("SELECT * FROM usuarios ".
            " WHERE pin ='$pin' AND estado=1 AND pin2='$pin2'");
        if($con->connect_errno>0){
            die( Sessions::set('error',$con->connect_error));
        }

        $userinfo =array();

        if(!$post = $con->query($querystr)){
            Sessions::set('error','no hay usuario'. $querystr);
            exit;
        }

        if($post = $con->query($querystr)){
            while($row = $post->fetch_array()){
                Sessions::set('level',$row["rol"]);
                if ($row["id_cliente"]>0){
                    Sessions::set('id_cliente',$row["id_cliente"]);
                    Sessions::set('nombres',$row["nombres"]);
                }
                else{
                    Sessions::set('nombres',$row["nombres"]);
                }
            }
        }

        $con->close();
    }

    public function getUser($pin){
        $con=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        $querystr=("SELECT * FROM usuarios ".
            " WHERE pin ='$pin' AND estado=1");
        if($con->connect_errno>0){
           die( Sessions::set('error',$con->connect_error));
        }

        $userinfo =array();

        if(!$post = $con->query($querystr)){
            Sessions::set('error','no hay usuario'. $querystr);
            exit;
        }

        if($post = $con->query($querystr)){
            while($row = $post->fetch_array()){
            Sessions::set('level',$row["rol"]);
                if ($row["id_cliente"]>0){
                    Sessions::set('id_cliente',$row["id_cliente"]);
                    Sessions::set('nombres',$row["nombres"]);
                }
                else{
                    Sessions::set('nombres',$row["nombres"]);
                }
            }
        }

        $con->close();
    }
}