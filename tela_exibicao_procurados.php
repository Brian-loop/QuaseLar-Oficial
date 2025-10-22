<?php include('./template/header.php'); ?>

<section class="group_cards_exibicao_procurados">
    <h1 class="titulo_exibicao_procurados">Doação</h1>

    <div class="card-procurados-exibicao">
        <figure class="card-header-exibicao">
            <img src="./img/sobre_nos.png" alt="Foto do animal Mel" class="pet-foto-procurados">
            <span class="status-estado">Americana/SP</span>
        </figure>

        <div class="card-body-procurados-exibicao">
            <h2 class="pet-nome-procurados">Mel</h2>
            <p class="pet-descricao-procurados">Vista na frente de casa</p>
            <button class="btn-procurados" onclick="abrirModalProcurados()">Mais Informações!</button>
        </div>
    </div>
</section>

<section class="modal-overlay-exibicao-procurados">
    <section class="modal-body-exibicao-procurados">
        <div class="btn-fechar-exibicao-procurados"><i class="bi bi-x"></i></div>

        <nav class="itens-exibicao-procurados">
            <div class="titulo-modal-exibicao-procurados"><h3>Doação</h3></div>

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
                <span>Rex</span>
            </div>
        </nav>

        <nav class="itens-exibicao-procurados">
            <div class="container-modal-index">
                <!-- info-pet 1 -->
                <div class="info-pet">
                    <div class="info-pet-header"><h3>Informações Do Animal</h3></div>
                    <div class="info-pet-body">
                        <div class="group_info_pets"><p>Nome Do Animal:<div>Rex</div></p></div>
                        <div class="group_info_pets">
                            <p>Espécie:<div>Cachorro</div></p>
                            <p>Sexo:<div>Macho</div></p>
                            <p>Idade:<div>2 anos</div></p>
                        </div>
                        <div class="group_info_pets">
                            <p>Porte:<div>Médio</div></p>
                            <p>Castrado:<div>Sim</div></p>
                            <p>Vacinado:<div>Sim</div></p>
                        </div>
                        <div class="group_info_pets"><p>Raça:<div>Golden Retriever</div></p></div>
                        <p>Motivo Da Doação:</p>
                        <div class="motivo">
                            A tecnologia transforma o modo como vivemos, trabalhamos e nos conectamos. Cada inovação amplia possibilidades, aproxima pessoas e cria novos desafios. Adaptar-se a essas mudanças é essencial para evoluir em um mundo cada vez mais digital e interligado.
                        </div>
                    </div>
                </div>

                <!-- info-pet 2 -->
                <div class="info-pet">
                    <div class="info-pet-header2"><h3>Conversar com Responsável</h3></div>
                    <div class="info-pet-body">
                        <p>Nome: Luana Vega</p>
                        <p>Telefone: (19) 8797-2154</p>
                        <p>Email: aline@123</p>
                    </div>
                </div>
            </div>
        </nav>
    </section>
</section>
