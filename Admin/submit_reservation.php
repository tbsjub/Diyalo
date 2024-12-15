<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get JSON input from fetch
    $data = json_decode(file_get_contents("php://input"), true);

    // Extract reservation details
    $people = htmlspecialchars($data['people']);
    $date = htmlspecialchars($data['date']);
    $time = htmlspecialchars($data['time']);
    $firstName = htmlspecialchars($data['firstName']);
    $lastName = htmlspecialchars($data['lastName']);
    $email = htmlspecialchars($data['email']);
    $phone = htmlspecialchars($data['phone']);
    $purpose = htmlspecialchars($data['purpose']);

    // Admin email
    $adminEmail = "panthisubash838@gmail.com";

    // Email content for admin
    $adminSubject = "New Table Reservation";
    $adminMessage = "
    New Table Reservation Details:
    Name: $firstName $lastName
    Email: $email
    Phone: $phone
    Number of People: $people
    Date: $date
    Time: $time
    Purpose: $purpose
    ";
    
    $headers = "From: noreply@example.com\r\nReply-To: $email\r\nX-Mailer: PHP/" . phpversion();

    // Send email to admin
    mail($adminEmail, $adminSubject, $adminMessage, $headers);

    // Email content for user
    $userSubject = "Reservation Confirmation";
    $userMessage = "
    Dear $firstName $lastName,

    Thank you for your reservation! Here are your reservation details:

    Number of People: $people
    Date: $date
    Time: $time
    Purpose: $purpose

    We look forward to serving you!

    Best Regards,
    The Restaurant Team
    ";

    // Send confirmation email to user
    mail($email, $userSubject, $userMessage, $headers);

    echo "Reservation confirmed! A verification email has been sent to $email.";
} else {
    echo "Invalid request method!";
}
?>
