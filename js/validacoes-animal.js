// ========================= Funções auxiliares =========================

// Exibe uma mensagem de erro abaixo do campo
function mostrarMensagemErro(campo, mensagem) {
    const container = campo.closest('div').nextElementSibling; // Pega o <span> .msg-erro logo após o <div> do input
    if (container && container.classList.contains('msg-erro')) { // Confere se realmente é um elemento de erro
        container.textContent = mensagem; // Mostra o texto da mensagem
        container.style.color = 'red'; // Deixa o texto vermelho
    }
}

// Limpa (remove) a mensagem de erro
function limparMensagemErro(campo) {
    const container = campo.closest('div').nextElementSibling; // Mesmo processo: pega o <span> logo depois
    if (container && container.classList.contains('msg-erro')) { // Se existir
        container.textContent = ''; // Apaga o texto
    }
}

// ========================= Validação de cada campo =========================

// ----- Valida o nome do animal -----
function validaNomeanimal() {
    const input = document.getElementById('nome_pet'); // Pega o input
    const nome = input.value.trim(); // Remove espaços extras
    const label = document.getElementById('labelNome'); // Pega o label
    const regex = /^[A-Za-zÀ-ÿ\s]+$/; // Permite apenas letras e espaços

    limparMensagemErro(input); // Limpa erros antigos
    input.classList.remove('input-erro-procurados', 'input-sucesso-procurados'); // Remove estilos antigos

    if (nome === "") { // Se estiver vazio
        label.style.color = "red";
        input.classList.add('input-erro-procurados');
        mostrarMensagemErro(input, "Campo obrigatório.");
        return false;
    } else if (nome.length < 2) { // Se tiver menos de 2 letras
        label.style.color = "red";
        input.classList.add('input-erro-procurados');
        mostrarMensagemErro(input, "Mínimo de 2 caracteres.");
        return false;
    } else if (nome.length > 30) { // Se for muito longo
        label.style.color = "red";
        input.classList.add('input-erro-procurados');
        mostrarMensagemErro(input, "Máximo de 30 caracteres.");
        return false;
    } else if (!regex.test(nome)) { // Se contiver números ou símbolos
        label.style.color = "red";
        input.classList.add('input-erro-procurados');
        mostrarMensagemErro(input, "Use apenas letras e espaços.");
        return false;
    } else { // Se estiver tudo certo
        label.style.color = "green";
        input.classList.add('input-sucesso-procurados');
        limparMensagemErro(input);
        return true;
    }
}

// ----- Valida a raça -----
function validaRaca() {
    const input = document.getElementById('raca');
    const valor = input.value.trim();
    const label = document.getElementById('labelRaca');

    limparMensagemErro(input);
    input.classList.remove('input-erro-procurados', 'input-sucesso-procurados');

    if (valor === "") {
        label.style.color = "red";
        input.classList.add('input-erro-procurados');
        mostrarMensagemErro(input, "Campo obrigatório.");
        return false;
    } else if (valor.length < 3) {
        label.style.color = "red";
        input.classList.add('input-erro-procurados');
        mostrarMensagemErro(input, "Mínimo de 3 caracteres.");
        return false;
    } else if (valor.length > 30) {
        label.style.color = "red";
        input.classList.add('input-erro-procurados');
        mostrarMensagemErro(input, "Máximo de 30 caracteres.");
        return false;
    } else {
        label.style.color = "green";
        input.classList.add('input-sucesso-procurados');
        limparMensagemErro(input);
        return true;
    }
}

// ----- Valida a idade -----
function validaIdade() {
    const input = document.getElementById('idade_animal');
    const idade = parseInt(input.value.trim());
    const label = document.getElementById('labelnumero');

    limparMensagemErro(input);
    input.classList.remove('input-erro-procurados', 'input-sucesso-procurados');

    if (isNaN(idade) || idade <= 0) { // Verifica se é um número válido
        label.style.color = "red";
        input.classList.add('input-erro-procurados');
        mostrarMensagemErro(input, "Digite uma idade válida.");
        return false;
    } else {
        label.style.color = "green";
        input.classList.add('input-sucesso-procurados');
        limparMensagemErro(input);
        return true;
    }
}

// ----- Valida o select (tipo de animal) -----
function validaTipo() {
    const select = document.getElementById('tipo_animal');
    const valor = select.value;
    const label = document.getElementById('labelTipo');

    limparMensagemErro(select);
    select.classList.remove('input-erro-procurados', 'input-sucesso-procurados');

    if (valor === "") { // Se não selecionou nada
        label.style.color = "red";
        select.classList.add('input-erro-procurados');
        mostrarMensagemErro(select, "Selecione uma opção.");
        return false;
    } else {
        label.style.color = "green";
        select.classList.add('input-sucesso-procurados');
        limparMensagemErro(select);
        return true;
    }
}

// ----- Valida o campo de texto (última informação) -----
function validaUltimaInformacao() {
    const input = document.getElementById('ultima_informacao');
    const texto = input.value.trim();
    const label = document.getElementById('label_informacao');

    limparMensagemErro(input);
    input.classList.remove('input-erro-procurados', 'input-sucesso-procurados');

    if (texto === "") {
        label.style.color = "red";
        input.classList.add('input-erro-procurados');
        mostrarMensagemErro(input, "Campo obrigatório.");
        return false;
    } else if (texto.length < 5) {
        label.style.color = "red";
        input.classList.add('input-erro-procurados');
        mostrarMensagemErro(input, "Mínimo de 5 caracteres.");
        return false;
    } else if (texto.length > 255) {
        label.style.color = "red";
        input.classList.add('input-erro-procurados');
        mostrarMensagemErro(input, "Máximo de 255 caracteres.");
        return false;
    } else {
        label.style.color = "green";
        input.classList.add('input-sucesso-procurados');
        limparMensagemErro(input);
        return true;
    }
}

// ========================= Controle do botão e envio =========================

// Função chamada ao enviar o formulário
function validarFormulario(e) {
    e.preventDefault(); // Impede o envio automático

    // Executa todas as validações
    const validNome = validaNomeanimal();
    const validRaca = validaRaca();
    const validIdade = validaIdade();
    const validTipo = validaTipo();
    const validInfo = validaUltimaInformacao();

    // Se todos estiverem corretos
    if (validNome && validRaca && validIdade && validTipo && validInfo) {
        alert("Cadastro enviado com sucesso!");
        return true;
    } else {
        alert("Verifique os campos destacados em vermelho.");
        return false;
    }
}

// Observa todos os campos para liberar o botão quando tudo estiver válido
document.querySelectorAll('#formProcurados input, #formProcurados textarea, #formProcurados select')
    .forEach(el => el.addEventListener('input', () => { // A cada digitação/mudança
        const btn = document.getElementById('btnSalvar');
        // Se todas as validações passarem, o botão é liberado
        if (validaNomeanimal() && validaRaca() && validaIdade() && validaTipo() && validaUltimaInformacao()) {
            btn.disabled = false;
        } else {
            btn.disabled = true;
        }
    }));