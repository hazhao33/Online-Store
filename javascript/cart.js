/*item in added to Cart database */
var numOfItem = 3;

window.onload = function() {
    createItem();
}
/* use amount of number in cart database to create item div*/
function createItem() {
    /*Check if cart database is empty (true=print message) (false=create item)*/
    if(numOfItem > 1) {
        for(let i=0; i<numOfItem; i++) {
            /*add item to cart page*/
            let item = document.createElement("div");
            item.classList.add("item");
            document.getElementById("cart-container").append(item);
    
            /*add product image to item*/
            let image = document.createElement("div");
            image.classList.add("pimage");
            let img = document.createElement("img");
            img.src = "../photo/apple2.png";
            image.append(img);
    
            /*add product name to item*/
            let name = document.createElement("div");
            name.classList.add("pname");
            let nameText = document.createElement("p");
            nameText.innerHTML += "name";
            name.append(nameText);
    
            /*add product quantity input to item*/
            let quantity = document.createElement("div");
            quantity.classList.add("pquantity");
            let btnQuantity = document.createElement("input");
            btnQuantity.setAttribute('type', 'number');
            btnQuantity.setAttribute('size', 1);
            quantity.append(btnQuantity);
    
            /*add product remove button to item*/
            let remove = document.createElement("div");
            remove.classList.add("premove");
            let btnRemove = document.createElement("button");
            btnRemove.setAttribute('type', 'button');
            btnRemove.innerHTML += "remove item";
            remove.append(btnRemove);
    
            /*add product price to item*/
            let price = document.createElement("div");
            price.classList.add("pprice");
            let priceText = document.createElement("p");
            priceText.innerHTML += "$" + "500";
            price.append(priceText);
    
            /*add new created div to current item*/
            item.append(image);
            item.append(name);
            item.append(quantity);
            item.append(remove);
            item.append(price);
        }
        let checkout = document.createElement("a");
        checkout.setAttribute('href', './checkoutV2.php');
        checkout.innerHTML += "Check Out";
        document.getElementById("checkout-btn").append(checkout);
    }else {
        let emptyMessage = document.createElement("p");
        emptyMessage.classList.add("emptyMessage");
        emptyMessage.innerHTML += "Your ESpace Cart is Empty"
        document.getElementById("cart-container").append(emptyMessage);
    }
}