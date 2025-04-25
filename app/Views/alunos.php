<?php include 'layouts/header.php'; ?>

<div class="container">
    <h1>Alunos</h1>

    <div class="search-bar">
        <input type="text" id="searchNome" placeholder="Buscar por nome...">
        <input type="text" id="searchEmail" placeholder="Buscar por email...">
    </div>

    <div class="table-container">
        <table class="table" id="alunosTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data de Nascimento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['alunos'] as $aluno): ?>
                    <tr>
                        <td><?php echo $aluno['id']; ?></td>
                        <td><?php echo $aluno['nome']; ?></td>
                        <td><?php echo $aluno['email']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($aluno['data_nascimento'])); ?></td>
                        <td>
                            <a href="<?php echo URLROOT . '/Home/alunosEdit/' . $aluno['id']; ?>">Editar</a> | 
                            <a href="<?php echo URLROOT . '/Home/alunosRemove/' . $aluno['id']; ?>" onclick="return confirm('Tem certeza que deseja deletar este aluno?')">Deletar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="add-button-container">
        <a href="<?php echo URLROOT . '/Home/alunosAdd'; ?>" class="add-button">Adicionar Aluno</a>
    </div>
</div>

<?php include 'layouts/footer.php'; ?>
