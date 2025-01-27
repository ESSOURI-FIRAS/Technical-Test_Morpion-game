
const boardElement = document.getElementById('board');
const statusElement = document.getElementById('game-status');
const restartButton = document.getElementById('restart-btn');

//import Echo from "laravel-echo";
//import Pusher from "pusher-js";

console.log('Script loaded!');

let board = Array(9).fill(null); // 3x3 plateau array

const gameId = boardElement.dataset.gameId; // Récupère l'ID de la partie
const currentPlayer1 = boardElement.dataset.currentPlayer; // Récupère l'ID du joueur actuel
console.log(currentPlayer1);
let currentPlayer = 'X';
let isGameActive = true;

/*
// Initialize Laravel Echo with Pusher
const echo = new Echo({
    broadcaster: 'pusher',
    key: 'your-pusher-key',
    cluster: 'your-cluster',
    forceTLS: true
});

 
/*
echo.channel('tic-tac-toe')
   .listen('GameUpdated', (event) => {
        board = event.board;
        currentPlayer = event.currentPlayer;
        isGameActive = event.isGameActive;
        createBoard();
        statusElement.textContent = event.status;
    });
*/


// Fonction pour mettre à jour le plateau
function updateBoard(board) {
    boardElement.innerHTML = '';
    board.forEach((cell, index) => {
        const cellElement = document.createElement('div');
        cellElement.className = 'cell';
        cellElement.textContent = cell || '';
        boardElement.appendChild(cellElement);
    });
}




function createBoard() {
    boardElement.innerHTML = '';
    board.forEach((cell, index) => {
        const cellElement = document.createElement('div');
        cellElement.classList.add('cell');
        if (cell) cellElement.classList.add('taken');
        cellElement.textContent = cell || '';
        cellElement.addEventListener('click', () => handleCellClick(index));
        boardElement.appendChild(cellElement);
    });
}



function handleCellClick(index) {
    

    board[index] = currentPlayer;
    createBoard();
    checkWinner();

    currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
    statusElement.textContent = `Turn of : ${currentPlayer}`;

   
}

function checkWinner() {
    const winningCombinations = [
        [0, 1, 2], [3, 4, 5], [6, 7, 8], // rows
        [0, 3, 6], [1, 4, 7], [2, 5, 8], // columns
        [0, 4, 8], [2, 4, 6]             // diagonals
    ];

    for (const combination of winningCombinations) {
        const [a, b, c] = combination;
        if (board[a] && board[a] === board[b] && board[a] === board[c]) {
            statusElement.textContent = `Player ${board[a]} wins!`;
            isGameActive = false;
            restartButton.classList.remove('d-none');
            return;
        }
    }

    if (!board.includes(null)) {
    /    statusElement.textContent = 'It\'s a draw!';
        isGameActive = false;
        restartButton.classList.remove('d-none');
    }
}

restartButton.addEventListener('click', () => {
    board = Array(9).fill(null);
    currentPlayer = 'X';
    isGameActive = true;
    statusElement.textContent = 'Waiting for you to start ...';
    restartButton.classList.add('d-none');
    createBoard();

    // Notify server to reset the game
    //axios.post('/api/game/reset');
});

document.addEventListener('DOMContentLoaded', () => {
    createBoard();
});