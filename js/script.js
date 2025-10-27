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

function abrirModal() {
    const modal = document.querySelector('.modal-overlay-index');
    const fecharBtn = document.querySelector('.btn-fechar-index');
    modal.style.display = 'flex';
    fecharBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    modal.addEventListener('click', (event) => {
        const modalBody = document.querySelector('.modal-body-index');
        if (!modalBody.contains(event.target)) {
            modal.style.display = 'none';
        }
    });
}

function abrirModalProcurados() {
    const modal = document.querySelector('.modal-overlay-exibicao-procurados');
    const fecharBtn = document.querySelector('.btn-fechar-exibicao-procurados');
    modal.style.display = 'flex';
    fecharBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    modal.addEventListener('click', (event) => {
        const modalBody = document.querySelector('.modal-body-index');
        if (!modalBody.contains(event.target)) {
            modal.style.display = 'none';
        }
    });
}




function precisaEstarLogado(message, duration = 3000) {
    const modal = document.createElement('div');
    modal.id = 'temporary-modal-message';

    modal.textContent = message;

    modal.style.position = 'fixed'; 
    modal.style.top = '50%';        
    modal.style.left = '50%';       
    modal.style.transform = 'translate(-50%, -50%)'; 
    modal.style.backgroundColor = 'rgba(0, 0, 0, 0.8)'; 
    modal.style.color = 'white';    
    modal.style.padding = '20px 30px';
    modal.style.borderRadius = '8px'; 
    modal.style.zIndex = '10000';   
    modal.style.fontSize = '1.2em'; 
    modal.style.textAlign = 'center';
    modal.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.2)';
    modal.style.transition = 'opacity 0.5s ease-in-out'; 
    modal.style.opacity = '0'; 

    document.body.appendChild(modal);

    setTimeout(() => {
        modal.style.opacity = '1';
    }, 10); // Pequeno atraso

    setTimeout(() => {
        // Iniciar o fade-out
        modal.style.opacity = '0';

        // Remover o elemento do DOM após a transição de fade-out
        setTimeout(() => {
            if (document.body.contains(modal)) {
                document.body.removeChild(modal);
            }
        }, 500); // 500ms (0.5s) 
    }, duration);
}


function cardOculto(){

    



}


