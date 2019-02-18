<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Quality Template</title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel = "stylesheet"
           href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <script type = "text/javascript"
           src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
    </script>
    <link rel="stylesheet" type="text/css" href="css/picker.css">
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
          if ($privilegio == 1)
          {
            header('Location: Consultaaudit.php'); 
          }
      }
      else if (isset($_SESSION['loggedin'])== false) 
      {
        header('Location: index.php'); 
      }
    ?>
<!-- +++++++++++++++++++++++++++++++++++++++ Seccion para el menu +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --> 
    <nav>
        <div class="nav-wrapper grey lighten-4">
          <a href="https://brand.abb/" class="brand-logo right black-text"><img src="css\Images\Logo.png" width="150" height="55" align="center"></a>
          <a href="#" data-activates="mobile-demo" class="button-collapse black-text"><i class="material-icons">menu</i></a>
          <ul class="left hide-on-med-and-down">
            <?php if(!(isset($_SESSION['nombre']))) 
            { ?>  
              <!-- No esta Logeado -->
              <li class="active"><li><a href="index.php" class="black-text">Home</a></li>
              <li><a href="modal"><a class="waves-effect waves-light btn modal-trigger red" href="#modal">Sign In</a></li>
            <?php 
            } else 
            { ?> 
            <?php  if ($privilegio == 1)
            { ?>
              <!-- Ya esta Logeado -->
              <li><a href="Consultaaudit.php" class="black-text">Audits</a></li>
              <li><a href="insert.php" class="black-text">Catalogue</a></li>
              <li><a class="waves-effect waves-light btn red" href="logout.php">Log Out</a></li>
            <?php 
            } else
            { ?>
              <li><a href="Audit.php" class="black-text">Audits</a></li>
              <li><a class="waves-effect waves-light btn red" href="logout.php">Log Out</a></li>
            <?php 
            }
            ?>
            <?php 
            } ?>
          </ul>
        </div>
    </nav>
          <ul class="side-nav" id="mobile-demo">
            <?php if(!(isset($_SESSION['nombre'])))
            { ?>  
              <!-- No esta Logeado -->
              <li class="active"><li><a href="index.php" class="black-text">Home</a></li>
              <li><a href="modal"><a class="waves-effect waves-light btn modal-trigger red" href="#modal">Sign In</a></li>
              <?php 
            } else 
            { ?> 
              <!-- Ya esta Logeado -->
              <?php  if ($privilegio == 1)
              {?>
                <li><a href="Audit.php" class="black-text">Audits</a></li>
                <li><a href="insert.php" class="black-text">Catalogue</a></li>
                <li><a class="waves-effect waves-light btn red" href="logout.php">Log Out</a></li>
              <?php 
              }
              else
              {
              ?>
                <li><a href="Audit.php" class="black-text">Audits</a></li>
                <li><a class="waves-effect waves-light btn red" href="logout.php">Log Out</a></li>
              <?php 
              }
              ?>
              <?php 
            } ?>
          </ul>
    <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++ Seccion de contenido +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --> 
    <div class="section no-pad-bot" id="index-banner">
      <div class="container">      
        <!--************************************Inicio de la estructura para la caja de Auditorias*************************************************-->
        <div class="botonprev1">
          <form method="post" action="ejemplo.php">
            <h6>Select Date</h6>
            <div class="input-field col s4">
              <input name="fecha" type="date" class="datepicker" placeholder="yyyy-mm-dd"/>
            </div>
            <button class="btn waves-effect waves-teal red" type="submit" name="action" data>Preview
              <i class="material-icons right">apps</i>
            </button>
          </form>
        </div>
        <!-- ******************************* Inicia modal ************************** -->
          <div id="modal_preview" class="modal modal_upload modal-fixed-footer">
            <div class="Division"></div>
              <h4 class="center">Select date:</h4>
              <h2> </h2>
              <div class="alineacion2 row center">
                <div class="division3 col s2"></div>
                <form method="post" action="ejemplo.php">
                  <div class="input-field col s4">
                    <h6>choose the date to charge audits</h6>
                    <input name="fecha" type="date" class="datepicker" placeholder="yyyy-mm-dd" required="" />
                  </div>
                  <div class="modal-footer">
                    <button class="waves-effect waves-light btn red white-text left" type="submit" name="action">Charge<i class="material-icons right">check</i>
                    </button>
                  </div>
                </form>
              </div>
          </div>
        <!-- *******************************++++++++++++++++************************* -->
        <div id=Tabla" class="responsive-table">
          <table class="center">
            <thead>
              <tr>
                  <th>No Audit</th>
                  <th>Auditor</th>
                  <th>Specialist</th>
                  <th>Team Leader</th>
                  <th>Fecha</th>
                  <th>Comment</th>
                  <th>Status</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <th>
                <?php
                  $reg = mysqli_query($conexion,"SELECT * from 13auditorias where ID_Auditor = $auditor");

                  while ($result=mysqli_fetch_array($reg)) 
                  {
                     echo "<option value=\"".$result['ID_Auditoria']."\">".$result['ID_Auditoria']."</option>\n";
                  }
                ?>
                </th>
                <th>
                <?php
                  $reg = mysqli_query($conexion,"SELECT * from 13auditorias where ID_Auditor = $auditor");

                  while ($result=mysqli_fetch_array($reg)) 
                  {
                     echo "<option value=\"".$result['ID_Auditoria']."\">".$result['ID_Auditor']."</option>\n";
                  }
                ?>
                </th>
                <th>
                <?php
                  $reg = mysqli_query($conexion,"SELECT * from 13auditorias where ID_Auditor = $auditor");

                  while ($result=mysqli_fetch_array($reg)) 
                  {
                     echo "<option value=\"".$result['ID_Auditoria']."\">".$result['ID_Especialista']."</option>\n";
                  }
                ?>
                </th>
                <th>
                <?php
                  $reg = mysqli_query($conexion,"SELECT * from 13auditorias where ID_Auditor = $auditor");

                  while ($result=mysqli_fetch_array($reg)) 
                  {
                     echo "<option value=\"".$result['ID_Auditoria']."\">".$result['ID_TeamLeader']."</option>\n";
                  }
                ?>
                </th>
                <th>
                <?php
                  $reg = mysqli_query($conexion,"SELECT * from 13auditorias where ID_Auditor = $auditor");

                  while ($result=mysqli_fetch_array($reg)) 
                  {
                     echo "<option value=\"".$result['ID_Auditoria']."\">".$result['Date']."</option>\n";
                  }
                ?>
                </th>
                <th>
                <?php
                  $reg = mysqli_query($conexion,"SELECT * from 13auditorias where ID_Auditor = $auditor");

                  while ($result=mysqli_fetch_array($reg)) 
                  {
                     echo "<option value=\"".$result['ID_Auditoria']."\">".$result['Comentario']."</option>\n";
                  }
                ?>
                </th>
                <th>
                <?php
                  $reg = mysqli_query($conexion,"SELECT * from 13auditorias where ID_Auditor = $auditor");

                  while ($result=mysqli_fetch_array($reg)) 
                  {
                     echo "<option value=\"".$result['ID_Auditoria']."\">".$result['Estatus']."</option>\n";
                  }
                ?>
                </th>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- **************************************************************************************************************************************-->
      </div>
    </div>
     <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --> 
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++Seccion de footer ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --> 
    <footer class="page-footer red">
      <div class="container" align="center">
        <div class="row">
          <div class="col s12">
            <h5 class="white-text">ABB Technology</h5>
            <p class="grey-text text-lighten-4">Aplicacion realizada para Quality Framework, herramienta para realizar las auditorias del area de finanzas.</p>
            <p>Alejandra Juache</p>
            <p>GBS Finance</p>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        Made by <a class="white-text text-lighten-3" href="http://materializecss.com">Materialize</a>
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
      $(document).ready(function(){
            $('#demo-carousel').carousel();
          });
    </script>

    <script>
          $('.datepicker').pickadate({
        selectMonths: true,//Creates a dropdown to control month
        selectYears: 15,//Creates a dropdown of 15 years to control year
        //The title label to use for the month nav buttons
        labelMonthNext: 'Next Month',
        labelMonthPrev: 'Last Month',
        //The title label to use for the dropdown selectors
        labelMonthSelect: 'Select Month',
        labelYearSelect: 'Select Year',
        //Months and weekdays
        monthsFull: [ 'January', 'February', 'March', 'April', 'March', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ],
        monthsShort: [ 'Jan', 'Feb', 'Mar', 'Apr', 'Mar', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ],
        weekdaysFull: [ 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' ],
        weekdaysShort: [ 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat' ],
        //Materialize modified
        weekdaysLetter: [ 'S', 'M', 'T', 'W', 'T', 'F', 'S' ],
        //Today and clear
        today: 'Today',
        clear: 'Clear',
        close: 'Close',
        //The format to show on the `input` element
        format: 'yyyy-mm-dd'
        });
    </script>
  </body>
</html>