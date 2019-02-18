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
          <a href="https://brand.abb/" class="brand-logo right black-text"><img src="css\Images\Logo.png" width="13%" height="7%" align="center"></a>
          <a href="#" data-activates="mobile-demo" class="button-collapse black-text"><i class="material-icons">menu</i></a>
          <ul class="left hide-on-med-and-down">
            <?php if(!(isset($_SESSION['nombre'])))
              { 
            ?>  
              <li class="active"><a href="index.php" class="black-text">Home</a></li>
              <li><a href="modal" class="waves-effect waves-light btn modal-trigger red" href="#modal">Sign In</a></li>
            <?php 
              } 
              else 
              { 
            ?> 
            <?php  if ($privilegio == 1)
              {
            ?>
              <!-- Ya esta Logeado como administrador-->
              <li><a href="Consultaaudit.php" class="black-text">Audits</a></li>
              <li><a href="insert.php" class="black-text">Catalogue</a></li>
              <li><a class="waves-effect waves-light btn red" href="logout.php">Log Out</a></li>
            <?php 
              }
              else
              {
            ?>
              <!-- Ya esta Logeado como auditor-->
              <li><a href="Audit.php" class="black-text">Audits</a></li>
              <li><a class="waves-effect waves-light btn red" href="logout.php">Log Out</a></li>
            <?php 
              }
            ?>
            <?php 
              } 
            ?>
          </ul>
          <ul class="side-nav" id="mobile-demo">
            <?php if(!(isset($_SESSION['nombre'])))
              { 
            ?>  
              <!-- No esta Logeado -->
              <li class="active"><a href="index.php" class="black-text">Home</a></li>
              <li><a href="modal" class="waves-effect waves-light btn modal-trigger red" href="#modal">Sign In</a></li>
            <?php 
              } 
              else 
              { 
            ?> 
            <?php  if ($privilegio == 1)
              {
            ?>
              <!-- Ya esta Logeado como administrador-->
              <li><a href="Consultaaudit.php" class="black-text">Audits</a></li>
              <li><a href="insert.php" class="black-text">Catalogue</a></li>
              <li><a class="waves-effect waves-light btn red" href="logout.php">Log Out</a></li>
            <?php 
              }
              else
              {
            ?>
              <!-- Ya esta Logeado como auditor-->
              <li><a href="Audit.php" class="black-text">Audits</a></li>
              <li><a class="waves-effect waves-light btn red" href="logout.php">Log Out</a></li>
            <?php 
              }
            ?>
            <?php 
              } 
            ?>
          </ul>
        </div>
    </nav>
    <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++ Seccion de contenido +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    <div class="section no-pad-bot" id="index-banner">
      <div class="container">        
          <!--*************************************************************************************************************************************-->
          <!--************************************Inicio de la estructura para la caja de Auditorias*************************************************-->
          
          <div class="botonupload">
              <button data-target="modal_upload" class="waves-effect waves-light btn modal-trigger red" type="submit" name="action" data>Upload File
              <i class="material-icons right">file_upload</i>
            </button>
          </div>
          <div class="botonprev">
            <form method="post" action="Consultaaudit.php">
              <h6>Select Date</h6>
              <div class="input-field col s4">
                <input name="fecha" type="date" class="datepicker" placeholder="yyyy-mm-dd"/>
              </div>
              <button class="btn waves-effect waves-teal red" type="submit" name="preview" data>Preview
                <i class="material-icons right">apps</i>
              </button>
            </form>
          </div>
          <div class="botondown">
            <form method="post" action="extraer.php">
            <button class="btn waves-effect waves-teal red" type="submit" name="Descargar">Download Report
              <i class="material-icons right">file_download</i>
            </button>
            </form>
          </div>
          <!-- ******************************* Inicia modal ************************** -->
          <div id="modal_upload" class="modal modal_upload modal-fixed-footer">
            <div class="Division"></div>
            <h4 class="center">Choose audit file:</h4>
            <h2> </h2>
              <form action="Audit.php" class="formulariocompleto col s2" method="post" enctype="multipart/form-data">
                <div class = "row">
                    <div class = "file-field input-field">
                      <div class="alineacion">
                        <div class = "btn red">
                          <span>Select File</span><i class="material-icons right">cloud_upload</i>
                          <input type = "file" name="archivo" />
                        </div>
                        <div class = "file-path-wrapper">
                          <input class = "file-path validate" type = "text" placeholder = "Upload file" />
                        </div>
                      </div>
                      <div class="alineacion1">
                        <div>
                          <input type="submit" value="Upload File" class="form-control btn red center" name="enviar">
                        </div>
                      </div>
                    </div>
                </div>
              </form>   
          </div>
          <!-- *******************************++++++++++++++++************************* -->
              <div class="striped" style="display: <?php if(isset($_POST['preview'])){ echo 'inline';} else{ echo 'none';} ?>";">
              <div class="striped">
              <table class="center tabla_audit striped responsive-table auditorias">
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
                        <th>Components</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        require_once 'ejemplo1.php';
                        if(empty($_POST['fecha']))
                        {
                          //echo "Date has not been set";
                          $d = date("d");
                          $m = date("m");
                          $y = date("Y");
                          $date = $y."-".$m."-".$d;
                          //$date = $_POST['fecha'];
                        }
                        else
                        {
                          $date = $_POST['fecha'];
                        }
                        $reg=ConsultAudits($conexion,$date);
                        while ($result=mysqli_fetch_array($reg))
                        {
                    ?>
                    <tr>
                      <td>
                      <?php
                           echo "<option value=\"".$result['Id_Audit']."\">".$result['Id_Audit']."</option>\n";
                      ?>
                      </td>
                      <td>
                        <?php
                             echo "<option value=\"".$result['Id_Audit']."\">".$result['Service Line']."</option>\n";
                        ?>
                      </td>
                      <td>
                        <?php
                             echo "<option value=\"".$result['Id_Audit']."\">".$result['Country']."</option>\n";
                        ?>
                      </td>
                      <td>
                        <?php
                             echo "<option value=\"".$result['Id_Audit']."\">".$result['Process']."</option>\n";
                        ?>
                      </td>
                      <td>
                        <?php
                             echo "<option value=\"".$result['Id_Audit']."\">".$result['Transaction']."</option>\n";
                        ?>
                      </td>
                      <td>
                        <?php
                             echo "<option value=\"".$result['Id_Audit']."\">".$result['Sub Transaction']."</option>\n";
                        ?>
                      </td>
                      <td>
                        <?php
                             echo "<option value=\"".$result['Id_Audit']."\">".$result['Document']."</option>\n";
                        ?>
                      </td>
                      <td>
                        <?php
                             echo "<option value=\"".$result['Id_Audit']."\">".$result['Checks']."</option>\n";
                        ?>
                      </td>
                      <td>
                        <?php
                             echo "<option value=\"".$result['Id_Audit']."\">".$result['Document Id']."</option>\n";
                        ?>
                      </td>
                      <td>
                        <?php
                             echo "<option value=\"".$result['Id_Audit']."\">".$result['SAP Id Register']."</option>\n";
                        ?>
                      </td>
                      <td>
                        <?php
                             echo "<option value=\"".$result['Id_Audit']."\">".$result['Date']."</option>\n";
                        ?>
                      </td>
                      <td>
                        <?php
                             echo "<option value=\"".$result['Id_Audit']."\">".$result['Comment']."</option>\n";
                        ?>
                      </td>
                      <td>
                        <?php
                              $status= ($result['Status']==1) ? "Accepted": "Rejected";
                             echo "<option value=\"".$result['Id_Audit']."\">".$status."</option>\n";
                        ?>
                      </td>
                      <td>
                        <?php
                             echo "<option value=\"".$result['Id_Audit']."\">".$result['Auditor']."</option>\n";
                        ?>
                      </td>
                      <td>
                        <?php
                              $team_lead_name=$result['Team Lead Name']." ".$result['Team Lead Last Name'];
                             echo "<option value=\"".$result['Id_Audit']."\">".$team_lead_name."</option>\n";
                        ?>
                      </td>
                      <td>
                        <?php
                             echo "<option value=\"".$result['Id_Audit']."\">".$result['Specialist']."</option>\n";
                        ?>
                      </td>
                    </td>
                    <?php
                        }
                    ?>
                    <td>
                      <a href="Consultacomponent.php?id='.$result["Id_Audit"]"><i class="material-icons left grey-text">view_comfy</i></a><!-- Cuando se seleccione el icono de una auditoria se mandara a la pagina consulta component que es donde se imprime la tabla para los componentes. -->
                    </td>
                  </tr>
                  </tbody>
              </table>
              </div>
            </div>
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