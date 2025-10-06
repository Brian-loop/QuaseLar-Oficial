<?php
include './template/header.php';
//tela de cadastro de pet desaparecidos
?>

<section class="page_cad_procurados">
    <main class="cad_procurados">
        <nav class="cad_procurados_itens1">
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
                    <input type="file" id="file">
                </label>
            </div>
        </nav>
        <form action="cad_procurados.php" method="POST">
            <nav class="cad_procurados_itens2">
                <div class="group_inputs_procurados">
                    <div class="titulo_cadProcurados"><h3>Cadastro do animal Procurado</h3></div>
                    <div class="procurados_cad_inputs1">
                        <div>
                            <label for="nome_procurados">Nome do Animal:</label>
                            <input type="text" id="nome_pet" placeholder="Digite o nome" maxlength="28">
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
                    <div class="procurados_cad_inputs2">
                        <div>
                            <label for="especie">Espécie:</label>
                            <input type="text" id="especie" placeholder="Ex: Cão, gato, coelho">                 
                        </div>
                        <div>
                            <label for="idade_animal">Idade:</label>
                            <input type="number" style="width: 3rem;" pattern="[0-9]{2}" maxlength="99" required id="idade_animal">
                            <select name="" id="idade_animal">
                                <option value="">--Selecione--</option>
                                <option value="">Semanas</option>
                                <option value="">Meses</option>
                                <option value="">Anos</option>
                            </select>
                        </div>
                    </div>
                    <div class="procurados_cad_inputs3">
                        <div>
                            <label for="raca">Raça:</label>
                            <input type="text" id="raca" placeholder="Ex: Shih tzu, vira-lata">
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
                    
                    <div class="ultima_informacao">
                        <div>
                            <label for="ultima_informacao">Ultima Informação do animal:</label>
                            <textarea name="" id="ultima_informacao" rows="5" cols="36" style=" resize: none;" placeholder="Ex: Vi ele na frente de casa ..." maxlength="255"></textarea>
                        </div>
                        <span id="contador-caracteres">0 / 150 </span>
                    </div>
                    <div class="alinha_cad_button">
                        <button class="button" type="submit">Enviar</button>
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

</script>