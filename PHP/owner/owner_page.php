<?php
require('db.php');
require('checkuser.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="../../CSS/owner/owner.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
      rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <title>Shop dashboard</title>
</head>

<body>
  <!--Grid-Container Strat-->
  <div class="grid-container">
    <!--Header Start-->
    <header class="flex-row">
      <div class="header-left">
        <input type="search" placeholder="search..." class="search"/>
        <span class="material-symbols-outlined ">
          search
          </span>
      </div>
      <div class="header-right">
        <span class="material-symbols-outlined">
          account_circle
          </span>
          <span class="material-symbols-outlined">
            notifications
            </span>
          <span class="pro-pic">
            <img src="../../CSS/owner/pro_pic.jpeg" alt="">
          </span>
      </div>
    </header>
    <!--Header End-->
    <!--Sidebar Start-->
    <aside id="sidebar">
      <owner-sidebar></owner-sidebar>
    </aside>
    <!--Sidebar End-->
    <!--Main-Container Strat-->
    <main class="main-container">
      <div class="main-title">
        <p class="font-weight-bold">DASHBOARD</p>
      </div>
      <div class="four-box">
        <div class="box">
          <div class="box-inner">
            <p class="text-primary">PRODUCTS</p>
            <span class="material-symbols-outlined text-blue">
              inventory_2
              </span>
          </div>
          <span class="text-primary font-weight-bold">249</span>
        </div>
        <div class="box">
          <div class="box-inner">
            <p class="text-primary">PURCHASE ORDERS</p>
              <span class="material-icons-outlined text-orange">add_shopping_cart</span>
          </div>
          <span class="text-primary font-weight-bold">83</span>
        </div>
        <div class="box">
          <div class="box-inner">
            <p class="text-primary">SALES ORDERS</p>
            <span class="material-icons-outlined text-green">shopping_cart</span>
          </div>
          <span class="text-primary font-weight-bold">79</span>
        </div>

        <div class="box">
          <div class="box-inner">
            <p class="text-primary">INVENTORY ALERTS</p>
            <span class="material-icons-outlined text-red">notification_important</span>
          </div>
          <span class="text-primary font-weight-bold">56</span>
        </div>
      </div>
      <div class="charts" >
        <div class="chart-box">
          <p class="chart-title">Top 5 Products</p>
          <div id="bar-chart"></div>
        </div>
        <div class="chart-box">
          <p class="chart-title">Purchase and Sales Orders</p>
          <div id="area-chart"></div>
        </div>
      </div>
    </main>
    <!--Main-Container End-->
  </div>
  <!--Grid-Container End-->
  <!--Script-->
  <!--ApexCharts-->
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.46.0/apexcharts.min.js"></script>
<script src="../../JS/Owner/dash_board.js"></script>
<script src="../../JS/headerFooter.js"></script>
<script src="../../JS/default.js"></script>
</html>