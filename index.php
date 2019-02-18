<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Quality Template</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css"/>
    <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
  </head>
  <body class=" grey lighten-body">
    <?php
      require_once 'Conection.php';
      session_start();

      if (isset($_SESSION['loggedin'])== true && isset($_SESSION['usuario']) && $_SESSION['usuario'] == 2) 
      {
            $nombre = $_SESSION['nombre'];
            $priv = mysqli_query($conexion,"SELECT Id_Privilege from users where Username = '$nombre'");
            $reg = mysqli_query($conexion,"SELECT * from users where Username = '$nombre'");
              while ($result=mysqli_fetch_array($reg)) 
              {
                  echo "<option value=\"".$result['Id_User']."\">".$result['Name']." ".$result['Lastname']."</option>\n";
                  $privilegio = $result['Id_Privilege'];
                  $auditor =  $result['Id_User'];
              }
      }
      else if (isset($_SESSION['loggedin'])== false) {
        echo "Please Login"; 
      }
    ?>
    <!-- +++++++++++++++++++++++++++++++++++++++ Seccion para el menu +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --> 
    <nav>
        <div class="nav-wrapper grey lighten-4">
          <a href="https://brand.abb/" class="brand-logo right black-text"><img src="css\Images\Logo.png" width="13%" height="10%" align="center"></a>
          <a href="#" data-activates="mobile-demo" class="button-collapse black-text"><i class="material-icons">menu</i></a>
          <ul class="left hide-on-med-and-down">
            <?php if(!(isset($_SESSION['nombre'])))
            { ?>  
                    <!-- No esta Logeado -->
                    <li class="active"><a href="index.php" class="black-text">Home</a></li>
                    <li><a class="waves-effect waves-light btn modal-trigger red" href="#modal">Sign In</a></li>
            <?php 
            } 
            else 
            { ?> 
            <!-- Ya esta Logeado -->
            <?php  if ($privilegio == 1)
            {?>
            <li><a href="Consultaaudit.php" class="black-text">Audits</a></li>
            <li><a href="insert.php" class="black-text">Catalogue</a></li>
            <li><a class="waves-effect waves-light btn red" href="logout.php">Log Out</a></li>
            <?php }
            else
            {
            ?>
            <li><a href="Audit.php" class="black-text">Audits</a></li>
            <li><a class="waves-effect waves-light btn red" href="logout.php">Log Out</a></li>
            <?php }
            ?>
            <?php 
            } ?>
          </ul>
          <ul class="side-nav" id="mobile-demo">
            <?php if(!(isset($_SESSION['nombre'])))
            { ?>  
                    <!-- No esta Logeado -->
                    <li class="active"><li><a href="index.php" class="black-text">Home</a></li>
                    <li><a href="modal"><a class="waves-effect waves-light btn modal-trigger red" href="#modal">Sign In</a></li>
            <?php 
            } 
            else 
            { ?> 
            <!-- Ya esta Logeado -->
            <?php  if ($privilegio == 1)
            {?>
            <li><a href="Audit.php" class="black-text">Audits</a></li>
            <li><a href="insert.php" class="black-text">Catalogue</a></li>
            <li><a class="waves-effect waves-light btn red" href="logout.php">Log Out</a></li>
            <?php }
            else
            {
            ?>
            <li><a href="Audit.php" class="black-text">Audits</a></li>
            <li><a class="waves-effect waves-light btn red" href="logout.php">Log Out</a></li>
            <?php }
            ?>
            <?php 
            } ?>
          </ul>
        </div>
    </nav>
    <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++ Seccion de contenido +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    <div class="section no-pad-bot" id="index-banner">
      <div class="container">        
      <!--*************************************************************************************************************************************-->
        <!-- Modal Structure -->
        <div id="modal" class="modal modal-fixed-footer">
                  <form action="Login.php" class="form-signin  row" method="post" id="login-forms">
                    <div class="modal-content">
                      <h4>Please complete all fields </h4>
                      <p>User and Password</p>
                        <div class="input-field col s12">
                            <i class="material-icons prefix red-text">face</i>
                            <input id="icon_prefix" type="text" name="username" placeholder="Username" required="">
                            <!--<label for="usuariolg">Usuario</label>-->
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix red-text">security</i>
                            <input id="icon_prefix" type="password" name="password" placeholder="Password" required="">
                            <!--<label for="passlg">Contraseña</label>-->
                        </div>
                    </div>
                    <div class="modal-footer col s12"> 
                        <button class="waves-effect waves-light red white-text btn" type="submit" name="submit" id="btn-login">Sign In</button>
                    </div>
                  </form>
        </div>
        <!-- ´************************ Finaliza la seccion ******************-->
        <br><br>
        <img src="css\Images\Quality.png" width="65%" height="40%" align="center">
        <div class="imagenes">
          <div class="centrar">
            <h3>Galery</h3>
            <img src="css/images/gal8.jpg" width="30%" height="25%" align="center">
            <img src="css/images/gal7.jpg" width="30%" height="25%" align="center">
            <img src="css/images/gal9.jpg" width="30%" height="25%" align="center">
            <img src="css/images/gal4.jpg" width="30%" height="25%" align="center">
            <img src="css/images/gal1.png" width="30%" height="25%" align="center">
          </div>
        </div>
      </div>
    </div>
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --> 
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++Seccion de footer ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --> 
    <footer class="page-footer red">
      <div class="container" align="left">
        <div class="row imagenes">
          <h4 class="white-text">ABB GBS Finance</h4>
          <h5 class="grey-text text-lighten-4">Application made for Quality Framework, tool to perform audits of the finance area.</h5>
          <h6>Alejandra Juache</h6>
          <h6>Operational Excellence</h6>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
        </div>
      </div>
    </footer>
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --> 
    <script>
      $(document).ready(function () {
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
      });
      //# sourceURL=pen.js
    </script>

    <script>
          $(document).ready(function() {
                 $('select').material_select();
          });
    </script>

    <script>
      $(".button-collapse").sideNav();
    </script>
  </body>
</html>