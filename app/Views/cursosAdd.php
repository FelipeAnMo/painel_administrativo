<?php include 'layouts/header.php'; ?>

<div class="add-container">
    <h1 class="add-title">Adicionar Curso</h1>

    <?php if (!empty($data['error'])): ?>
        <div class="error-message"><?php echo $data['error']; ?></div>
    <?php endif; ?>

    <form action="<?php echo URLROOT . '/Home/cursosAdd'; ?>" method="POST" class="add-form">
        <div class="form-group">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" name="titulo" required class="form-control">
        </div>

        <div class="form-group">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea name="descricao" required class="form-control" rows="5"></textarea>
        </div>

        <button type="submit" class="add-button">Salvar</button>
    </form>
</div>

<?php include 'layouts/footer.php'; ?>
