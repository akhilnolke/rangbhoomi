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

// Exchange the authorization code for an access token
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    // Store the access token securely for future API requests

    // You can now use $accessToken to make API requests on behalf of the user

    // Save user data to the database
    if (isset($token['id_token'])) {
        // Decode the ID token to get user information
        $userData = json_decode(base64_decode(str_replace('_', '/', str_replace('-', '+', explode('.', $token['id_token'])[1]))), true);

        // Extract relevant user data
        $googleId = $userData['sub'];
        $name = $userData['name'];
        $email = $userData['email'];
        // ... add more fields if needed

        // Store user data in the database
        // Replace 'your_db_host', 'your_db_username', 'your_db_password', 'your_db_name', and 'users' with your database details
        $conn = new mysqli('localhost', 'mit_rangbhoomi', '9U*sh^rz?AQX', 'mit_rangbhoomi');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the user already exists in the database by Google ID
        $sql = "SELECT * FROM users WHERE google_id = '$googleId'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            // If the user doesn't exist, insert a new record
            $sql = "INSERT INTO users (google_id, name, email) VALUES ('$googleId', '$name', '$email')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            // If the user already exists, you can update the record or perform any other action as needed
            echo "User already exists";
        }

        $conn->close();
    }
} else {
    echo "Authentication failed!";
}
?>
