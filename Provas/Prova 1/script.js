$(document).ready(function () {
    $('#cadastrar-btn').click(function () {
        var camposEmBranco = [];
        if ($('#raca').val() === '') camposEmBranco.push('Raça');
        if ($('#cor').val() === '') camposEmBranco.push('Cor');
        if ($('#idade').val() === '') camposEmBranco.push('Idade');
        if ($('#preco').val() === '') camposEmBranco.push('Preço');
        if ($('#descricao').val() === '') camposEmBranco.push('Descrição');

        if (camposEmBranco.length > 0) {
            var mensagem = 'Os seguintes campos estão em branco: ' + camposEmBranco.join(', ');
            $('#validation-message').text(mensagem).show();
        } else {
            $('#validation-message').hide();
        }
    });

    $('#raca').tooltip({ title: 'Informe a raça do animal', placement: 'top' });
    $('#especie').tooltip({ title: 'Selecione a espécie do animal', placement: 'top' });
    $('#cor').tooltip({ title: 'Informe a cor do animal', placement: 'top' });
    $('#idade').tooltip({ title: 'Informe a idade do animal', placement: 'top' });
    $('#preco').tooltip({ title: 'Informe o preço do animal', placement: 'top' });
    $('#descricao').tooltip({ title: 'Forneça uma descrição do animal', placement: 'top' });
});