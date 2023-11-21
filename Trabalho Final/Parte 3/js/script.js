function searchItems() {
    var input = document.getElementById("searchInput").value.toLowerCase(); // Obtenha o valor da entrada de pesquisa em letras minúsculas
    var items = document.querySelectorAll(".img"); // Selecione todos os elementos .img

    items.forEach(function(item) {
        var searchValue = item.getAttribute("data-search").toLowerCase(); // Obtenha o valor de data-search do elemento em letras minúsculas
        if (input === "" || searchValue.includes(input)) {
            item.style.display = "relative"; // Mostrar o elemento se houver correspondência ou se o campo de pesquisa estiver vazio
        } else {
            item.style.display = "none"; // Ocultar o elemento se não houver correspondência
        }
    });
}



function searchUsers() {
    const input = document.getElementById('user-search').value.toLowerCase();
    const usersList = document.getElementById('users-list');
    const users = usersList.getElementsByClassName('user-item');

    for (let i = 0; i < users.length; i++) {
        const userName = users[i].getElementsByClassName('user-name')[0];
        const name = userName.textContent.toLowerCase();

        if (name.includes(input)) {
            users[i].style.display = 'block';
        } else {
            users[i].style.display = 'none';
        }
    }
}