let offset3 = 0;

const sliderLine3 = document.querySelector('.slider-categories-line');
var btnNext3 = document.querySelector('.next_button-categories');
var BtnPrew3 = document.querySelector('.prev_button-categories');

function SliderNext3() {
    offset3 = offset3 += 243;
    if (offset3 > 729) {
        offset3 = 0;
    }
    sliderLine3.style.left = -offset3 + 'px';
}

function SliderPrev3() {
    offset3 = offset3 -= 243;
    if (offset3 < 0) {
        offset3 = 729;
    }
    sliderLine3.style.left = -offset3 + 'px';
}

btnNext3.addEventListener('click', SliderNext3);
BtnPrew3.addEventListener('click', SliderPrev3);

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