let botSums = 0;    
let mySums = 0;

let botASCards = 0;   
let myASCards = 0;

let cards;             
let isCanHit = true;  

//menghubugkan html dan js
const startGameButton = document.getElementById("btn-start-game");
const takeCardButton = document.getElementById("btn-take");
const holdCardsButton = document.getElementById("btn-hold");

// menampilkan jumlah poin dan uang pemain 
const mySumsElement = document.getElementsByClassName("my-sums")[0];
const myCardsElement = document.getElementsByClassName("my-cards")[0];
const myMoney = document.getElementById("my-money");
const inputMoney = document.getElementsByTagName("input")[0];


//dan jumlah poin bot
const botSumsElement = document.getElementsByClassName("bot-sums")[0];
const botCardsElement = document.getElementsByClassName("bot-cards")[0];

const resultElement = document.getElementById("result");

window.onload = () => {
    buildUserCards();     
    shuffleCards();     
    takeCardButton.setAttribute("disabled", true);
    holdCardsButton.setAttribute("disabled", true);
};

// fungsi untuk daftar kartu
function buildUserCards() {
    let cardTypes = ["H", "B", "S", "K"];
    let cardValues = [
        "A",
        "2",
        "3",
        "4",
        "5",
        "6",
        "7",
        "8",
        "9",
        "10",
        "K",
        "Q",
        "J",
    ];

    cards = [];
    for (let i = 0; i < cardTypes.length; i++) {          
        for (let j = 0; j < cardValues.length; j++) {     
            cards.push(cardValues[j] + "-" + cardTypes[i]);      
        }
    }
}

// fungsi untuk mengacak kartu
function shuffleCards() {
    for (let i = 0; i < cards.length; i++) {
        let randomNum = Math.floor(Math.random() * cards.length);
        let temp = cards[i];
        cards[i] = cards[randomNum];
        cards[randomNum] = temp;
    }
}

// START BUTTON
startGameButton.addEventListener("click", function () {
    let money = inputMoney.value
    if (money === "" || isNaN(money) ) {
        alert("Set your bet first");
        return;
    } else if (money < 100) {
        alert("Minimum bet is 100")
        return;
    } 
    else {
        if (myMoney.innerText == 0) {
            alert("Your money is Rp. 0, Please Your Money")
        } else if (money > myMoney.innerText){
            alert("Your Money is less than your bet");
        }

    }
    if (startGameButton.textContent === "TRY AGAIN") {
        botSums = 0;
        mySums = 0;
        botASCards = 0;
        myASCards = 0;
        isCanHit = true;

        const allCardsImage = document.querySelectorAll("img");    
        for (let i = 0; i < allCardsImage.length; i++) {           
            allCardsImage[i].remove();   
        }

        //cardbot
        let cardImg = document.createElement("img");
        cardImg.src = "assets/cards/BACK.png";
        cardImg.className = "hidden-card";
        botCardsElement.append(cardImg);                        

        //mengisi ulang krtu
        buildUserCards();
        shuffleCards();
    }

    //tombol diaktifkan 
    takeCardButton.disabled = false;
    holdCardsButton.disabled = false;
    //button start diubah ke try again
    startGameButton.textContent = "TRY AGAIN";
    startGameButton.setAttribute("disabled", true);

    for (let i = 0; i < 2; i++) {
        let cardImg = document.createElement("img");
        let card = cards.pop();                             
        cardImg.src = `assets/cards/${card}.png`;
        mySums += getValueOfCard(card);                     
        myASCards += checkASCard(card);                    
        mySumsElement.textContent = mySums;                 
        myCardsElement.append(cardImg);                     
    }
});

// TAKE A CARD BUTTON
takeCardButton.addEventListener("click", function () {
    if (!isCanHit) return;                         

    //menampilkan semua kartu yang telah dipilih
    let cardImg = document.createElement("img");
    let card = cards.pop();
    cardImg.src = `assets/cards/${card}.png`;
    mySums += getValueOfCard(card);
    myASCards += checkASCard(card);
    mySumsElement.textContent = mySums;
    myCardsElement.append(cardImg);

    //Jika total poin pemain melebihi 21, maka pemain tidak dapat mengambil kartu lagi
    if (reduceASCardValue(mySums, myASCards) > 21) isCanHit = false;

    //Jika total poin pemain melebihi 21 (tanpa memperhitungkan nilai As), maka pemain telah "bust" (kalah)
    if (mySums > 21) {
        takeCardButton.disabled = true;
        holdCardsButton.disabled = true;
        startGameButton.disabled = false;
        myMoney.textContent -= inputMoney.value;            
        alert("kalah")
    }
});

// HOLD CARD BUTTON
holdCardsButton.addEventListener("click", function () {
    // menunda eksekusi kode selama 1 detik sebelum kode tersebut dijalankan dan menghapus krtu sebelumnya
    setTimeout(() => {
        document.getElementsByClassName("hidden-card")[0].remove();
    }, 1000);

    const addBotCards = () => {
        setTimeout(() => {
            //menampilkan semua kartu yang telah dipilih
            let cardImg = document.createElement("img");
            let card = cards.pop();
            cardImg.src = `assets/cards/${card}.png`;
            botSums += getValueOfCard(card);
            botASCards += checkASCard(card);
            botCardsElement.append(cardImg);
            botSumsElement.textContent = botSums;

            if (botSums < 18) {
                addBotCards();
            } else {
                botSums = reduceASCardValue(botSums, botASCards);
                mySums = reduceASCardValue(mySums, myASCards);
                isCanHit = false;

                let message = "";
                if (mySums > 21 || mySums % 22 < botSums % 22) {
                    message = "KALAH!";
                    myMoney.textContent -= inputMoney.value;
                } else if (botSums > 21 || mySums % 22 > botSums % 22) {
                    message = "MENANG!!!";
                    myMoney.textContent = inputMoney.value * 2 * 3;
                } else if (mySums === botSums) message = "SERI";

                alert(message);
                startGameButton.disabled = false;
                takeCardButton.disabled = true;
                holdCardsButton.disabled = true;
            }
        }, 1000);
    };

    addBotCards();
});

//mendapatkan nilai dari card
function getValueOfCard(card) {
    let cardDetail = card.split("-");
    let value = cardDetail[0];

    if (isNaN(value)) {
        if (value == "A") return 11;
        else return 10;
    }

    //mengembalikan nilai numerik setelah mengonversi value menjadi angka dengan menggunakan parseInt.
    return parseInt(value);
}

//memeriksa apakah sebuah kartu adalah kartu As
function checkASCard(card) {
    if (card[0] == "A") return 1;
    else return 0;
}

//mengurangi nilai kartu As
function reduceASCardValue(sums, asCards) {
    while (sums > 21 && asCards > 0) {
        sums -= 10;
        asCards -= 1;
    }
    return sums;
}