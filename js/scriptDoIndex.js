function abrirModal(id) {
    const modal = document.getElementById('modalOverlay');
    const data = petsData[id];

    // Preencher textos
    document.getElementById('modalNomePet').textContent = data.nome_pet;
    document.getElementById('modalDataCad').textContent = data.data_criacao_cad_pet;
    document.getElementById('modalNomePet2').textContent = data.nome_pet;
    document.getElementById('modalEspecie').textContent = data.especie;
    document.getElementById('modalSexo').textContent = data.sexo;
    document.getElementById('modalIdade').textContent = data.idade;
    document.getElementById('modalPorte').textContent = data.porte;
    document.getElementById('modalCastrado').textContent = data.castrado;
    document.getElementById('modalVacinado').textContent = data.vacinado;
    document.getElementById('modalRaca').textContent = data.raca;
    document.getElementById('modalMotivo').textContent = data.motivo_da_doacao;
    document.getElementById('modalNomeUsuario').textContent = data.nome_usuario;
    document.getElementById('modalTelefone').textContent = data.telefone;
    document.getElementById('modalEmail').textContent = data.email;

    // Limpar carrossel
    const inner = document.getElementById('carouselInner');
    inner.innerHTML = '';

    // Adicionar imagens
    const imgs = data.imagens;
    imgs.forEach((src, index) => {
        const div = document.createElement('div');
        div.className = 'carousel-item' + (index === 0 ? ' active' : '');
        const img = document.createElement('img');
        img.src = src;
        img.className = 'd-block w-100 h-100';
        img.alt = `Imagem ${index + 1} de ${data.nome_pet}`;
        img.style.objectFit = 'cover';
        div.appendChild(img);
        inner.appendChild(div);
    });

    // Mostrar controles só se tiver mais de 1 imagem
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    if (imgs.length > 1) {
        prevBtn.style.display = 'block';
        nextBtn.style.display = 'block';
    } else {
        prevBtn.style.display = 'none';
        nextBtn.style.display = 'none';
    }

    // Abrir modal
    modal.style.display = 'flex';
}

// Fechar modal (mesmo JS que você já tinha, mantido)
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('modalOverlay');
    const fecharBtn = document.querySelector('.btn-fechar-index');

    const fecharModal = () => modal.style.display = 'none';

    fecharBtn.addEventListener('click', fecharModal);
    modal.addEventListener('click', (e) => {
        if (!document.querySelector('.modal-body-index').contains(e.target)) {
            fecharModal();
        }
    });
});