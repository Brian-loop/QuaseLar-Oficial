//funções de validações dos inputs do cadastro e login de usúarios

//=============================================================================================================
//Validações do nome do usúario
function validaNome(){
    const input = document.getElementById('nome');
    const nome = input.value.trim();
    const msgErro = document.getElementById('msgErroNome');
    const textoErro = document.getElementById('textoErro');
    const label = document.getElementById('labelNome');

    const regex = /^[A-Za-zÀ-ÿ\scons]+$/;

    // Resetar classes e estilos
    input.classList.remove('input-erro', 'input-sucesso');
    msgErro.classList.remove('sucesso', 'erro');
    msgErro.style.display = "block";
    msgErro.style.display = "inline-block";

    function mostrarErro(msg){
        textoErro.textContent = msg;
        msgErro.classList.add('erro');
        label.style.color = "red";
        input.classList.add('input-erro');
    }

    function mostrarSucesso(){
        textoErro.textContent = "OK";
        msgErro.classList.add('sucesso');
        label.style.color = "green";
        input.classList.add('input-sucesso');
    }

    if (nome === ""){
        mostrarErro("Campo obrigatório");
    }else if(nome.length < 3){
        mostrarErro("Mínimo 3 caracteres");
    }else if (nome.length > 60) {
        mostrarErro("Máximo 60 caracteres");
    }else if (!regex.test(nome)) {
        mostrarErro("Apenas letras e espaços");
    }else {
        mostrarSucesso();
    }
}
//=============================================================================================================
//Validações do email do usúario

function validaEmail(){
    const input = document.getElementById('email');
    const email = input.value.trim();
    const msgErro = document.getElementById('msgErroEmail');
    const textoErro = document.getElementById('textoErroEmail');
    const label = document.getElementById('labelEmail');

    const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    // Resetar classes e estilos
    input.classList.remove('input-erro', 'input-sucesso');
    msgErro.classList.remove('sucesso', 'erro');
    msgErro.style.display = "block";
    msgErro.style.display = "inline-block";

    function mostrarErro(msg){
        textoErro.textContent = msg;
        msgErro.classList.add('erro');
        label.style.color = "red";
        input.classList.add('input-erro');
    }
    function mostrarSucesso(){
        textoErro.textContent = "OK";
        msgErro.classList.add('sucesso');
        label.style.color = "green";
        input.classList.add('input-sucesso');
    }

    if (email === ""){
        mostrarErro("Campo obrigatório");
    }else if(email.length < 10){
        mostrarErro("Mínimo 20 caracteres");
    }else if (email.length > 60) {
        mostrarErro("Máximo 60 caracteres");
    }else if (!regex.test(email)) {
        mostrarErro("Email invalido");
    }else {
        mostrarSucesso();
    }
}

//=============================================================================================================
//Validações do telefone do usúario

function validaTelefone() {
    const input = document.getElementById('telefone');
    let telefone = input.value.trim();
    const msgErro = document.getElementById('msgErroTelefone');
    const textoErro = document.getElementById('textoErroTelefone');
    const label = document.getElementById('labelTelefone');

    // Remove todos os caracteres não numéricos
    telefone = telefone.replace(/\D/g, '');
    // Aplica a máscara
    if(telefone.length <= 10){
        telefone = telefone.replace(/(\d{2})(\d{4})(\d{0,4})/, "($1)$2-$3");
    }else{
        telefone = telefone.replace(/(\d{2})(\d{5})(\d{0,4})/, "($1)$2-$3");
    }
    input.value = telefone;

    // Resetar classes e estilos
    input.classList.remove('input-erro', 'input-sucesso');
    msgErro.classList.remove('sucesso', 'erro');
    msgErro.style.display = "inline-block";

    function mostrarErro(msg){
        textoErro.textContent = msg;
        msgErro.classList.add('erro');
        label.style.color = "red";
        input.classList.add('input-erro');
    }

    function mostrarSucesso(){
        textoErro.textContent = "OK";
        msgErro.classList.add('sucesso');
        label.style.color = "green";
        input.classList.add('input-sucesso');
    }

    const telefoneNumeros = input.value.replace(/\D/g, '');

    if (telefoneNumeros === ""){
        mostrarErro("Campo obrigatório");
    } else if (telefoneNumeros.length < 10) {
        mostrarErro("Telefone incompleto");
    } else if (telefoneNumeros.length > 11) {
        mostrarErro("Telefone muito longo");
    } else if (!/^\d{10,11}$/.test(telefoneNumeros)) {
        mostrarErro("Telefone inválido");
    } else {
        mostrarSucesso();
    }
}

//=============================================================================================================
//Validações do Cpf do usúario

function initCpfValidation(){
    const inputCpf = document.getElementById('cpf');
    const msgErro = document.getElementById('msgErroCpf');
    const textoErro = document.getElementById('textoErroCpf');
    const label = document.getElementById('labelCpf');

    // Função interna para aplicar máscara de CPF
    function aplicarMascara(event){
        let valor = event.target.value.replace(/\D/g, ''); // remove não numéricos
        if(valor.length <= 9){
        valor = valor.replace(/(\d{3})(\d{0,3})(\d{0,3})/, "$1.$2.$3");
        }else{
        valor = valor.replace(/(\d{3})(\d{3})(\d{3})(\d{0,2})/, "$1.$2.$3-$4");
        }
        event.target.value = valor;
    }

    // Função interna de validação
    function validar(){
        const cpf = inputCpf.value.replace(/\D/g, ''); // remove máscara
        msgErro.classList.remove('sucesso', 'erro');
        inputCpf.classList.remove('input-erro', 'input-sucesso');
        label.style.color = "#999";
        msgErro.style.display = "inline-flex";

        function mostrarErro(msg){
            textoErro.textContent = msg;
            msgErro.classList.add('erro');
            label.style.color = "red";
            inputCpf.classList.add('input-erro');
        }

        function mostrarSucesso(){
            textoErro.textContent = "OK";
            msgErro.classList.add('sucesso');
            label.style.color = "green";
            inputCpf.classList.add('input-sucesso');
        }

        if(cpf === "") {
            mostrarErro("Campo obrigatório");
        }else if(cpf.length < 11){
            mostrarErro("CPF incompleto");
        }else if(cpf.length > 11){
            mostrarErro("CPF muito longo");
        }else if(!/^\d{11}$/.test(cpf)){
            mostrarErro("CPF inválido");
        }else{
            mostrarSucesso();
        }
    }

    // Eventos
    inputCpf.addEventListener('input', (e) => {
    aplicarMascara(e);
    validar();
    });

    inputCpf.addEventListener('blur', validar);
}

//=============================================================================================================
//Validações do endereço do usúario

function validaEndereco(){
    const input = document.getElementById('endereco');
    const endereco = input.value.trim();
    const msgErro = document.getElementById('msgErroEndereco');
    const textoErro = document.getElementById('textoErroEndereco');
    const label = document.getElementById('labelEndereco');


    // Resetar classes e estilos
    input.classList.remove('input-erro', 'input-sucesso');
    msgErro.classList.remove('sucesso', 'erro');
    msgErro.style.display = "block";
    msgErro.style.display = "inline-block";

    function mostrarErro(msg){
        textoErro.textContent = msg;
        msgErro.classList.add('erro');
        label.style.color = "red";
        input.classList.add('input-erro');
    }

    function mostrarSucesso(){
        textoErro.textContent = "OK";
        msgErro.classList.add('sucesso');
        label.style.color = "green";
        input.classList.add('input-sucesso');
    }

    if (endereco === ""){
        mostrarErro("Campo obrigatório");
    }else if(endereco.length < 12){
        mostrarErro("Endereço incompleto");
    }else if (endereco.length > 160) {
        mostrarErro("Máximo 200 caracteres");
    }else {
        mostrarSucesso();
    }
}