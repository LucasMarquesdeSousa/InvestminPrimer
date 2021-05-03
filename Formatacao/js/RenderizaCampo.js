var numClick = 0;
var lugar_jogada = '';
setTimeout(function () {
    $(document).ready(function () {
        $.ajax({
            url: '/novo/Jogar/getJogadas',
            success: function (data) {
                if (data) {
                    const valor = JSON.parse(data)
                    // document.body.innerHTML += data;
                    //console.log(data.length)
                    for (var i = 0; i < valor.length; i++) {
                        lugar_jogada = valor[i]['lugar_jogada'];
                        const simbolo = valor[i]['simbolo'];
                        const terminado = '';
                        document.getElementById(`${lugar_jogada}`).innerHTML = '';
                        $(`#${lugar_jogada}`).append(simbolo);
                    }
                }
            }
        });
    });
}, 900);
var vencedor = false;
setInterval(function () {

    $(document).ready(function () {
        $.ajax({
            url: '/novo/Jogar/BuscaJogadas',
            success: function (data) {
                if (data) {
                    const valor = JSON.parse(data)
                    for (var i = 0; i < valor.length; i++) {
                        if (valor[0]['vencedor']) {
                            if (i == 0 && !vencedor) {
                                alert('O vencedor é ' + valor[0]['nome_vencedor']);
                                const val = confirm('Que fazer outra partida');
                                $.ajax({
                                    url: '',
                                    data: '',
                                    success: function (data) {
                                        if (data) {

                                        }
                                    }
                                });
                                vencedor = valor[0]['tem'];
                                break;
                            }
                        } else {
                            lugar_jogada = valor[i]['lugar_jogada'];
                            const simbolo = valor[i]['simbolo'];
                            const terminado = '';
                            document.getElementById(`${lugar_jogada}`).innerHTML = '';
                            $(`#${lugar_jogada}`).append(simbolo);
                        }
                    }
                }
            }
        });
    });
}, 1000);
if (numClick < 1) {
    var re = document.getElementsByClassName('botao');
    for (var i = 0; i < re.length; i++) {
        re[i].addEventListener('click', function () {
            numClick++;
            var casa = document.getElementsByClassName('casa');
            for (let i = 0; i < casa.length; i++) {
                const home = casa[i];
                home.innerHTML = '';
            }
            $.ajax({
                url: '/novo/',
                data: '',
                success: function (data) {
                    if (data) {

                    }
                }
            });
        });
    }
}



