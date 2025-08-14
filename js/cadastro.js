function cadastrarUsuario() {
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;
  
    fetch('../php/cadastro.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ nome, email, senha })
    })
    .then(response => response.json())
    .then(data => alert(data.mensagem))
    .catch(error => console.error('Erro ao cadastrar:', error));
  }
  
  //Confirmar senha
  function cadastrarUsuario() {
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;
    const confirmarSenha = document.getElementById('confirmar_senha').value;
  
    if (senha !== confirmarSenha) {
      alert("As senhas não coincidem!");
      return;
    }
  
    fetch('../php/cadastro.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ nome, email, senha })
    })
    .then(response => response.json())
    .then(data => alert(data.mensagem))
    .catch(error => console.error('Erro ao cadastrar:', error));
  }
  