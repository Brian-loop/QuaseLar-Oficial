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

    <main class="grid_exibicao_procurados">
    <div class="card-procurados-exibicao">
        <figure class="card-header-exibicao">
            <img src="./img/sobre_nos.png" alt="Foto do animal Mel" class="pet-foto-procurados">
            <span class="status-estado">Americana/SP</span>
        </figure>

        <div class="card-body-procurados-exibicao">
            <h2 class="pet-nome-procurados">Mel</h2>
            <button class="btn-procurados" onclick="abrirModalProcurados()">Mais Informações!</button>
            <p class="pet-descricao-procurados">ultima atualização</p>
        </div>
    </div>

    <div class="card-procurados-exibicao">
        <figure class="card-header-exibicao">
            <img src="./img/sobre_nos.png" alt="Foto do animal Mel" class="pet-foto-procurados">
            <span class="status-estado">Americana/SP</span>
        </figure>

        <div class="card-body-procurados-exibicao">
            <h2 class="pet-nome-procurados">Mel</h2>
            <button class="btn-procurados" onclick="abrirModalProcurados()">Mais Informações!</button>
            <p class="pet-descricao-procurados">ultima atualização</p>
        </div>
    </div>

    <div class="card-procurados-exibicao">
        <figure class="card-header-exibicao">
            <img src="./img/sobre_nos.png" alt="Foto do animal Mel" class="pet-foto-procurados">
            <span class="status-estado">Americana/SP</span>
        </figure>

        <div class="card-body-procurados-exibicao">
            <h2 class="pet-nome-procurados">Mel</h2>
            <button class="btn-procurados" onclick="abrirModalProcurados()">Mais Informações!</button>
            <p class="pet-descricao-procurados">ultima atualização</p>
        </div>
    </div>

    <div class="card-procurados-exibicao">
        <figure class="card-header-exibicao">
            <img src="./img/sobre_nos.png" alt="Foto do animal Mel" class="pet-foto-procurados">
            <span class="status-estado">Americana/SP</span>
        </figure>

        <div class="card-body-procurados-exibicao">
            <h2 class="pet-nome-procurados">Mel</h2>
            <button class="btn-procurados" onclick="abrirModalProcurados()">Mais Informações!</button>
            <p class="pet-descricao-procurados">ultima atualização</p>
        </div>
    </div>
    </main>
</section>

<section class="modal-overlay-exibicao-procurados">
    <section class="modal-body-exibicao-procurados">
        <div class="btn-fechar-exibicao-procurados"><i class="bi bi-x"></i></div>

        <nav class="itens-exibicao-procurados">
            <div class="titulo-modal-exibicao-procurados"><h3>Procurado</h3></div>

            <div class="carousel-container-index">
                <input type="radio" name="slider" id="slide-1" checked>
                <input type="radio" name="slider" id="slide-2">
                <input type="radio" name="slider" id="slide-3">
                <input type="radio" name="slider" id="slide-4">
                <input type="radio" name="slider" id="slide-5">

                <div class="carousel-imagens-index">
                    <div class="carousel-slide-index"><img src="" alt="Slide 1"></div>
                    <div class="carousel-slide-index"><img src="" alt="Slide 2"></div>
                    <div class="carousel-slide-index"><img src="" alt="Slide 3"></div>
                    <div class="carousel-slide-index"><img src="" alt="Slide 4"></div>
                    <div class="carousel-slide-index"><img src="" alt="Slide 5"></div>
                </div>

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
                <h4>nome</h4>
                <p>ultima atualização</p>
            </div>
        </nav>

        <nav class="itens-exibicao-procurados">
            <div class="container-modal-index">
                <!-- info-pet 1 -->
                <div class="info-pet">
                    <div class="info-pet-header"><h3>Informações Do Animal</h3></div>
                    <div class="info-pet-body">
                        <?php  foreach ($resultado as $linha ){?>
                        <div class="group_info_pets"><p><strong>Nome Do Animal:</strong><div>Rex</div></p></div>
                        <div class="group_info_pets">
                            <p><strong>Espécie: </strong><div>Cachorro</div></p>
                            <p><strong>Sexo: </strong><div>Macho</div></p>
                            <p><strong>Idade: </strong><div>2 anos</div></p>
                        </div>
                        <div class="group_info_pets">
                            <p><strong>Porte:</strong><div>Médio</div></p>
                        </div>
                        <div class="group_info_pets"><p><strong>Raça:</strong><div>Golden Retriever</div></p></div>
                        <p><strong>Ultima Informação do animal:</strong></p>
                        <div class="motivo">
                            A tecnologia transforma o modo como vivemos, trabalhamos e nos conectamos. Cada inovação amplia possibilidades, aproxima pessoas e cria novos desafios. Adaptar-se a essas mudanças é essencial para evoluir em um mundo cada vez mais digital e interligado.
                        </div>
                    </div>
                </div>
                    <?php } ?>

                <!-- info-pet 2 -->
                <div class="info-pet">
                    <div class="info-pet-header2"><h3>Conversar com Responsável</h3></div>
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
