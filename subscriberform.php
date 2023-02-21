<?php
if(isset($_POST['submit'])) {
    $mailto = "aaminnnaa@gmail.com";  //My email address
    //getting customer data
    $name = $_POST['name']; //getting customer name
    $fromEmail = $_POST['email']; //getting customer email
    $phone = $_POST['tel']; //getting customer Phone number
    $subject = $_POST['subject']; //getting subject line from client
    $subject2 = "Your message have been successfully sent!"; // For customer confirmation

    //Email body I will receive
    $message = "Name: " . $name . "\n"
        . "Number: " . $phone . "\n\n"
        . "Message: " . "\n" . $_POST['message'];

    //Message for client confirmation
    $message2 = "Dear " . $name . ",\n"
        . "Thank you for contacting me. I will get back to you shortly!\n\n"
        . "You submitted the following message: \n" . $_POST['message'] . "\n\n"
        . "Regards,\n" . "- Amina Anna";

    //Email headers
    $headers = "From: " . $fromEmail . "\r\n" .
        "Reply-To: " . $fromEmail . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

    //PHP mailer function
    $result1 = mail($mailto, $subject, $message, $headers); // This email sent to My address
    $result2 = mail($fromEmail, $subject2, $message2, $headers); //This confirmation email to client

    //Checking if Mails sent successfully
    if ($result1 && $result2) {
        $success = "Your Message was sent Successfully!";
    } else {
        $failed = "Sorry! Message was not sent, Try again Later.";
    }

    // Debugging: check the values of variables and error messages
    echo "To: " . $mailto . "<br>";
    echo "Subject: " . $subject . "<br>";
    echo "Message: " . $message . "<br>";
    echo "Headers: " . $headers . "<br>";
    echo "Result1: " . $result1 . "<br>";
    echo "Result2: " . $result2 . "<br>";
}
?>