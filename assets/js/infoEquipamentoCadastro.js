$("#prefixo").on("change", function () {
    $.ajax({
        url: 'diesel-control-1.0/registros/infoEquipamentoCadastro.php',
        type: 'POST',
        dataType: "json",
        data: {id: $("#prefixo").val() },
        success: function (json) {
            $("#id_veiculo").val(json.id_veiculo);
            $("#numero_equipamento").val(json.numero_equipamento);
            $("#placa").val(json.placa);
            $("#metodo").val(json.metodo);
            $("#combustivel").val(json.combustivel);
        }
    });
});