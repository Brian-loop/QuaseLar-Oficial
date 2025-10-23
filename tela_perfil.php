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
    <div class="botoes_perfil">
      <a href="./tela_cad_pets.php" type="button" class="btn">ADOÇÃO</a>
      <a href="./tela_cad_procurados.php"  type="button" class="btn">PROCURADOS</a>
    </div>


<main class="grid_anuncio">
    <figure class="card_animal_perfil">
      <h3 class="titulo-anuncio">Adoção</h3>
      <img src="./img/fundo-animado.gif"alt="" >
      <div class="cardzin_animal_perfil">
        <h1 class="nome-animal">Leo</h1>
      </figure>
      <div class="botoes_perfil2">
        <a type="button" class="btn btn-primary">Editar</a>
        <a type="button" class="btn btn-danger">Deletar</a>
      </div>
    </div>

</main>


         
</section>