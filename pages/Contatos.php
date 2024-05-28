<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>

    <style>
        body{
            background-color: #F2F4F6;
            font-family: Arial, Helvetica, sans-serif;
        }

        .box-search{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 40px;
        }

        .box-search input{
            width: 25%;
            padding: 4px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            border: none;
            border: 0.5px solid #e2e4e6;
        }

        .button_search{
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            color: white;
            padding: 2px 5px;
            background-color: #03A6FD;
            border: none;
            cursor: pointer;
        }

        

        .container_table
        {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .voltar{
            text-align: center;
            margin-top: 20px;
        }

        .voltar a{
            background-color: green;
            padding: 10px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
        
    </style>
</head>
<body>

        <div class="box-search">
            <input type="search" name="search" id="search" placeholder="Pesquisar">
            <button onclick= pesquisar() class="button_search">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg>
            </button>
        </div>
    <?php 
     
     include_once('config.php');
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Verifica se a solicitação p$_POST está enviando dados para inserção no banco de dados
     if(isset($_POST["nome"]) && isset($_POST["telefone"]) && isset($_POST["email"]) && isset($_POST["endereco"])) {
         $nome = $_POST["nome"];
         $telefone = $_POST["telefone"];
         $email = $_POST["email"];
         $endereco = $_POST["endereco"];
         
      
     
         // Insere os dados no banco de dados
         $result = mysqli_query($conexao, "INSERT INTO contatos(nome, telefone, email, endereco) VALUES ('$nome', '$telefone', '$email', '$endereco')");
         if ($result) {
            // Redireciona o usuário após a inserção bem-sucedida
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        } else {
            // Se houver um erro na execução da query, exibe o erro
            echo "Erro: " . mysqli_error($conexao);
        }
        }
    }
     if(!empty($_GET['search'])){
        $data = $_GET['search'];
        $sql = "SELECT * FROM contatos WHERE nome LIKE '%$data%'";
     }else{
        $sql = "SELECT * FROM contatos ";
     }

     $result = $conexao ->query($sql);
    
     $contatos = array(); // Inicializa a variável $contatos como um array vazio
     
     // Verifica se a consulta retornou algum resultado
     if ($result && mysqli_num_rows($result) > 0) {
         // Loop para ler os resultados da consulta e armazená-los na variável $contatos
         while ($row = mysqli_fetch_assoc($result)) {
             $contatos[] = $row; // Adiciona cada linha à variável $contatos
         }
     }
     ?>

     <div class="container_table">
         <h2>Lista de Contatos</h2>
         <table border="1">
             <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Endereço</th>
            </tr>
     
             <?php
             // Itera sobre o array de contatos para exibir os dados na tabela
             foreach ($contatos as $contato) {
                 echo "<tr>
                 <td>".$contato["nome"]."</td>
                 <td>".$contato["telefone"]."</td>
                 <td>".$contato["email"]."</td>
                 <td>".$contato["endereco"]."</td>
                 </tr>";
             }
             ?>
         </table>
     </div>
    <div class="voltar"><a href="javascript:history.go(-1)">VOLTAR</a></div>
     
</body>
<script>
    var search =document.getElementById('search')

     search.addEventListener('keydown', function(event){
        if (event.key === 'Enter')
        {
            pesquisar()
        }
     })        

    function pesquisar()
    {
        window.location = 'Contatos.php?search=' +search.value
    }
</script>
</html>