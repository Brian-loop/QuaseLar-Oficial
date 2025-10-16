

function validaNomeAnimal() {

    const input = document.getElementById('nome_pet');
    const nome = input.value.trim();
    const msgErro = document.getElementById('msgErro-procurado');
    const textoErro = document.getElementById('textoErro');
    const label = document.getElementById('labelNome');

    const regex = /^[A-Za-zÀ-ÿ\scons]+$/;

    input.classList.remove('input-erro', 'input-sucesso');
    msgErro.classList.remove('sucesso', 'erro');
    msgErro.style.display = "inline-block";

    function mostrarErro(msg) {
        textoErro.textContent = msg;
        msgErro.classList.add('erro');
        label.style.color = "red";
        input.classList.add('input-erro');
    }
    function mostrarSucesso() {
        label.style.color = "green";
        input.classList.add('input-sucesso');
    }

    if (nome === "") {
        mostrarErro("Campo obrigatório");
    } else if (nome.length < 3) {
        mostrarErro("Mínimo 3 caracteres");
    } else if (nome.length > 20) {
        mostrarErro("Máximo 20 caracteres");
    } else if (!regex.test(nome)) {
        mostrarErro("Apenas letras e espaços");
    } else {
        mostrarSucesso();
    }

}


function validaNumeroIdade() {
    const input = document.getElementById('idade_animal');
    const idade = input.value.trim();
    const msgErro = document.getElementById('msgErro-procurado');
    const textoErro = document.getElementById('textoErro');
    const label = document.getElementById('labelnumero');


    input.classList.remove('input-erro', 'input-sucesso');
    msgErro.classList.remove('sucesso', 'erro');
    msgErro.style.display = "inline-block";

    function mostrarErro(msg) {
        textoErro.textContent = msg;
        msgErro.classList.add('erro');
        label.style.color = "red";
        input.classList.add('input-erro');
    }
    function mostrarSucesso() {
        label.style.color = "green";
        input.classList.add('input-sucesso');
    }

    if (idadeNum === "") {
        mostrarErro("Campo obrigatório");
    } else if (idade === 0) {
        mostrarErro("Coloque uma idade valida");
    }
    else {
        mostrarSucesso();
    }
}


function validaRaca() {
    const input = document.getElementById('raca');
    const raca = input.value.trim();
    const msgErro = document.getElementById('msgErro-procurado');
    const textoErro = document.getElementById('textoErro');
    const label = document.getElementById('labelRaca');

    const regex = /^[A-Za-zÀ-ÿ\scons]+$/;

    input.classList.remove('input-erro', 'input-sucesso');
    msgErro.classList.remove('sucesso', 'erro');
    msgErro.style.display = "inline-block";

    function mostrarErro(msg) {
        textoErro.textContent = msg;
        msgErro.classList.add('erro');
        label.style.color = "red";
        input.classList.add('input-erro');
    }
    function mostrarSucesso() {
        label.style.color = "green";
        input.classList.add('input-sucesso');
    }

    if (raca === "") {
        mostrarErro("Campo obrigatório");
    } else if (raca.length < 3) {
        mostrarErro("Mínimo 3 caracteres");
    } else if (raca.length > 20) {
        mostrarErro("Máximo 20 caracteres");
    } else if (!regex.test(raca)) {
        mostrarErro("Apenas letras e espaços");
    } else {
        mostrarSucesso();
    }

}

function validaUltimaInformacao() {
    const input = document.getElementById('ultima_informacao');
    const informacao = input.value.trim();
    const msgErro = document.getElementById('msgErro-procurado');
    const textoErro = document.getElementById('textoErro');
    const label = document.getElementById('label_informacao');

    const regex = /^[A-Za-zÀ-ÿ\scons]+$/;

    input.classList.remove('input-erro', 'input-sucesso');
    msgErro.classList.remove('sucesso', 'erro');
    msgErro.style.display = "inline-block";

    function mostrarErro(msg) {
        textoErro.textContent = msg;
        msgErro.classList.add('erro');
        label.style.color = "red";
        input.classList.add('input-erro');
    }
    function mostrarSucesso() {
        label.style.color = "green";
        input.classList.add('input-sucesso');
    }

    if (informacao === "") {
        mostrarErro("Campo obrigatório");
    } else if (informacao.length < 5) {
        mostrarErro("Mínimo 5 caracteres");
    } else if (informacao.length > 255) {
        mostrarErro("Máximo 255 caracteres");
    } else if (!regex.test(informacao)) {
        mostrarErro("Apenas letras e espaços");
    } else {
        mostrarSucesso();
    }

}


function validaSexo() {
    const select = document.getElementById('sexo')
    const sexo = select.value.trim();
    const msgErro = document.getElementById('msgErro-procurado');
    const textoErro = document.getElementById('textoErro');
    const label = document.getElementById('labelSexo');


    select.classList.remove('input-erro', 'input-sucesso');
    msgErro.classList.remove('sucesso', 'erro');
    msgErro.style.display = "inline-block";

    function mostrarErro(msg) {
        textoErro.textContent = msg;
        msgErro.classList.add('erro');
        label.style.color = "red";
        select.classList.add('input-erro');
    }
    function mostrarSucesso() {
        label.style.color = "green";
        select.classList.add('input-sucesso');
    }

    if (sexo === "") {
        mostrarErro("Campo obrigatório");
    } else {
        mostrarSucesso();
    }

}

function validaEspecie() {
    const select = document.getElementById('especie');
    const especie = select.value.trim();
    const msgErro = document.getElementById('msgErro-procurado');
    const textoErro = document.getElementById('textoErro');
    const label = document.getElementById('labelEspecie');


    select.classList.remove('input-erro', 'input-sucesso');
    msgErro.classList.remove('sucesso', 'erro');
    msgErro.style.display = "inline-block";

    function mostrarErro(msg) {
        textoErro.textContent = msg;
        msgErro.classList.add('erro');
        label.style.color = "red";
        select.classList.add('input-erro');
    }
    function mostrarSucesso() {
        label.style.color = "green";
        select.classList.add('input-sucesso');
    }

    if (especie === "") {
        mostrarErro("Campo obrigatório");
    } else {
        mostrarSucesso();
    }
}

function validaIdadeTipo()
{
    const select = Document.getElementById('idade_tipo');
    const idade_tipo = select.value.trim();
    const msgErro = document.getElementById('msgErro-procurado');
    const textoErro = document.getElementById('textoErro');
    const label = document.getElementById('labelnumero');


    select.classList.remove('input-erro', 'input-sucesso');
    msgErro.classList.remove('sucesso', 'erro');
    msgErro.style.display = "inline-block";

    function mostrarErro(msg) {
        textoErro.textContent = msg;
        msgErro.classList.add('erro');
        label.style.color = "red";
        select.classList.add('input-erro');
    }
    function mostrarSucesso() {
        label.style.color = "green";
        select.classList.add('input-sucesso');
    }

    if (idade_tipo === "") {
        mostrarErro("Campo obrigatório");
    } else {
        mostrarSucesso();
    }
}

function validaPorte(){
    const select = document.getElementById('porte');
    const porte = select.value.trim();
    const msgErro = document.getElementById('msgErro-procurado');
    const textoErro = document.getElementById('textoErro');
    const label = document.getElementById('labelPorte');


    select.classList.remove('input-erro', 'input-sucesso');
    msgErro.classList.remove('sucesso', 'erro');
    msgErro.style.display = "inline-block";

    function mostrarErro(msg) {
        textoErro.textContent = msg;
        msgErro.classList.add('erro');
        label.style.color = "red";
        select.classList.add('input-erro');
    }
    function mostrarSucesso() {
        label.style.color = "green";
        select.classList.add('input-sucesso');
    }

    if (porte === "") {
        mostrarErro("Campo obrigatório");
    } else {
        mostrarSucesso();
    }
}


