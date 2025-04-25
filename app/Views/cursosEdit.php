<?php include 'layouts/header.php'; ?>

<div class="container" style="margin-left: 260px; padding: 40px;">
    <h1>Editar Curso</h1>

    <?php if (!empty($data['error'])): ?>
        <div style="color: red; margin-bottom: 20px;"><?php echo $data['error']; ?></div>
    <?php endif; ?>

    <form action="<?php echo URLROOT . '/Home/cursosEdit/' . $data['curso']['id']; ?>" method="POST" style="max-width: 500px;">
        <div style="margin-bottom: 15px;">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" value="<?php echo $data['curso']['titulo']; ?>" required class="form-control" style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" required class="form-control" rows="5" style="width: 100%; padding: 10px;"><?php echo $data['curso']['descricao']; ?></textarea>
        </div>

        <button type="submit" class="add-button">Salvar</button>
    </form>
</div>

<?php include 'layouts/footer.php'; ?>
