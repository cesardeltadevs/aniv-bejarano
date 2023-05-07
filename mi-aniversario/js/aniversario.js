$(document).ready(function () {
    $('#invitacion').hide();

    $('#btn-iniciar').click(function() {
        //Muestra la invitacion
        $('#inicial').hide();
        $('#invitacion').show();

        //Inicia la cancion
        let cancion = new Audio('media/AUD-20230506-WA0004.ogg');
        cancion.play();
    });
});
