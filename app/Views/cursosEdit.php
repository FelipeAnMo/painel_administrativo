<?php include 'layouts/header.php'; ?>

<div class="container">
    <h1>Editar Curso</h1>

    <?php if (!empty($data['error'])): ?>
        <div class="mensagem-erro"><?php echo $data['error']; ?></div>
    <?php endif; ?>

    <form action="<?php echo URLROOT . '/Home/cursosEdit/' . $data['curso']['id']; ?>" method="POST" class="form-padrao">
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" value="<?php echo $data['curso']['titulo']; ?>" required class="form-control">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" required class="form-control" rows="5"><?php echo $data['curso']['descricao']; ?></textarea>
        </div>

        <button type="submit" class="add-button">Salvar</button>
    </form>
</div>

<?php include 'layouts/footer.php'; ?>
