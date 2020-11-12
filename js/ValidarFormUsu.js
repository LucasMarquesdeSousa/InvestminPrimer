/*function ValidarFomUsu() {
 var nome = document.getElementById("nome").value;
 var email = document.getElementById("email").value;
 var senha = document.getElementById("senha").value;
 var conf_senha = document.getElementById("conf_senha").value;
 //tipos de emails existentes no mercado
 const tipo_emails = {
 gmail: "",
 ".com": "",
 "@": "",
 }
 //nome
 if (nome.length == 0) {
 return false;
 }
 //email
 for (var i = 0; i < email.length; i++) {
 if (email.indexOf(tipo_emails[i]) == -1 || email.length == 0) {
 return false;
 }
 }
 //senha
 if (senha.length < 3 && senha != conf_senha || senha.length == 0 ) {
 return false;
 }
 }*/
$("#formularioValidation").validate({
    debug: true,
    rules: {
        campo1: {
            required: true,
            email: true,
            // remote: 'check-email.php' //Deve utilizar um arquivo
            (por exemplo: check - email.php) para verificar algo, e
                    assim retornar um boolean true ou false para satisfazer esta opção;
        },
        campo2: {
            minlength: 3,
            maxlength: 4,
            // ou
            rangelength: [3, 4] //Realiza a mesma coisa dos anteriores
        },
        campo3: {
            min: 10,
            max: 15,
            // ou
            range: [10, 15] //Realiza a mesma coisa dos anteriores
        },
        campo4: {
            accept: "audio/*"
        },
        telefone_pessoal: {
            require_from_group: [1, ".grupo_telefone"]
        },
        telefone_casa: {
            require_from_group: [1, ".grupo_telefone"]
        },
        telefone_trabalho: {
            require_from_group: [1, ".grupo_telefone"]
        }
    },
    messages: {
        //exemplo
        campo4: {
            accept: "Mensagem customizada: Informe um tipo de arquivo válido!"
        }
    }
});

