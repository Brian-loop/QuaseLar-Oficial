<?php
include './template/header.php';
//tela de cadastro de pet desaparecidos
?>

<section class="page_cad_procurados">
    <main class="cad_procurados">

        <form action="cad_procurados.php" method="POST" enctype="multipart/form-data" class="form-procurados">
            <nav class="cad_procurados_itens1">
                <div class="carousel-container">
                    <input type="radio" name="slider" id="slide-1" checked class="slide_input_radio">
                    <input type="radio" name="slider" id="slide-2" class="slide_input_radio">
                    <input type="radio" name="slider" id="slide-3" class="slide_input_radio">
                    <input type="radio" name="slider" id="slide-4" class="slide_input_radio">
                    <input type="radio" name="slider" id="slide-5" class="slide_input_radio">

                    <div class="carousel-track">
                        <div class="carousel-slide slide-1">
                            <img src="" alt="Slide 1">
                        </div>
                        <div class="carousel-slide slide-2">
                            <img src="" alt="Slide 2">
                        </div>
                        <div class="carousel-slide slide-3">
                            <img src="" alt="Slide 3">
                        </div>
                        <div class="carousel-slide slide-4">
                            <img src="" alt="Slide 4">
                        </div>
                        <div class="carousel-slide slide-5">
                            <img src="" alt="Slide 5">
                        </div>
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

                <div class="bnt_file">
                    <label class="adicionar_fts" for="file">
                        <div class="text_file">
                            <span><i class="bi bi-plus-circle"></i>Adicionar imagens</span>
                        </div>
                        <input type="file" id="file" name="file[]" accept="image/*" multiple required onchange="previewImagens()">
                        <input type="submit" value="enviar">
                    </label>
                </div>
            </nav>


            <nav class="cad_procurados_itens2">
                <div class="group_inputs_procurados">
                    <div class="titulo_cadProcurados">
                        <h3>Cadastro do Animal Procurado</h3>
                    </div>
                    <div class="procurados_cad_inputs1">
                        <div>
                            <input type="hidden" name="cadastro" value="1" >
                            <label for="nome_procurados" id="labelNome">Nome do Animal:</label>
                            <input type="text" id="nome_pet" name="nome_procurado" placeholder="Digite o nome" maxlength="28" onblur="validaNomeAnimal()" oninput="validaNomeanimal()">
                    
                        </div>
                        <div>
                            <label for="sexo" id="labelSexo" >Sexo:</label>
                            <select id="sexo" name="sexo_procurado" onblur=" validaSexo()" onselect="validaSexo()">
                                <option value="" disabled selected>--Selecione--</option>
                                <option value="macho">Macho</option>
                                <option value="femea">Fêmea</option>
                            </select>
                        </div>
                    </div>
                    <div class="procurados_cad_inputs2">
                        <div>
                            <label for="especie" id="labelEspecie">Espécie:</label>
                            <select id="especie" name="especie_procurado" onblur="validaEspecie()" onselect="validaEspecie()">
                                <option value="" disabled selected>--Selecione--</option>
                                <option value="Gato">Gato</option>
                                <option value="Cachorro">Cachorro</option>
                                <option value="Roedor">Roedor</option>
                                <option value="Coelho">Coelho</option>
                                <option value="Aves">Aves</option>
                                <option value="Repteis">Repteis</option>
                                <option value="Outros">Outros</option>

                            </select>
                        </div>
                        <div>
                            <label for="idade_animal" id="labelnumero">Idade:</label>
                            <input type="number" style="width: 3rem;" pattern="[0-9]{2}" maxlength="99" required id="idade_animal" name="idade_valor" required oninput="validaNumeroIdade()" onblur="validaNumeroIdade()">
                            <select id="idade_tipo" name="idade_tipo" onblur="validaIdadeTipo()" onselect="validaIdadeTipo()">
                                <option value="" disabled selected>--Selecione--</option>
                                <option value="semanas">Semanas</option>
                                <option value="meses">Meses</option>
                                <option value="anos">Anos</option>
                            </select>
                        </div>
                    </div>
                    <div class="procurados_cad_inputs3">
                        <div>
                            <label for="raca" id="labelRaca">Raça:</label>
                            <input type="text" id="raca" name="raca_procurado" placeholder="Ex: Shih tzu, vira-lata" required oninput="validaRaca()" onblur="validaRaca()">
                        </div>
                        <div>
                            <label for="porte" id="labelPorte">Porte:</label>
                            <select id="porte" name="porte_procurado" onblur="validaPorte()" onselect="validaPorte()">
                                <option value="" disabled selected>--Selecione--</option>
                                <option value="grande">Grande</option>
                                <option value="medio">Medio</option>
                                <option value="pequeno">Pequeno</option>
                            </select>
                        </div>
                    </div>

                    <div class="ultima_informacao">
                        <div>
                            <label for="ultima_informacao" id="label_informacao">Ultima Informação do animal:</label>
                            <textarea name="ultima" id="informacao" rows="5" cols="36" style=" resize: none;" placeholder="Ex: Vi ele na frente de casa ..." maxlength="255" oninput="validanformacao() " onblur="validaInformacao()"></textarea>
                        </div>
                        <span id="msgErro-procurado" class="mensagem-erro-procurado" role="alert" aria-live="polite" >
                        <span id="textoErro"></span>
                    </span>
                        <span id="contador-caracteres">0 / 255 </span>
                    </div>
                    <div class="alinha_cad_button">
                        <button class="button" type="submit" onclick="validarFormularioAnimal()">Enviar</button>
                    </div>
                </div>
            </nav>
        </form>
    </main>
</section>
<script>
    // A função principal que configura o contador
    function inicializarContador() {
        // 1. Pega os elementos do DOM
        const textarea = document.getElementById('ultima_informacao');
        const contador = document.getElementById('contador-caracteres');

        // 2. Garante que os elementos existem e que há um maxlength
        if (!textarea || !contador) {
            console.error("Elementos Textarea ou Contador não encontrados!");
            return;
        }

        const maxLength = textarea.getAttribute('maxlength');
        if (!maxLength) {
            console.warn("O Textarea não tem o atributo 'maxlength'. O contador funcionará, mas sem limite.");
        }
        // 3. Define a função de atualização do contador
        function atualizarContador() {
            const currentLength = textarea.value.length;

            // Se tiver maxlength, mostra a contagem / limite. Senão, mostra só a contagem.
            if (maxLength) {
                contador.textContent = `${currentLength} / ${maxLength}`;

                // Aplica o estilo de limite
                if (currentLength >= parseInt(maxLength)) {
                    contador.classList.add('limite-atingido');
                } else {
                    contador.classList.remove('limite-atingido');
                }
            } else {
                contador.textContent = `${currentLength} caracteres`;
            }
        }
        // 4. Inicializa o contador com o valor atual (caso haja texto preenchido)
        atualizarContador();
        // 5. Adiciona o listener para atualizar a cada entrada de texto
        textarea.addEventListener('input', atualizarContador);
    }
    // Chama a função principal quando o conteúdo da página estiver carregado
    document.addEventListener('DOMContentLoaded', inicializarContador);

    function previewImagens() {
    const input = document.getElementById('file');
    const arquivos = input.files;

    // Seleciona todas as imagens dos slides
    const slides = document.querySelectorAll('.carousel-slide img');


    // Limita a 5 imagens (uma para cada slide)
    const maxImagens = 5;
    const total = Math.min(arquivos.length, maxImagens);

    // Limpa as imagens anteriores
    slides.forEach(slide => {
        slide.src = "";
    });

    // Mostra as novas imagens nos quadrados
    for (let i = 0; i < total; i++) {
        const leitor = new FileReader();

        leitor.onload = function (e) {
            slides[i].src = e.target.result; // coloca a imagem no slide correspondente
        };

        leitor.readAsDataURL(arquivos[i]); // lê o arquivo como base64
    }

    // Se tiver menos de 5 imagens, as outras ficam vazias
    for (let j = total; j < slides.length; j++) {
        slides[j].src = "";
    }
}

</script>