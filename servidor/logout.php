<?php  session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logout</title>
</head>
<body>
    
<?php
/*
 Yuri Barsotti Mendes RA: 21095474 
*/
  $token = md5(session_id());
  if(isset($_GET['token']) && $_GET['token'] === $token) {
     session_destroy();
     echo '<script> window.location.assign("../index.php"); </script>';
     exit();
  }
?>  

</body>
</html>