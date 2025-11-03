// --- Menu lateral ---
document.getElementById('menu-toggle').addEventListener('click', () => {
    document.getElementById('sidebar').classList.toggle('hidden');
});

function showSection(id) {
    document.querySelectorAll('.section').forEach(s => s.classList.remove('active'));
    document.getElementById(id).classList.add('active');
}

// --- Upload de imagens ---
const imagens = {
    animais: [],
    desaparecidos: []
};

function handleImageUpload(tipo) {
    const input = document.getElementById(`inputImagens${capitalize(tipo)}`);
    const preview = document.getElementById(`preview${capitalize(tipo)}`);
    const files = Array.from(input.files);

    files.forEach(file => {
        if (imagens[tipo].length >= 5) {
            alert('Você pode enviar no máximo 5 imagens!');
            return;
        }

        imagens[tipo].push(file);
        const reader = new FileReader();
        reader.onload = e => {
            const card = document.createElement('div');
            card.classList.add('card', 'shadow-sm', 'p-1');
            card.style.width = '120px';
            card.innerHTML = `
            <img src="${e.target.result}" class="img-fluid rounded" alt="${file.name}">
            <div class="text-center mt-1">
              <small class="text-truncate d-block">${file.name}</small>
              <button type="button" class="btn btn-sm btn-outline-danger mt-1">Remover</button>
            </div>
          `;
            preview.appendChild(card);
            card.querySelector('button').addEventListener('click', () => {
                const index = imagens[tipo].indexOf(file);
                if (index > -1) imagens[tipo].splice(index, 1);
                card.remove();
            });
        };
        reader.readAsDataURL(file);
    });

    input.value = '';
}

function resetarPreview(tipo) {
    imagens[tipo] = [];
    document.getElementById(`preview${capitalize(tipo)}`).innerHTML = '';
}

function capitalize(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}
//============================================================================================================================
// modais de alteracao de cadastro
// Funções de abertura dos modais
function abrirModal(id) {
    const modal = new bootstrap.Modal(document.getElementById(id));
    modal.show();
}

function configurarEventos() {
    document.getElementById('btnAdminCadUsuario').addEventListener('click', function () {
        abrirModal('adminModal1');
    });

    document.getElementById('btnAdminCadPets').addEventListener('click', function () {
        abrirModal('adminModal2');
    });

    document.getElementById('btnAdminCadProdurados').addEventListener('click', function () {
        abrirModal('adminModal3');
    });
}

document.addEventListener('DOMContentLoaded', configurarEventos);