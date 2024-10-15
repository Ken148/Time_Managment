<?php
require_once 'database.php'; 
include_once 'session.php';  
require_once 'vendor/autoload.php'; 

error_reporting(E_ALL);
ini_set('display_errors', 1);

$client = new Google_Client();
$client->setClientId(''); 
$client->setClientSecret('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'); 
$client->setRedirectUri('https://time.ken-turk.eu/callback.php'); 
$client->addScope("email");
$client->addScope("profile");


if (isset($_GET['code'])) {

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);

        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        $email = $google_account_info->email;
        $name = $google_account_info->name;

        $stmt = $link->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            
            $row = $result->fetch_assoc();
            $_SESSION['log'] = true;
            $_SESSION['user_id'] = $row['id'];
            header("Location: main.php");
            exit();
        } else {

            $stmt = $link->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
            $stmt->bind_param("ss", $name, $email);
            if ($stmt->execute()) {
                $_SESSION['log'] = true;
                $_SESSION['user_id'] = $link->insert_id;
                header("Location: main.php");
                exit();
            } else {
                echo 'Error creating new user: ' . htmlspecialchars($stmt->error);
                exit();
            }
        }
    } else {
        echo 'Error fetching access token: ' . htmlspecialchars($token['error']);
        exit();
    }
} else {
    echo 'Error: No code parameter found in the URL';
    exit();
}
?>