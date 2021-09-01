<!DOCTYPE html>
<html lang="en">
<head>
<title>SAS Test & Repair LTD | @yield('title')</title>
<meta charset="utf-8">
<meta name="description" content="SAS Test and Repair">
<meta name="keywords" content="MOT, Car, Repair, car parts, servicing, garage, friendly, stoke on trent, engine, brakes, enginge diagnosis">
<meta name="googlebot" content="MOT, Car, Repair, car parts, servicing, garage, friendly, stoke on trent, engine, brakes, enginge diagnosis">
<meta name="robots" content="MOT, Car, Repair, car parts, servicing, garage, friendly, stoke on trent, engine, brakes, enginge diagnosis">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Vegur_300.font.js" type="text/javascript"></script>
<script src="js/Vegur_500.font.js" type="text/javascript"></script>
<script src="js/FF-cash.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
<![endif]-->
</head>

<body id="page2">
<div class="main-bg">
  <div class="bg">
    <!--==============================header=================================-->
    <header>
      <div class="main">
        <div class="wrapper">
          <h1><a href="index.html">Car Repair</a></h1>
          <div class="fright">
            <div class="indent"><span class="address">SAS Test and Repair,<br>
              Florida Close,<br>
              Burslem,<br>
              Stoke-on-Trent <br>
            ST6 2DJ</span> <span class="phone">Tel: (01782) 815736</span> </div>
          </div>
        </div>
        <nav>
          <ul class="menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="maintenance.html">Maintenance </a></li>
            <li><a class="active" href="MOT.html">MOT</a></li>
            <li><a href="price.html">Price List</a></li>
            <li><a href="locations.html">How to find us</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <!--==============================content================================-->
    <section id="content">
      <div class="main">
        <div class="container_12">
  <div class="container-bot">
    <div class="container-top">
      <div class="container">
        <div class="wrapper">
          <article class="grid_8">
            <div class="indent-left">
              <div class="wrapper border-bot2">
                @yield('content')
              </div>
            </div>
          </article>
          <article class="grid_4">
            <div class="indent-left">
              <div class="box indent-bot">
                  <div class="wrapper">
                    @yield('sidebar')
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
      </div>
    </div>
    </section>
    <!--==============================footer=================================-->
    <footer>
      <div class="main"> <span>Copyright &copy; <a href="www.sastestandrepair.co.uk">SAS Test and Repair</a> All Rights Reserved</span>
    </footer>
  </div>
</div>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>

