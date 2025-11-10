<?php
include('./template/header.php');
require './class/Usuario.php';
require './class/Procurados.php';




$usuario = new Usuario();
$procurados = new Procurados();







?>

<section class="fundo_cards_exibicao_procurados">
    <div class="caixa_exibicao_procurase">
        <div class="titulo_exibicao_procurados">
            <h1>PROCURA - SE</h1>
            <p>Você viu algum desses animais? Por favor entre em contato.</p>
        </div>
    </div>


    <!-- // echo "<pre>";
        // print_r($imgAnimais);
        // echo "</pre>"; -->
<main class="grid_exibicao_procurados">
<?php
$dadosProcurados = $procurados->consultarAnimais();

if (empty($dadosProcurados)) {
    echo '<h1>Nenhum animal cadastrado...</h1>';
} else {
    foreach ($dadosProcurados as $valores) {
        $imagens = $procurados->consultarImgAnimaisById($valores['id_procurados']);
?>
    <!-- CARD -->
    <div class="card-procurados-exibicao">
        <figure class="card-header-exibicao">
            <img src="./uploads/<?php echo $valores['foto_capa']; ?>" alt="">
        </figure>
        <div class="card-body-procurados-exibicao">
            <h2 class="pet-nome-procurados"><?php echo $valores['nome_p']; ?></h2>
            <button class="btn-procurados" data-bs-toggle="modal" data-bs-target="#modal<?php echo $valores['id_procurados']; ?>">
                Mais Informações!
            </button>
            <p class="pet-descricao-procurados"><strong>Última atualização:</strong> <?php echo $valores['data_criacao_cad_p']; ?></p>
        </div>
    </div>

    <!-- MODAL (UM PARA CADA ANIMAL) -->
    <div class="modal fade" id="modal<?php echo $valores['id_procurados']; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" style="max-width: 500px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo htmlspecialchars($valores['nome_p']); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <!-- IMAGENS -->
                    <div id="carousel<?php echo $valores['id_procurados']; ?>" class="carousel slide mb-3" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            if (!empty($imagens)) {
                                $ativo = 'active';
                                foreach ($imagens as $img) {
                                    echo '
                                    <div class="carousel-item ' . $ativo . '">
                                        <img src="./uploads/' . htmlspecialchars($img['nome_arquivo']) . '" class="d-block w-100" alt="">
                                    </div>';
                                    $ativo = ''; // só o primeiro é ativo
                                }
                            } else {
                                echo '<div class="carousel-item active"><img src="./img/sem_foto.png" class="d-block w-100" alt="Sem foto"></div>';
                            }
                            ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?php echo $valores['id_procurados']; ?>" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel<?php echo $valores['id_procurados']; ?>" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>

                    <!-- INFORMAÇÕES DO ANIMAL -->
                    <h6>Informações do Animal</h6>
                    <p><strong>Espécie:</strong> <?php echo htmlspecialchars($valores['especie_p']); ?></p>
                    <p><strong>Raça:</strong> <?php echo htmlspecialchars($valores['raca_p']); ?></p>
                    <p><strong>Sexo:</strong> <?php echo htmlspecialchars($valores['sexo_p']); ?></p>
                    <p><strong>Idade:</strong> <?php echo htmlspecialchars($valores['idade_p']); ?> <?php echo htmlspecialchars($valores['semanas_meses_anos_p']); ?></p>
                    <p><strong>Porte:</strong> <?php echo htmlspecialchars($valores['porte_p']); ?></p>
                    <p><strong>Última vez visto:</strong> <?php echo nl2br(htmlspecialchars($valores['ultima_vez_visto'])); ?></p>

                    <!-- USUÁRIO -->
                    <hr>
                    <h6>Responsável</h6>
                    <p><strong>Nome:</strong> <?php echo htmlspecialchars($valores['nome']); ?></p>
                    <p><strong>Telefone:</strong> <?php echo htmlspecialchars($valores['telefone']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($valores['email']); ?></p>
                </div>
            </div>
        </div>
    </div>
<?php
    } // fim foreach
}
?>
</main>
