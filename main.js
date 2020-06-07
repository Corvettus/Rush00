document.getElementById('accountBtn').addEventListener('click', () => {
  const form = document.getElementById('accountForm');

  if (form.style.display === 'none') {
    form.style.display = 'block';
  } else {
    form.style.display = 'none';
  }
});

document.getElementById('openModal').addEventListener('click', () => {
  document.getElementById('modal').style.display = 'block';
  document.getElementById('accountForm').style.display = 'none';
});

window.onclick = () => {
  if (event.target == document.getElementById('modal'))
    document.getElementById('modal').style.display = 'none';
};
