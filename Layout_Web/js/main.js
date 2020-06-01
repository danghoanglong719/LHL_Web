let carts = document.querySelectorAll(".add-cart");

let product = [{
    name: "Sản Phẩm 1",
    tag: "arboard24-1580985424",
    price: 100000,
    inCart: 0

}, {
    name: "Sản Phẩm 2",
    tag: "5-sofa-1587982024",
    price: 1000000,
    inCart: 0
}, {
    name: "Sản Phẩm 3",
    tag: "arboard24-1580985424",
    price: 100000000,
    inCart: 0
}]
for (let i = 0; i < carts.length; i++) {
    carts[i].addEventListener('click', () => {
        cartNumbers(product[i]);
        totalCost(product[i]);
    })

}

function onLoadCartsNumbers() {
    let productNumbers = localStorage.getItem('cartNumbers');
    if (productNumbers) {
        document.querySelector('.cart p').textContent = productNumbers;
    }
}


function cartNumbers(product) {

    let productNumbers = localStorage.getItem('cartNumbers');


    productNumbers = parseInt(productNumbers);

    if (productNumbers) {
        localStorage.setItem('cartNumbers', productNumbers + 1);
        document.querySelector('.cart p').textContent = productNumbers + 1;
    } else {
        localStorage.setItem('cartNumbers', 1);
        document.querySelector('.cart p').textContent = 1;
    }

    setItems(product);
}

function setItems(product) {
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    if (cartItems != null) {
        if (cartItems[product.tag] == undefined) {
            cartItems = {
                ...cartItems,
                [product.tag]: product
            }
        }

        cartItems[product.tag].inCart += 1;
    } else {
        product.inCart = 1;
        cartItems = {
            [product.tag]: product
        }
    }



    localStorage.setItem("productsInCart", JSON.stringify(cartItems));
}


function totalCost(product) {
    // console.log("sadasd", product.tien);
    let cartCost = localStorage.getItem('totalCost');

    if (cartCost != null) {
        cartCost = parseInt(cartCost);
        localStorage.setItem("totalCost", cartCost + product.price);
    } else {
        localStorage.setItem("totalCost", product.price);
    }
}

function displayCart() {
    let cartItems = localStorage.getItem("productsInCart");
    cartItems = JSON.parse(cartItems);
    console.log(cartItems);
    let productContainer = document.querySelector(".products");

    console.log(cartItems);
    if (cartItems && productContainer) {
        productContainer.innerHTML = '';
        Object.values(cartItems).map(item => {
            productContainer.innerHTML += `
                            <div class="product">
                                <i class="far fa-times-circle"></i>
                                <img src="./img/${item.tag}.jpg">
                                <span>${item.name}</span>
                            </div>
                            <div class="price">${item.price}Đ</div>
                            <div class="quantity"><i class="fas fa-arrow-left"></i>
                                <span>${item.inCart}</span>
                                <i class="fas fa-arrow-right"></i>
                                <div class="total">
                                    ${item.inCart * item.price}Đ
                                </div>
                            </div>
                            `
        });
        productContainer.innerHTML += `

                    <div class="box">
                            <h4 class="box1">total</h4>
                            <h4 class="box2">${cartCost}Đ</h4>
                     
                    </div>
                    `;

    }

}

onLoadCartsNumbers();
displayCart();