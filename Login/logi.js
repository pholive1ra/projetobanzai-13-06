function validarLogin() {
  // Obtenha os valores dos campos
  var email = document.getElementById('iemail').value;
  var senha = document.getElementById('isenha').value;

  // Recuperar dados do localStorage
  var usuario = JSON.parse(localStorage.getItem('usuario'));

  // Validar credenciais
  if (usuario === null || email !== usuario.email || senha !== usuario.senha) {
    alert("Email ou senha incorretos.");
    return false;
  }

  // Login bem-sucedido
  alert("Login realizado com sucesso!");
  // Redirecionar para a página principal ou outra página desejada
  window.location.href = "../index.html";

  return true;
}

// Adicionar evento de submissão ao formulário
document.getElementById('formulario').addEventListener('submit', function(e) {
  e.preventDefault(); // Evitar que o formulário seja enviado normalmente
  validarLogin();
});