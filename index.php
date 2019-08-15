<?php



    $servername = "localhost";
    $username = "root";
    $password = "db_passwordXXX";
    $dbname = "InstaBox";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    // sql to create table
    $sql = "CREATE TABLE users (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );";
    
    if ($conn->query($sql) === TRUE) {
        echo "Database setup was successful! :)";
    } else {
       
    }
    
    $conn->close();

    session_start();
 

   

?>
<html>
<head>
       
    <style>
    .menu{
        background-color: white;
        height: 25pt;
        width: 100%;
        
    }
    .Background_Text{
        margin-top: 6;
        background-image: url("bg.jpg");
        height: 278pt;
        width: 100%;
        
    }
    @font-face {
  font-family:"main";
  src: url("main.ttf") format("truetype");
}
    .menu-title{
        
 
        font-size: 30pt;
        font-family:"main";
  src: url("main.ttf") format("truetype");
        color: black;
        font-style: normal;
    }
    .menu-titlez{
        
 
        font-size: 30pt;
        font-family:"main";
  src: url("main.ttf") format("truetype");
        color: white;
        font-style: normal;
    }
    .menu-titles{
        
 
        font-size: 13pt;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        color: rgba(223, 223, 223, 0.76);
        font-style: normal;
    }
    .underline-menu{
        height: 0.5pt;
        width: 100%;
        background-color: lightgray;
        margin-top: 13;
    }
    .logo-menu{
       
        margin-top: 50;
    }
    .menu_button_1{
        margin-left: 15;
    }
    </style>
</head>
<body>
    <div class="menu" type="menu">
        
        <a  href="#" type="menu-title"  style="text-decoration: none;" class="menu-title">InstaBox Script</a>  
    </div>
    <div class="underline-menu" type="underline-menu">
    </div>
    <div class="Background_Text" type="Background_Text">
            <center><img class="logo-menu" type="logo-menu" height="100" width="100" src="http://pluspng.com/img-png/instagram-png-instagram-png-logo-1455.png">
                <h2 type="menu-titlez" class="menu-titlez">InstaBox Script</h2>
                <h2 type="menu-titles" class="menu-titles">Simdi dilediginiz gibi sayfalari modifiye edip kullanima sunabilirsiniz Takipci gondermek icin instagram hesaplari gerekecektir. bu script yasal olarak www.github.com/liab-1337 tarafindan yazilip yayinlanmistir! suanki surumde az ozellik bulunuyor fakat bir sonraki surumde daha fazla ozellikle yayinlanacaktir</h2>
                <center><a class="fa fa-sign-in" style="margin-top: 5pt; background-color: dodgerblue; color: white; border-radius: 2pt; height: 20pt; width: 70pt; text-decoration: none; font-style:normal;"  href="login.php">  Giriş Yap</a>

               
               
            </center>
    </div>
    <div>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </div>
    <div>
        &nbsp;
        &nbsp;
    </div>
    <div >
</div >
       <?php 
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

                echo '<center> <img style="" height="100" width="100" style="border-radius=5pt; margin-top=30pt;" class="propic" src="'.$profilePic.'"/><br><br>';
                echo '<b style="font-family: Franklin Gothic Medium, Arial Narrow, Arial, sans-serif;">Bayi Kullanıcısı :</b> '.$username.'<br>';
                echo '<b style="font-family: Franklin Gothic Medium, Arial Narrow, Arial, sans-serif;">Biyografi :</b> '.$bio.'<br>';
                echo '<b style="font-family: Franklin Gothic Medium, Arial Narrow, Arial, sans-serif;">Takipçilerim :</b> '.$follower.'<br>';
echo '<b style="font-family: Franklin Gothic Medium, Arial Narrow, Arial, sans-serif;">Takip Edilenler :</b> '.$following.'<br>';
                ?>
     
       </center> 
 
    </div>
    
</body>
