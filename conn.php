<?php
$host = "localhost";
$username ="root";
$password = "";
$database = "Quis";

//creating a connection 
$rel = mysqli_connect(
$host,
$username,
$password,
$database

);

//checking a connections 
if(!$rel){
    echo "Ma isku Xirmin".mysqli_error($rel);
}
else{
  // echo "Wuu isku Xirmay";
}

?>