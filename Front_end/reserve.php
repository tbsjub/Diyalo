<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .popup {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            display: none;
        }
        .popup-header {
            font-size: 20px;
            margin-bottom: 15px;
            text-align: center;
            font-weight: bold;
        }
        .popup input, .popup select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .popup button {
            width: 100%;
            padding: 10px;
            background: #ff9f43;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .popup button:hover {
            background: #ff6f00;
        }
    </style>
</head>
<>
    <header> <?php include_once 'header.php' ?>
</header>
<?php include_once 'nav.php' ?>
        <h1>Table Reservation</h1>

<!-- First Popup -->
<div class="popup" id="popup1">
    <div class="popup-header">Reserve a Table</div>
    <label for="people">Number of People:</label>
    <select id="people">
        <option value="1">1 person</option>
        <option value="2">2 people</option>
        <option value="3">3 people</option>
        <option value="4">4 people</option>
    </select>
    <label for="date">Select Date:</label>
    <input type="date" id="date" required>
    <label for="time">Select Time:</label>
    <select id="time">
        <option>11:00 am</option>
        <option>12:00 pm</option>
        <option>01:00 pm</option>
        <option>02:00 pm</option>
        <option>03:00 pm</option>
        <option>04:00 pm</option>
    </select>
    <button onclick="nextPopup()">Next</button>
</div>

<!-- Second Popup -->
<div class="popup" id="popup2">
    <div class="popup-header">Enter Your Details</div>
    <input type="text" id="firstName" placeholder="First Name" required>
    <input type="text" id="lastName" placeholder="Last Name" required>
    <input type="email" id="email" placeholder="Email" required>
    <input type="tel" id="phone" placeholder="Phone Number" required>
    <select id="purpose">
        <option value="">Visit Purpose (Optional)</option>
        <option value="business">Business</option>
        <option value="family">Family Gathering</option>
        <option value="casual">Casual</option>
    </select>
    <button onclick="submitReservation()">Submit</button>
</div>

<script>
function nextPopup() {
    if (!document.getElementById('date').value) {
        alert('Please select a date.');
        return;
    }
    document.getElementById('popup1').style.display = 'none';
    document.getElementById('popup2').style.display = 'block';
}

function submitReservation() {
    const data = {
        people: document.getElementById('people').value,
        date: document.getElementById('date').value,
        time: document.getElementById('time').value,
        firstName: document.getElementById('firstName').value,
        lastName: document.getElementById('lastName').value,
        email: document.getElementById('email').value,
        phone: document.getElementById('phone').value,
        purpose: document.getElementById('purpose').value
    };

    fetch('submit_reservation.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams(data)
    })
    .then(response => response.text())
    .then(message => {
        alert(message);
        document.getElementById('popup2').style.display = 'none';
    })
    .catch(error => console.error('Error:', error));
}
</script>

</body>
</html>
