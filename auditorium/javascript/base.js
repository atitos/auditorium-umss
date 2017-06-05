var enviarConsultaPhp = function(url, act, args){
    $.ajax(
    {
        type: "POST",
        url: url,
        dataType: 'json',
        data:
        {
            accion: act,
            parametros: args
        },
        success: function (obj, textstatus) {
            alert("success");
                 if( !('error' in obj) )
                 {
                    console.log(obj);
                 }
                 else
                 {
                     console.log(textstatus + ": " +obj.error);
                 }
        },
        error: function (req, textoEstado, textoError) {
            console.log(textoError);
        },
        complete: function (req, textoEstado) {
            if (act === 'registrarEvento')
            {
                $('#calendar').fullCalendar('refetchEvents')
            }
        }
    });
}

var llenarOpciones = function(url, act, selectId){
    $.ajax(
    {
        type: "GET",
        url: url,
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

var setDatosUsuario = function(url, idUsuario){
    $.ajax(
    {
        type: "GET",
        url: url,
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

var cargarCronograma = function(url, idFileInput, idFacultad){
    var archivo = $(idFileInput)[0].files[0];
    var postData = new FormData();
    postData.append('accion', 'subirCronograma');
    postData.append('idFacultad', idFacultad);
    postData.append('archivo', archivo);

    $.ajax(
    {
        type: "POST",
        url: url,
        dataType: 'json',
        data: postData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (obj, textstatus) {
            alert("success");
            console.log(obj.respuesta);
        },
        error: function (req, textoEstado, textoError) {
            console.log(textoError);
        }
    });
}