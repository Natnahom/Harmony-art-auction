<?php
// Assuming you have the $email variable set somewhere before this
if (isset($_POST['email'])) {
    // Configure the SMTP settings
    $host = "smtp.gmail.com";
    $port = 587;
    $username = "";
    $password = "";

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = $host;
        $mail->SMTPAuth = true;
        $mail->Username = $username;
        $mail->Password = $password;
        $mail->SMTPSecure = 'tls';
        $mail->Port = $port;

        // Recipients
        $mail->setFrom($username, 'Sender Name');
        $mail->addAddress($_POST['email'], 'Recipient Name');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Subject of the email';
        $mail->Body = 'Body of the email';

        // Send email
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
} else {
    echo 'The $email variable is not defined.';
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