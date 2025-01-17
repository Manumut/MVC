<?php
    function inicio(){ //Login
        if(isset($_POST["enviar"])){  //Si se ha pulsado el boton
            require_once('modelo.php'); //Incluimos el modelo
            require_once('class.db.php');  //Incluimos la base de datos

            $db = new db(); //Creamos el objeto

            if(!isset($_POST["rec"])){  //Si no se ha pulsado el checkbox
                unset_cookie("usuario"); //Borramos el cookie
            }
            
            if($db->compCrede($_POST["nom"], $_POST["psw"])) { //Comprobamos las credenciales
                if(isset($_POST["rec"])) //Si se ha pulsado el checkbox
                    set_cookie("usuario", $_POST["nom"]); //Creamos el cookie

                set_session('usu', $_POST["nom"]);  //Creamos la sesion
                $nUsu=$_POST["nom"];  //Guardamos el nombre en una variable
                require_once('bienvenida.php');  //Incluimos la bienvenida
            }else{
                require_once('login.php');  //Incluimos el login
            }
        }
    }

    function cerrar(){
        require_once('modelo.php');
      unset_session("usu");
        header("Location: index.php");
    }

    function registrar(){
        if(isset($_POST["fReg"])){  //Si se ha pulsado el boton
            require_once('class.db.php');  //Incluimos la base de datos

            $db = new db(); //Creamos el objeto
            if(strcmp($_POST["psw"], $_POST["psw2"]) == 0){  //Comprobamos las contraseñas
                if(!$db->checkUsuario($_POST["nom"])){  //Comprobamos si el usuario ya existe
                    if($db->registrarUsu($_POST["nom"], $_POST["psw"])){ //Registramos el usuario
                        header("Location: index.php");
                    }  else{
                        header("Location: index.php?action=registro");
                    }
                }else{
                    $err = "<p style='color:red;'>El Usuario ya esta</p>";
                }
            }else{
                $err = "<p style='color:red;'>Las contraseñas no coinciden</p>";
            }
            require_once('cabezera.html');
            require_once('registro.php');
            require_once('footer.html');
        }
        
    }
    function registro(){
        require_once('cabezera.html');
        require_once('registro.php');
        require_once('footer.html');
    }




    if(isset($_REQUEST["action"])) {  //Si se ha pulsado una accion
        $action = $_REQUEST["action"];  //Guardamos la accion
        $action();  //Ejecutamos la accion
    }else{
        require_once('modelo.php');
        if(is_session("usu")){  //Si hay una sesion
            require_once('modelo.php');  //Incluimos el modelo
            $nUsu=get_session("usu");  //Obtenemos el nombre
            require_once('bienvenida.php');  //Incluimos la bienvenida
        }else{
            header("Location: login.php");  //Redirigimos al login
        }
        
    }
?>