<?php
include '../../boot.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];



    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');

    try {
        $stmt->execute(['email' => $email]);

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header("Location:../../dashboard.php");
                exit();
            } else {
                $_SESSION['error'] = 'Incorrect password';
                header('location: ../../index.php');
                exit();
            }
        } else {
            $_SESSION['error'] = 'No account associated with the email';
            header('location: ../../index.php');
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }
}
