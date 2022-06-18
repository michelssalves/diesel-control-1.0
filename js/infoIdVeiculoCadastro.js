$("#prefixo").change( function () {
    $.ajax({
        url: 'infoIdVeiculoCadastro.php',
        type: 'POST',
        dataType: "json",
        data: { id: $("#prefixo").val() },
        success: function (json) {
            $("#id_veiculo").val(json.id_veiculo);
             $("#combustivel").val(json.combustivel);
        }
    });
});