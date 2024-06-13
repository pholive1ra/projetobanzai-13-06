// declaração de váriaveis
let nome = document.querySelector("#nome");
let CPF = document.querySelector("#cpf");
let email = document.querySelector("#email");
let confirmar_email = document.querySelector("confirmar_email");
let senha = document.querySelector("#senha")
let confirmar_senha = document.querySelector("#confirmar_senha");

// Mascará da formatação do CPF
function formatar(mascara, documento) {
  var i = documento.value.length;
  var saida = mascara.substring(0, 1);
  var texto = mascara.substring(i)
  if (texto.substring(0, 1) != saida) {
    documento.value += texto.substring(0, 1);

  }
}

// permitir somente numeros no CPF
function validarCPF(input) {
  if (input.value !== "") { // Verifica se o campo não está vazio
    var regex = /^[0-9.-]+$/;
    if (!regex.test(input.value)) {
      alert("Somente números são permitidos neste campo.");
      input.value = input.value.replace(/[^0-9.-]/g, ''); // Remove todos os caracteres exceto números, hífen e ponto
    }
  }
}

let labelEmail = document.querySelector("#email");
let inputEmail = document.querySelector("#input_email");
let validarEmail = false;

let labelConfirmarEmail = document.querySelector("#confirmar_email");
let inputConfirmarEmail = document.querySelector("#inputconf_email");
let validarConfirmarEmail = false;

// Função para verificar se os emails coincidem
function verificarEmails() {
  if (inputEmail.value != inputConfirmarEmail.value) {
    labelConfirmarEmail.setAttribute('style', 'color: red');
    labelConfirmarEmail.innerHTML = 'Emails não conferem';
    inputConfirmarEmail.setAttribute('style', 'border-color: red');
    validarConfirmarEmail = false;
  } else {
    labelConfirmarEmail.setAttribute('style', 'color: green');
    labelConfirmarEmail.innerHTML = 'Emails conferem';
    inputConfirmarEmail.setAttribute('style', 'border-color: green');
    validarConfirmarEmail = true;
  }
}

// Adicionar ouvinte de evento de tecla para ambos os campos de email
inputEmail.addEventListener('keyup', verificarEmails);
inputConfirmarEmail.addEventListener('keyup', verificarEmails);



// verificação se as senhas coincidem 
let labelSenha = document.querySelector("#senha");
let inputSenha = document.querySelector("#inputsenha");
let validarInputSenha = false;

let labelConfirmarSenha = document.querySelector("#confirmar_senha");
let inputConfirmarSenha = document.querySelector("#confirmar_senha1");
let validarInputConfirmarSenha = false;

function verificarSenhas() {
  if (inputSenha.value != inputConfirmarSenha.value) {
    labelConfirmarSenha.setAttribute('style', 'color: red');
    labelConfirmarSenha.innerHTML = 'Senhas não conferem';
    inputConfirmarSenha.setAttribute('style', 'border-color: red');
    validarInputConfirmarSenha = false;
  } else {
    labelConfirmarSenha.setAttribute('style', 'color: green');
    labelConfirmarSenha.innerHTML = 'Senhas conferem';
    inputConfirmarSenha.setAttribute('style', 'border-color: green');
    validarInputConfirmarSenha = true;
  }
}
inputSenha.addEventListener('keyup', verificarSenhas);
inputConfirmarSenha.addEventListener('keyup', verificarSenhas);

// Função para apagar

// Função para validar e salvar os dados no localStorage
function validarFormulario() {
  // Obtenha os valores dos campos
  var nome = document.getElementById('inome').value;
  var genero = document.querySelector('input[name="gender"]:checked');
  var nomeMae = document.getElementById('nome materno').value;
  var date = document.getElementById('idate').value;
  var num = document.getElementById('inum').value;
  var numfix = document.getElementById('numfix').value;
  var cpf = document.getElementById('icpf').value;
  var cep = document.getElementById('icep').value;
  var email = document.getElementById('iemail').value;
  var senha = document.getElementById('isenha').value;

  // Validar campos (adapte conforme necessário)
  if (nome === "" || genero === null || nomeMae === "" || date === "" || num === "" || numfix === "" || cpf === "" || cep === "" || email === "" || senha === null) {
    alert("Por favor, preencha todos os campos.");
    return false;
  }


}

// Adicionar evento de submissão ao formulário
document.getElementById('formulario').addEventListener('submit', function(e) {
  e.preventDefault(); // Evitar que o formulário seja enviado normalmente
  window.location.href = "../login/login.html";

  if (validarFormulario()) {
    // Limpar o formulário após o cadastro
    document.getElementById('formulario').reset();
  }
});