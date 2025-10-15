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
    
    if (!textarea || !contador) {
        console.error("Elementos Textarea ou Contador não encontrados!");
        return; 
    }
    
    const maxLength = textarea.getAttribute('maxlength');
    if (!maxLength) {
        console.warn("O Textarea não tem o atributo 'maxlength'. O contador funcionará, mas sem limite.");
    }
    function atualizarContador() {
        const currentLength = textarea.value.length;
        
        // Se tiver maxlength, mostra a contagem / limite. Senão, mostra só a contagem.
        if (maxLength) {
            contador.textContent = `${currentLength} / ${maxLength}`;
            
            if (currentLength >= parseInt(maxLength)) {
                contador.classList.add('limite-atingido');
            } else {
                contador.classList.remove('limite-atingido');
            }
        } else {
            contador.textContent = `${currentLength} caracteres`;
        }
    }
    atualizarContador();
    textarea.addEventListener('input', atualizarContador);
}
document.addEventListener('DOMContentLoaded', inicializarContador);

function initModal() {
      const openBtn = document.getElementById('openModal');
      const closeBtn = document.getElementById('closeModal');
      const modalOverlay = document.getElementById('modalOverlay');

      openBtn.addEventListener('click', () => {
        modalOverlay.style.display = 'flex';
        
      });

      closeBtn.addEventListener('click', () => {
        modalOverlay.style.display = 'none';
      });

      modalOverlay.addEventListener('click', (e) => {
        if (e.target === modalOverlay) {
          modalOverlay.style.display = 'none';
        }
      });
    }

    // Chama a função ao carregar a página
    window.addEventListener('DOMContentLoaded', initModal);


