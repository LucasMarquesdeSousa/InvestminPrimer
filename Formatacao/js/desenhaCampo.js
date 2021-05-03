
$(document).ready(function () {
    var casa = document.getElementsByClassName('casa');
    for(var i = 0; i < 10; i++){
        
    }
    for (let i = 0; i < casa.length; i++) {
        casa[i].addEventListener('click', function () {
            var id_casa = this.getAttribute('id');
            $.ajax({
                url: `/novo/Jogar/logica/${id_casa}`,
                type: 'POST',
                success: function (data) {
                    if (data) {
                        toastr.error('É a vez do outro jogador');
                    }
                }
            });
        });
    }
});