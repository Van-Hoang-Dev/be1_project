let btnMinus = document.querySelector('.minus');
let btnPlus = document.querySelector('.plus');
let inputQuantity = document.querySelector('.qty');
let countQuantity = inputQuantity.getAttribute('value');

btnMinus.addEventListener('click', function () {
    if (countQuantity != 0) {
        countQuantity--;
        inputQuantity.setAttribute('value', countQuantity);
    }
    else {
        inputQuantity.setAttribute('value', 0);
    }
});

btnPlus.addEventListener('click', function () {
    countQuantity++;
    inputQuantity.setAttribute('value', countQuantity);
});