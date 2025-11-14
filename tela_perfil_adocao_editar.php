<?php
session_start();
$idUsuario = $_SESSION['usuario_id'];
include './template/header.php';
require_once './class/Adocao.php';

$adocao = new Adocao;

$id = $_GET['id'];
if (!$id) {
    die("ID do animal não informado");
}


$dadosadocaoById = $adocao->consultarAnimaisAdocaoByUsuario($idUsuario);

if (!$dadosadocaoById) {
    die("Animal não encontrado!");
}

$dadosadocaoById = $dadosadocaoById[0];

$dadosImgById = $adocao->consultarImgAnimaisAdocaoById($idUsuario);


?>

<section class="page_cad_pets">
    <main class="cad_pets">

       
        <form action="cad_editar_perfil_adocao.php" method="POST" enctype="multipart/form-data" class="form-adocao">
            <nav class="cad_pets_itens1">
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

            <nav class="cad_pets_itens2">
                <div class="group_inputs_pet">
                    <div class="titulo_cadPets">
                        <h3>Atualizar dados animais</h3>
                    </div>
                    <div class="pet_cad_inputs1">
                        <div>
                            <input type="hidden" name="id_adocao" value="<?php echo $dadosadocaoById['id_adocao']; ?>">
                            <label for="nome_pet" id="labelNome">Nome do pet:</label>
                            <input type="text" id="nome_pet" name="nome" placeholder="Digite o nome do pet"  value="<?php echo ($dadosadocaoById['nome_pet']); ?>"  maxlength="28" onblur=" validaNomeAnimal()" oninput=" validaNomeAnimal()">
                        </div>
                        <div>
                            <label for="sexo" id="labelSexo">Sexo:</label>
                            <select name="sexo" id="sexo" onblur=" validaSexo()" oninput=" validaSexo()">
                                <option value="" disabled selected>--Selecione--</option>
                                <option value="macho" <?php echo ($dadosadocaoById['sexo'] == 'Macho') ? 'selected' : ''; ?>>Macho</option>
                                <option value="femea" <?php echo ($dadosadocaoById['sexo'] == 'Femea') ? 'selected' : ''; ?>>Fêmea</option>
                            </select>
                        </div>
                    </div>
                    <div class="pet_cad_inputs2">
                        <div>
                            <label for="especie" id="labelEspecie">Espécie:</label>
                            <select id="especie" name="especie" onblur="validaEspecie()" onselect="validaEspecie()">
                                <option value="" disabled selected>--Selecione--</option>
                                <option value="Gato" <?php echo     ($dadosadocaoById['especie'] == 'Gato') ? 'selected' : ''; ?>>Gato</option>
                                <option value="Cachorro" <?php echo ($dadosadocaoById['especie'] == 'Cachorro') ? 'selected' : ''; ?>>Cachorro</option>
                                <option value="Roedor" <?php echo   ($dadosadocaoById['especie'] == 'Roedor') ? 'selected' : ''; ?>>Roedor</option>
                                <option value="Coelho" <?php echo   ($dadosadocaoById['especie'] == 'Coelho') ? 'selected' : ''; ?>>Coelho</option>
                                <option value="Aves" <?php echo     ($dadosadocaoById['especie'] == 'Aves') ? 'selected' : ''; ?>>Aves</option>
                                <option value="Repteis" <?php echo  ($dadosadocaoById['especie'] == 'Repteis') ? 'selected' : ''; ?>>Repteis</option>
                                <option value="Outros" <?php echo   ($dadosadocaoById['especie'] == 'Outros') ? 'selected' : ''; ?>>Outros</option>
                            </select>
                        </div>
                        <div>
                            <label for="idade_pet" id="labelnumero">Idade:</label>
                            <input type="number" style="width: 3rem;" pattern="[0-9]{2}" maxlength="99" required id="idade_animal" name="idade_pet" value="<?php echo ($dadosadocaoById['idade']); ?>" oninput="validaNumeroIdade()" onblur="validaNumeroIdade()">
                            <select name="idade" id="idade_tipo" onblur="validaIdadeTipo()" onselect="validaIdadeTipo()">
                                <option value="" disabled selected>--Selecione--</option>
                                <option value="semanas"<?php echo ($dadosadocaoById['semanas_meses_anos'] == 'Semanas') ? 'selected' : ''; ?>>Semanas</option>
                                <option value="meses"<?php echo   ($dadosadocaoById['semanas_meses_anos'] == 'Meses') ? 'selected' : ''; ?>>Meses</option>
                                <option value="anos"<?php echo    ($dadosadocaoById['semanas_meses_anos'] == 'Anos') ? 'selected' : ''; ?>>Anos</option>
                            </select>
                        </div>
                    </div>
                    <div class="pet_cad_inputs3">
                        <div>
                            <label for="raca" id="labelRaca">Raça:</label>
                            <input type="text" id="raca" name="raca" value=" <?php echo ($dadosadocaoById['raca']); ?>" placeholder="Ex: Shih tzu, vira-lata" oninput="validaRaca()" onblur="validaRaca()">
                        </div>
                        <div>
                            <label for="porte" id="labelPorte">Porte:</label>
                            <select name="porte" id="porte" onblur="validaPorte()" onselect="validaPorte()">
                                <option value="" disabled selected>--Selecione--</option>
                                <option value="grande" <?php echo ($dadosadocaoById['porte'] == 'Grande') ? 'selected' : ''; ?>>Grande</option>
                                <option value="medio"  <?php echo ($dadosadocaoById['porte'] == 'Medio') ? 'selected' : ''; ?>>Medio</option>
                                <option value="pequeno"<?php echo ($dadosadocaoById['porte'] == 'Pequeno') ? 'selected' : ''; ?>>Pequeno</option>
                            </select>
                        </div>
                    </div>
                    <div class="pet_cad_inputs4">
                        <div>
                            <label for="castrado" id="labelCastrado">Castrado:</label>
                            <select name="castrado" id="castrado" onblur="validaCastrado()" onselect="validaCastrado()">
                                <option value="" disabled selected>--Selecione--</option>
                                <option value="sim" <?php echo ($dadosadocaoById['castrado'] == 'SIM') ? 'selected' : ''; ?>>Sim</option>
                                <option value="nao"<?php echo ($dadosadocaoById['castrado'] == 'NAO') ? 'selected' : ''; ?>>Não</option>
                            </select>
                        </div>
                        <div>
                            <label for="vacinado" id="labelVacinado">Vacinado</label>
                            <select name="vacinado" id="vacinado" onblur="validaVacinado()" onselect="validaVacinado()">
                                <option value="" disabled selected>--Selecione--</option>
                                <option value="sim"<?php echo ($dadosadocaoById['vacinado'] == 'SIM') ? 'selected' : ''; ?>>Sim</option>
                                <option value="nao"<?php echo ($dadosadocaoById['vacinado'] == 'NAO') ? 'selected' : ''; ?>>Não</option>
                            </select>
                        </div>
                    </div>
                    <div class="motivo_doacao">
                        <div>
                            <label for="motivo_doacao" id="label_informacao">Motivo da doação:</label>
                            <textarea name="motivo" id="informacao" rows="5" cols="36" style=" resize: none;" placeholder="Ex: Minha cadela teve filhotes e não tenho condição de manter eles ..." maxlength="255" oninput="validanformacao() " onblur="validaInformacao()"><?php echo($dadosadocaoById['motivo_da_doacao']); ?></textarea>
                        </div>
                        <span id="contador-caracteres">0 / 255 </span>
                    </div>
                    <div class="alinha_cad_button">
                        <button class="button_cad_pets" type="submit" onclick="validarFormularioAnimal()">Atualizar</button>
                        <span id="msgErro-procurado" class="mensagem-erro-adocao" role="alert" aria-live="polite">
                            <span id="textoErro"></span>
                        </span>
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