<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de controle</title>

    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
<?php if (strpos($_SERVER['REQUEST_URI'], 'login') === false) { ?>
    <header>
        <nav>
            <ul>
                <li><a href="<?php echo URLROOT; ?>/Home/alunos">Alunos</a></li>
                <li><a href="<?php echo URLROOT; ?>/Home/matriculas">Matrículas</a></li>
                <li><a href="<?php echo URLROOT; ?>/Home/cursos">Cursos</a></li>
                <li><a href="<?php echo URLROOT; ?>/Home/logout">Logout</a></li>
            </ul>
        </nav>
    </header>
<?php } ?>
