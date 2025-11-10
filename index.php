<?php
session_start();
include './template/header.php';
include './class/BancoDeDados_conexao.php';
include './class/Usuario.php';

$db = new BancoDeDados_conexao();
$pdo = $db->getConexao();

$sql = "
    SELECT 
        a.*,
        u.nome AS nome_usuario,
        u.telefone,
        u.email
    FROM tb_adocao a
    LEFT JOIN tb_usuario u ON a.id_usuario = u.id_usuario
    WHERE a.status_cad_pet = 'ATIVO'
    ORDER BY a.data_criacao_cad_pet DESC
";
$stmt = $pdo->query($sql);
$pets = $stmt->fetchAll();

// Buscar imagens de todos os pets
$pet_ids = array_column($pets, 'id_adocao');
$imagens = [];
if (count($pet_ids) > 0) {
    $in = str_repeat('?,', count($pet_ids) - 1) . '?';
    $sql_imgs = "SELECT id_adocao, localizacao FROM tb_img_animal WHERE id_adocao IN ($in) ORDER BY id_img_animal";
    $stmt_imgs = $pdo->prepare($sql_imgs);
    $stmt_imgs->execute($pet_ids);
    while ($img = $stmt_imgs->fetch()) {
        $imagens[$img['id_adocao']][] = $img['localizacao'];
    }
}
?>

<!-- ===================== SEÇÃO DE APRESENTAÇÃO ===================== -->
<section class="apresentacao" style="background-color: rgba(14, 106, 190, 1);">
    <div class="group_text_apresentacao">
        <section class="mobile-img"></section>
        <div class="txt_apresentacao1">
            <h3>Todo animalzinho precisa ser amado!</h3>
            <p>Adotar um pet é um gesto de amor que muda duas vidas: a do animal e a de quem o acolhe. Ao adotar, damos uma segunda chance a um bichinho que muitas vezes já enfrentou o abandono e a solidão. Ver um animal resgatado ganhar confiança, brincar e demonstrar carinho é uma das experiências mais gratificantes que existem.</p>
        </div>
        <div class="txt_apresentacao2">
            <p>Adotar é um ato de consciência e empatia. Enquanto muitos animais esperam por um lar em abrigos ou nas ruas, a compra estimula um ciclo de comércio que nem sempre garante o bem-estar. Ao escolher a adoção, ajudamos a reduzir o abandono e recebemos em troca um amor puro e verdadeiro.</p>
        </div>
    </div>
</section>

<!-- ===================== TÍTULO ===================== -->
<section class="title-html">
    <h1>Doação</h1>
    <p>Mude um destino: adote um pet hoje!</p>
</section>

<!-- ===================== LISTA DE PETS ===================== -->
<section class="group_cards" id="card_pets">
    <?php foreach ($pets as $pet): ?>
        <?php
        $imgs = $imagens[$pet['id_adocao']] ?? [];
        $primeira_img = $imgs[0] ?? 'https://via.placeholder.com/400x300?text=Sem+Foto';
        $idade_completa = $pet['idade'] . ' ' . strtolower($pet['semanas_meses_anos']);
        ?>
        <div class="card-adocao">
            <div class="card-header">
                <img src="<?= htmlspecialchars($primeira_img) ?>" alt="Foto do <?= htmlspecialchars($pet['nome_pet']) ?>" class="pet-foto">
            </div>
            <div class="card-body">
                <h2 class="pet-nome"><?= htmlspecialchars($pet['nome_pet']) ?></h2>
                <p class="pet-descricao"><?= htmlspecialchars($pet['motivo_da_doacao']) ?></p>
                <div class="pet-caracteristicas">
                    <div class="caracteristica-item">
                        <strong>Idade:</strong> <?= $idade_completa ?>
                    </div>
                    <div class="caracteristica-item">
                        <strong>Gênero:</strong> <?= $pet['sexo'] ?>
                    </div>
                </div>
                <button class="btn-adotar" onclick="abrirModal(<?= $pet['id_adocao'] ?>)">Saiba mais!</button>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<!-- ===================== MODAL ===================== -->
<section class="modal-overlay-index">
    <section class="modal-body-index">
        
        <div class="btn-fechar-index"><i class="bi bi-x"></i></div>

        <nav class="itens-modal-index1">
            <div class="titulo-modalIndex">
                <h3>Doação</h3>
            </div>

            <!-- CARROSSEL -->
            <div id="carouselPet" class="carousel slide d-flex justify-content-center mt-5" data-bs-ride="false" style="width:22rem; height:22rem;">
                <div class="carousel-inner" style="width:22rem; height:22rem; border-radius: 10px;" id="carouselInner"></div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselPet" data-bs-slide="prev" id="prevBtn" style="display:none;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselPet" data-bs-slide="next" id="nextBtn" style="display:none;">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>

            <div class="titulo2-modalIndex">
                <span id="modalNomePet"></span>
                <p>Informações</p>
                <p id="modalDataCad"></p>
            </div>
        </nav>

        <nav class="itens-modal-index2">
            <div class="container-modal-index">
                <div class="info-pet">
                    <div class="info-pet-header">
                        <h3>Informações Do Animal</h3>
                    </div>
                    <div class="info-pet-body">
                        <div class="group_info_pets">
                            <p><strong>Nome:</strong> <div id="modalNomePet2"></div></p>
                        </div>
                        <div class="group_info_pets">
                            <p><strong>Espécie:</strong> <div id="modalEspecie"></div></p>
                            <p><strong>Sexo:</strong> <div id="modalSexo"></div></p>
                            <p><strong>Idade:</strong> <div id="modalIdade"></div></p>
                        </div>
                        <div class="group_info_pets">
                            <p><strong>Porte:</strong> <div id="modalPorte"></div></p>
                            <p><strong>Castrado:</strong> <div id="modalCastrado"></div></p>
                            <p><strong>Vacinado:</strong> <div id="modalVacinado"></div></p>
                        </div>
                        <div class="group_info_pets">
                            <p><strong>Raça:</strong> <div id="modalRaca"></div></p>
                        </div>
                        <p><strong>Motivo Da Doação:</strong></p>
                        <div class="motivo" id="modalMotivo"></div>
                    </div>
                </div>

                <div class="info-pet">
                    <div class="info-pet-header2">
                        <h3>Responsável</h3>
                    </div>
                    <div class="info-pet-body">
                        <p><strong>Nome:</strong> <span id="modalNomeUsuario"></span></p>
                        <p><strong>Telefone:</strong> <span id="modalTelefone"></span></p>
                        <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                    </div>
                </div>
            </div>
        </nav>
    </section>
</section>

<!-- ===================== JS ===================== -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
const petsData = <?php
    $js_pets = [];
    foreach ($pets as $p) {
        $js_pets[$p['id_adocao']] = [
            'nome_pet' => $p['nome_pet'],
            'especie' => $p['especie'],
            'sexo' => $p['sexo'],
            'idade' => $p['idade'] . ' ' . strtolower($p['semanas_meses_anos']),
            'porte' => $p['porte'] ?? 'Não informado',
            'castrado' => $p['castrado'],
            'vacinado' => $p['vacinado'],
            'raca' => $p['raca'],
            'motivo_da_doacao' => $p['motivo_da_doacao'],
            'data_criacao_cad_pet' => date('d/m/Y', strtotime($p['data_criacao_cad_pet'])),
            'nome_usuario' => $p['nome_usuario'] ?? 'Não informado',
            'telefone' => $p['telefone'] ?? 'Não informado',
            'email' => $p['email'] ?? 'Não informado',
            'imagens' => $imagens[$p['id_adocao']] ?? []
        ];
    }
    echo json_encode($js_pets, JSON_UNESCAPED_UNICODE);
?>;
</script>

<script>
function abrirModal(id) {
    const modal = document.querySelector('.modal-overlay-index');
    const data = petsData[id];

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

    const inner = document.getElementById('carouselInner');
    inner.innerHTML = '';

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

    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    if (imgs.length > 1) {
        prevBtn.style.display = 'block';
        nextBtn.style.display = 'block';
    } else {
        prevBtn.style.display = 'none';
        nextBtn.style.display = 'none';
    }

    modal.style.display = 'flex';
    setTimeout(() => modal.classList.add('show'), 10);
}

document.addEventListener('DOMContentLoaded', () => {
    const modal = document.querySelector('.modal-overlay-index');
    const fecharBtn = document.querySelector('.btn-fechar-index');

    const fecharModal = () => {
        modal.classList.remove('show');
        setTimeout(() => modal.style.display = 'none', 300);
    };

    fecharBtn.addEventListener('click', fecharModal);
    modal.addEventListener('click', (e) => {
        if (!document.querySelector('.modal-body-index').contains(e.target)) {
            fecharModal();
        }
    });
});
</script>

<!-- ===================== CSS DO MODAL ===================== -->
<style>
.modal-overlay-index {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    justify-content: center;
    align-items: center;
    z-index: 9999;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.modal-overlay-index.show {
    opacity: 1;
}

.modal-body-index {
    background: #fff;
    width: 70%;
    max-width: 80rem;
    max-height: 90vh;
    overflow-y: auto;
    border-radius: 1rem;
    box-shadow: 0 0 1rem rgba(0, 0, 0, 0.4);
    display: flex;
    flex-direction: row;
    gap: 2rem;
    padding: 2rem;
    position: relative;
    transform: scale(0.9);
    transition: transform 0.3s ease;
}

.modal-overlay-index.show .modal-body-index {
    transform: scale(1);
}

.btn-fechar-index {
    position: absolute;
    top: 1rem;
    right: 1rem;
    font-size: 1.75rem;
    color: #333;
    cursor: pointer;
    z-index: 10000;
}

.btn-fechar-index:hover {
    color: #0E6ABE;
}

@media (max-width: 768px) {
    .modal-body-index {
        flex-direction: column;
        width: 90%;
        height: 90vh;
        padding: 1rem;
    }
}
</style>
