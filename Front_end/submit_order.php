<?php
include '../db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cart'])) {
        $cart = json_decode($_POST['cart'], true);

        if (!empty($cart)) {
            // Insert order details into the database
            $order_query = "INSERT INTO orders (order_date) VALUES (NOW())";
            if ($conn->query($order_query) === TRUE) {
                $order_id = $conn->insert_id;

                foreach ($cart as $item) {
                    $food_id = $item['id'];
                    $quantity = $item['quantity'];
                    $price = $item['price'];

                    $order_item_query = "INSERT INTO cart (id	,user_id,	food_name,	quantity,	price,	total) VALUES ('$order_id', '$food_id', '$quantity', '$price')";
                    $conn->query($order_item_query);
                }

                echo "Order placed successfully!";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Cart is empty!";
        }
    } else {
        echo "Cart data not received!";
    }
} else {
    echo "Invalid request method!";
}

$conn->close();
 include_once 'footer.php'; 
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $full_name = htmlspecialchars($_POST['full_name']);
    $address = htmlspecialchars($_POST['address']);
    $mobile_number = htmlspecialchars($_POST['mobile_number']);
    $email = htmlspecialchars($_POST['email']);

    // Admin email to receive the form submission
    $to = "panthisubash838@gmail.com"; // Replace with your email

    // Subject and message for the admin
    $subject = "New Pick-Up Order Submission";
    $admin_message = "You have received a new order for pick-up from $full_name.\n\nDetails:\n";
    $admin_message .= "Name: $full_name\n";
    $admin_message .= "Address: $address\n";
    $admin_message .= "Mobile Number: $mobile_number\n";
    $admin_message .= "Email: $email\n";

    // Headers for the email
    $headers = "From: noreply@example.com" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Send email to the admin
    mail($to, $subject, $admin_message, $headers);

    // Auto-reply to the user
    $auto_reply_subject = "Thank you for your order!";
    $auto_reply_message = "Hello $full_name,\n\nThank you for submitting your pick-up details. We have received your order and will contact you shortly for the pick-up details.\n\nBest regards,\nThe Team";

    // Send the auto-reply email
    mail($email, $auto_reply_subject, $auto_reply_message, $headers);

    // Confirmation message to the user
    echo "Thank you for your order! We will get back to you shortly.";
}
?>