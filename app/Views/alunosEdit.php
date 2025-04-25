<?php include 'layouts/header.php'; ?>

<div class="container" style="margin-left: 260px; padding: 40px;">
    <h1>Editar Aluno</h1>

    <form action="<?php echo URLROOT . '/Home/alunosEdit/' . $data['aluno']['id']; ?>" method="POST" style="max-width: 500px;">
        <div style="margin-bottom: 15px;">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required value="<?php echo htmlspecialchars($data['aluno']['nome']); ?>" style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email">Email:</label>
            <input type="email" name="email" required value="<?php echo htmlspecialchars($data['aluno']['email']); ?>" style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" name="data_nascimento" required value="<?php echo $data['aluno']['data_nascimento']; ?>" style="width: 100%; padding: 10px;">
        </div>

        <button type="submit" class="add-button">Salvar Alterações</button>
    </form>
</div>

<?php include 'layouts/footer.php'; ?>
