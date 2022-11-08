<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>TMDB | Movie</title>
</head>
<body style="background-image: -webkit-radial-gradient(
#81070b,
#07147788);
">
  <nav style="background-image: -webkit-radial-gradient(
  #c04848,
  #480048);
" class="navbar">
    <div class="content">
      <div class="logo">
        <a style="background-image: -webkit-radial-gradient(circle, rgb(226, 241, 16), rgb(247, 104, 21));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent; " href="#">TMDB</a>
      </div>
      <ul class="menu-list">
        <div class="icon cancel-btn">
          <i class="fas fa-times"></i>
        </div>
        <li><a href="#">Home</a></li>
        <li><a href="login.php">Recommendation</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="contact.php" >Contact</a></li>
        <li><a href="login.php" >Login</a></li>
        <li><a href="sign-up.php" >Sign Up</a></li>
      </ul>
      <div class="icon menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav><br><br><br><br>
    
    <header>
        <form  id="form">
            <input type="text" placeholder="Search" id="search" class="search">
        </form>
    
    </header>
    <div id="tags"></div>
    
    <main id="main"></main>
    <div class="pagination">
        <div class="page" id="prev">Previous Page</div>
        <div class="current" id="current">1</div>
        <div class="page" id="next">Next Page</div>

    </div>

    <script src="index.js"></script>
    <!-- navbar script -->
    <script>
      const body = document.querySelector("body");
      const navbar = document.querySelector(".navbar");
      const menuBtn = document.querySelector(".menu-btn");
      const cancelBtn = document.querySelector(".cancel-btn");
      menuBtn.onclick = ()=>{
        navbar.classList.add("show");
        menuBtn.classList.add("hide");
        body.classList.add("disabled");
      }
      cancelBtn.onclick = ()=>{
        body.classList.remove("disabled");
        navbar.classList.remove("show");
        menuBtn.classList.remove("hide");
      }
      window.onscroll = ()=>{
        this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
      }
    </script>
  
</body>
</html>