<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if(!isset($_SESSION["username"]) || $_SESSION["username"] == "")
{

    

}
$html = file_get_contents('https://instagram.com/'.$_SESSION["username"]);
//Get user ID
$subData = substr($html, strpos($html, 'window._sharedData'), strpos($html, '};'));
$userID = strstr($subData, '"id":"');
$userID = str_replace('"id":"', '', $userID);
$userID = strstr($userID, '"', true);
//Download user info
$jsonData = file_get_contents('https://i.instagram.com/api/v1/users/'.$userID.'/info/');
$decodedInfo = json_decode($jsonData);
$username = $decodedInfo->user->username;
$profilePic = $decodedInfo->user->hd_profile_pic_url_info->url;
$follower = $decodedInfo->user->follower_count;
$following = $decodedInfo->user->following_count;
$full_name = $decodedInfo->user->full_name;
$isPrivate = $decodedInfo->user->is_private;
$isVerified = $decodedInfo->user->is_verified;
$bio = $decodedInfo->user->biography;
//Print info


//echo 'User ID: '.$userID.'<br>';






echo '<img style="" height="100" width="100" style="border-radius=5pt; margin-top=10pt;" class="propic" src="'.$profilePic.'"/><br><br>';
echo '<b>Biyografi :</b> '.$bio.'<br>';
echo '<b>Username:</b> '.$username.'<br>';
echo '<b>Takipçilerim :</b> '.$follower.'<br>';
echo '<b>Takip Edilenler :</b> '.$following.'<br>';
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        
        <h3>Bayi Hesabım > <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. </h3>
    </div>
    <p>
        <a  href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>