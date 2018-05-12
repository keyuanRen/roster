<nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex justify-content-between sticky-top">
  <a class="navbar-brand " href="index.php"><img class="rounded" width="100px" height="70px" src="images/logo.jpg"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!--
  <a class="navbar-brand" href="#">
    <img src="/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="logo.jpg">
    Bootstrap
  </a>
  -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav d-flex justify-content-end w-100"> <!--mr-auto-->
    
      <?php
      // if( count($navigation) > 0 ){
        
      //   foreach( $navigation as $name => $link ){
      //     //if the link matches the current page, set active as 'active'
      //     if( $link == $nav_obj -> current_page ){
      //       $active = "active";
      //     }
      //     else{
      //       unset($active);
      //     }
          
      //     echo "<li class=\"nav-item $active\">
      //             <a class=\"nav-link\" href=\"/$link\">$name</a>
      //           </li>";
      //   }
      // }
      ?>
    
    
      <li class="nav-item active">
        <a class="nav-link" href="register.php">Register <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="managerSetting.php">Manager</a>
      </li>
      <!--<li class="nav-item dropdown">-->
      <!--  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
      <!--    Dropdown-->
      <!--  </a>-->
      <!--  <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
      <!--    <a class="dropdown-item" href="#">Action</a>-->
      <!--    <a class="dropdown-item" href="#">Another action</a>-->
      <!--    <div class="dropdown-divider"></div>-->
      <!--    <a class="dropdown-item" href="https://coffee-manager-keyuan123.c9users.io/phpmyadmin">Database</a>-->
      <!--  </div>-->
      <!--</li>-->
      <li class="nav-item">
        <a class="nav-link disabled" href="https://coffee-manager-keyuan123.c9users.io/phpmyadmin">Database</a>
      </li>
    </ul>
    <!--
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    -->
  </div>
</nav>