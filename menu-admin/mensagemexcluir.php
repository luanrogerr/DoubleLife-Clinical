 <?php
session_start(); 
 
//Faz a leitura do dado passado pelo link.
$campoid = filter_input(INPUT_GET, 'id');
 
//Faz a conexão com o BD.
require 'conexaoadmin.php';

// Apagar da tabela usuários o registro com o id
$sql = "DELETE FROM contato WHERE id=$campoid";

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Mensagem apagado";
  
  include 'log.php';
  
   header('Location: controlarmsg.php?pag=1'); //Redireciona para o controle  
} else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
$conn->close();

?> 