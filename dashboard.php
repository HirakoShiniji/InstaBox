
<html>
<head>
    <style>
    .menu{
        background-color: white;
        height: 25pt;
        width: 100%;
        
    }
    .menu-title{
        font-size: 19pt;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: rgba(170, 41, 245, 0.87),rgba(187, 96, 240, 0.87),rgba(193, 112, 240, 0.87);
    }
    </style>
</head>
<body>
    <div class="menu" type="menu">
        <h2 type="menu-title" class="menu-title">InstaBox - Dashboard</h2>
    </div>
</body>
<?php
session_start();
// include here config.php
require_once('config.php');

// include here function.php
require_once('function.php');

// Instagram passes a parameter 'code' in the Redirect Url
if (isset($_GET['code'])) {
    try {
        $instagram_C = new InstagramAuth();

        // Get the access token 
        $access_token = $instagram_C->GetToken(INSTAGRAM_CLIENT_ID, INSTAGRAM_REDIRECT_URI, INSTAGRAM_CLIENT_SECRET, $_GET['code']);

        // Get user information
        $user_info = $instagram_C->GetUserProfileInformation($access_token);
        echo json_encode($user_info);
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}
?>
</html>