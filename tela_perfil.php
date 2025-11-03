<?php
include './template/header.php';
include './class/Procurados.php';
include './class/Usuario.php';
include './class/Adocao.php';

$usuario = new Usuario();
$procurados = new Procurados();
$adocao = new Adocao();

$usuarioInfo = $usuario->ConsultaUsuario();
$imgAnimais = $procurados->consultarImgAnimais();


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
      <a href="./tela_cad_pets.php" type="button" class="btn"><strong>ADOÇÃO</strong></a>
      <a href="./tela_cad_procurados.php"  type="button" class="btn"><strong>PROCURADOS</strong></a>
    </div>


<main class="grid_anuncio">
    <?php
        $dadosProcurados = $procurados->consultarAnimais();
        if (empty($dadosProcurados)) {
            echo ' Nenhum animal Cadastrado... ';
        } else { 
            // echo'<pre>';
            // var_dump($dadosProcurados);
            // echo'</pre>';
            foreach($dadosProcurados as $valores){

                ?>
    <figure class="card_animal_perfil">
      <h3 class="titulo-anuncio">Procurado</h3>
      <img src="./uploads/<?php echo $valores['foto_capa']; ?>"alt="" >
      <div class="cardzin_animal_perfil">
        <h1 class="nome-animal"><?php echo $valores['nome_p']; ?></h1>
      </div>
    
        <div class="botoes_perfil2">
          <a  href="tela_perfil_procurados_editar.php?id=<?php echo $valores['id_procurados']; ?>" type="button" class="btn btn-primary">Editar</a>
          <a href="cad_perfil_deletar.php?id_deletar=<?php echo $valores['id_procurados']; ?>" type="button" class="btn btn-danger">Deletar</a>
        </div>
    </figure>
<?php 
            }
} 
?>

  <?php
        $dadosAdocao = $adocao->consultarAnimaisDoacao();
        if (empty($dadosAdocao)) {
            echo '<h1> Nenhum animal Cadastrado... </h1>';
        } else { 
            // echo'<pre>';
            // var_dump($dadosProcurados);
            // echo'</pre>';
            foreach($$dadosAdocao as $values){

                ?>
      <figure class="card_animal_perfil">
      <h3 class="titulo-anuncio">Adoção</h3>
      <img src="./uploads/<?php echo $valores['foto_capa_adocao']; ?>"" >
      <div class="cardzin_animal_perfil">
        <h1 class="nome-animal"><?php echo $valores['nome_pet']; ?></h1>
      </div>
    
        <div class="botoes_perfil2">
          <a type="button" class="btn btn-primary">Editar</a>
          <a type="button" class="btn btn-danger">Deletar</a>
        </div>
    </figure>
 <?php 
            }
} 
?>
</main>


         
</section>