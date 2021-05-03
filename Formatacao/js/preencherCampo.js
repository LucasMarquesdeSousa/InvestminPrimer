$(document).ready(function () {
    var casa = document.getElementsByClassName('casa');
    for (let i = 0; i < casa.length; i++) {
        casa[i].addEventListener('click', function () {
            var id_casa = this.getAttribute('id');
            $.ajax({
                url: `/novo/solo/logica/${id_casa}`,
                type: 'POST',
                success: function (data) {
                    if (data) {
//                        toastr.error('É a vez do outro jogador');
                            document.body.innerHTML = data
                    }
                }
            });
        });
    }
});
