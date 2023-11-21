function searchUsers() {
    var userInput = document.getElementById('user-search').value;

    fetch('user.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'user_id=' + encodeURIComponent(userInput),
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Erro na requisição (${response.status}): ${response.statusText}`);
            }

            return response.text();
        })
        .then(responseText => {
            console.log('Raw response data:', responseText);

            try {
                const data = JSON.parse(responseText);
                console.log('Parsed JSON data:', data);

                var searchResultsDiv = document.getElementById('search-results');
                searchResultsDiv.innerHTML = '';

                if (data && !data.error) {
                    var userData = data;
                    var imagemURL = 'img/incone-medico.png';

                    if (userData.dr_dra.includes('Drª')) {
                        imagemURL = 'img/incone-medica.png';
                    }

                    searchResultsDiv.innerHTML = '<p>Especialidade: ' + userData.especialidade + '</p>' +
                        '<p>Dr/Dra: ' + userData.dr_dra + '</p>' +
                        '<p>Nome: ' + userData.nome + ' ' + userData.sobrenome + '</p>' +
                        '<img src="' + imagemURL + '" alt="Imagem do médico">' + '</p>';
                } else {
                    searchResultsDiv.innerHTML = '<p>' + (data && data.error ? data.error : 'Erro ao buscar usuário.') + '</p>';
                }
            } catch (error) {
                console.error('Error parsing JSON:', error);
            }
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });
}

document.getElementById('search-form').addEventListener('submit', function (e) {
    e.preventDefault();
    searchUsers();
});
