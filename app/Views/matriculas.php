<?php include 'layouts/header.php'; ?>

<div class="container">
    <h1>Matrículas</h1>

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Aluno</th>
                    <th>Data de Matrícula</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['matriculas'] as $matricula): ?>
                    <tr>
                        <td><?php echo $matricula['id']; ?></td>
                        <td><?php echo $matricula['aluno_nome']; ?></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($matricula['data_matricula'])); ?></td>
                        <td>
                            <a href="<?php echo URLROOT . '/matriculas/edit/' . $matricula['id']; ?>">Editar</a> |
                            <a href="<?php echo URLROOT . '/matriculas/delete/' . $matricula['id']; ?>" onclick="return confirm('Deseja deletar esta matrícula?')">Deletar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="add-button-container">
        <a href="<?php echo URLROOT . '/Home/matriculasAdd'; ?>" class="add-button">Adicionar Matrícula</a>
    </div>
</div>

<?php include 'layouts/footer.php'; ?>
