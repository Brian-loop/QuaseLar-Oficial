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
            echo '<h1> Nenhum animal Cadastrado... </h1>';
        } else {
            // echo'<pre>';
            // var_dump($dadosProcurados);
            // echo'</pre>';
            foreach ($dadosProcurados as $valores) {

        ?>

                <div class="card-procurados-exibicao">
                    <figure class="card-header-exibicao">
                        <img src="./uploads/<?php echo $valores['foto_capa']; ?>">
                        <span class="status-estado">Americana/SP</span>
                    </figure>
                    <div class="card-body-procurados-exibicao">
                        <h2 class="pet-nome-procurados"><?php echo $valores['nome_p']; ?></h2>
                        <button class="btn-procurados" onclick="abrirModalProcurados(<?php echo $valores['id_procurados']; ?>)">Mais Informações!</button>
                        <p class="pet-descricao-procurados"><strong>Ultima atualização: </strong><?php echo $valores['data_criacao_cad_p']; ?></p>
                    </div>
                </div>





        <?php
            }
        }
        ?>
    </main>
</section>

<section class="modal-overlay-exibicao-procurados">
    <section class="modal-body-exibicao-procurados">
        <div class="btn-fechar-exibicao-procurados"><i class="bi bi-x"></i></div>

        <nav class="itens-exibicao-procurados">
            <div class="titulo-modal-exibicao-procurados">
                <h3>Procurado</h3>
            </div>

            <div class="carousel-container">
                <input type="radio" name="slider" id="slide-1" checked class="slide_input_radio">
                <input type="radio" name="slider" id="slide-2" class="slide_input_radio">
                <input type="radio" name="slider" id="slide-3" class="slide_input_radio">
                <input type="radio" name="slider" id="slide-4" class="slide_input_radio">
                <input type="radio" name="slider" id="slide-5" class="slide_input_radio">

                <div class="carousel-track">
                    <?php

                    $caminho_base = './uploads/';

                    $num_slides = 5;

                    for ($i = 0; $i < $num_slides; $i++) {

                        $imagem_existe = isset($dadosImgById[$i]['nome_arquivo']);

                        $url_imagem = $imagem_existe
                            ? $caminho_base . htmlspecialchars($dadosImgById[$i]['nome_arquivo'])
                            : './img/sem_foto.png';


                        $slide_numero = $i + 1;
                    ?>
                        <div class="carousel-slide slide-<?php echo $slide_numero; ?>">
                            <img src="<?php echo $url_imagem; ?>" alt="Slide <?php echo $slide_numero; ?>">
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <div class="carousel-nav-arrows">
                </div>
                <div class="carousel-indicators">
                </div>
                <div class="carousel-nav-arrows">
                    <label for="slide-5" class="prev-arrow prev-slide-1"><span>&#10094;</span></label>
                    <label for="slide-1" class="prev-arrow prev-slide-2"><span>&#10094;</span></label>
                    <label for="slide-2" class="prev-arrow prev-slide-3"><span>&#10094;</span></label>
                    <label for="slide-3" class="prev-arrow prev-slide-4"><span>&#10094;</span></label>
                    <label for="slide-4" class="prev-arrow prev-slide-5"><span>&#10094;</span></label>

                    <label for="slide-2" class="next-arrow next-slide-1"><span>&#10095;</span></label>
                    <label for="slide-3" class="next-arrow next-slide-2"><span>&#10095;</span></label>
                    <label for="slide-4" class="next-arrow next-slide-3"><span>&#10095;</span></label>
                    <label for="slide-5" class="next-arrow next-slide-4"><span>&#10095;</span></label>
                    <label for="slide-1" class="next-arrow next-slide-5"><span>&#10095;</span></label>
                </div>

                <div class="carousel-indicators">
                    <label for="slide-1" class="ponto ponto-1"></label>
                    <label for="slide-2" class="ponto ponto-2"></label>
                    <label for="slide-3" class="ponto ponto-3"></label>
                    <label for="slide-4" class="ponto ponto-4"></label>
                    <label for="slide-5" class="ponto ponto-5"></label>
                </div>
            </div>



            <div class="titulo2-modal-exibicao-procurados">

                <h4><?php echo $valores['nome_p']; ?></h4>
                <p><strong>Ultima atualização:</strong><br><?php echo $valores['data_criacao_cad_p']; ?></p>
            </div>

        </nav>

        <nav class="itens-exibicao-procurados">
            <div class="container-modal-index">
                <!-- info-pet 1 -->
                <div class="info-pet">
                    <div class="info-pet-header">
                        <h3>Informações Do Animal</h3>
                    </div>
                    <div class="info-pet-body">


                        <div class="group_info_pets">
                            <p><strong>Nome Do Animal:</strong>
                            <div> <?php echo $valores['nome_p']; ?></div>
                            </p>
                        </div>
                        <div class="group_info_pets">
                            <p><strong>Espécie: </strong>
                            <div><?php echo $valores['especie_p']; ?><div>
                                    </p>
                                    <p><strong>Sexo: </strong>
                                    <div><?php echo $valores['sexo_p']; ?></div>
                                    </p>
                                    <p><strong>Idade: </strong>
                                    <div><?php echo $valores['idade_p']; ?></div>
                                    </p>
                                </div>
                                <div class="group_info_pets">
                                    <p><strong>Porte:</strong>
                                    <div><?php echo $valores['porte_p']; ?></div>
                                    </p>
                                </div>
                                <div class="group_info_pets">
                                    <p><strong>Raça:</strong>
                                    <div><?php echo $valores['raca_p']; ?></div>
                                    </p>
                                </div>
                                <p><strong>Ultima Informação do animal:</strong></p>
                                <div class="motivo"><?php echo $valores['ultima_vez_visto']; ?></div>
                            </div>
                        </div>



                        <!-- info-pet 2 -->
                        <div class="info-pet">
                            
                            <div class="info-pet-header2">
                                <h3>Conversar com Responsável</h3>
                            </div>
                            <div class="info-pet-body">
                                <p><strong>Nome: </strong> <?= $valores['nome'] ?></p>
                                <p><strong>Telefone: </strong> <?= $valores['telefone'] ?></p>
                                <p><strong>Email: </strong> <?= $valores['email'] ?></p>
                            </div>
                        </div>
                    </div>

        </nav>
    </section>
</section>