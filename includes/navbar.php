<nav class="navbar navbar-expand-md navbar-dark bg-dark d-flex align-items-center sticky-top">
  <a class="navbar-brand order-1" href="index.php"><img class="rounded" width="120px" height="100px" src="images/logo.png"></a>
  <button class="navbar-toggler order-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!--
  <a class="navbar-brand" href="#">
    <img src="/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="logo.jpg">
    Bootstrap
  </a>
  -->
   <div class="navbar-text d-flex justify-content-end flex-fill w-md-50 order-2">
      <?php
      if( $_SESSION["account_name"] ){
        $user = $_SESSION["account_name"];
        echo "Hello ".$user;
      }
      ?>
  </div>
  <div class="collapse navbar-collapse order-10" id="navbarSupportedContent">
    
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
    
      <?php
      if($_SESSION["account_name"] == null)
      {
      echo "
      <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"register.php\">Register <span class=\"sr-only\">(current)</span></a>
      </li>
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"login.php\">Login</a>
      </li>";
      }
      ?>
      <?php
      if($_SESSION["role"] == '3')//employee
      {
      echo "<li class=\"nav-item\">
        <a class=\"nav-link\" href=\"employee.php\">Your Roster</a>
      </li>";
      }
      ?>
      <!--<li class="nav-item">-->
      <!--  <a class="nav-link" href="managerSetting.php">Manager</a>-->
      <!--</li>-->
      <?php
      if( $_SESSION['role'] == null ){
      echo "<li class=\"nav-item dropdown\">
        <a class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
          Manager
        </a>
        <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
          <a class=\"dropdown-item\" href=\"managerRoster.php\">managerRoster</a>
          <a class=\"dropdown-item\" href=\"managerSetting.php\">managerSetting</a>
          <a class=\"dropdown-item\" href=\"managerConfirm.php\">managerConfirm</a>
      </li>";
      }
      ?>
      <li class="nav-item">
        <a class="nav-link disabled" href="https://coffee-manager-keyuan123.c9users.io/phpmyadmin">Database</a>
      </li>
      <?php
      if($_SESSION["account_name"])
      {
      echo "<li class=\"nav-item\">
        <a class=\"nav-link\" href=\"logout.php\">LogOut</a>
      </li>";
      }
      ?>
    </ul>
    <!--
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    -->
  </div>
 
</nav>