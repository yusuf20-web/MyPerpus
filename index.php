<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyPerpus - Dashboard</title>
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css" />
  </head>
  <body>
    <div class="wrapper">

     <?php require_once ("inc/navbar.php");?>
     <div class="content">
        <?php
            if(isset($_GET["pg"])){
                if(file_exists("content/" . $_GET["pg"].".php")){
                    include("content/" . $_GET["pg"].".php");
                }
            }else{
                include "content/index.php";
            }
        ?>
     </div>
      <div class="mt-5 container position-absolute top-50 start-50 translate-middle">
        <div class="row">
          <div class="col-6">
            <img src="img/buku.jpg" alt="Ini Logo" />
          </div>
          <div class="col-6 text-center fw-bold">
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil omnis cupiditate porro ducimus nam possimus fugiat consectetur temporibus asperiores iste, modi veritatis expedita eveniet, delectus in, aperiam atque ad. Amet."
          </div>
        </div>
      </div>
      <footer class="text-center border-top fixed-bottom p-3">Copyright &copy; 2024 PPKD - Jakarta Pusat.</footer>
    </div>
  </body>
</html>
