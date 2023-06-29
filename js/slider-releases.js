let offset1 = 0;

const sliderLine1 = document.querySelector('.slider-releases-line');
var btnNext1 = document.querySelector('.next_button-releases');
var BtnPrew1 = document.querySelector('.prev_button-releases');

function SliderNext1() {
    offset1 = offset1 += 243;
    if (offset1 > 729) {
        offset1 = 0;
    }
    sliderLine1.style.left = -offset1 + 'px';
}

function SliderPrev1() {
    offset1 = offset1 -= 243;
    if (offset1 < 0) {
        offset1 = 729;
    }
    sliderLine1.style.left = -offset1 + 'px';
}

btnNext1.addEventListener('click', SliderNext1);
BtnPrew1.addEventListener('click', SliderPrev1);

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