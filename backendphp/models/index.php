<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <h1>Sao paulo fc</h1>

    <form action="cadastro.php" method="post">
        <label for="nome">Insira seu nome</label>
        <input type="text" id="nome" name="nome">
        <label for="email">Insira seu email</label>
        <input type="text" id="email" name="email">
        <label for="senha">Insira sua senha</label>
        <input type="password" id="senha" name="senha">
        <label for="dtnasc">Insira sua data de nascimento</label>
        <input type="date" id="data_nascimento" name="data_nascimento">
        <button type="submit">Enviar</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>