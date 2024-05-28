<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_cadastrarUsuario.css">
    <title>Cadastro</title>
</head>
<body>
    <div class="container">
        <h1>CADASTRO USUARIO</h1>
        <form action="testCadastro.php" method="post">
            <label for="nome">Nome </label>
            <br>
            <input type="text" name="nome" id="nome" required>
            <br><br>
            <label for="senha">Senha</label>
            <br>
            <input type="password" name="senha" id="senha" required>
            <br><br>
            <div class="container_button">
                <button type="submit">CADASTRAR</button>
            </div>

        </form>
    </div>
  
</body>
</html>