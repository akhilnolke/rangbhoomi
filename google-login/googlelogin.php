<?php
require 'vendor/autoload.php'; // Include the OAuth library

// Set up the Google Client
$client = new Google_Client();
$client->setAuthConfig('path/to/your/client_secret.json');
$client->setRedirectUri('https://www.mitdevelop.com/rangbhoomi/callback.php');
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
