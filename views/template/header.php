<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="../../libraries/materialize.min.css" />
	
	  <link type="text/css" rel="stylesheet" href="../../libraries/main.css"  />
    
    
    <title>My LIBRARY</title>
    <!--Let browser know website is optimized for mobile-->
    
  </head>
  <body>
  <script src="../../libraries/jquery-2.1.3.min.js"></script>
    <script src="../../libraries/materialize.min.js"></script>
   <script src="../../libraries/main.js"></script>
   
    
   <header>
    <div class="navbar-lower  ">
      <nav>
        <div class="nav-wrapper z-depth-4">
          <div class="container">
            <a href="/main/" class="brand-logo">KR</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="/main/">Home</a></li>
              <li><a href="/books/view">BOOKS</a></li>
              <li><?php if ($_SESSION['user']){ ?>
                        <a href="/authorization/">Logout</a>
                        <?php }else{ ?>
                         <a href="/authorization/">Login</a>
                          <?php }?></li>
             
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li><a href="/main/">Home</a></li>
              <li><a href="/books/view">BOOKS</a></li>
              <li><?php if ($_SESSION['user']){ ?>
                        <a href="/authorization/">Logout</a>
                        <?php }else{ ?>
                         <a href="/authorization/">Login</a>
                          <?php }?></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>

 </header>
<main>
