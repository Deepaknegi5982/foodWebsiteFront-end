<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'negid5982@gmail.com';   // your Gmail
        $mail->Password   = 'APP_PASSWORD_HERE';      // App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Email settings
        $mail->setFrom('negid5982@gmail.com', 'MyOnlineMeal');
        $mail->addAddress('negid5982@gmail.com');

        $mail->Subject = 'New Contact Form Message - MyOnlineMeal';
        $mail->Body =
            "Name: $name\n" .
            "Email: $email\n" .
            "Phone: $phone\n\n" .
            "Message:\n$message";

        $mail->send();
        header("Location: success.html");
        exit;

    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Online Food Delivery Services in India | MyOnlineMeal.com</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" media="screen and (max-width: 1170px)" href="css/phone.css">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Mukta&family=Ubuntu&display=swap"
        rel="stylesheet">
</head>

<body>
    <nav id="navbar">
        <div id="logo">
            <img src="./img/icon-7359529_1280.png" width="50px" height="60px"
                alt="Best Online Food Delivery Services in India">
        </div>
        <ul>
            <li class="item"><a href="#home">Home</a></li>
            <li class="item"><a href="#services-container">Services</a></li>
            <li class="item"><a href="#client-section">Our Clients</a></li>
            <li class="item"><a href="#contact">Contact Us</a></li>
        </ul>
    </nav>

    <section id="home">
        <h1 class="h-primary">Welcome To MyOnlineMeal.com</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, quaerat.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <button class="btn">Order Now</button>
    </section>

    <section id="services-container">
        <h1 class="h-primary center">Our Services</h1>
        <div id="services">
            <div class="box">
                <img src="./img/1.png" alt="">
                <h2 class="h-secondary center">Food Ordering</h2>
                <p class="center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore accusamus
                    exercitationem itaque quasi quia dicta laborum, enim nostrum illo atque? Sit officiis iusto nobis!
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="box">
                <img src="./img/2.png" alt="">
                <h2 class="h-secondary center">Food Catering</h2>
                <p class="center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore accusamus
                    exercitationem itaque quasi quia dicta laborum, enim nostrum illo atque? Sit officiis iusto nobis!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="box">
                <img src="./img/3.png" alt="">
                <h2 class="h-secondary center">Bulk Ordering</h2>
                <p class="center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore accusamus
                    exercitationem itaque quasi quia dicta laborum, enim nostrum illo atque? Sit officiis iusto nobis!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            </div>
        </div>
    </section>

    <section id="client-section">
        <h1 class="h-primary center">Our Clients</h1>
        <div id="clients">
            <div class="client-item">
                <img src="./img/apple.png" alt="Our Client">
            </div>
            <div class="client-item">
                <img src="./img/microsoft-logo-microsoft-icon-transparent-free-png.webp"  alt="Our Client">
            </div>
            <div class="client-item">
                <img src="./img/skype.png"  alt="Our Client">
            </div>
            <div class="client-item">
                <img src="./img/hp.png" alt="Our Client">
            </div>
        </div>
    </section>

    <section id="contact">
        <h1 class="h-primary center">Contact Us</h1>
        <div id="contact-box">
            <form action="index.php" method="POST" id="contactForm">
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input  type="text" name="name" id="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input  type="email" name="email" id="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="phone">phone Number: </label>
                    <input  type="tel" name="phone" id="phone" placeholder="Enter your phone">
                </div>
                <div class="form-group">
                    <label for="message">Message: </label>
                    <textarea name="message" id="message" cols="30" rows="8" required></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" id="submit" value="submit" class="btn">
                </div>
            </form>
        </div>
    </section>

    <footer>
        <div class="center">
            Copyright &copy; www.myOnlineMeal.com. All rights reserved!
        </div>
    </footer>
    <script src="app.js"></script>
</body>


</html>
