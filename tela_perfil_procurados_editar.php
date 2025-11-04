<?php

include './template/header.php';
require './class/Procurados.php';
$procurados = new Procurados();

$id = $_GET['id'];
if (!$id) {
    die("ID do animal não informado");
}

$dadosProcuradoById = $procurados->consultarAnimaisById($id);
if (!$dadosProcuradoById) {
    die("Animal não encontrado!");
}

$dadosProcuradoById = $dadosProcuradoById[0];

$dadosImgById = $procurados->consultarImgAnimaisById($id);


//tela de edição de pet desaparecidos
?>

<section class="page_cad_procurados">
    <main class="cad_procurados">

        <form action="cad_editar_perfil_procurado.php" method="POST" enctype="multipart/form-data" class="form-procurados">
            <nav class="cad_procurados_itens1">
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

                            if ($imagem_existe) {
                       
                                $url_imagem = $caminho_base .($dadosImgById[$i]['nome_arquivo']);
                            } else {
                          
                                $url_imagem = './img/sem_foto.png';
                            }

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
                        <h3>Editar Info Animal Desaparecido</h3>
                    </div>
                    <div class="procurados_cad_inputs1">
                        <div>
                            <input type="hidden" name="id_procurados" value="<?php echo $dadosProcuradoById['id_procurados']; ?>">

                            <label for="nome_procurados" id="labelNome">Nome do Animal:</label>

                            <input type="text" id="nome_pet" name="nome_procurado_editar" value="<?php echo ($dadosProcuradoById['nome_p']); ?>" placeholder="Digite o nome" maxlength="28" onblur="validaNomeAnimal()" oninput="validaNomeanimal()">

                        </div>
                        <div>
                            <label for="sexo" id="labelSexo">Sexo:</label>
                            <select id="sexo" name="sexo_procurado_editar" onblur=" validaSexo()" onselect="validaSexo()">
                                <option value="" disabled selected>--Selecione--</option>
                                <option value="macho" <?php echo ($dadosProcuradoById['sexo_p'] == 'Macho') ? 'selected' : ''; ?>>Macho</option>
                                <option value="femea" <?php echo ($dadosProcuradoById['sexo_p'] == 'Femea') ? 'selected' : ''; ?>>Fêmea</option>
                            </select>
                        </div>
                    </div>
                    <div class="procurados_cad_inputs2">
                        <div>
                            <label for="especie" id="labelEspecie">Espécie:</label>
                            <select id="especie" name="especie_procurado_editar" onblur="validaEspecie()" onselect="validaEspecie()">
                                <option value="" disabled selected>--Selecione--</option>
                                <option value="Gato" <?php echo ($dadosProcuradoById['especie_p'] == 'Gato') ? 'selected' : ''; ?>>Gato</option>
                                <option value="Cachorro" <?php echo ($dadosProcuradoById['especie_p'] == 'Cachorro') ? 'selected' : ''; ?>>Cachorro</option>
                                <option value="Roedor" <?php echo ($dadosProcuradoById['especie_p'] == 'Roedor') ? 'selected' : ''; ?>>Roedor</option>
                                <option value="Coelho" <?php echo ($dadosProcuradoById['especie_p'] == 'Coelho') ? 'selected' : ''; ?>>Coelho</option>
                                <option value="Aves" <?php echo ($dadosProcuradoById['especie_p'] == 'Aves') ? 'selected' : ''; ?>>Aves</option>
                                <option value="Repteis" <?php echo ($dadosProcuradoById['especie_p'] == 'Repteis') ? 'selected' : ''; ?>>Repteis</option>
                                <option value="Outros" <?php echo ($dadosProcuradoById['especie_p'] == 'Outros') ? 'selected' : ''; ?>>Outros</option>

                            </select>
                        </div>
                        <div>
                            <label for="idade_animal" id="labelnumero">Idade:</label>
                            <input type="number" style="width: 3rem;" pattern="[0-9]{2}" maxlength="99" required id="idade_animal" name="idade_valor_editar" value="<?php echo htmlspecialchars($dadosProcuradoById['idade_p']); ?>" required oninput="validaNumeroIdade()" onblur="validaNumeroIdade()">
                            <select id="idade_tipo" name="idade_tipo_editar" onblur="validaIdadeTipo()" onselect="validaIdadeTipo()">
                                <option value="" disabled selected>--Selecione--</option>
                                <option value="semanas" <?php echo ($dadosProcuradoById['semanas_meses_anos_p'] == 'Semanas') ? 'selected' : ''; ?>>Semanas</option>
                                <option value="meses" <?php echo ($dadosProcuradoById['semanas_meses_anos_p'] == 'Meses') ? 'selected' : ''; ?>>Meses</option>
                                <option value="anos" <?php echo ($dadosProcuradoById['semanas_meses_anos_p'] == 'Anos') ? 'selected' : ''; ?>>Anos</option>
                            </select>
                        </div>
                    </div>
                    <div class="procurados_cad_inputs3">
                        <div>
                            <label for="raca" id="labelRaca">Raça:</label>
                            <input type="text" id="raca" name="raca_procurado_editar" value="<?php echo ($dadosProcuradoById['raca_p']); ?>" placeholder="Ex: Shih tzu, vira-lata" required oninput="validaRaca()" onblur="validaRaca()">
                        </div>
                        <div>
                            <label for="porte" id="labelPorte">Porte:</label>
                            <select id="porte" name="porte_procurado_editar" onblur="validaPorte()" onselect="validaPorte()">
                                <option value="" disabled selected>--Selecione--</option>
                                <option value="grande" <?php echo ($dadosProcuradoById['porte_p'] == 'Grande') ? 'selected' : ''; ?>>Grande</option>
                                <option value="medio" <?php echo ($dadosProcuradoById['porte_p'] == 'Medio') ? 'selected' : ''; ?>>Medio</option>
                                <option value="pequeno" <?php echo ($dadosProcuradoById['porte_p'] == 'Pequeno') ? 'selected' : ''; ?>>Pequeno</option>
                            </select>
                        </div>
                    </div>

                    <div class="ultima_informacao">
                        <div>
                            <label for="ultima_informacao" id="label_informacao">Ultima Informação do animal:</label>
                            <textarea name="ultima_editar" id="informacao" rows="5" cols="36" style="resize: none;"
                                placeholder="Ex: Vi ele na frente de casa ..." maxlength="255" oninput="validanformacao()" onblur="validaInformacao()"><?php echo htmlspecialchars($dadosProcuradoById['ultima_vez_visto']); ?></textarea>
                        </div>
                        <span id="msgErro-procurado" class="mensagem-erro-procurado" role="alert" aria-live="polite">
                            <span id="textoErro"></span>
                        </span>
                        <span id="contador-caracteres">0 / 255 </span>
                    </div>
                    <div class="alinha_cad_button">
                        <button class="button" type="submit" onclick="validarFormularioAnimal()">Atualizar</button>
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
        const textarea = document.getElementById('informacao');
        const contador = document.getElementById('contador-caracteres');

        // 2. Garante que os elementos existem e que há um maxlength
        if (!textarea || !contador) {<?php echo ($dadosProcuradoById['sexo_p'] == 'Macho') ? 'selected' : ''; ?>
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

            leitor.onload = function(e) {
                slides[i].src = e.target.result; // coloca a imagem no slide correspondente
            };

            leitor.readAsDataURL(arquivos[i]); // lê o arquivo como base64
        }

        // Se tiver menos de 5 imagens, as outras ficam vazias
        for (let j = total; j < slides.length; j++) {
            slides[j].src = "./img/sem_foto.png";
        }
    }
</script>