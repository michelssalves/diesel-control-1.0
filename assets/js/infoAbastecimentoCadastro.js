$("#prefixo").on("change", function () {
    $.ajax({
        url: 'diesel-control-1.0/registros/infoAbastecimentoCadastro.php',
        type: 'POST',
        dataType: "json",
        data: {id: $("#prefixo").val() },
        success: function (json) {

            $("#ultimokm").val(json.km);
            $("#ultimohr").val(json.hr);
    
        }
    });
});