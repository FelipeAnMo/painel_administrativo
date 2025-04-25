<?php include 'layouts/header.php'; ?>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: "Open Sans", sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

h2 {
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

.login-container {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 420px;
}

.error-message {
    color: red;
    text-align: center;
    margin-bottom: 20px;
}

.input-group {
    margin-bottom: 15px;
}

.input-group label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
    color: #555;
}

.input-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: #f9f9f9;
}

.input-group input:focus {
    border-color: #007bff;
    outline: none;
}

.login-btn {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.login-btn:hover {
    background-color: #0056b3;
}

</style>

<div class="login-container">
    <h2>Login - Painel Administrativo</h2>
    <?php if (isset($data['error_message'])): ?>
        <p class="error-message"><?php echo $data['error_message']; ?></p>
    <?php endif; ?>
    <form action="<?= URLROOT ?>/login/authenticate" method="POST">
        <div class="input-group">
            <label for="email">E-mail</label>
            <input type="text" id="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required>
        </div>
        <button type="submit" class="login-btn">Entrar</button>
    </form>
</div>

<script src="<?php echo URLROOT; ?>/public/js/login.js"></script>

<?php include 'layouts/footer.php'; ?>
