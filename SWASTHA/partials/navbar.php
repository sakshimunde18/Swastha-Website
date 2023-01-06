<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-dark border-4">
  <div class="container-fluid">
  <img src="./img/logo.jpeg"alt="LOGO">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a id="home" class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
        <a  id="contact" class="nav-link" href="contact_us.php" >Contact Us</a>
        </li>
        <li class="nav-item">
        <a  id="about" class="nav-link" href="#">About Us</a>
        </li>
        <li id="category" class="nav-item dropdown">
          <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Select Category</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li>
                <form accept="index.php" method="post">
                 <a href="#myTable">
                  <button type="submit2" name="submit2" id="submit2" class="btn btn-custom active">Emergency</button>
                  </a>
                  <a href="#myTable">
                    <button type="submit3" name="submit3" id="submit3" class="btn btn-custom active">Multispeciality</button>
                  </a>
                  <a href="#myTable">
                    <button type="submit4" name="submit4" id="submit4" class="btn btn-custom active">Gynecology</button>
                  </a>
                  <a href="#myTable">
                    <button type="submit5" name="submit5" id="submit5" class="btn btn-custom active">Cardiologist</button>
                  </a>
                  <a href="#myTable">
                    <button type="submit6" name="submit6" id="submit6" class="btn btn-custom active">Neurologist</button>
                  </a>
                  <a href="#myTable">
                    <button type="submit7" name="submit7" id="submit7" class="btn btn-custom active">Physiotherapy</button>
                  </a>
                </form>
              </li>
          </ul>
      <div id="log">
          <li class="nav-item" >
              <a id="A" class="nav-link" href="./user/register_user.php">Register</a>
          </li>
          <li class="nav-item" >
        <a id="B" class="nav-link" href="./user/user_login.php">Login</a>
      </li>
      </div>
      </li>
  
      </ul>
    </div>
  </div>
</nav>