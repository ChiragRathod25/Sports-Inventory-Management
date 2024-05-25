<?php
require('dbconnect.php');
session_start();
if(!isset($_SESSION["username"])){
    echo "<script>;
    window.location.href = '/';
    </script>";

    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Home Page/style.css">
    <link rel="stylesheet" href="../CSS/Home Page/header-footer.css">
    <link rel="stylesheet" href="../CSS/Home Page/header_footer_for_profile.css">

    <link href="" rel="stylesheet" />
    <title>User Profile</title>
</head>
<body>
    <my-header></my-header>
  <section style="background-color: #ecf4d6;">
    <div class="container py-5">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    </section>
    <my-footer></my-footer>
</body>
<script src="../JS/headerFooter.js"></script>
<script src="../JS/default.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet" />
</html>