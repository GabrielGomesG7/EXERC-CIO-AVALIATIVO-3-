function validarFormulario() {
  const nome = document.querySelector('input[name="nome"]').value;
  const email = document.querySelector('input[name="email"]').value;

  if (!nome || !email) {
    alert("Preencha todos os campos!");
    return false;
  }
  return true;
}
