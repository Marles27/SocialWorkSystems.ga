<?php
    require("connDB.php");
    $ID=$_POST['documento'];
    $tipoDoc=$_POST['tipo_doc'];
    $nombre=$_POST['nombres'];
    $apellido=$_POST['apellidos'];
    $fenac=$_POST['fenac'];
    $ciudad_naci=$_POST['ciudad_naci'];
    $email=$_POST['email'];
    $ID_curso=$_POST['ID_curso'];
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];
    $rcontraseña=$_POST['rcontraseña'];
    
    if ($contraseña==$rcontraseña) {
        $contraseña=password_hash($contraseña,PASSWORD_DEFAULT);
        
        $query="SELECT usuario FROM usuario";
        $res2=mysqli_query($link,$query);

        while ($row = mysqli_fetch_array($res2)) {
            if ($row['usuario']==$usuario) {
                $go=false;
            break;
            }else{
                $go=true;
            }
        }

        if($go){
            $insert="INSERT INTO `usuario` (`DOC_user`, `tipo_doc_user`, `nom_user`, `ape_user`, `fenac_user`, `ciudad_naci`, `email`, `ID_curso`, `nombre_foto`, `ruta_foto`, `horas`, `usuario`, `contraseña`, `ID_nivel`) VALUES ('$ID', '$tipoDoc', '$nombre', '$apellido', '$fenac', '$ciudad_naci', '$email', '$ID_curso', NULL, NULL, '0', '$usuario', '$contraseña', '2');";
            $res=mysqli_query($link,$insert);
            if ($res) {
                echo '<script>alert("Registro exitoso!");</script>';
            }else {
                printf("Errormessage: %s\n", mysqli_error($link));
            }
        }else{
            echo '<script>alert("Por favor, intente con otro usuario");</script>';
        }

    }else{
        echo '<script>alert("Las contraseñas no coinciden, intentelo de nuevo");</script>';
    }

?>

