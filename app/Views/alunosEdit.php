<?php include 'layouts/header.php'; ?>

<div class="container">
    <h1>Editar Aluno</h1>

    <form action="<?php echo URLROOT . '/Home/alunosEdit/' . $data['aluno']['id']; ?>" method="POST" class="form-padrao">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required value="<?php echo htmlspecialchars($data['aluno']['nome']); ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" required value="<?php echo htmlspecialchars($data['aluno']['email']); ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" name="data_nascimento" required value="<?php echo $data['aluno']['data_nascimento']; ?>" class="form-control">
        </div>

        <button type="submit" class="add-button">Salvar Alterações</button>
    </form>
</div>

<?php include 'layouts/footer.php'; ?>
