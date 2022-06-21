$("#prefixo").on("change", function () {
    $.ajax({
        url: 'relatorios/infoAbastecimentoCadastro.php',
        type: 'POST',
        dataType: "json",
        data: {id: $("#prefixo").val() },
        success: function (json) {

            $("#ultimokm").val(json.km);
            $("#ultimohr").val(json.hr);
    
        }
    });
});