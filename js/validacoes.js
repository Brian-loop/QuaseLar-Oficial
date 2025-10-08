function validaNome(){
    const nome = document.getElementById('nome').value;
    const msgErroNome = document.getElementById('msgErroNome');
    let labelNome = document.getElementById('labelNome');
    const errorClass = 'input-error';
    

    if(nome === ""){
        msgErroNome.textContent = "Campo não pode estar vazio";
        msgErroNome.style.color = "red";
        labelNome.style.color = "red";
        nome.style.boxShadow = "'5px 5px 10px #fff';"
        document.getElementById("nome").focus();
        
        return false;
    }else if(nome.length < 3){
        msgErroNome.textContent = "Nome não pode ter menos de 3 caracteres";
        msgErroNome.style.color = "red";
        return false;
    }else if(nome.length >60){
        msgErroNome.textContent = "Nome não pode ser maior que 60 caracteres";
        msgErroNome.style.color = "red";
    }
    else{
        msgErroNome.textContent = "OK";
        msgErroNome.style.color = "green";
        return true;
    }
}
