var a_parent = document.querySelectorAll(".a_parent");

a_parent.forEach(function (a_parent_item){
    a_parent_item.addEventListener("click", function (){

        a_parent.forEach(function (a_parent_item){
            a_parent_item.classList.remove("active");
        })
        a_parent_item.classList.add("active");
    })
});

const productName = document.getElementById('productName');
productName.addEventListener('input', () => {
    productName.setAttribute('value', productName.value);
});
const productCode = document.getElementById('productCode');
productCode.addEventListener('input', () => {
    productCode.setAttribute('value', productCode.value);
});
const productStock = document.getElementById('productStock');
productStock.addEventListener('input', () => {
    productStock.setAttribute('value', productStock.value);
});
const regular_price = document.getElementById('regular_price');
regular_price.addEventListener('input', () => {
    regular_price.setAttribute('value', regular_price.value);
});
const selling_price = document.getElementById('selling_price');
selling_price.addEventListener('input', () => {
    selling_price.setAttribute('value', selling_price.value);
});
