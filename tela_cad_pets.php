<?php
include './template/header.php';
?>

<section class="page_cad_pets">
    <main class="cad_pets">

        <form action="./cad_pets.php" method="POST" enctype="multipart/form-data" class="form-adocao">
            <nav class="cad_pets_itens1">
                <div class="carousel-container">
                    <input type="radio" name="slider" id="slide-1" checked class="slide_input_radio">
                    <input type="radio" name="slider" id="slide-2" class="slide_input_radio">
                    <input type="radio" name="slider" id="slide-3" class="slide_input_radio">
                    <input type="radio" name="slider" id="slide-4" class="slide_input_radio">
                    <input type="radio" name="slider" id="slide-5" class="slide_input_radio">

                    <div class="carousel-track">
                        <div class="carousel-slide slide-1">
                            <img src="./img/fundo-animado.gif" alt="Slide 1">
                        </div>
                        <div class="carousel-slide slide-2">
                            <img src="./img/sobre_nos.png" alt="Slide 2">
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
                        <input type="file" multiple id="file" name="file" accept="image/*" required>
                        <input type="submit" value="enviar">
                    </label>
                </div>
            </nav>

            <nav class="cad_pets_itens2">
                <div class="group_inputs_pet">
                    <div class="titulo_cadPets">
                        <h3>Cadastro de animais</h3>
                    </div>
                    <div class="pet_cad_inputs1">
                        <div>
                            <label for="nome_pet" id="labelNome">Nome do pet:</label>
                            <input type="hidden" name="cadastro" value="1">
                            <input type="text" id="nome_pet" name="nome" placeholder="Digite o nome do pet" maxlength="28" onblur=" validaNomeAnimal()" oninput=" validaNomeAnimal()">
                        </div>
                        <div>
                            <label for="sexo" id="labelSexo">Sexo:</label>
                            <select name="sexo" id="sexo" onblur=" validaSexo()" oninput=" validaSexo()">
                                <option value="" disabled selected>--Selecione--</option>
                                <option value="macho">Macho</option>
                                <option value="femea">Fêmea</option>
                            </select>
                        </div>
                    </div>
                    <div class="pet_cad_inputs2">
                        <div>
                            <label for="especie" id="labelEspecie">Espécie:</label>
                            <select id="especie" name="especie"  onblur="validaEspecie()" onselect="validaEspecie()">
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
                            <label for="idade_pet" id="labelnumero">Idade:</label>
                            <input type="number" style="width: 3rem;" pattern="[0-9]{2}" maxlength="99" required id="idade_animal" name="idade_pet" oninput="validaNumeroIdade()" onblur="validaNumeroIdade()">
                            <select name="idade" id="idade_tipo" onblur="validaIdadeTipo()" onselect="validaIdadeTipo()">
                                <option value="" disabled selected>--Selecione--</option>
                                <option value="semanas">Semanas</option>
                                <option value="meses">Meses</option>
                                <option value="anos">Anos</option>
                            </select>
                        </div>
                    </div>
                    <div class="pet_cad_inputs3">
                        <div>
                            <label for="raca" id="labelRaca">Raça:</label>
                            <input type="text" id="raca" name="raca" placeholder="Ex: Shih tzu, vira-lata"  oninput="validaRaca()" onblur="validaRaca()">
                        </div>
                        <div>
                            <label for="porte" id="labelPorte">Porte:</label>
                            <select name="porte" id="porte" onblur="validaPorte()" onselect="validaPorte()">
                                <option value="" disabled selected>--Selecione--</option>
                                <option value="grande">Grande</option>
                                <option value="medio">Medio</option>
                                <option value="pequeno">Pequeno</option>
                            </select>
                        </div>
                    </div>
                    <div class="pet_cad_inputs4">
                        <div>
                            <label for="castrado" id="labelCastrado">Castrado:</label>
                            <select name="castrado" id="castrado" onblur="validaCastrado()" onselect="validaCastrado()">
                                <option value="" disabled selected>--Selecione--</option>
                                <option value="sim">Sim</option>
                                <option value="nao">Não</option>
                            </select>
                        </div>
                        <div>
                            <label for="vacinado" id="labelVacinado" >Vacinado</label>
                            <select name="vacinado" id="vacinado" onblur="validaVacinado()" onselect="validaVacinado()">
                                <option value="" disabled selected>--Selecione--</option>
                                <option value="sim">Sim</option>
                                <option value="nao">Não</option>
                            </select>
                        </div>
                    </div>
                    <div class="motivo_doacao">
                        <div>
                            <label for="motivo_doacao" id="label_informacao">Motivo da doação:</label>
                            <textarea name="motivo" id="informacao" rows="5" cols="36" style=" resize: none;" placeholder="Ex: Minha cadela teve filhotes e não tenho condição de manter eles ..." maxlength="255"  oninput="validanformacao() " onblur="validaInformacao()"></textarea>
                        </div>
                        <span id="contador-caracteres">0 / 255 </span>
                    </div>
                    <div class="alinha_cad_button">
                        <button class="button_cad_pets" type="submit" onclick="validarFormularioAnimal()">Enviar</button>
                            <span id="msgErro-procurado" class="mensagem-erro-procurado" role="alert" aria-live="polite" >
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
        const textarea = document.getElementById('motivo_doacao');
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
</script>