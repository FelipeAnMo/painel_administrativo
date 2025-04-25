<?php include 'layouts/header.php'; ?>

<div class="add-container">
    <h1 class="add-title">Adicionar Matrícula</h1>

    <?php if (!empty($data['error'])): ?>
        <div class="error-message"><?php echo $data['error']; ?></div>
    <?php endif; ?>

    <form action="<?php echo URLROOT . '/Home/matriculasAdd'; ?>" method="POST" class="add-form">
        <div class="form-group">
            <label for="aluno_id" class="form-label">Aluno:</label>
            <select name="aluno_id" id="aluno_id" required class="form-control">
                <option value="">Selecione um aluno</option>
                <?php foreach ($data['alunos'] as $aluno): ?>
                    <option value="<?php echo $aluno['id']; ?>"><?php echo $aluno['nome']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="curso_id" class="form-label">Curso:</label>
            <select name="curso_id" id="curso_id" required class="form-control">
                <option value="">Selecione um curso</option>
                <?php foreach ($data['cursos'] as $curso): ?>
                    <option value="<?php echo $curso['id']; ?>"><?php echo $curso['titulo']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="add-button">Salvar</button>
    </form>
</div>

<?php include 'layouts/footer.php'; ?>
