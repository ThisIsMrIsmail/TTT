<?php

require "db.php";


// ====================================
// # GET Request
// ====================================

  // checking if the user is logged in
  if ( isset($_SESSION["user_id"]) ) {
    $user_id = $_SESSION["user_id"];
    // getting user information
    $query =
    " SELECT * FROM users
      WHERE user_id = $user_id
    ";
    $user = select($query)[0];
  } else {
    exit(header("Location: /login"));
  }

require "./views/user/profile-image.view.php";



// ====================================
// # POST Request (PUT)
// ====================================
if ($_SERVER["REQUEST_METHOD"] == "POST"  and  isset($_POST["save"]) ):

  $user_id = $_POST["user_id"];
  $image = $_FILES["image"];

  upload_file($image, "image", "users", $user_id);
  echodie("<script> window.location.href = '/profile/profile-image' </script>");

endif;

?>