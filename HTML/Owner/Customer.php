<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../CSS/owner/owner.css">
    <link rel="stylesheet" href="../../CSS/owner/Customer.css">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Customer</title>
</head>

<body>
    <!--Grid-Container Strat-->
    <div class="grid-container">
        <!--Header Start-->
        <header class="flex-row">
            <div class="header-left">
                <input type="search" placeholder="search..." class="search" />
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
        <div class="sidebar-title">
          <div class="sidebar-logo">
            <span class="logo">
              <img src="../../CSS/logos/logo4.jpeg" alt="">
            </span>Hit Inventory
          </div>
        </div>
        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <span class="material-symbols-outlined">
              bar_chart_4_bars
              </span><a href="/HTML/Owner/owner_page.html">Dashboard</a>
          </li>
          <li class="sidebar-list-item">
            <span class="material-symbols-outlined">
              category
              </span><a href="/HTML/Owner/category.html">Category</a>
          </li>
          <li class="sidebar-list-item">
            <span class="material-symbols-outlined">
              account_box
              </span><a href="/HTML/Owner/Customer.html">Customers</a>
          </li>
          <li class="sidebar-list-item">
            <span class="material-symbols-outlined">
              add_shopping_cart
              </span><a href="/HTML/Owner/purchase_order.html">Purchase Orders</a>
          </li>
          <li class="sidebar-list-item">
            <span class="material-symbols-outlined">
              add_shopping_cart
              </span><a href="/HTML/Owner/Customer's_order.html">Customer's Orders</a>
          </li>
          <!-- <li class="sidebar-list-item">
            <span class="material-symbols-outlined">
              settings
              </span>Setting
          </li> -->
        </ul>
      </aside>
      <!--Sidebar End-->

        <!--Main-Container Strat-->
        <main class="main-container">
            <!-- MAIN CONTAINER -->
            <div class="container">
                <h1 class="table-title">Customers</h1>
                <table class="tbl">
                    <tr class="header">
                        <th>No</th>
                        <th>User Name</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Email Id</th>
                        <th>Remove</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Himu29</td>
                            <td>Himanshu Parmar</td>
                            <td>A. M. Naik, Mota Bazzar, V. V. Nagar</td>
                            <td>8160599527</td>
                            <td>himu9333@gmail.com</td>
                            <td class="remove"><span class="material-symbols-outlined text-blue">
                                    delete
                                </span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Chiku37</td>
                            <td>Chirag Rathod</td>
                            <td>Opposite D-mart, V. V. Nagar</td>
                            <td>8199790527</td>
                            <td>Chiku37@gmail.com</td>
                            <td class="remove"><span class="material-symbols-outlined text-blue">
                                    delete
                                </span></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Rushi44</td>
                            <td>Rashiraj Dabhi</td>
                            <td>A.V. Road, V. V. Nagar</td>
                            <td>8168469900</td>
                            <td>Rushi44@gmail.com</td>
                            <td class="remove"><span class="material-symbols-outlined text-blue">
                                    delete
                                </span></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </main>
        <!--Main-Container End-->
    </div>
    <!--Grid-Container End-->
</body>


<script src="../../JS/headerFooter.js"></script>
<script src="../../JS/default.js"></script>

</html>
