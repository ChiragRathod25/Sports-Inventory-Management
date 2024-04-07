class Header extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <header class="flex-row">
    <div class="logo">
      <!-- <img src="../CSS/logos/logo4.jpeg" alt=""> -->
    </div>
    <div class="navbar">
      <nav id="nav">
        <ul id="navlist">
          <li><a href="/">Home</a></li>
          <li>
            <a href="#">Team Sports</a>
            <ul id="dropdown">
              <li><a href="/HTML/Team Sports/cricket.html">Cricket</a></li>
              <li><a href="/HTML/Team Sports/football.html">Football</a></li>
              <li><a href="">Vollyball</a></li>
              <li><a href="#">Basketball</a></li>
              <li><a href="#">Hawkey</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Racket Sports</a>
            <ul id="dropdown">
              <li><a href="/HTML/Team Sports/Badminton.html">Badminton</a></li>
              <li><a href="#">Tennis</a></li>
              <li><a href="#">Table Tennis</a></li>
              <li><a href="#">Squash</a></li>
              <li><a href="#">Hawkey</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Other Sports</a>
            <ul id="dropdown">
              <li><a href="#">Chess</a></li>
              <li><a href="#">Carrom</a></li>
              <li><a href="#">Skating</a></li>
              <li><a href="#">Boxing</a></li>
              <li><a href="#">Swimming</a></li>
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
        <div class="cart flex-row">
          <span class="material-symbols-outlined"> shopping_bag </span>
          <span>cart</span>
        </div>
        <div class="person flex-row">
          <ul>
            <li>
              <div class="flex-row">
                <span class="material-symbols-outlined"> person </span>
                <span> Account </span>
              </div>
              <ul class="log-sign">
                <li>
                  <a href="/HTML/Registration and Login/cust_login.html"
                    >Log in</a
                  >
                </li>
                <li>
                  <a href="/HTML/Registration and Login/cust_reg.html">Sign Up</a>
                </li>
              </ul>
            </li>
          </ul>
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
              <li><a href="#">About us</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#"> Terms & Condition</a></li>
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
                <a href="#">Sitemap</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
        `
    }
}
window.customElements.define('my-footer', Footer)
window.customElements.define('my-header', Header)