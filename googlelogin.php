<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();
//  include('../inc/header.php'); 
require 'vendor/autoload.php'; // Include the OAuth library

// Set up the Google Client
$client = new Google_Client();
$client->setAuthConfig('client_secret.json');
$client->setRedirectUri('https://www.mitdevelop.com/rangbhoomi/google-login/callback.php');
$client->addScope('email');

// If the user is not authenticated, redirect them to Google's login page
if (!isset($_GET['code'])) {
    $authUrl = $client->createAuthUrl();
    header("Location: $authUrl");
    exit;
}

// Redirect to the callback page after successful login
header("Location: callback.php?code={$_GET['code']}");
exit;
?>
