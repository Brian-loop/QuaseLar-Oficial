<?php
include './template/header.php';
?>

<section class="page_cad_pets">
    <main class="cad_pets">
        <nav class="cad_pets_itens1">
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
        </nav>
        <nav class="cad_pets_itens2">
            <div class="group_inputs_pet">
                <div class="titulo_cadPets"><h3>Cadastre de animais</h3></div>
                <div class="pet_cad_inputs1">
                    <div>
                        <label for="nome_pet">Nome do pet:</label>
                        <input type="text" id="nome_pet" placeholder="Digite o nome do pet" maxlength="28">
                    </div>
                    <div>
                        <label for="sexo">Sexo:</label>
                        <select name="" id="sexo">
                            <option value="" disabled selected>--Selecione--</option>
                            <option value="">Macho</option>
                            <option value="">Fêmea</option>
                        </select> 
                    </div>
                </div>
                <div class="pet_cad_inputs2">
                    <div>
                        <label for="especie">Espécie:</label>
                        <input type="text" id="especie" placeholder="Ex: Cão, gato, coelho">                 
                    </div>
                    <div>
                        <label for="idade_pet">Idade:</label>
                        <input type="number" style="width: 3rem;" pattern="[0-9]{2}" maxlength="99" required id="idade_pet">
                        <select name="" id="idade_pet">
                            <option value="">--Selecione--</option>
                            <option value="">Semanas</option>
                            <option value="">Messes</option>
                            <option value="">Anos</option>
                        </select>
                    </div>
                </div>
                <div class="pet_cad_inputs3">
                    <div>
                        <label for="raca">Raça:</label>
                        <input type="text" id="raca" placeholder="Ex: Shih tzu, viar-lata">
                    </div>
                    <div>
                        <label for="porte">Porte:</label>
                        <select name="" id="porte">
                            <option value="" disabled selected>--Selecione--</option>
                            <option value="">Grande</option>
                            <option value="">Medio</option>
                            <option value="">Pequeno</option>
                        </select>
                    </div>
                </div>
                <div class="pet_cad_inputs4">    
                    <div>
                        <label for="castrado">Castrado:</label>
                        <select name="" id="castrado">
                            <option value="" disabled selected>--Selecione--</option>
                            <option value="">Sim</option>
                            <option value="">Não</option>
                        </select>
                    </div>
                    <div>
                        <label for="vacinado">Vacinado</label>
                        <select name="" id="vacinado">
                            <option value="" disabled selected>--Selecione--</option>
                            <option value="">Sim</option>
                            <option value="">Não</option>
                        </select>
                    </div>
                </div>
                <div class="motivo_doacao">
                    <div>
                        <label for="motivo_doacao">Motivo da doação:</label>
                        <textarea name="" id="motivo_doacao" rows="5" cols="36" style=" resize: none;" placeholder="Ex: Minha cadela teve filhotes e não tenho condição de manter eles ..." maxlength="255"></textarea>
                    </div>
                    <span id="contador-caracteres">0 / 150 </span>
                </div>
                <div class="alinha_cad_button">
                    <button class="button" type="submit">Enviar</button>
                </div>
            </div>
        </nav>
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