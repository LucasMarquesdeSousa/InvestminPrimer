<link rel="stylesheet" href="../Formatacao/css/salasdisponiveis.css">
<h1>Salas disponíveis no momento</h1>
<div class="all-sala">
    <?php
    $salasDisponiveis = $this->dados2;
    if (count($salasDisponiveis) > 0):
        for ($i = 0; $i < count($salasDisponiveis); $i++) {
            ?>
            <div class="sala">
                <div class="num-sala">
                    <h1><?= $i ?></h1>
                </div>
                <div class="name-sala">
                    <h1><?= $salasDisponiveis[$i]['nome'] ?></h1>
                </div>
                <div class="criador-sala">
                    <h1><?= $salasDisponiveis[$i]['criador'] ?></h1>
                </div>
                <div class="botao-sala">
                    <button><a href="<?= URL ?>/online/entrasala/<?= $salasDisponiveis[$i]['id_salas'] ?>">Entrar</a></button>
                </div>
            </div>
            <?php
        }
    else:?>
        <h3>Não há salas disponíveis no momento! Deseja criar a sua?</h3>
        <a href="<?=URL?>/online/criarsala">Clique aqui para criar!</a>
    <?php
    endif;
    ?>
</div>