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

function validaCpf() {
    const inputCpf = document.getElementById('cpf');
    const msgErro = document.getElementById('msgErroCpf');
    const textoErro = document.getElementById('textoErroCpf');
    const label = document.getElementById('labelCpf');

    let valor = inputCpf.value.replace(/\D/g, '');
    if (valor.length <= 9){
        valor = valor.replace(/(\d{3})(\d{0,3})(\d{0,3})/, "$1.$2.$3");
    }else {
        valor = valor.replace(/(\d{3})(\d{3})(\d{3})(\d{0,2})/, "$1.$2.$3-$4");
    }
    inputCpf.value = valor;

    const cpf = valor.replace(/\D/g, '');
    msgErro.classList.remove('sucesso', 'erro');
    inputCpf.classList.remove('input-erro', 'input-sucesso');
    msgErro.style.display = "block";
    msgErro.style.display = "inline-block";

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

    if(cpf === ""){
       mostrarErro("Campo obrigatorio");
    }else if(cpf.length < 11){
        mostrarErro("CPF incompleto");
    }else if(!/^\d{11}$/.test(cpf)){
        mostrarErro("CPF inválido");
    }else{
        mostrarSucesso();
    }
}

//=============================================================================================================
//Validações do endereço do usúario

function validaEndereco(){
    const input = document.getElementById('endereco');
    const endereco = input.value.trim();
    const msgErro = document.getElementById('msgErroEndereco');
    const textoErro = document.getElementById('textoErroEndereco');
    const label = document.getElementById('labelEndereco');

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

    if(endereco === ""){
        mostrarErro("Campo obrigatório");
    }else if(endereco.length < 12){
        mostrarErro("Endereço incompleto");
    }else if(endereco.length > 160){
        mostrarErro("Máximo 160 caracteres");
    }else{
        mostrarSucesso();
    }
}

function validarCep(){
    const inputCep = document.getElementById("cep");
    const msgErro = document.getElementById("msgErroCep");
    const textoErro = document.getElementById("textoErroCep");
    const label = document.getElementById("labelCep");
    let cep = inputCep.value;

    cep = cep.replace(/\D/g, "");
    if (cep.length > 5) {
      cep = cep.substring(0, 5) + "-" + cep.substring(5, 8);
    }
    inputCep.value = cep;

    msgErro.classList.remove("sucesso", "erro");
    inputCep.classList.remove("input-erro", "input-sucesso");
    msgErro.style.display = "inline-flex";

    const mostrarErro = (msg) =>{
        textoErro.textContent = msg;
        msgErro.classList.add("erro");
        label.style.color = "red";
        inputCep.classList.add("input-erro");
    };

    const mostrarSucesso = ()=>{
        textoErro.textContent = "OK";
        msgErro.classList.add("sucesso");
        label.style.color = "green";
        inputCep.classList.add("input-sucesso");
    };

    if(cep === ""){
        mostrarErro("Campo obrigatório");
    } else if(cep.length < 9){
        mostrarErro("CEP incompleto");
    } else if(!/^\d{5}-\d{3}$/.test(cep)){
        mostrarErro("CEP inválido");
    } else{
        mostrarSucesso();
    }
}

// Função para validar número
function validaNumero(){
    const input = document.getElementById('numero');
    const numero = input.value.trim();
    const msgErro = document.getElementById('msgErroNumero');
    const textoErro = document.getElementById('textoErroNumero');
    const label = document.getElementById('labelNumero');

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

    if(numero === ""){
        mostrarErro("Campo obrigatório");
    }else if(!/^\d+$/.test(numero)){
        mostrarErro("Apenas números");
    }else{
        mostrarSucesso();
    }
}

// Busca endereço e adiciona o número
async function buscarEnderecoPorCep(){
  const cepInput = document.getElementById('cep');
  const enderecoInput = document.getElementById('endereco');
  const numeroInput = document.getElementById('numero');
  let cep = cepInput.value.replace(/\D/g, '');

  if (cep.length !== 8) return;

  try {
    const resposta = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
    const dados = await resposta.json();

    if (dados.erro) {
        document.getElementById("textoErroCep").textContent = "CEP não encontrado";
        document.getElementById("msgErroCep").classList.remove('sucesso');
        document.getElementById("msgErroCep").classList.add("erro");

        enderecoInput.value = "";
        enderecoInput.dataset.base = "";
        return;
    }

    // Salva o endereço base (sem número)
    const enderecoBase = `${dados.logradouro}, ${dados.bairro}, ${dados.localidade} - ${dados.uf}`;
    enderecoInput.dataset.base = enderecoBase;

    // Atualiza o endereço considerando o número atual
    atualizarEnderecoComNumero();

  } catch (error) {
    console.error("Erro ao buscar o CEP:", error);
  }
}

// Atualiza o campo endereço com o número atual
function atualizarEnderecoComNumero() {
  const enderecoInput = document.getElementById('endereco');
  const numeroInput = document.getElementById('numero');
  const base = enderecoInput.dataset.base || "";
  const numero = numeroInput.value.trim();

  if (!base) return; // Se ainda não buscou o CEP, não faz nada

  if (numero) {
    enderecoInput.value = `${base.split(',')[0]}, ${numero}, ${base.split(',').slice(1).join(',')}`;
  } else {
    enderecoInput.value = base;
  }

  validaEndereco();
}

// Atualiza o endereço sempre que o número mudar
document.getElementById('numero').addEventListener('input', atualizarEnderecoComNumero);

//=============================================================================================================
//Validações do senhas do usúario

function validaSenha(){
    const input = document.getElementById('senha');
    const senha = input.value.trim();
    const msgErro = document.getElementById('msgErroSenha');
    const textoErro = document.getElementById('textoErroSenha');
    const label = document.getElementById('labelSenha');

    const regexMaiusculo = /[A-Z]/;
    const regexEspecial = /[!@#$%^&*(),.?":{}|<>]/;
    const regexNumero = /\d/;

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

    if (senha === ""){
        mostrarErro("Campo é obrigatrio");
    }else if (senha.length < 8){
        mostrarErro("Mínimo 8 caracteres");
    }else if (senha.length > 160){
        mostrarErro("Máximo 160 caracteres");
    }else if (!regexMaiusculo.test(senha)){
        mostrarErro("Deve conter letra maiúscula");
    }else if (!regexEspecial.test(senha)){
        mostrarErro("Deve conter caractere especial");
    }else if (!regexNumero.test(senha)){
        mostrarErro("Deve conter número");
    }else {
        mostrarSucesso();
    }

    // Chama automaticamente a validação da confirmação, se já houver algo digitado
    const confirInput = document.getElementById('confir_senha');
    if(confirInput.value.trim() !== ""){
        confirmarSenha();
    }
}

function confirmarSenha(){
    const input = document.getElementById('confir_senha');
    const confirSenha = input.value.trim();
    const senha = document.getElementById('senha').value.trim();

    const msgErro = document.getElementById('msgErroConfirSenha');
    const textoErro = document.getElementById('textoErroConfir_senha');
    const label = document.getElementById('labelConfirSenha');

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

    if(confirSenha === ""){
        mostrarErro("Campo é obrigatrio");
    }else if(confirSenha !== senha){
        mostrarErro("As senhas não coincidem");
    }else{
        mostrarSucesso();
    }
}
//=============================================================================================================
// Função de validação do formulário de cadastro
function validarFormulario() {
    let valid = true;

    if(!validaNome()){
        valid = false;
    }
    if(!validaEmail()){
        valid = false;
    }
    if(!validaTelefone()){
        valid = false;
    }
    if(!validaCpf()){
        valid = false;
    }
    if(!validarCep()){
        valid = false;
    }
    if(!validaNumero()){
        valid = false;
    }
    if(!validaEndereco()){
        valid = false;
    }
    if(!validaSenha()){
        valid = false;
    }
    if(!confirmarSenha()){
        valid = false;
    }
    // Se algum campo for inválido, o formulário não será enviado
    if(!valid) {
        return false; // Impede o envio do formulário
    }
    // Se tudo estiver correto, o formulário será enviado
    return true;
   
}
