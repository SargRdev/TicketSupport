<?php

session_start();

Class Conexion{

    protected $dbh;

    protected function Conectar(){

        try{

            $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=ticket_db","root","");

            return $conectar;

        }catch(Exception $e){
            print"¡Error en la Base de Datos! ".$e->getMessage(). "</br>";
        }
       
        die();
    }
    
    public function setNames(){
        return $this->dbh->query("SET NAMES 'utf8'");
    }

    public function ruta(){

        return "http//localhost:80/TicketSupport/";
    }

}

?>