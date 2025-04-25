<?php include 'layouts/header.php'; ?>

<div class="container">
    <h1>Cursos</h1>

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Data de Criação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['cursos'] as $curso): ?>
                    <tr>
                        <td><?php echo $curso['id']; ?></td>
                        <td><?php echo $curso['titulo']; ?></td>
                        <td><?php echo $curso['descricao']; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($curso['data_criacao'])); ?></td>
                        <td>
                            <a href="<?php echo URLROOT . '/Home/cursosEdit/' . $curso['id']; ?>">Editar</a> |
                            <a href="<?php echo URLROOT . '/Home/cursosRemove/' . $curso['id']; ?>" onclick="return confirm('Deseja deletar este curso?')">Deletar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="add-button-container">
        <a href="<?php echo URLROOT . '/Home/cursosAdd'; ?>" class="add-button">Adicionar Curso</a>
    </div>
</div>

<?php include 'layouts/footer.php'; ?>
