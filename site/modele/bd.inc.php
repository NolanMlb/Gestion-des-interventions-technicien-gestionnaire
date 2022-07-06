<?php
    function launch_BDD(){
        if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
            $racine="..";
        }
        
        if (isset($_POST['utilisateur']) && isset($_POST['password'])){

            // connexion a la base de donnée
            $reponse = 0;
            $bd_host = "localhost";
            $bd_nom = "ap2eme";
            $bd_username = "root";
            $bd_password = "root";

            try{
                $conn = new PDO("mysql:host=$bd_host;dbname=$bd_nom", $bd_username, $bd_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            return $conn;
            } catch (PDOException $e) {
            print_r("Erreur de connexion PDO ");
            die();
            }

            
            }
        }
    
?>