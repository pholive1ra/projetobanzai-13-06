// Simulando uma lista de usuários (normalmente, isso viria de um banco de dados)
let users = [
    { id: 1, name: "Oobj - Tecnologia da Informação", login: "oobj", email: "nfe@oobj.com.br", perfil: "Administrador", lastLogin: "25/06/2019 15:16:58", status: "Ativo" },
    { id: 2, name: "Administrador", login: "admin", email: "nfe@oobj.com.br", perfil: "Administrador", lastLogin: "25/06/2019 15:16:58", status: "Ativo" }
  ];

  function renderUsers() {
    const tbody = document.getElementById('user-table-body');
    tbody.innerHTML = ''; // Limpa a tabela antes de renderizar novamente
    users.forEach(user => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${user.name}</td>
        <td>${user.login}</td>
        <td>${user.email}</td>
        <td>${user.perfil}</td>
        <td>${user.lastLogin}</td>
        <td>${user.status}</td>
        <td>
          <button onclick="editUser(${user.id})" class="btn-edit">✏️</button>
          <button onclick="deleteUser(${user.id})" class="btn-delete">🗑️</button>
        </td>
      `;
      tbody.appendChild(row);
    });
  }

  function deleteUser(id) {
    if (confirm('Você tem certeza que deseja excluir este usuário?')) {
      users = users.filter(user => user.id !== id);
      renderUsers();
    }
  }

  function editUser(id) {
    alert(`Editar usuário ${id}`); // Placeholder para funcionalidade de edição
  }

  // Renderiza a lista de usuários quando a página carrega
  window.onload = renderUsers;
