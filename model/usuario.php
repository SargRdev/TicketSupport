<?php

Class Usuario extends Conexion{

    public function login(){

        $conectar = parent::Conectar();
        parent::setNames();

        if(isset($_POST["enviar"])){
            $correo = $_POST["usu_correo"];
            $pass = $_POST["usu_pass"];

            if(empty($correo) and empty($pass)){
                header("Location:".Conexion::ruta()."index.php?m=2");
                exit();
            }else{
                $sql = "SELECT * FROM tb_usuario WHERE usu_correo = ? and usu_pass = ? and est = 1 ";
                $stmt = $conectar->prepare($sql);
                $stmt -> bindValue(1,"$correo");
                $stmt -> bindValue(2,"$pass");
                $stmt->execute();
                $resultado = $stmt->fetch();
                
                if(is_array($resultado) and count($resultado) > 0){
                    $_SESSION["usu_id"]=$resultado["usu_id"];
                    $_SESSION["usu_nom"]=$resultado["usu_nom"];
                    $_SESSION["usu_ape"]=$resultado["usu_ape"];
                    header("Location:".Conexion::ruta()."view/home/");
                    exit();
                }else{
                    header("Location:".Conexion::ruta()."index.php?m=1");
                    exit();
                }
           
            }
        }
    }

}

?>