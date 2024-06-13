<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Name"];
    $phone = $_POST["Phone"];
    $email = $_POST["Email"];
    $message = $_POST["Message"];

    $to = "natnahom12@gmail.com"; // Replace with the email you want to send the message to
    $subject = "New Message from Your Website";
    $body = "Name: $name\nPhone: $phone\nEmail: $email\nMessage: $message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Error sending message.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../resources/css/style3.css">
    <link rel="shortcut icon" type="x-icon" href="../../../resources/images/icon.ico">
    <title>Harmony Art Auction - Contact us</title>
</head>
<body>

    <section class="contact-home">
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="contact-header">
                        <h3>Contact us</h3>
                    </div>
                </div>
                <div class="col-6">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <div class="group">
                            <input type="text" name="Name" class="control" placeholder="Enter name" required>
                        </div>
                        <div class="group">
                            <input type="text" name="Phone" class="control" placeholder="Enter phone number" required>
                        </div>
                        <div class="group">
                                <input type="email" name="Email" class="control" placeholder="Enter email" required>
                            </div>
                            <div class="group">
                               <textarea name="Message" class="control" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                                <div class="group">
                                    <input type="submit" value="Send &rarr;" class="btn btn-default">
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>
</body>
</html>