// //tela do menu

document.addEventListener('DOMContentLoaded', () => {
    const hamburgerBtn = document.getElementById('hamburger');
    const sidebarMenu = document.getElementById('tela_menu');
    hamburgerBtn.addEventListener('click', () => {
        hamburgerBtn.classList.toggle('is-active');
        sidebarMenu.classList.toggle('active');
    });
    const closeMenu = () => {
        if (sidebarMenu.classList.contains('active')) {
            sidebarMenu.classList.remove('active');
            hamburgerBtn.classList.remove('is-active');
        }
    };
    window.addEventListener('scroll', () => {
        closeMenu();
    });
});


//modal
function exibirModal(){
    // 1. Pega os elementos do DOM (Document Object Model)
    var modal = document.getElementById("meuModal");
    var spanFechador = document.getElementsByClassName("fechar")[0];
    
    // 2. Exibe o modal
    modal.style.display = "block";

    // 3. Configura o evento para fechar ao clicar no 'x'
    spanFechador.onclick = function() {
        modal.style.display = "none";
    }

    // 4. Configura o evento para fechar ao clicar FORA do modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}
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




