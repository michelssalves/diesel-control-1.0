$("#codigofuncionario").on("change", function () {
    $.ajax({
        url: 'js/infoFuncionario.php',
        type: 'POST',
        dataType: "json",
        data: {id: $("#codigofuncionario").val() },
        success: function (json) {
            $("#matricula").val(json.matricula);
            $("#nome").val(json.nome);
            
        }
    });
});
$("#coletor1").on("change", function () {
    $.ajax({
        url: 'js/infoFuncionario.php',
        type: 'POST',
        dataType: "json",
        data: {id: $("#coletor1").val() },
        success: function (json) {
            $("#coletor01").val(json.matricula);
            $("#nome01").val(json.nome);
            
        }
    });
});
$("#coletor2").on("change", function () {
    $.ajax({
        url: 'js/infoFuncionario.php',
        type: 'POST',
        dataType: "json",
        data: {id: $("#coletor2").val() },
        success: function (json) {
            $("#coletor02").val(json.matricula);
            $("#nome02").val(json.nome);
            
        }
    });
});
$("#coletor3").on("change", function () {
    $.ajax({
        url: 'js/infoFuncionario.php',
        type: 'POST',
        dataType: "json",
        data: {id: $("#coletor3").val() },
        success: function (json) {
            $("#coletor03").val(json.matricula);
            $("#nome03").val(json.nome);
            
        }
    });
});
$("#coletor4").on("change", function () {
    $.ajax({
        url: 'js/infoFuncionario.php',
        type: 'POST',
        dataType: "json",
        data: {id: $("#coletor4").val() },
        success: function (json) {
            $("#coletor04").val(json.matricula);
            $("#nome04").val(json.nome);
            
        }
    });
});

