<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_login.css">
    <title>Login</title>
</head>
<body>
   
    <div class="container">
        <h1>LOGIN</h1>
        <form action="testLogin.php" method="post">
        <input type="text" name="nome" id="nome" placeholder="Nome" required>
        <br><br>
        <input type="password" name="senha" id="senha" placeholder="Senha" required>
        <div class="container_button">
            <button type="submit">ENTRAR</button>
        </div>
        <div class="container_cadastro">
            <p>ou</p>
            <p>Cadastre-se <a href="cadastar_usuario.php">aqui</a></p>
        </div>
        </form>
    </div>
</body>
</html>