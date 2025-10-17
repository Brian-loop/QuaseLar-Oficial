
<?php
include('./template/header.php');
?>

<section class="fundo_procurados_exibicao">


      <div class="caixa-aviso_procurados">
        <div class="texto_titulo_procurados">
          <h1>PROCURA - SE </h1>
          <p>Você viu algum desses animais? Por favor entre em contato.</p>
        </div>
      </div>


    <!-- cards em cada um deles tem o backgroud imagem -->
    <main class="grid_procurados_exibicao">

      <?php for ($i = 0; $i < 6; $i++) { ?>
        <figure class="card_procurados_exibicao">
          <h4>Americana/SP</h4>
          <figcaption class="card_exibicao">
            <h1>Leo</h1>
            <button type="button" class="btn btn-primary"> Mais Informações</button>
          </figcaption>
          <img src="./img/sobre_nos.png" alt="">
        </figure>
      <?php } ?>

    </main>

  </section>

  