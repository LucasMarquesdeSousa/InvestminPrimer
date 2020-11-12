<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="../css/Style1.css" />
    </head>
    <body>
        <a href="../index.php"> Página Inicial </a>
        <div class="formulario">
            <form action="../Controller/ControllerEntrarUsu.php" method="post">
                <input type="email" name="email" placeholder="Email"/>
                <input type="password" name="senha" placeholder="Senha"/>
                <input type="submit" value="Enviar"/>
            </form>
            <a href="CadastrarUsuario.php"> Ainda não tem cadastro ? Clique aqui!</a>
        </div>
        <?php
        ?>
    </body>
</html>
