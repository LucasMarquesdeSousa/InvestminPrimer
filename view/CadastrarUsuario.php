<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../js/ValidarFormUsu.js"></script>
        <!-- Inclusão do jQuery-->
        <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
        <!-- Inclusão do Plugin jQuery Validation-->
        <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
    </head>
    <body>
        <script>
                   </script>
        <a href="../index.php"> Página Inicial </a>
        <form id="formularioValidation" action="../Controller/ControllerCadUsuario.php" method="POST">
            <input type="text" name="nome" id="nome" placeholder="Nome" required/>
            <input type="email" name="email" id="email" placeholder="Email" required/>
            <input type="password" name="senha" id="senha" placeholder="Senha" required/>
            <input type="password" name="conf_senha" id="conf_senha" placeholder="Confirmar senha" required/>
            <input type="submit" value="Cadastrar" onclick="validate();"/>
        </form>
        <a href="Entrar.php" class="fa">Já possui cadastro? Clique aqui!</a>
        <?php
        ?>
    </body>
</html>
