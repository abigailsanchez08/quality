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
    <style>
      th {
        border: 1px solid gray;
      }
      table {
        border-bottom: 1px solid gray;
      }
    </style>
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
          if ($privilegio == 2)
          {
            header('Location: Audit.php'); 
          }
      }
      else if (isset($_SESSION['loggedin'])== false) {
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
                <li><a href="modal"><a class="waves-effect waves-light btn modal-trigger red" href="#modal">Upload</a></li>
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
          <!--*************************************************************************************************************************************-->
          <!--************************************Inicio de la estructura para la caja de Auditorias*************************************************-->
            <div class="auditorias">
                <table class="center tabla_audit striped responsive-table">
                  <thead>
                    <tr> 
                        <th>No Audit</th>
                        <th>Service Line</th>
                        <th>Country</th>
                        <th>Process</th>
                        <th>Transaction</th>
                        <th>Sub Transaction</th>
                        <th>Document Type</th>
                        <th>Check</th>
                        <th>Document Id</th>
                        <th>SAP Id</th>
                        <th>Date</th>
                        <th>Comment</th>
                        <th>Status</th>
                        <th>Auditor</th>
                        <th>Team Lead</th>
                        <th>Specialist</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                  </tr>
                  </tbody>
              </table>
              </div>
          <!-- *******************************++++++++++++++++************************* -->
          <form>
            <div class="striped auditorias">
              <table class="center tabla_component striped responsive-table">
                <thead>
                  <tr> 
                    <th>No Component</th>
                    <th>Status</th>
                    <th>Comment</th>
                    <th>Attach</th>
                    <th>Rejection Type</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                    </td>
                    <td>
                      <input id="icon_prefix" type="text" name="status" class="validate" required="">
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                      <div class="input-field col s11">
                      <select class = "browser-default" name="rejection" >
                        <option required="" value="" disabled selected="TRUE">None</option>
                        <?php
                              $reg = mysqli_query($conexion,"SELECT * from rejection_type where Available = 1");
                              while ($result=mysqli_fetch_array($reg)) 
                              {
                                 echo "<option value=\"".$result['Id_Rejection_Type']."\">".$result['Rejection_Type_Name']."</option>\n";
                              }
                            ?>
                      </select>
                    </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <br>    
            <div class="compoaud">
              <button class="btn waves-effect waves-light red white-text left"><a href="Consultaaudit.php" class="white-text">Cancel
              <i class="material-icons right">clear</i></a>
            </button>
            <button class="btn waves-effect waves-light red white-text right"><a href="Consultaaudit.php" class="white-text">Save
              <i class="material-icons right">beenhere</i></a>
            </button>
            </div>
          </form>          <!-- **************************************************************************************************************************************-->
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
    $(".button-collapse").sideNav();
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
    //Copy settings and initialization tooltipped
  </script>
  </body>
</html>