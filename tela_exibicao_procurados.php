<?php
include('./template/header.php');




?>

<section class="fundo_cards_exibicao_procurados">
    <div class="caixa_exibicao_procurase">
        <div class="titulo_exibicao_procurados">
            <h1>PROCURA - SE</h1>
            <p>Você viu algum desses animais? Por favor entre em contato.</p>
        </div>
    </div>
    <?php
    include './class/BancoDeDados_conexao.php';
    include './class/Procurados.php';
    $procurados = new Procurados();
    
    $animaisProcurados = $procurados->consultarAnimais();
    $imgAnimais = $procurados->consultarImgAnimais();

    // echo "<pre>";
    // print_r($imgAnimais);
    // echo "</pre>";
    ?>
    <main class="grid_exibicao_procurados">

        <?php foreach ($imgAnimais as $procuradosimg) { ?>
            <div class="card-procurados-exibicao">
                <figure class="card-header-exibicao">
                    <img src="<?= $procuradosimg['localizacao'] ?>" alt="Foto do animal Mel" class="pet-foto-procurados">
                    <span class="status-estado">Americana/SP</span>
                </figure>
                <div class="card-body-procurados-exibicao">
                    <h2 class="pet-nome-procurados"></h2>
                    <button class="btn-procurados" onclick="abrirModalProcurados()">Mais Informações!</button>
                    <p class="pet-descricao-procurados"><strong>Ultima atualização: </strong> <?= $procuradosimg['data_cadastro'] ?></p>
                </div>
            </div>
            <?php } ?>


    </main>
</section>

<section class="modal-overlay-exibicao-procurados">
    <section class="modal-body-exibicao-procurados">
        <div class="btn-fechar-exibicao-procurados"><i class="bi bi-x"></i></div>

        <nav class="itens-exibicao-procurados">
            <div class="titulo-modal-exibicao-procurados">
                <h3>Procurado</h3>
            </div>

            <div class="carousel-container-index">
                <input type="radio" name="slider" id="slide-1" checked>
                <input type="radio" name="slider" id="slide-2">
                <input type="radio" name="slider" id="slide-3">
                <input type="radio" name="slider" id="slide-4">
                <input type="radio" name="slider" id="slide-5">
                <?php foreach ($imgAnimais as $procuradosimg) { ?>
                    <div class="carousel-imagens-index">
                        <div class="carousel-slide-index"><img src="<?= $procuradosimg['localizacao'] ?>" alt="Slide 1"></div>
                        <div class="carousel-slide-index"><img src="<?= $procuradosimg['localizacao'] ?>" alt="Slide 2"></div>
                        <div class="carousel-slide-index"><img src="<?= $procuradosimg['localizacao'] ?>" alt="Slide 3"></div>
                        <div class="carousel-slide-index"><img src="<?= $procuradosimg['localizacao'] ?>" alt="Slide 4"></div>
                        <div class="carousel-slide-index"><img src="<?= $procuradosimg['localizacao'] ?>" alt="Slide 5"></div>
                    </div>
                <?php } ?>
                <div class="carousel-group-setas">
                    <label for="slide-5" class="seta-anterior slide-anterior-1">&#10094;</label>
                    <label for="slide-1" class="seta-anterior slide-anterior-2">&#10094;</label>
                    <label for="slide-2" class="seta-anterior slide-anterior-3">&#10094;</label>
                    <label for="slide-3" class="seta-anterior slide-anterior-4">&#10094;</label>
                    <label for="slide-4" class="seta-anterior slide-anterior-5">&#10094;</label>

                    <label for="slide-2" class="seta-proxima proximo-slide-1">&#10095;</label>
                    <label for="slide-3" class="seta-proxima proximo-slide-2">&#10095;</label>
                    <label for="slide-4" class="seta-proxima proximo-slide-3">&#10095;</label>
                    <label for="slide-5" class="seta-proxima proximo-slide-4">&#10095;</label>
                    <label for="slide-1" class="seta-proxima proximo-slide-5">&#10095;</label>
                </div>

                <div class="carousel-indicadores-index">
                    <label for="slide-1" class="ponto ponto-1"></label>
                    <label for="slide-2" class="ponto ponto-2"></label>
                    <label for="slide-3" class="ponto ponto-3"></label>
                    <label for="slide-4" class="ponto ponto-4"></label>
                    <label for="slide-5" class="ponto ponto-5"></label>
                </div>
            </div>

          
            <div class="titulo2-modal-exibicao-procurados">
        <?php foreach ($animaisProcurados as $procuradosInfo) { ?>

                <h4><?= $procuradosInfo['nome_p'] ?></h4>
                <p><strong>Ultima atualização: </strong> <?= $procuradosinfo['data_cadastro'] ?></p>
            </div>
        </nav>
            <?php } ?>

        <nav class="itens-exibicao-procurados">
            <div class="container-modal-index">
                <!-- info-pet 1 -->
                <div class="info-pet">
                    <div class="info-pet-header">
                        <h3>Informações Do Animal</h3>
                    </div>
                    <div class="info-pet-body">
                        <?php foreach ($animaisProcurados as $procuradosInfo) { ?>
                            <div class="group_info_pets">
                                <p><strong>Nome Do Animal:</strong>
                                <div> <?= $procuradosInfo['nome_p'] ?></div>
                                </p>
                            </div>
                            <div class="group_info_pets">
                                <p><strong>Espécie: </strong>
                                <div><?= $procuradosInfo['especie_p'] ?></div>
                                </p>
                                <p><strong>Sexo: </strong>
                                <div><?= $procuradosInfo['sexo_p'] ?></div>
                                </p>
                                <p><strong>Idade: </strong>
                                <div><?= $procuradosInfo['idade_p'] ?></div>
                                </p>
                            </div>
                            <div class="group_info_pets">
                                <p><strong>Porte:</strong>
                                <div><?= $procuradosInfo['porte_p'] ?></div>
                                </p>
                            </div>
                            <div class="group_info_pets">
                                <p><strong>Raça:</strong>
                                <div><?= $procuradosInfo['raca_p'] ?></div>
                                </p>
                            </div>
                            <p><strong>Ultima Informação do animal:</strong></p>
                            <div class="motivo"><?= $procuradosInfo['ultima_vez_visto'] ?> </div>
                    </div>
                </div>
            <?php } ?>

            <!-- info-pet 2 -->
            <div class="info-pet">
                <div class="info-pet-header2">
                    <h3>Conversar com Responsável</h3>
                </div>
                <div class="info-pet-body">
                    <p><strong>Nome: </strong> Luana Vega</p>
                    <p><strong>Telefone: </strong> (19) 8797-2154</p>
                    <p><strong>Email: </strong> aline@123</p>
                </div>
            </div>
            </div>
        </nav>
    </section>
</section>