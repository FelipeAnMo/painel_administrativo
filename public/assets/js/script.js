$(document).ready(function() {
    const $nomeInput = $('#searchNome');
    const $emailInput = $('#searchEmail');
    const $tableRows = $('#alunosTable tbody tr');

    function filtrarTabela() {
        const nomeFiltro = $nomeInput.val().toLowerCase();
        const emailFiltro = $emailInput.val().toLowerCase();

        $tableRows.each(function() {
            const $row = $(this);
            const nome = $row.find('td:eq(1)').text().toLowerCase();
            const email = $row.find('td:eq(2)').text().toLowerCase();

            if (nome.includes(nomeFiltro) && email.includes(emailFiltro)) {
                $row.show();
            } else {
                $row.hide();
            }
        });
    }

    $nomeInput.on('keyup', filtrarTabela);
    $emailInput.on('keyup', filtrarTabela);
});