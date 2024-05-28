 <?php
    session_start();
    if((!isset($_SESSION['email'])== true) and (!isset($_SESSION['senha'])== true)){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header("Location: index.php");
    }
    $logado = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style_cadastar.css">
    <title>Agenda Telefônica</title>
    
</head>
<body>

        <div class="Container_buttons">
            <a href="index.php" class="button_encerrar">ENCERRAR SESSÃO</a>
            <a href="Contatos.php" class="button_contatos">CONTATOS</a>
        </div>
    
    <div class="container">
        <form action="Contatos.php" method="post">
            <h1>ADICIONAR CONTATOS</h1>

            <div class="input_nome">
                <label for=""><strong>Nome</strong></label>
                <input type="text" name="nome" id="nome" required>
            </div>

            <div class="input_telefone">
                <label for="telefone"><strong>Telefone</strong></label>
                <input type="tel" name="telefone" id="telefone" required>
            </div>

            <div class="input_email">
                <label for="email"><strong>E-mail</strong></label>
                <input type="email" name="email" id="email" >
            </div>

            <div class="input_endereco">
                <label for="endereco"><strong>Endereço</strong></label>
                <input type="text" name="endereco" id="endereco">
            </div>

            <div class="container_button">
                <button type="submit">CADASTRAR</button>
            </div>
        </form>
    </div>
</body>

</html>