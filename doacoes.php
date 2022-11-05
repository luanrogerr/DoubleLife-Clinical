<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
       <link rel="shortcut icon" href="/imagens/Logo_Cubo_para_empresa_de_Arquitetura_Design_e_Engenharia_2.png" type="image/x-icon">
      <!--HTML 5-->
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">


      <!--Conteúdo-->
      <title>DoubleLife</title>
      <meta name="title" content="DoubleLife">
      <meta name="description" content="Somos uma clínica médica nova e com grande potencial. Conheça nossas opções de seguro DoubleLife. Planos de vida, saúde e empresariais.">
      <meta name="author" content="Luan Roger, Ana Eduarda, Isabel Marinho, Diego Tasso, Felipe Martins, Gabriel Tavares">


      <!--Icone-->
      <link rel="shortcut icon" href="/imagens/Logo_Cubo_para_empresa_de_Arquitetura_Design_e_Engenharia_2.png" type="image/x-icon">


      <!--Folhas de Estilo-->
      <link rel="stylesheet" href="/estilos/style.css">
      <link rel="stylesheet" href="/estilos/doacoes.css">


      <!--Links Externos-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap" rel="stylesheet">
   </head>


   <!--Header-->
   <?php
        include "menu.php";
   ?>

   <!--Corpo-->
   <body class="doacao-body">

      <!--Principal-->
      <main id="main-indexc">

         <section>

            <!--Sessão Conteúdo-->
            <div class="doacoes-section">
               <!--Primeira Sessão-->
               <div id = "doacoes-container">
                  <p>Ajude-nos a investir em hospitais e outras clínicas parceiras na luta contra o câncer infantil, você só precisa doar uma quantia, independente de qual seja, isso já seria de grande ajuda para nós! Você pode doar por aqui mesmo no site, só clicar no botão abaixo! Seu dinheiro pode nos ajudar a salvar vidas!
                      <br> <br>
                      <div class ="doar">  
                      <a href="https://donate.stripe.com/test_6oE3eeedydAl5FKaEE" class="btn-menu"> Doe </a>
                      </div>
                  </p>
               </div>
            </div>
         </section>
         </main>
   </body>
   <br>
   <br>
   <?php
        include "footer.php";
   ?>
</html>