<?php
include './template/header.php';
//tela de cadastro de pet desaparecidos
?>

<section class="fundo-perfil">
      <div class="caixa-aviso-perfil">
        <div class="texto_titulo_perfil">
          <h1>Meus Post</h1>
          <p>O que vai querer anunciar hoje?</p>
        </div>
      </div>
    <a href="./tela_cad_procurados.php"  type="button" class="btn btn-primary">PROCURA-SE</a>
    <a href="./tela_cad_pets.php" type="button" class="btn btn-primary">ADOCÃO</a>

<main class="grid_anuncio">
  <figure class="card_animal_perfil">
    <h3 class="titulo-anuncio">Adocão</h3>
    <img src="./img/sobre_nos.png" alt="">
    <figcaption class="cardzin_animal_perfil">
      <h1 class="nome-animal">Leo</h1>
      <a type="button" class="btn btn-warning">Editar</a>
      <a type="button" class="btn btn-danger">Deletar</a>
    </figcaption>
  </figure>
</main>


</section>