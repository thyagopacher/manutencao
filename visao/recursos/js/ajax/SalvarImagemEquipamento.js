window.addEventListener("DOMContentLoaded", function () {
    var canvas = document.getElementById("canvas"),
            context = canvas.getContext("2d"),
            video = document.getElementById("video"),
            videoObj = {"video": true},
            errBack = function (error) {
                console.log("Video capture error: ", error.code);
            };

    if (navigator.getUserMedia) {
        navigator.getUserMedia(videoObj, function (stream) {
            video.src = window.URL.createObjectURL(stream);
            video.play();
        }, errBack);
    } else if (navigator.webkitGetUserMedia) {
        navigator.webkitGetUserMedia(videoObj, function (stream) {
            video.src = window.webkitURL.createObjectURL(stream);
            video.play();
        }, errBack);
    } else if (navigator.mozGetUserMedia) {
        navigator.mozGetUserMedia(videoObj, function (stream) {
            video.src = window.URL.createObjectURL(stream);
            video.play();
        }, errBack);
    }
    document.getElementById("snap").addEventListener("click", function () {
        canvas.getContext("2d").drawImage(video, 0, 0, 640, 480);
        //alert(canvas.toDataURL());
    });
    document.getElementById("save").addEventListener("click", function () {

        // Assign handlers immediately after making the request,
        // and remember the jqxhr object for this request
        var jqxhr = $.post('/control/SalvarFotoEquipamento.php', {imagem: canvas.toDataURL(), codequipamento: document.getElementById("codequipamento").value}, function (data) {
            if (data.situacao == true) {
                swal("Cadastro", data.mensagem, "success");
                window.opener.location.reload();
                window.close();
            } else {
                alert(data.mensagem);
            }
        }, 'json');

        // Perform other work here ...
        // Set another completion function for the request above
        jqxhr.fail(function (data) {
            swal("Atenção", "Erro ao salvar imagem, contate o suporte!!!", "info");
        });
    });
}, false);
