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
            console.log("ERROR");
        },
        complete: function (req, textoEstado) {
            console.log("COMPLETE");
        }
    });
}