<?php include 'layouts/header.php'; ?>

<div class="add-container">
    <h1 class="add-title">Adicionar Aluno</h1>

    <form action="<?php echo URLROOT . '/Home/alunosAdd'; ?>" method="POST" class="add-form">
        <div class="form-group">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" required class="form-control">
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" required class="form-control">
        </div>

        <div class="form-group">
            <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
            <input type="date" name="data_nascimento" required class="form-control">
        </div>

        <button type="submit" class="add-button">Salvar</button>
    </form>
</div>

<?php include 'layouts/footer.php'; ?>