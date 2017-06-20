var SERVER_URL = 'http://localhost/auditorium-umss/server/';

var enviarConsultaPhp = function(act, args){
    $.ajax(
    {
        type: "POST",
        url: SERVER_URL,
        dataType: 'json',
        data:
        {
            accion: act,
            parametros: args
        },
        success: function (obj, textstatus) {
            if( !('error' in obj) )
            {
                if (act === 'registrarEvento'
                    || act === 'actualizarEvento'
                    || act === 'eliminarEvento')
                {
                    $('#formulario')[0].reset();
                    $.magnificPopup.close();

                    if(typeof $.fullCalendar !== 'undefined')
                    {
                        $('#calendar').fullCalendar('refetchEvents');
                    }
                }
                else if (act == 'registrarUsuario')
                {
                    sessionStorage.idUsuario = obj.usrId;
                    sessionStorage.nombreUsuario = obj.usrNombre;
                    sessionStorage.apellido1Usuario = obj.usrApellido1;
                    sessionStorage.apellido2Usuario = obj.usrApellido2;
                    window.location.assign('usuario.html');
                }
                /*console.log(obj);
                alert("Accion Completada!");*/
            }
            else
            {
                alert(obj.error);
            }
        },
        error: function (req, textoEstado, textoError) {
            console.log(req);
            console.log(textoError);
        },
        complete: function (req, textoEstado) {
            
        }
    });
}

var llenarOpciones = function(act, selectId){
    $.ajax(
    {
        type: "GET",
        url: SERVER_URL,
        dataType: 'json',
        data:
        {
            accion: act
        },
        success: function (obj, textstatus) {
            for (var i=0; i<obj.length; i++) {
                var opt = obj[i];
                $('#'+selectId).append($('<option>',opt));
            }
        },
        error: function (req, textoEstado, textoError) {
            console.log(textoError);
        },
        complete: function (req, textoEstado) {
        }
    });
}

var setDatosUsuario = function(idUsuario){
    $.ajax(
    {
        type: "GET",
        url: SERVER_URL,
        dataType: 'json',
        data:
        {
            accion: "obtenerDatosUsuario",
            id: idUsuario
        },
        success: function (obj, textstatus) {
            $('#nombreUsuario').text(obj.nombre);
            $('#rolUsuario').text(obj.rol);
            if (obj.rol != 'Administrador') {
                $('#menuList>li.admin').hide();
            }
        },
        error: function (req, textoEstado, textoError) {
            console.log(textoError);
        },
        complete: function (req, textoEstado) {
        }
    });
}

var cargarCronograma = function(idFileInput, idFacultad){
    var archivo = $(idFileInput)[0].files[0];
    var postData = new FormData();
    postData.append('accion', 'subirCronograma');
    postData.append('idFacultad', idFacultad);
    postData.append('archivo', archivo);

    $.ajax(
    {
        type: "POST",
        url: SERVER_URL,
        dataType: 'json',
        data: postData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (obj, textstatus) {
            alert("Cronograma Cargado!");
            console.log(obj.respuesta);
        },
        error: function (req, textoEstado, textoError) {
            console.log(textoError);
        }
    });
}

var optenerReserva = function(id,url){

    $.ajax(
    {
        type: "GET",
        url: SERVER_URL,
        dataType: 'json',
        data: 
        {
          accion: "getReserva",
          idReserva: id
        },
       
        success: function (obj, textstatus) {
            var usuario = obj.usuario;
            var titulo = obj.titulo;
            var descripcion = obj.descripcion;
            var fechaInicio = obj.fechaInicio;
            var fechaFin = obj.fechaFin;
            var horaInicio = obj.horaInicio;
            var horaFin = obj.horaFin;
            $('input#titulo').val(titulo );
            $('input#descripcion').val(descripcion);
            $('input#fechaInicio').val(fechaInicio); 
            $('input#fechaFin').val(fechaFin);
            $('input#horaInicio').val(moment(fechaInicio+'T'+horaInicio).format('hh:mm')); 
            $('input#horaFin').val(moment(fechaFin+'T'+horaFin).format('hh:mm'));
            $('input#usuario').val(usuario);
        },
        error: function (req, textoEstado, textoError) {
            console.log(textoError);
        }
    });
}

var conectarUsuario = function(ciUsr, passUsr)
{
    $.ajax(
    {
        type: "POST",
        url: SERVER_URL,
        dataType: 'json',
        data: 
        {
          accion: "conectarUsuario",
          ci: ciUsr,
          pass: passUsr
        },
       
        success: function (obj, textstatus) {
            if (obj.error) {
                alert(obj.error);
            }
            else {
                sessionStorage.idUsuario = obj.usrId;
                sessionStorage.nombreUsuario = obj.usrNombre;
                sessionStorage.apellido1Usuario = obj.usrApellido1;
                sessionStorage.apellido2Usuario = obj.usrApellido2;
                window.location.assign(window.location.href + 'screens/usuario.html');
            }
        },
        error: function (req, textoEstado, textoError) {
            console.log(req);            
            console.log(textoEstado);
            console.log(textoError);
        }
    });
}

var obtenerSecuenciaFechas = function(fechaInicio, fechaFin, dias)
{
    var secuenciaFechas = Array();
    var momentInicio = moment(fechaInicio);
    var momentFin = moment(fechaFin);
    var momentActual = momentInicio.clone();

    while(momentFin.isSameOrAfter(momentActual))
    {
        for (var i = 0; i < dias.length; i++)
        {
            var dia = dias[i];
            var momentAux = momentActual.clone();

            if (momentAux.isoWeekday() <= dia)
            {
                momentAux = momentAux.isoWeekday(dia).clone();
            }
            else
            {
                momentAux = momentAux.add(1, 'weeks').isoWeekday(dia).clone();
            }

            if (momentFin.isSameOrAfter(momentAux))
            {
                secuenciaFechas.push(momentAux.format('YYYY-MM-DD'));
            }
        }

        momentActual.add(1, 'weeks');
    }
    
    return secuenciaFechas;
}

var filtarAmbientePorFechas = function(fechaI, fechaF, horaI, horaF, secuencia, selectId)
{
    $.ajax(
    {
        type: 'GET',
        url: SERVER_URL,
        dataType: 'json',
        data:
        {
            accion: 'filtrarPorFechas',
            fechaInicio: fechaI,
            fechaFin:fechaF,
            horaInicio:horaI,
            horaFin: horaF,
            fechas:secuencia
        },
       
        success: function (obj, textstatus) {
            if (obj.error) {
                alert(obj.error);
            }
            else {
                for (var i=0; i<obj.length; i++) {
                    var opt = obj[i];
                    $('#'+selectId).append($('<option>',opt));
                }
                console.log(obj);
            }
        },
        error: function (req, textoEstado, textoError) {
            console.log(req);            
            console.log(textoEstado);
            console.log(textoError);
        }
    })
}