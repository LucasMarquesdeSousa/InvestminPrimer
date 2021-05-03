<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="<?= URL ?>/Formatacao/js/jquery.min.js"></script>
<link rel="stylesheet" href="<?= URL ?>/Formatacao/css/campo.css"/>

<div class="all">
    <nav>
        <div class="placar">
            <h1 id="yo"> Eu: 0</h1>
            <h1 id="el">Jogador2: 0</h1>
<!--        <button class="botao">Recomeçar</button>-->
            <a href="<?= URL ?>/usuario">Volta</a>
        </div>
    </nav>
    <div class="campo">
        <button id="a1" class="casa"></button>
        <button id="a2" class="casa"></button>
        <button id="a3" class="casa"></button>

        <button id="b1" class="casa"></button>
        <button id="b2" class="casa"></button>
        <button id="b3" class="casa"></button>

        <button id="c1" class="casa"></button>
        <button id="c2" class="casa"></button>
        <button id="c3" class="casa"></button>
    </div>
</div>
<script src="<?= URL ?>/Formatacao/js/desenhaCampo.js"></script>
<script src="<?= URL ?>/Formatacao/js/RenderizaCampo.js"></script>