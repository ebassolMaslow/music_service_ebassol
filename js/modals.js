
var btn2 = document.querySelector('.profile_white');
var blockHiddentwo = document.querySelector('.block-auth');
var btnClosetwo = document.querySelector('.close-img');

var btn3 = document.querySelector('.reset-password');
var blockHiddenthree = document.querySelector('.block-reg');
var btnClosethree = document.querySelector('.div-close-btn-reg');

var btn4 = document.querySelector('.div-entry-form-reg');


function showBlocktwo() {
    blockHiddentwo.classList.add('b-show-two');
}

function hideBlocktwo() {
    blockHiddentwo.classList.remove('b-show-two');
}

function showBlockthree() {
    blockHiddenthree.classList.add('b-show-three');
    blockHiddentwo.classList.remove('b-show-two');
}

function hideBlockthree() {
    blockHiddenthree.classList.remove('b-show-three');
}

function hideBlockfour() {
    blockHiddenthree.classList.remove('b-show-three');
    blockHiddentwo.classList.add('b-show-two');
}

btn2.addEventListener('click', showBlocktwo);
btnClosetwo.addEventListener('click', hideBlocktwo);

btn3.addEventListener('click', showBlockthree);
btnClosethree.addEventListener('click', hideBlockthree);

btn4.addEventListener('click', hideBlockfour);










// Данный код относится к реализации взаимодействия 
// пользователя с формами авторизации 
// и регистрации на веб - странице.

// Сначала определяются переменные btn2, blockHiddentwo,
//     btnClosetwo, btn3, blockHiddenthree, btnClosethree и btn4,
//         которые ссылается на соответствующие элементы страницы.

// Затем определены функции showBlockTwo(), hideBlockTwo(),
//     showBlockThree(), hideBlockThree() и hideBlockFour(),
//         которые добавляют или удаляют CSS - классы, что приводит к отображению или скрытию форм.

// В конце, события клика на элементы страницы
//     (btn2, btnClosetwo, btn3, btnClosethree, btn4) 
// вызывают соответствующие функции showBlockTwo(),
//     hideBlockTwo(), showBlockThree(), hideBlockThree() и hideBlockFour().

//         Итак, данный код реализует
//  функционал отображения и скрытия форм авторизации 
//  и регистрации на странице при помощи обработчиков событий,
//     как правило, чтобы создать лучшую пользовательскую взаимодействие с веб - сайтом.