<?php
    session_start();
    if(!isset($_SESSION["email"])){ 
        $_SESSION["email"] = [];
    }
    if(!isset($_SESSION["senha"])){
        $_SESSION["senha"] = [];
    }

    $email = $_POST["email"];
    $password = $_POST["senha"];
    $conteudoemail = file_get_contents("email.json");
    $_SESSION['email'] = json_decode($conteudoemail, true);
    $conteudopassword = file_get_contents('senha.json');
    $_SESSION['senha'] = json_decode($conteudopassword, true);
    $femail = array_search($email, $_SESSION['email']);
    $fpassword = array_search($password, $_SESSION['senha']);

    $_SESSION['index'] = $femail;

    if(isset($femail) == null&& isset($fpassword)== null){
        echo"<script>alert('Credenciais não validadas. Tente novametne!');</script>";
        echo"<script>window.location.replace('index.php');</script>";    
    }
    else{
        header("Location: inicial.php");
    }
?>