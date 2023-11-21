var tabuleiro;
var board;
var aviso;
var jogador;
//var lin, col;

function inicia() {
  tabuleiro = new Array(3);
  board = document.getElementById('board');
  aviso = document.getElementById('aviso');
  jogador = 1;

  for (let i = 0; i < 3; i++)
    tabuleiro[i] = new Array(3);

  for (let i = 0; i < 3; i++)
    for (let j = 0; j < 3; j++)
      tabuleiro[i][j] = 0;
  exibe();
  aviso.innerHTML = 'Vez do jogador: 1';

}

function exibe() {
  HTML = '<table  cellpadding="10" border="1">';
  for (let i = 0; i < 3; i++) {
    HTML += '<tr>';
    for (let j = 0; j < 3; j++) {
      
        if (tabuleiro[i][j]==0)
        HTML +=
          '<td class="empty" onclick="marcar(' + i + ',' + j + ')">' +
          '</td>';
      

      else if(tabuleiro[i][j]==1)
       HTML +='<td class="jogador1"  > X </td>';
      else
       HTML +='<td class="jogador2" > O </td>';
    }
    HTML += '</tr>';
  }
  HTML += '</table><br />';
  board.innerHTML = HTML

}

/*function jogar()
{
 aviso.innerHTML='Vez do jogador: ' + ((jogador)%2 + 1);
 lin = parseInt(document.getElementById("lin").value)-1;
 col = parseInt(document.getElementById("col").value)-1;

 if(tabuleiro[lin][col]==0)
  if(jogador % 2)
   tabuleiro[lin][col] = 1;
  else
   tabuleiro[lin][col] = -1;
 else{
  aviso.innerHTML='Campo ja foi marcado!'
  jogador--;
 }

 jogador++;
 exibe();
 checa();
}*/

function checa() {
  var soma;
  var empate = true; // Assume que há um empate inicialmente

  //Linhas
  for (let i = 0; i < 3; i++) {
    soma = 0;
    soma = tabuleiro[i][0] + tabuleiro[i][1] + tabuleiro[i][2];

    if (soma == 3 || soma == -3)
      aviso.innerHTML = "Jogador " + ((jogador) % 2 + 1) + " ganhou! Linha " + (i + 1) + " preenchida!";
      empate = false;
    
  }

  //Colunas
  for (let i = 0; i < 3; i++) {
    soma = 0;
    soma = tabuleiro[0][i] + tabuleiro[1][i] + tabuleiro[2][i];

    if (soma == 3 || soma == -3)
      aviso.innerHTML = "Jogador " + ((jogador) % 2 + 1) + " ganhou! Coluna " + (i + 1) + " preenchida!";
      empate = false;
  }

  //Diagonal
  soma = 0;
  soma = tabuleiro[0][0] + tabuleiro[1][1] + tabuleiro[2][2];
  if (soma == 3 || soma == -3)
    aviso.innerHTML = "Jogador " + ((jogador) % 2 + 1) + " ganhou! Diagonal preenchida!";
    empate = false;

  //Diagonal
  soma = 0;
  soma = tabuleiro[0][2] + tabuleiro[1][1] + tabuleiro[2][0];
  if (soma == 3 || soma == -3)
    aviso.innerHTML = "Jogador " + ((jogador) % 2 + 1) + " ganhou! Diagonal preenchida!";
    empate = false;

  if(empate){
    aviso.innerHTML = "Empate, reinicie o jogo.";
  }
}

function marcar(i, j) {

  aviso.innerHTML = 'Vez do jogador: ' + ((jogador) % 2 + 1);

  if (tabuleiro[i][j] === 0) {
    if (jogador % 2) {
      tabuleiro[i][j] = 1;
    } else {
      tabuleiro[i][j] = -1;
    }
  } else {
    aviso.innerHTML = 'Campo já foi marcado!';
    return;
  }

  jogador++;
  exibe();
  checa();
}



function reiniciar() {
  for (let i = 0; i < 3; i++) {
    for (let j = 0; j < 3; j++) {
      tabuleiro[i][j] = 0;
    }
  }
  jogador = 1;
  inicia();
  aviso.innerHTML = 'Jogo reiniciado. Vez do jogador 1.';
}