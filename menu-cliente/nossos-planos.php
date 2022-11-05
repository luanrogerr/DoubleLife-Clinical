<?php
// Conexão com o BD  
require_once 'conexao.php'; 
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<title>Selecione o seu plano</title>
<meta charset="utf-8">
<!-- Stripe JavaScript library -->
<script src="https://js.stripe.com/v3/"></script>
<link rel="stylesheet" href="../estilos/nossos-planos.css">
<link rel="stylesheet" href="../estilos/header-footer.css">

</head>

<?php
    include('../menu.php');
?>

<section class="nossos-planos">

    <div class= "section wf-section">
        <h1 class= "titulo-principal">Escolha o seu Plano</h1>
    </div>


    <?php 
        $results = mysqli_query($conn,"SELECT * FROM plano WHERE ID_plano=1");
        $row = mysqli_fetch_array($results,MYSQLI_ASSOC);
    ?>

    <div class= "section-2 w-container">

        <div class= "planos">

            <h1 class="titulo-card"><?php echo $row['Nome_plano'] ?></h1>
            <h2 class="titulo-card"><?php echo "R$".$row['Preco'] ?></h2>
            <ul class="ul-card">
                <li>✓ Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                <li>✓ Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                <li>✓ Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                <li>✓ Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                <li>✓ Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
            </ul>

            <a href="#" class="button w-button" id="btn-1">Assinar</a>

        </div>

		

		<?php 
            $results2 = mysqli_query($conn,"SELECT * FROM plano WHERE ID_plano=2");
            $row2 = mysqli_fetch_array($results2,MYSQLI_ASSOC);
        ?>

        <div class="planos">

            <h1 class="titulo-card"><?php echo $row2['Nome_plano'] ?></h1>
            <h2 class="titulo-card"><?php echo "R$".$row['Preco'] ?></h2>
            <ul class="ul-card">
                <li>✓ Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                <li>✓ Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                <li>✓ Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                <li>✓ Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                <li>✓ Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
            </ul>

            <a href="#" class="button w-button" id="btn-2">Assinar</a>

        </div>

		

		<?php 
            $results3 = mysqli_query($conn,"SELECT * FROM plano WHERE ID_plano=3");
            $row3 = mysqli_fetch_array($results3,MYSQLI_ASSOC);
        ?>

        <div class="planos">

            <h1 class="titulo-card"><?php echo $row3['Nome_plano'] ?></h1>
            <h2 class="titulo-card"><?php echo "R$".$row['Preco'] ?></h2>
            <ul class="ul-card">
                <li>✓ Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                <li>✓ Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                <li>✓ Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                <li>✓ Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                <li>✓ Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
            </ul>

            <a href="#" class="button w-button" id="btn-3">Assinar</a>

        </div>
    </div>
</section>


<script>

var buyBtn = document.getElementById('btn-1');
var buyBtn2 = document.getElementById('btn-2');
var buyBtn3 = document.getElementById('btn-3');

var responseContainer = document.getElementById('paymentResponse'); 

// Aciona o stripe_charge e passa dados

var createCheckoutSession = function (stripe) {

    return fetch("stripe_charge.php", {

        method: "POST",

        headers: {
            "Content-Type": "aplication/json",
        },

        body: JSON.stringify({
            checkoutSession: 1,
            ID:"<?php echo $row['ID_plano']; ?>",
            Price:"<?php echo $row['Preco']; ?>",
        }),

    }).then(function (result) {
        return result.json();
    });

};

var createCheckoutSession2 = function (stripe) {

    return fetch("stripe_charge.php", {

        method: "POST",

        headers: {
            "Content-Type": "aplication/json",
        },

        body: JSON.stringify({
            checkoutSession: 2,
            ID:"<?php echo $row2['ID_plano']; ?>",
            Price:"<?php echo $row2['Preco']; ?>",
        }),

    }).then(function (result2) {
        return result2.json();
    });

};

var createCheckoutSession3 = function (stripe) {

    return fetch("stripe_charge.php", {

        method: "POST",

        headers: {
            "Content-Type": "aplication/json",
        },

        body: JSON.stringify({
            checkoutSession: 3,
            ID:"<?php echo $row3['ID_plano']; ?>",
            Price:"<?php echo $row3['Preco']; ?>",

        }),

    }).then(function (result3) {
        return result3.json();
    });

};



// Exibe erros retornados pelo Checkout

var handleResult = function (result) {
    if (result.error) {
        responseContainer.innerHTML = '<p>'+result.error.message+'</p>';
    }

    buyBtn.disabled = false;
    buyBtn.textContent = 'Assinar agora';
};



var handleResult2 = function (result2) {
    if (result2.error) {
        responseContainer.innerHTML = '<p>'+result2.error.message+'</p>';
    }

    buyBtn2.disabled = false;
    buyBtn2.textContent = 'Assinar agora';
};



var handleResult3 = function (result3) {
    if (result3.error) {
        responseContainer.innerHTML = '<p>'+result3.error.message+'</p>';
    }

    buyBtn3.disabled = false;
    buyBtn3.textContent = 'Assinar agora';
};



// Chave pública usada pelo Stripe.js

var stripe = Stripe('<?php echo 'pk_test_51LZYF2IbSjMaEE1pRUeVj5fAsL6DlHQYlNllXCpJSjjuVVNWqGgSgsI7491qDwri6ikhoJ6okwcSBEyH32eIzibT00TTZamVLG'; ?>');

buyBtn.addEventListener("click", function (evt) {

    buyBtn.disabled = true;
    buyBtn.textContent = 'Processando...';

    createCheckoutSession().then(function (data) {
        if(data.sessionId){
            stripe.redirectToCheckout({
                sessionId: data.sessionId,
            }).then(handleResult);

        }else{
            handleResult(data);
        }
    });
});



buyBtn2.addEventListener("click", function (evt) {

    buyBtn2.disabled = true;
    buyBtn2.textContent = 'Processando...';

    createCheckoutSession2().then(function (data) {
        if(data.sessionId){
            stripe.redirectToCheckout({
                sessionId: data.sessionId,
            }).then(handleResult2);

        }else{
            handleResult2(data);
        }
    });
});



buyBtn3.addEventListener("click", function (evt) {

    buyBtn3.disabled = true;
    buyBtn3.textContent = 'Processando...';

    createCheckoutSession3().then(function (data) {
        if(data.sessionId){
            stripe.redirectToCheckout({
                sessionId: data.sessionId,
            }).then(handleResult3);

        }else{
            handleResult3(data);
        }
    });
});

</script>

<?php
    include('../footer.php');
?>

</body>
</html>