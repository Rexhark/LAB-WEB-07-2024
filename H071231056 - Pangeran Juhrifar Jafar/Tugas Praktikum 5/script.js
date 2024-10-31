// Element button navbar
const startGameBtn = document.getElementById('start-game');
const tryAgainBtn = document.getElementById('try-again');
const hitCardBtn = document.getElementById('hit-card');
const holdCardBtn = document.getElementById('hold-card');

// Variables for game logic
let playerSum = 0;
let botSum = 0;
let playerMoney = 5000;
document.getElementById('your-money').innerText = playerMoney;

let playerBet = 0;
let deck = [];
let playerDeck = [];
let botDeck = [];
const playerDeckContainer = document.getElementById('playerDeckContainer');
const botDeckContainer = document.getElementById('botDeckContainer');

// Initialize card values and suits
const suits = ["C", "D", "H", "S"];
const values = [
    { name: "2", value: 2 }, { name: "3", value: 3 }, { name: "4", value: 4 },
    { name: "5", value: 5 }, { name: "6", value: 6 }, { name: "7", value: 7 },
    { name: "8", value: 8 }, { name: "9", value: 9 }, { name: "10", value: 10 },
    { name: "J", value: 10 }, { name: "Q", value: 10 }, { name: "K", value: 10 },
    { name: "A", value: 11 }
];

// Create a deck of cards
const blackJackCards = [];
for (const suit of suits) {
    for (const value of values) {
        blackJackCards.push({
            name: `${value.name}-${suit}`,
            src: `cards/${value.name}-${suit}.png`,
            value: value.value
        });
    }
}

// Shuffle deck function
function shuffle(array) {
  for (let i = array.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
  return array;
}

// Reset game for Try Again button
tryAgainBtn.addEventListener('click', function() {
  resetGame_tryAgain();
});

// Hit card action
hitCardBtn.addEventListener('click', function() {
  addPlayerDeck(getCard());
  if(playerSum > 21){
    showWinModal("You busted! You win! Your money is " + playerMoney);
     tryAgainBtn.classList.remove('blurred');
     hitCardBtn.classList.add('blurred');
     holdCardBtn.classList.add('blurred');
  }
});

// Hold card action
holdCardBtn.addEventListener('click', function() {
  botTurn();
});

// Start game logic
startGameBtn.addEventListener('click', function() {
  startGame();
  tryAgainBtn.classList.add('blurred');
});

// Menambahkan kartu back saat halaman pertama kali dimuat
document.addEventListener('DOMContentLoaded', function() {
  addBotBackCards();
  addPlayerBackCards();
});

function addBotBackCards() {
  // Tambahkan dua kartu back ke botDeckContainer
  const backImg1 = document.createElement('img');
  backImg1.src = 'cards/back.png';
  backImg1.alt = 'backbot';
  backImg1.width = 100;
  backImg1.classList.add('mx-1');
  backImg1.classList.add('swipe-down');
  botDeckContainer.appendChild(backImg1);

  const backImg2 = document.createElement('img');
  backImg2.src = 'cards/back.png';
  backImg2.alt = 'backbot';
  backImg2.width = 100;
  backImg2.classList.add('mx-1');
  backImg2.classList.add('swipe-down');
  botDeckContainer.appendChild(backImg2);
}

function addPlayerBackCards() {
  // Pastikan kartu player ditambahkan ke playerDeckContainer
  const backImg1 = document.createElement('img');
  backImg1.src = 'cards/back.png';
  backImg1.alt = 'backplayer';
  backImg1.width = 100;
  backImg1.classList.add('mx-1');
  backImg1.classList.add('swipe-down');
  playerDeckContainer.appendChild(backImg1);

  const backImg2 = document.createElement('img');
  backImg2.src = 'cards/back.png';
  backImg2.alt = 'backplayer';
  backImg2.width = 100;
  backImg2.classList.add('mx-1');
  backImg2.classList.add('swipe-down');
  playerDeckContainer.appendChild(backImg2);
}


function startGame() {
  const betAmount = parseInt(document.getElementById('bet').value);

  // Pastikan betAmount adalah angka valid dan lebih besar dari 0
  if (isNaN(betAmount) || betAmount <= 100) {
    alert("Please input a valid bet amount!");
    return;
  }

  // Cek apakah player memiliki cukup uang
  if (playerMoney < betAmount) {
    alert("You don't have enough money to place that bet!");
    return;
  }

  // Jika valid, kurangi uang pemain dengan jumlah taruhan
  playerMoney -= betAmount;
  playerBet = betAmount;

  // Reset kolom input
  document.getElementById('bet').value = "";
  
  // Hapus kartu back di playerDeckContainer dan botDeckContainer
  removeBackCards();

  
  // Mulai ulang permainan
  resetGame();
  startTurn();
}

// fungsi untuk menghapus kotak back di playerDeckContainer dan botDeckContainer
function removeBackCards() {
  const backImg1 = playerDeckContainer.querySelector('img[alt="backbot"]');
  if (backImg1) {
    playerDeckContainer.removeChild(backImg1);
  }

  const backImg2 = botDeckContainer.querySelector('img[alt="backplayer"]');
  if (backImg2) {
    botDeckContainer.removeChild(backImg2);
  }
}
function resetGame() {
  // Reset values
  playerSum = 0;
  botSum = 0;

  playerDeck = [];
  botDeck = [];
  deck = shuffle(blackJackCards.slice());

  // Clear card containers
  playerDeckContainer.innerHTML = "";  // Hapus kartu pemain dari tampilan
  botDeckContainer.innerHTML = "";     // Hapus kartu bot dari tampilan

  // Reset sums
  updateSums();

  // Hide Try Again button and show Start Game button
  tryAgainBtn.classList.add('d-none');
  startGameBtn.classList.remove('d-none');
  
  // Blur buttons



  // Add new back cards only if the game is started again
  // Tambahkan kartu kosong (punggung kartu) kembali jika diperlukan saat permainan baru dimulai
}


// fungsi load ulang saat try diklik
function resetGame_tryAgain() {
  // Reset values
  playerSum = 0;
  botSum = 0;

  playerDeck = [];
  botDeck = [];
  deck = shuffle(blackJackCards.slice());

  // Clear card containers
  playerDeckContainer.innerHTML = "";  // Hapus kartu pemain dari tampilan
  botDeckContainer.innerHTML = "";     // Hapus kartu bot dari tampilan

  // Reset sums
  updateSums();

  addBotBackCards();   
  addPlayerBackCards();

  // Hide Try Again button and show Start Game button
  tryAgainBtn.classList.add('d-none');
  startGameBtn.classList.remove('d-none');
  
  // Blur buttons
  hitCardBtn.classList.add('blurred');
  holdCardBtn.classList.add('blurred');

}


function startTurn() {
  startGameBtn.classList.add('d-none');
  tryAgainBtn.classList.remove('d-none');

  hitCardBtn.classList.remove('blurred');
  holdCardBtn.classList.remove('blurred');

  addPlayerDeck(getCard());
  addPlayerDeck(getCard());
  addBotDeck(getCard());
  
  updateSums();
}

function getCard() {
  return deck.pop();
}

function addPlayerDeck(card) {
  playerDeck.push(card);
  playerSum += card.value;
  const cardImg = document.createElement('img');
  cardImg.src = card.src;
  cardImg.alt = card.name;
  cardImg.width = 100;
  cardImg.classList.add('mx-1');
  cardImg.classList.add('swipe-down');
  playerDeckContainer.appendChild(cardImg);
  updateSums();
}

function addBotDeck(card) {
  botDeck.push(card);
  botSum += card.value;
  const cardImg = document.createElement('img');
  cardImg.src = card.src;
  cardImg.alt = card.name;
  cardImg.width = 100;
  cardImg.classList.add('mx-1');
  cardImg.classList.add('swipe-down');
  botDeckContainer.appendChild(cardImg);
  updateSums();

  if (botDeck.length === 1){
    const backImg = document.createElement('img');
    backImg.src = 'cards/back.png';
    backImg.alt = 'back';
    backImg.width = 100;
    backImg.classList.add('mx-1');
    backImg.classList.add('swipe-down');
    botDeckContainer.appendChild(backImg);
  }

  else {
    const backImg = botDeckContainer.querySelector('img[alt="back"]');
    if (backImg) {
      botDeckContainer.removeChild(backImg);
    }
  }
}

function updateSums() {
  document.getElementById('your-sum').innerText = playerSum;
  document.getElementById('sums-bot').innerText = botSum;
  document.getElementById('your-money').innerText = playerMoney;
}

// Fungsi untuk menampilkan modal kemenangan
function showWinModal(message) {
  var winMessageElement = document.getElementById('winMessage');
  winMessageElement.textContent = message;
  var winModal = new bootstrap.Modal(document.getElementById('winModal'));
  winModal.show();


}


function botTurn() {

  const backImg = botDeckContainer.querySelector('img[alt="back"]');
  if (backImg) {
    botDeckContainer.removeChild(backImg);
  }

  while (botSum < 17) {
    addBotDeck(getCard());
    if (botSum > 21) {
      playerMoney += playerBet * 2;
      showWinModal("Bot busted! You win! Your money is " + playerMoney);
      document.getElementById('your-money').innerText = playerMoney;
      return;
  }

  
  } if (botSum > playerSum) {
    showWinModal("Bot wins! Your money is " + playerMoney);
  } else if(playerSum > botSum) {
    showWinModal("You win! Your money is " + playerMoney);
    playerMoney += playerBet * 2;
    document.getElementById('your-money').innerText = playerMoney;
  } else if (playerSum > 21) {
    showWinModal(`You busted! Your money is ${playerMoney}`);
  } else if (playerSum === 21) {
    showWinModal(`Blackjack! You win! Your money is ${playerMoney}`);
  }
  
  else {
    playerMoney += playerBet;
    showWinModal("It's a tie! Bet is returned. Your money is " + playerMoney);
    document.getElementById('your-money').innerText = playerMoney;
  }

  tryAgainBtn.classList.remove('blurred');

  updateSums();
  endGame();
}


function endGame() {
  hitCardBtn.classList.add('blurred');
  holdCardBtn.classList.add('blurred');
  tryAgainBtn.classList.remove('d-none');

  updateSums();
}
