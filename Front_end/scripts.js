// scripts.js

// Navigation Helper Function
function navigateTo(section) {
    const element = document.getElementById(section);
    if (element) {
        element.scrollIntoView({ behavior: "smooth" });
    }
}

// Add translation logic if needed

let cart = [];

function addToCart(itemName, itemPrice) {
    const item = cart.find(i => i.name === itemName);
    if (item) {
        item.quantity++;
    } else {
        cart.push({ name: itemName, price: itemPrice, quantity: 1 });
    }
    updateCart();
}

function updateCart() {
    const cartItems = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    cartItems.innerHTML = '';
    let total = 0;

    cart.forEach(item => {
        total += item.price * item.quantity;
        cartItems.innerHTML += `
            <div class="cart-item">
                <span>${item.name}</span>
                <span>${item.price} x ${item.quantity}</span>
                <button onclick="changeQuantity('${item.name}', -1)">-</button>
                <button onclick="changeQuantity('${item.name}', 1)">+</button>
            </div>
        `;
    });

    cartTotal.innerHTML = `Total: $${total}`;
}

function changeQuantity(itemName, change) {
    const item = cart.find(i => i.name === itemName);
    if (item) {
        item.quantity += change;
        if (item.quantity <= 0) {
            cart = cart.filter(i => i.name !== itemName);
        }
        updateCart();
    }
}

function checkout() {
    // Checkout logic here
    alert('Proceeding to checkout');
}

function navigateTo(page) {
    window.location.href = page + '.html';
}
let objednavky = {};

function pridatDoObjednavky(id) {
    if (!objednavky[id]) {
        const item = document.querySelector(`.menu-item[data-id="${id}"]`);
        const nazev = item.getAttribute("data-name");
        const cena = parseFloat(item.getAttribute("data-price"));

        objednavky[id] = { nazev, cena, mnozstvi: 1 };
    } else {
        objednavky[id].mnozstvi++;
    }
    aktualizovatObjednavku();
}

function aktualizovatObjednavku() {
    const seznamObjednavek = document.getElementById("objednavka-seznam");
    const celkovaCena = document.getElementById("celkova-cena");

    seznamObjednavek.innerHTML = "";
    let celkem = 0;

    for (const id in objednavky) {
        const objednavka = objednavky[id];
        celkem += objednavka.cena * objednavka.mnozstvi;

        seznamObjednavek.innerHTML += `
            <li>
                ${objednavka.nazev} - ${objednavka.mnozstvi} × ${objednavka.cena} CZK
                <button onclick="zmenitMnozstvi(${id}, -1)">-</button>
                <button onclick="zmenitMnozstvi(${id}, 1)">+</button>
            </li>
        `;
    }

    celkovaCena.textContent = celkem.toFixed(2);
}

function zmenitMnozstvi(id, delta) {
    if (objednavky[id].mnozstvi + delta > 0) {
        objednavky[id].mnozstvi += delta;
    } else {
        delete objednavky[id];
    }
    aktualizovatObjednavku();
}

function zobrazitObjednavku() {
    document.getElementById("objednavka-modal").style.display = "block";
}

function zavritModal() {
    document.getElementById("objednavka-modal").style.display = "none";
}
const events = [
    {
        title: "Speciální události 1",
        details: "Detaily o speciálních událostech 1...",
        image: "event-image1.jpg"
    },
    {
        title: "Speciální události 2",
        details: "Detaily o speciálních událostech 2...",
        image: "event-image2.jpg"
    },
    {
        title: "Speciální události 3",
        details: "Detaily o speciálních událostech 3...",
        image: "event-image3.jpg"
    }
];

let currentEventIndex = 0;

function changeEvent() {
    currentEventIndex = (currentEventIndex + 1) % events.length;
    const event = events[currentEventIndex];
    document.getElementById('event-title').innerText = event.title;
    document.getElementById('event-details').innerText = event.details;
    const eventImage = document.getElementById('event-image');
    eventImage.src = event.image;
    eventImage.alt = event.title;
    eventImage.style.animation = 'none';
    eventImage.offsetHeight; /* trigger reflow */
    eventImage.style.animation = null;
}

setInterval(changeEvent, 5000); // Change event every 5 seconds

function navigateTo(section) {
    // Implement navigation logic here
    console.log(`Navigating to ${section}`);
}