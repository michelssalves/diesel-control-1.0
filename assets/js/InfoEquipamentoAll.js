$("#prefixo").on("change", function () {
    $.ajax({
        url: 'diesel-control-1.0/relatorios/InfoEquipamentoAll.php',
        type: 'POST',
        dataType: "json",
        data: {id: $("#prefixo").val() },
        success: function (json) {
            $("#id_veiculo").val(json.id_veiculo);
            $("#prefixo2").val(json.prefixo);
            $("#numero_equipamento").val(json.numero_equipamento);
            $("#prefixoo").val(json.prefixo);
            $("#placa").val(json.placa);
            $("#descricao_caminhao").val(json.descricao_caminhao);
            $("#renavam").val(json.renavam);
            $("#chassi").val(json.chassi);
            $("#numero_motor").val(json.numero_motor);
            $("#ano").val(json.ano);
            $("#marca").val(json.marca);
            $("#modelo").val(json.modelo);
            $("#combustivel").val(json.combustivel);
            $("#metodo").val(json.metodo);
            $("#setor").val(json.setor);
            $("#status_veiculo").val(json.status_veiculo);
    
        }
    });
});