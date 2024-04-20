class Header extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
        <header class="flex-row">
    <div class="logo-img">
   <img src="/Sports-Inventory-Management/CSS/logos/logo4.jpeg" alt="">
    </div>
    <div class="navbar">
      <nav id="nav">
        <ul id="navlist">
          <li><a href="/">Home</a></li>
          <li>
            <a href="#">Team Sports</a>
            <ul id="dropdown">
              <li><a href="/HTML/Team Sports/cricket.php">Cricket</a></li>
              <li><a href="/HTML/Team Sports/football.php">Football</a></li>
              <li><a href="/HTML/Team Sports/vollyball.php">Vollyball</a></li>
              <li><a href="/HTML/Team Sports/basketball.php">Basketball</a></li>
              <li><a href="/HTML/Team Sports/Hawkey.php">Hawkey</a></li>
              <li><a href="/HTML/Team Sports/Rugby.php">Rugby</a></li>
              <li><a href="/HTML/Team Sports/Kabbaddi.php">Kabbaddi</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Racket Sports</a>
            <ul id="dropdown">
              <li><a href="/HTML/Racket Sports/Badminton.php">Badminton</a></li>
              <li><a href="/HTML/Racket Sports/Tennis.php">Tennis</a></li>
              <li><a href="/HTML/Racket Sports/tableTennis.php">Table Tennis</a></li>
              <li><a href="/HTML/Racket Sports/squash.php">Squash</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Other Sports</a>
            <ul id="dropdown">
              <li><a href="/HTML/Other Sports/chess.php">Chess</a></li>
              <li><a href="/HTML/Other Sports/carrom.php">Carrom</a></li>
              <li><a href="/HTML/Other Sports/skating.php">Skating</a></li>
              <li><a href="/HTML/Other Sports/boxing.php">Boxing</a></li>
              <li><a href="/HTML/Other Sports/swimming.php">Swimming</a></li>
            </ul>
          </li>

          <li>
            <a href="#">Top Brands</a>
            <ul id="dropdown">
              <li><a href="#">SG</a></li>
              <li><a href="#">Puma</a></li>
              <li><a href="#">Adidas</a></li>
              <li><a href="#">Nivia</a></li>
              <li><a href="#">Wilson</a></li>
            </ul>
          </li>
          <li><a href="#">Guide</a></li>
          <!-- <li><a href="#">Contact us</a></li> -->
        </ul>
      </nav>
    </div>
    <div class="right-search-login flex-column">
      <div class="account-cart flex-row">
        <div class="cart flex-row"  onclick="window.location.href='/Sports-Inventory-Management/PHP/view_product.php'">
          <span class="material-symbols-outlined"> shopping_bag </span>
          <span>cart</span>
        </div>
        <div class="person flex-row" id="account-info">
   
        </div>
      </div>
      <div class="search-website">
        <input
          type="text"
          name="search"
          id="search"
          placeholder="search..."
        />
      </div>
    </div>
  </header>
        `
  }
}
class Footer extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
        <footer>
        <div id="main_footer_container">
          <div class="section1">
            <h4>Get to know Us</h4>
            <ul>
              <li><a href="/HTML/aboutUs.html">About us</a></li>
              <li><a href="/HTML/privacyPolicy.html">Privacy Policy</a></li>
              <li><a href="/HTML/termsAndCondition.html"> Terms & Condition</a></li>
            </ul>
          </div>
          <div class="section2">
            <h4>Contect Us</h4>
            <ul>
              <li class="section1"><a href="#"> Facebook</a></li>
              <li class="section1"><a href="#"> Twitter</a></li>
              <li class="section1"><a href="#"> Instagram</a></li>
            </ul>
          </div>
          <div class="section3">
            <ul>
              <li>
                <h4>Let us Help you</h4>
              </li>
              <li>
                <a href="#">Your Account</a>
              </li>
              <li>
                <a href="/HTML/sitemap.html">Sitemap</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
        `
  }
}
class mySidebar extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
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
            </span><a href="/PHP/Owner/owner_page.php">Dashboard</a>
        </li>
        <li class="sidebar-list-item">
          <span class="material-symbols-outlined">
            category
            </span><a href="/php/Owner/sports.php">Sports</a>
        </li>
        <li class="sidebar-list-item">
          <span class="material-symbols-outlined">
            account_box
            </span><a href="/php/Owner/Customer.php">Customers</a>
        </li>
        <li class="sidebar-list-item">
          <span class="material-symbols-outlined">
            add_shopping_cart
            </span><a href="/php/Owner/purchase_order.php">Purchase Orders</a>
        </li>
        <li class="sidebar-list-item">
          <span class="material-symbols-outlined">
            add_shopping_cart
            </span><a href="/php/Owner/Customer's_order.php">Customer's Orders</a>
        </li>
        <li class="sidebar-list-item">
          <span class="material-symbols-outlined">
           home
            </span><a href="/">Visit Site</a>
        </li>
        <!-- <li class="sidebar-list-item">
          <span class="material-symbols-outlined">
            settings
            </span>Setting
        </li> -->
      </ul>
        `
  }
}


console.log("Hello");
var xhr = new XMLHttpRequest();
xhr.open("GET", '/Sports-Inventory-Management/JS/getUsername.php', true);
xhr.onreadystatechange = function () {
  console.log(xhr.readyState, xhr.status)
  if (xhr.readyState == 4 && xhr.status == 200) {
    
    var username = xhr.responseText;
    console.log(username);
    // Update the DOM with the user's session data
    const accountInfo = document.getElementById('account-info');
    console.log(accountInfo);
    if (username!=" " ) {
      accountInfo.innerHTML = `
        <ul>
            <li>
                <div class="flex-row">
                    <span class="material-symbols-outlined"> account_circle </span>
                    <span> ${username} </span>
                </div>
                <ul class="log-sign">
                    <li>
                        <a href="/Sports-Inventory-Management/HTML/user-profile.php">My Account</a>
                    </li>
                    <li>
                        <a href="/Sports-Inventory-Management/PHP/myOrders.php">Orders</a>
                    </li>
                    <li>
                        <a href="/Sports-Inventory-Management/PHP/Registration_and_Login/logout.php">Log out</a>
                    </li>
                </ul>
            </li>
        </ul>`;

    } else {
        accountInfo.innerHTML = `
        <ul>
            <li>
                <div class="flex-row">
                    <span class="material-symbols-outlined"> person </span>
                    <span> Account </span>
                </div>
                <ul class="log-sign">
                    <li>
                        <a href="/Sports-Inventory-Management/HTML/Registration and Login/cust_login.html">Log in</a>
                    </li>
                    <li>
                        <a href="/Sports-Inventory-Management/HTML/Registration and Login/cust_reg.html">Sign Up</a>
                    </li>
                </ul>
            </li>
        </ul>`;
    }
  }
}
xhr.send();
console.log("hi");
window.customElements.define('my-footer', Footer)
window.customElements.define('my-header', Header)
window.customElements.define('owner-sidebar',mySidebar)