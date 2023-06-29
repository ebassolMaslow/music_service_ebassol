let offset2 = 0;

const sliderLine2 = document.querySelector('.slider-top-lists-line');
var btnNext2 = document.querySelector('.next_button-top-lists');
var BtnPrew2 = document.querySelector('.prev_button-top-lists');

function SliderNext2() {
    offset2 = offset2 += 243;
    if (offset2 > 729) {
        offset2 = 0;
    }
    sliderLine2.style.left = -offset2+ 'px';
}

function SliderPrev2() {
    offset2 = offset2 -= 243;
    if (offset2 < 0) {
        offset2 = 729;
    }
    sliderLine2.style.left = -offset2 + 'px';
}

btnNext2.addEventListener('click', SliderNext2);
BtnPrew2.addEventListener('click', SliderPrev2);

// Данный код относится к реализации слайдера-карусели
//  на веб-странице, позволяющего
//   перемещаться по списку элементов.

// Определена переменная offset равная 
// 0 и находит соответствующий элемент страницы sliderLine.

// Затем определены функции SliderNext() 
// и SliderPrev(), которые изменяют 
// значение смещения (offset) элемента 
// sliderLine. Функция SliderNext() 
// увеличивает значение offset на 243 пикселя
//  и проверяет, если значение offset больше 729,
//   то переменной offset присваивается значение 0.
//    Функция SliderPrev() уменьшает значение offset
//     на 243 пикселя, и проверяет, если значение 
//     offset меньше 0, то переменной offset 
//     присваивается значение 729. Когда 
//     значение offset изменяется, sliderLine
//      перемещается влево или вправо на
//       соответствующее количество пикселей (изменение значения свойства left).


// В конце, события клика на элементы страницы
// BtnNext и BtnPrew вызывают соответствующие 
// функции SliderNext() и SliderPrev().

// Итак, данный код реализует функционал
//  слайдера-карусели на странице, позволяющего 
//  перемещаться по списку элементов при помощи 
//  двух кнопок, что улучшает пользовательский
//   интерфейс веб-сайта.