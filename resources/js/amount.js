var amount = document.getElementById('amount');
let poductPrice = document.getElementById('productPrice').value;

document.getElementById('amountIncrement').onclick = function() {
    amount.value = parseInt(amount.value) + 1;
    document.getElementById('productPrice').value = document.getElementById('productPrice').value * amount.value;
    document.getElementById('productPriceLabel').innerHTML = document.getElementById('productPrice').value;
}

document.getElementById('amountDecrement').onclick = function() {
    if(amount.value > 1) {
        document.getElementById('productPrice').value = document.getElementById('productPrice').value / amount.value;
        document.getElementById('productPriceLabel').innerHTML = document.getElementById('productPrice').value;
        amount.value = parseInt(amount.value) - 1;
    } else {
        amount.value = 1
        document.getElementById('productPrice').value = poductPrice;
        document.getElementById('productPriceLabel').innerHTML = poductPrice;
    }
}