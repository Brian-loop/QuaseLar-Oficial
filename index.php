<?php
include './template/header.php';
?>

<section class="apresentacao" style="background-color: rgba(14, 106, 190, 1);">
    <div class="group_text_apresentacao">
        <section class="mobile-img"></section>
        <div class="txt_apresentacao1">
            <h3>Todo animalzinha precisa ser amado!</h3>
            <p>Adotar um pet é um gesto de amor que muda duas vidas: a do animal e a de quem o acolhe. Ao adotar, damos uma segunda chance a um bichinho que muitas vezes já enfrentou o abandono e a solidão. Ver um animal resgatado ganhar confiança, brincar e demonstrar carinho aos poucos é uma das experiências mais gratificantes que existem. É como se ele soubesse que, finalmente, encontrou um lar seguro e um coração disposto a cuidar dele com amor.</p>
        </div>
        <div class="txt_apresentacao2">
            <p>Além disso, adotar é um ato de consciência e empatia. Enquanto muitos animais esperam por um lar em abrigos ou nas ruas, a compra estimula um ciclo de reprodução e comércio que nem sempre garante o bem-estar dos bichinhos. Ao escolher a adoção, ajudamos a reduzir o abandono e fortalecemos uma cultura de cuidado e respeito pelos animais. E o melhor de tudo é que o amor que recebemos em troca é puro e verdadeiro — um laço de amizade e gratidão que transforma a rotina e preenche a vida com alegria.</p>
        </div>
    </div>
</section>
<section class="title-html">
    <h1>Doação</h1>
    <p>Mude um destino: adote um pet hoje!</p>
</section>
<section class="group_cards">
    <div class="card-adocao">
        <div class="card-header">
            <img src="./img/sobre_nos.png" alt="Foto do animal Mel" class="pet-foto">
            <span class="status-chip">Americana/SP</span>
        </div>
        <div class="card-body">
            <h2 class="pet-nome">Mel</h2>
            <p class="pet-descricao">
                Mel é uma fêmea dócil e brincalhona de 2 anos. Adora correr no parque e se dá bem com crianças.
                Procura um lar cheio de amor!
            </p>

            <div class="pet-caracteristicas">
                <!-- <div class="caracteristica-item">
                    <strong>Porte:</strong> Médio
                </div> -->
                <div class="caracteristica-item">
                    <strong>Idade:</strong> 2 anos
                </div>
                <div class="caracteristica-item">
                    <strong>Gênero:</strong> Fêmea
                </div>
                <!-- <div class="caracteristica-item">
                    <strong>Vacinação:</strong> Em dia
                </div> -->

            </div>
            <button class="btn-adotar" onclick="abrirModal()">Saiba mais!</button>
        </div>
    </div>
</section>
<!-- modal -->
<section class="modal-overlay-index">
    <section class="modal-body-index">
        <div class="btn-fechar-index"><i class="bi bi-x"></i></div>
        <nav class="itens-modal-index1">
            <div class="titulo-modalIndex">
                <h3>Doação</h3>
            </div>

            <div class="carousel-container-index">
                <input type="radio" name="slider" id="slide-1" checked class="slide_input_radio">
                <input type="radio" name="slider" id="slide-2" class="slide_input_radio">
                <input type="radio" name="slider" id="slide-3" class="slide_input_radio">
                <input type="radio" name="slider" id="slide-4" class="slide_input_radio">
                <input type="radio" name="slider" id="slide-5" class="slide_input_radio">
                <div class="carousel-imagens-index">
                    <div class="carousel-slide-index slide-1">
                        <img src="" alt="Slide 1">
                    </div>
                    <div class="carousel-slide-index slide-2">
                        <img src="" alt="Slide 2">
                    </div>
                    <div class="carousel-slide-index slide-3">
                        <img src="" alt="Slide 3">
                    </div>
                    <div class="carousel-slide-index slide-4">
                        <img src="" alt="Slide 4">
                    </div>
                    <div class="carousel-slide-index slide-5">
                        <img src="" alt="Slide 5">
                    </div>
                </div>
                <div class="carousel-group-setas">
                    <label for="slide-5" class="seta-anterior slide-anterior-1">
                        <div>&#10094;</div>
                    </label>
                    <label for="slide-1" class="seta-anterior slide-anterior-2">
                        <div>&#10094;</div>
                    </label>
                    <label for="slide-2" class="seta-anterior slide-anterior-3">
                        <div>&#10094;</div>
                    </label>
                    <label for="slide-3" class="seta-anterior slide-anterior-4">
                        <div>&#10094;</div>
                    </label>
                    <label for="slide-4" class="seta-anterior slide-anterior-5">
                        <div>&#10094;</div>
                    </label>

                    <label for="slide-2" class="seta-proxima proximo-slide-1">
                        <div>&#10095;</div>
                    </label>
                    <label for="slide-3" class="seta-proxima proximo-slide-2">
                        <div>&#10095;</div>
                    </label>
                    <label for="slide-4" class="seta-proxima proximo-slide-3">
                        <div>&#10095;</div>
                    </label>
                    <label for="slide-5" class="seta-proxima proximo-slide-4">
                        <div>&#10095;</div>
                    </label>
                    <label for="slide-1" class="seta-proxima proximo-slide-5">
                        <div>&#10095;</div>
                    </label>
                </div>
                <div class="carousel-indicadores-index">
                    <label for="slide-1" class="ponto ponto-1"></label>
                    <label for="slide-2" class="ponto ponto-2"></label>
                    <label for="slide-3" class="ponto ponto-3"></label>
                    <label for="slide-4" class="ponto ponto-4"></label>
                    <label for="slide-5" class="ponto ponto-5"></label>
                </div>
            </div>

            <div class="titulo2-modalIndex">
                <span>Rex</span>
                <p>Informações</p>
            </div>
        </nav>
        <nav class="itens-modal-index2">
            <div class="container-modal-index">
                <!-- info-pet 1 -->
                <div class="info-pet">
                    <div class="info-pet-header">
                        <h3>Informações Do Animal</h3>
                    </div>
                    <div class="info-pet-body">
                        <div class="group_info_pets">
                            <p><strong>Nome Do Animal:</strong>
                            <div>Rex</div>
                            </p>
                        </div>
                        <div class="group_info_pets">
                            <p><strong>Espécie: </strong>
                            <div> Cachorro</div>
                            </p>
                            <p><strong>Sexo: </strong>
                            <div> Macho</div>
                            </p>
                            <p><strong>Idade: </strong>
                            <div> 2 anos</div>
                            </p>
                        </div>
                        <div class="group_info_pets">

                            <p><strong>Porte:</strong>
                            <div>Medio</div>
                            </p>
                            <p><strong>Castrado:</strong>
                            <div>Sim</div>
                            </p>
                            <p><strong>Vacinado:</strong>
                            <div>Sim</div>
                            </p>
                        </div>
                        <div class="group_info_pets">
                            <p><strong>Raça:</strong>
                            <div>Golden Sla oq</div>
                            </p>
                        </div>
                        <p><strong>Motivo Da Doação:</strong></p>
                        <div class="motivo">

                            A tecnologia transforma o modo como vivemos, trabalhamos e nos conectamos. Cada inovação amplia possibilidades, aproxima pessoas e cria novos desafios. Adaptar-se a essas mudanças é essencial para evoluir em um mundo cada vez mais digital e interligado.
                        </div>
                    </div>
                </div>
                <!-- info-pet 2 -->
                <div class="info-pet">
                    <div class="info-pet-header2">
                        <h3>Conversar com Responsável</h3>
                    </div>
                    <div class="info-pet-body">
                        <p><strong>Nome: </strong>luana vega</p>
                        <p><strong>Telefone:</strong> 1987972154</p>
                        <p><strong>Email: </strong>aline@123</p>
                    </div>
                </div>
            </div>

        </nav>

    </section>

</section>