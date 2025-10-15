

function validaNomeanimal(){
    const input = document.getElementById('nome_pet');
    const nome_pet = input.value.trim();
    const label = document.getElementById('labelNome');

    const regex = /^[A-Za-zÀ-ÿ\s]+$/;


    input.classList.remove('input-erro', 'input-sucesso');
 
    function mostrarErro(){
        label.style.color = "red";
        input.classList.add('input-erro-procurados');
    }

    function mostrarSucesso(){
        label.style.color = "green";
        input.classList.add('input-sucesso-procurados');
    }

    if (nome_pet == "" ){
        mostrarErro();
    }
    else if (nome_pet.length < 2 ){
        mostrarErro();
    }
    else if (nome_pet.length > 30){
        mostrarErro();
    }
    else{
        mostrarSucesso();
    }
}

function validaRaca(){
    const input_raca = document.getElementById('raca');
    input_raca = input.value.trim();
    const labelRaca = document.getElementById('labelRaca');

    input_raca.classList.remove('input-erro', 'input-sucesso');
  
    function mostrarErro(){
        labelRaca.style.color = "red";
        input_raca.classList.add('input-erro-procurados');
    }

    function mostrarSucesso(){
        labelRaca.style.color = "green";
        input_raca.classList.add('input-sucesso-procurados');
    }

    if(input_raca == ""){
        mostrarErro();
    }
    else if (input_raca.length < 3){
        mostrarErro();
    }
    else if (input_raca.length > 30){
        mostrarErro();
    }
    else{
        mostrarSucesso();
    }
}

function validaIdade(){

 const input_idade = document.getElementById('idade_animal');
 input_idade = input.value.trim();
 const label_idade = document.getElementById('labelnumero');

 input_idade.classList.remove('input-erro', 'input-sucesso');

 function mostrarErro(){
    label_idade.style.color = "red";
    input_idade.classList.add('input-erro-procurados');
}

function mostrarSucesso(){
    label_idade.style.color = "green";
    input_idade.classList.add('input-sucesso-procurados');
}

if (input_idade == ""){
    mostrarErro();
}
else{
    mostrarSucesso
}

}

function validaUltimaInformacao(){
const input_informacao = document.getElementById('ultima_informacao');
input_informacao = input.value.trim();
const label_informacao = document.getElementById('label_informacao');

const regex = /^[A-Za-zÀ-ÿ\s]+$/;


input.classList.remove('input-erro', 'input-sucesso');
 
function mostrarErro(){
    label.style.color = "red";
    input.classList.add('input-erro-procurados');
}

function mostrarSucesso(){
    label.style.color = "green";
    input.classList.add('input-sucesso-procurados');
}

if (input_informacao = "" ){
    mostrarErro();
}
else if (input_informacao.length < 5 ){
    mostrarErro();
}
else if (input_informacao.length > 255){
    mostrarErro();
}
else{
    mostrarSucesso();
}

}