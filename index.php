<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Envestimento</title>
        <script src="js/Fromulario.js"></script>
    </head>
    <body>
        <?php 
        if(isset($_SESSION["email"])){
            header("location: view/index.php");
        }  
        ?>
        <a href="view/CadastrarUsuario.php">Cadastrar</a>
        <a href="view/Entrar.php"> Entrar </a>
        <?php
            
        ?>
    </body>
</html>