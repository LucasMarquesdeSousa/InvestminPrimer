<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../js/Confirnações.js"></script>
    </head>
    <body>
        <?php session_start(); 
        if(empty($_SESSION["email"])){
            header("location: ./Entrar.php");
        }  
        ?>
        <a href="../Controller/ControllerEncerrarSessao.php" onclick="return Sair();"> Sair </a>
    </body>
</html>
