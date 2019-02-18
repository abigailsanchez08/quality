<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Quality Framework - Administrator</title>
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
          if ($privilegio == 2)
          {
            header('Location: Audit.php'); 
          }
      }
      else if (isset($_SESSION['loggedin'])== false) {
        header('Location: index.php'); 
      }

      if(isset($_POST["new"]))
      {
        $tabla = $_POST["tabla"];
        $nombre = $_POST["nombre"];
        if(empty($_POST['apellido']) or empty($_POST['usuario']) or empty($_POST['password']) or empty($_POST['privilegio']))
        {
          $apellido = "a";
          $usuario = "a";
          $password = "a";
          $privilegio = "a";
        }
        else 
        {
          $apellido = $_POST["apellido"];
          $usuario = $_POST["usuario"];
          $pass = $_POST["password"];
          $salt = md5($pass);
          $password = crypt($pass, $salt);  
          $privilegio = $_POST["privilegio"];
        }
        require_once 'sqls.php';
        altas($conexion,$tabla,$nombre,$apellido,$usuario,$password,$privilegio);
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
          <div class="catalogo">       
            <div class="row">
              <!--**************************************************Inicio de la caja 1****************************************************************-->
              <div class="col s4" align=" center">
                <!--********************************************************* Insertar nuevo item a Country *********************************************-->
                <a class="waves-effect waves-light btn modal-trigger red" href="#modal_pais">Country<i class="material-icons right">flag</i></a>
                <div id="modal_pais" class="modal modal_pais modal-fixed-footer">
                  <div class="modal-content">
                    <h5>Current Catalogue</h5>
                    <p></p>
                    <div class="tabla">
                      <table>
                        <thead>
                          <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Delete</th>
                            <th>Update</th>
                          </tr>
                        </thead>
                        <tbody>
                              <?php
                                $reg = mysqli_query($conexion,"SELECT Id_Country,Country_Name from country where Available = 1");
                                while ($result=mysqli_fetch_array($reg)) 
                                {
                                   echo '
                                   <tr>
                                     <td>'.$result["Id_Country"].'</td>
                                     <td>'.$result["Country_Name"].'</td>
                                     <td>
                                       <a href="Baja.php?id='.$result["Id_Country"].'&tabla=1"><i class="material-icons left grey-text">clear</i></a>
                                     </td>
                                     <td>
                                     <a href="Modif.php?id='.$result["Id_Country"].'&tabla=1"><i class="material-icons left grey-text">create</i></a>
                                     </td>
                                   </tr>
                                   ';
                                }
                              ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button data-target="modal_insert_country" class="waves-effect waves-light btn modal-trigger red right" data-position="bottom" type="submit" name="action">New<i class="material-icons right">playlist_add</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i></button>
                  </div>
                </div>
                <div id="modal_insert_country" class="modal modal-fixed-footer">
                  <form method="POST" action="insert.php">
                    <div class="modal-content">
                    <h5>Please complete this field: Country Name</h5>
                      <div class="input-field col s11" align="center">
                        <i class="material-icons prefix red-text">flag</i>
                        <input   type="text" class="validate" required="" name="nombre" placeholder="Name of Country">
                        <input   type="hidden" class="validate" required="" name="tabla" value="1">
                      </div>
                    </div> 
                    <div class="modal-footer center">
                      <button class="waves-effect waves-light btn red white-text right" type="submit" name="new">Insert<i class="material-icons right">check</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                    </div>
                  </form>
                </div> 
                <div class="Division1">
                </div>
                <!--********************************************************* Insertar nuevo item a Service Line*********************************************-->
                <a class="waves-effect waves-light btn modal-trigger red" href="#modal_area">Division<i class="material-icons right">line_weight</i></a>
                <div id="modal_area" class="modal modal_area modal-fixed-footer">
                  <div class="modal-content">
                    <h5>Current Catalogue</h5>
                    <p></p>
                    <div class="tabla">
                      <table>
                        <thead>
                        <tr>
                          <th>Code</th>
                          <th>Name</th>
                          <th>Delete</th>
                          <th>Update</th>
                        </tr>
                        </thead>
                        <tbody class="center">
                            <?php
                              $reg = mysqli_query($conexion,"SELECT Id_SL,Service_Line_Name from service_line where Available = 1");
                              while ($result=mysqli_fetch_array($reg)) 
                              {
                                 echo '
                                 <tr>
                                   <td>'.$result["Id_SL"].'</td>
                                   <td>'.$result["Service_Line_Name"].'</td>
                                   <td>
                                     <a href="Baja.php?id='.$result["Id_SL"].'&tabla=2"><i class="material-icons left grey-text">clear</i></a>
                                   </td>
                                   <td>
                                     <a href="Modif.php?id='.$result["Id_SL"].'&tabla=2"><i class="material-icons left grey-text">create</i></a>
                                     </td>
                                 </tr>
                                 ';
                              }
                            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button data-target="modal_insert_area" class="waves-effect waves-light btn modal-trigger red" data-position="bottom" type="submit" name="action">New<i class="material-icons right">playlist_add</i>
                    </button>
                    <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                    </button>
                  </div>
                </div>
                <div id="modal_insert_area" class="modal modal-fixed-footer">
                    <form method="POST" action="insert.php">
                    <h5>Please complete this field: Division Name</h5>
                      <div class="modal-content">
                        <div class="input-field col s11" align="center">
                          <i class="material-icons prefix red-text">flag</i>
                          <input   type="text" class="validate" required="" name="nombre" placeholder="Name of Service Line">
                          <input   type="hidden" class="validate" required="" name="tabla" value="2">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button class="waves-effect waves-light btn red white-text right" type="submit" name="new">Insert<i class="material-icons right">check</i>
                        </button>
                        <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                        </button>
                      </div>
                    </form>
                </div>  
                <div class="Division1">
                </div>
                <!--********************************************************* Insertar nuevo item a Process *********************************************-->
                <a class="waves-effect waves-light btn modal-trigger red" href="#modal_proceso">Process<i class="material-icons right">folder</i></a>
                <div id="modal_proceso" class="modal modal_proceso modal-fixed-footer">
                  <div class="modal-content">
                    <h5>Current Catalogue</h5>
                    <p></p>
                    <div class="tabla">
                      <table>
                        <thead>
                          <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Delete</th>
                            <th>Update</th>
                          </tr>
                        </thead>
                        <tbody>
                              <?php
                                $reg = mysqli_query($conexion,"SELECT Id_Process,Process_Name from process where Available = 1");
                                while ($result=mysqli_fetch_array($reg)) 
                                {
                                   echo '
                                   <tr>
                                     <td>'.$result["Id_Process"].'</td>
                                     <td>'.$result["Process_Name"].'</td>
                                     <td>
                                       <a href="Baja.php?id='.$result["Id_Process"].'&tabla=3"><i class="material-icons left grey-text">clear</i></a>
                                     </td>
                                     <td>
                                       <a href="Modif.php?id='.$result["Id_Process"].'&tabla=3"><i class="material-icons left grey-text">create</i></a>
                                       </td>
                                   </tr>
                                   ';
                                }
                              ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button data-target="modal_insert_proceso" class="waves-effect waves-light btn modal-trigger red" data-position="bottom" type="submit" name="action">New<i class="material-icons right">playlist_add</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                  </div>
                </div>
                <div id="modal_insert_proceso" class="modal modal-fixed-footer">
                  <form method="POST" action="insert.php">
                    <h5>Please complete this field: Process Name</h5>
                    <div class="modal-content">
                      <div class="input-field col s11" align="center">
                        <i class="material-icons prefix red-text">folder</i>
                        <input   type="text" class="validate" required="" name="nombre" placeholder="Name of Process">
                        <input   type="hidden" class="validate" required="" name="tabla" value="3">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="waves-effect waves-light btn red white-text right" type="submit" name="new">Insert<i class="material-icons right">check</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                    </div>
                  </form>
                </div> 
                <div class="Division1">
                </div>
                <!--********************************************************* Insertar nuevo item a transaccion*********************************************-->
                <a class="waves-effect waves-light btn modal-trigger red" href="#modal_transaccion">Transaction<i class="material-icons right">book</i></a>
                <div id="modal_transaccion" class="modal modal_transaccion modal-fixed-footer">
                  <div class="modal-content">
                    <h5>Current Catalogue</h5>
                    <p></p>
                    <div class="tabla">
                      <table>
                        <thead>
                          <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Delete</th>
                            <th>Update</th>
                          </tr>
                        </thead>
                        <tbody>
                              <?php
                                $reg = mysqli_query($conexion,"SELECT * from transaction where Available = 1");
                                while ($result=mysqli_fetch_array($reg)) 
                                {
                                   echo '
                                   <tr>
                                     <td>'.$result["Id_Transaction"].'</td>
                                     <td>'.$result["Transaction_Name"].'</td>
                                     <td>
                                       <a href="Baja.php?id='.$result["Id_Transaction"].'&tabla=4"><i class="material-icons left grey-text">clear</i></a>
                                     </td>
                                     <td>
                                       <a href="Modif.php?id='.$result["Id_Transaction"].'&tabla=4"><i class="material-icons left grey-text">create</i></a>
                                       </td>
                                   </tr>
                                   ';
                                }
                              ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button data-target="modal_insert_transaccion" class="waves-effect waves-light btn modal-trigger red" data-position="bottom" type="submit" name="action">New<i class="material-icons right">playlist_add</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                  </div>
                </div>
                <div id="modal_insert_transaccion" class="modal modal-fixed-footer">
                  <form method="POST" action="insert.php">
                    <div class="modal-content">
                    <h5>Please complete this field: Transaction Name</h5>
                      <div class="input-field col s11" align="center">
                        <i class="material-icons prefix red-text">import_contacts</i>
                        <input   type="text" class="validate" required="" name="nombre" placeholder="Name of Sub Transaction">
                        <input   type="hidden" class="validate" required="" name="tabla" value="4">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="waves-effect waves-light btn red white-text right" type="submit" name="new">Insert<i class="material-icons right">check</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                    </div>
                  </form>
                </div>
                <div class="Division1">
                </div>
                <!--********************************************************* Insertar nuevo item a subtransaccion*********************************************-->
                <a class="waves-effect waves-light btn modal-trigger red" href="#modal_subtransaccion">Sub Transaction<i class="material-icons right">import_contacts</i></a>
                <div id="modal_subtransaccion" class="modal modal_subtransaccion modal-fixed-footer">
                  <div class="modal-content">
                    <h5>Current Catalogue</h5>
                    <p></p>
                    <div class="tabla">
                      <table>
                        <thead>
                          <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Delete</th>
                            <th>Update</th>
                          </tr>
                        </thead>
                        <tbody>
                              <?php
                                $reg = mysqli_query($conexion,"SELECT * from sub_transaction where Available = 1");
                                while ($result=mysqli_fetch_array($reg)) 
                                {
                                   echo '
                                   <tr>
                                     <td>'.$result["Id_Sub_Transaction"].'</td>
                                     <td>'.$result["Sub_Transaction_Name"].'</td>
                                     <td>
                                       <a href="Baja.php?id='.$result["Id_Sub_Transaction"].'&tabla=5"><i class="material-icons left grey-text">clear</i></a>
                                     </td>
                                     <td>
                                       <a href="Modif.php?id='.$result["Id_Sub_Transaction"].'&tabla=5"><i class="material-icons left grey-text">create</i></a>
                                       </td>
                                   </tr>
                                   ';
                                }
                              ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button data-target="modal_insert_subtransaccion" class="waves-effect waves-light btn modal-trigger red" data-position="bottom" type="submit" name="action">New<i class="material-icons right">playlist_add</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                  </div>
                </div>
                <div id="modal_insert_subtransaccion" class="modal modal-fixed-footer">
                  <form method="POST" action="insert.php">
                    <div class="modal-content">
                    <h5>Please complete this field: Sub Transaction Name</h5>
                      <div class="input-field col s11" align="center">
                        <i class="material-icons prefix red-text">import_contacts</i>
                        <input   type="text" class="validate" required="" name="nombre" placeholder="Name of Sub Transaction">
                        <input   type="hidden" class="validate" required="" name="tabla" value="5">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="waves-effect waves-light btn red white-text right" type="submit" name="new">Insert<i class="material-icons right">check</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                    </div>
                  </form>
                </div>    
              </div>
              <!--****************************************************Fin de la caja 1*****************************************************************-->
              <!--**************************************************Inicio de la caja 2****************************************************************-->
              <div class="col s4" align=" center" >
                <!--********************************************************* Insertar nuevo item a checks*********************************************-->
                <a class="waves-effect waves-light btn modal-trigger red" href="#modal_check">Check<i class="material-icons right">beenhere</i></a>
                <div id="modal_check" class="modal modal_check modal-fixed-footer">
                  <div class="modal-content">
                    <h5>Current Catalogue</h5>
                    <p></p>
                    <div class="tabla">
                      <table>
                        <thead>
                          <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Delete</th>
                            <th>Update</th>
                          </tr>
                        </thead>
                        <tbody>
                              <?php
                                $reg = mysqli_query($conexion,"SELECT * from checks where Available = 1");
                                while ($result=mysqli_fetch_array($reg)) 
                                {
                                   echo '
                                   <tr>
                                     <td>'.$result["Id_Check"].'</td>
                                     <td>'.$result["Check_Name"].'</td>
                                     <td>
                                       <a href="Baja.php?id='.$result["Id_Check"].'&tabla=6"><i class="material-icons left grey-text">clear</i></a>
                                     </td>
                                     <td>
                                       <a href="Modif.php?id='.$result["Id_Check"].'&tabla=6"><i class="material-icons left grey-text">create</i></a>
                                       </td>
                                   </tr>
                                   ';
                                }
                              ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button data-target="modal_insert_check" class="waves-effect waves-light btn modal-trigger red" data-position="bottom" type="submit" name="action">New<i class="material-icons right">playlist_add</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                  </div>
                </div>
                <div id="modal_insert_check" class="modal modal-fixed-footer">
                  <form method="POST" action="insert.php">
                    <div class="modal-content">
                    <h5>Please complete this field: Check Name</h5>
                      <div class="input-field col s11" align="center">
                        <i class="material-icons prefix red-text">beenhere</i>
                        <input   type="text" class="validate" required="" name="nombre" placeholder="Name of Check">
                        <input   type="hidden" class="validate" required="" name="tabla" value="6">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="waves-effect waves-light btn red white-text right" type="submit" name="new">Insert<i class="material-icons right">check</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                    </div>
                  </form>
                </div>
                <div class="Division1">
                </div>
                <!--********************************************************* Insertar nuevo item a archivo Contable*********************************************-->
                <a class="waves-effect waves-light btn modal-trigger red" href="#modal_file">Accounting File<i class="material-icons right">class</i></a>
                <div id="modal_file" class="modal modal_file modal-fixed-footer">
                  <div class="modal-content">
                    <h5>Current Catalogue</h5>
                    <p></p>
                    <div class="tabla">
                      <table>
                        <thead>
                          <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Delete</th>
                            <th>Update</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                              $reg = mysqli_query($conexion,"SELECT * from document_type where Available = 1");
                              while ($result=mysqli_fetch_array($reg)) 
                              {
                                 echo '
                                 <tr>
                                   <td>'.$result["Id_Document_Type"].'</td>
                                   <td>'.$result["Document_Type_Name"].'</td>
                                   <td>
                                     <a href="Baja.php?id='.$result["Id_Document_Type"].'&tabla=7"><i class="material-icons left grey-text">clear</i></a>
                                   </td>
                                   <td>
                                     <a href="Modif.php?id='.$result["Id_Document_Type"].'&tabla=7"><i class="material-icons left grey-text">create</i></a>
                                     </td>
                                 </tr>
                                 ';
                              }
                            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button data-target="modal_insert_file" class="waves-effect waves-light btn modal-trigger red" data-position="bottom" type="submit" name="action">New<i class="material-icons right">playlist_add</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                  </div>
                </div>
                <div id="modal_insert_file" class="modal modal-fixed-footer">
                  <form method="POST" action="insert.php">
                    <div class="modal-content">
                    <h5>Please complete this field: Accounting File Name</h5>
                      <div class="input-field col s11" align="center">
                        <i class="material-icons prefix red-text">class</i>
                        <input   type="text" class="validate" required="" name="nombre" placeholder="Name of Accounting File">
                        <input   type="hidden" class="validate" required="" name="tabla" value="7">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="waves-effect waves-light btn red white-text right" type="submit" name="new">Insert<i class="material-icons right">check</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                    </div>
                  </form>
                </div>
                <div class="Division1">
                </div>
                <!--********************************************************* Insertar nuevo item a componentes *********************************************-->
                <a class="waves-effect waves-light btn modal-trigger red" href="#modal_componente">Component<i class="material-icons right">add_box</i></a>
                <div id="modal_componente" class="modal modal_componente modal-fixed-footer">
                  <div class="modal-content">
                    <h5>Current Catalogue</h5>
                    <p></p>
                    <div class="tabla">
                      <table>
                      <thead>
                        <tr>
                          <th>Code</th>
                          <th>Name</th>
                          <th>Delete</th>
                          <th>Update</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php
                              $reg = mysqli_query($conexion,"SELECT * FROM component WHERE Available = 1 ORDER BY Id_Component");
                              while ($result=mysqli_fetch_array($reg)) 
                              {
                                 echo '
                                 <tr>
                                   <td>'.$result["Id_Component"].'</td>
                                   <td>'.$result["Component_Name"].'</td>
                                   <td>
                                     <a href="Baja.php?id='.$result["Id_Component"].'&tabla=8"><i class="material-icons left grey-text">clear</i></a>
                                   </td>
                                   <td>
                                     <a href="Modif.php?id='.$result["Id_Component"].'&tabla=8"><i class="material-icons left grey-text">create</i></a>
                                     </td>
                                 </tr>
                                 ';
                              }
                            ?>
                      </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button data-target="modal_insert_componente" class="waves-effect waves-light btn modal-trigger red" data-position="bottom" type="submit" name="action">New<i class="material-icons right">playlist_add</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                  </div>
                </div>
                <div id="modal_insert_componente" class="modal modal-fixed-footer">
                  <form method="POST" action="insert.php">
                    <div class="modal-content">
                    <h5>Please complete this fields</h5>
                      <div class="input-field col s11" align="center">
                        <i class="material-icons prefix red-text">add_box</i>
                        <input   type="text" class="validate" required="" name="nombre" placeholder="Name of Component">
                        <input   type="hidden" class="validate" required="" name="tabla" value="8">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="waves-effect waves-light btn red white-text right" type="submit" name="new">Insert<i class="material-icons right">check</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                    </div>
                  </form>
                </div>
                <div class="Division1">
                </div>
                <!--********************************************************* Insertar nuevo tipo de rechazo *********************************************-->
                <a class="waves-effect waves-light btn modal-trigger red" href="#modal_rejection">Rejection Type<i class="material-icons right">thumb_down</i></a>
                <div id="modal_rejection" class="modal modal_rejection modal-fixed-footer">
                  <div class="modal-content">
                    <h5>Current Catalogue</h5>
                    <p></p>
                    <div class="tabla">
                      <table>
                        <thead>
                          <tr>
                            <th>Code</th>
                            <th>Rejection Type Name</th>
                            <th>Delete</th>
                            <th>Update</th>
                          </tr>
                        </thead>
                        <tbody>
                              <?php
                                $reg = mysqli_query($conexion,"SELECT * from rejection_type where Available = 1");
                                while ($result=mysqli_fetch_array($reg)) 
                                {
                                   echo '
                                   <tr>
                                     <td>'.$result["Id_Rejection_Type"].'</td>
                                     <td>'.$result["Rejection_Type_Name"].'</td>
                                     <td>
                                       <a href="Baja.php?id='.$result["Id_Rejection_Type"].'&tabla=9"><i class="material-icons left grey-text">clear</i></a>
                                     </td>
                                     <td>
                                       <a href="Modif.php?id='.$result["Id_Rejection_Type"].'&tabla=9"><i class="material-icons left grey-text">create</i></a>
                                       </td>
                                   </tr>
                                   ';
                                }
                              ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button data-target="modal_insert_rejection" class="waves-effect waves-light btn modal-trigger red" data-position="bottom" type="submit" name="action">New<i class="material-icons right">playlist_add</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                  </div>
                </div>
                <div class="Division1">
                </div>
                <!--********************************************************* Insertar nuevo tipo de privilegio *********************************************-->
                <a class="waves-effect waves-light btn modal-trigger red" href="#modal_privilege">Privilege<i class="material-icons right">person_pin_circle</i></a>
                <div id="modal_privilege" class="modal modal_privilege modal-fixed-footer">
                  <div class="modal-content">
                    <h5>Current Catalogue</h5>
                    <p></p>
                    <div class="tabla">
                      <table>
                        <thead>
                          <tr>
                            <th>Code</th>
                            <th>Privilege</th>
                            <th>Delete</th>
                            <th>Update</th>
                          </tr>
                        </thead>
                        <tbody>
                              <?php
                                $reg = mysqli_query($conexion,"SELECT * from privilege where Available = 1");
                                while ($result=mysqli_fetch_array($reg)) 
                                {
                                   echo '
                                   <tr>
                                     <td>'.$result["Id_Privilege"].'</td>
                                     <td>'.$result["Privilege_Name"].'</td>
                                     <td>
                                       <a href="Baja.php?id='.$result["Id_Privilege"].'&tabla=10"><i class="material-icons left grey-text">clear</i></a>
                                     </td>
                                     <td>
                                       <a href="Modif.php?id='.$result["Id_Privilege"].'&tabla=10"><i class="material-icons left grey-text">create</i></a>
                                       </td>
                                   </tr>
                                   ';
                                }
                              ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button data-target="modal_insert_privilege" class="waves-effect waves-light btn modal-trigger red" data-position="bottom" type="submit" name="action">New<i class="material-icons right">playlist_add</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                  </div>
                </div>
                <div id="modal_insert_privilege" class="modal modal-fixed-footer">
                  <form method="POST" action="insert.php">
                    <div class="modal-content">
                    <h5>Please complete this fields</h5>
                      <div class="input-field col s11">
                        <i class="material-icons prefix red-text">person_pin_circle</i>
                        <input   type="text" class="validate" required="" placeholder="Privilege Type Name" name="nombre">
                        <input   type="hidden" class="validate" required="" name="tabla" value="10">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="waves-effect waves-light btn red white-text right" type="submit" name="new">Insert<i class="material-icons right">check</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <!--****************************************************Fin de la caja 2*****************************************************************-->
              <!--**************************************************Inicio de la caja 2****************************************************************-->
              <div class="col s4" align=" center" >
                <!--********************************************************* Insertar nuevo usuario *********************************************-->
                <a class="waves-effect waves-light btn modal-trigger red" href="#modal_usuario">Users<i class="material-icons right">person_add</i></a>
                <div id="modal_usuario" class="modal modal_auditor modal-fixed-footer">
                  <div class="modal-content">
                    <h5>Current Catalogue</h5>
                    <p></p>
                    <div class="tabla">
                      <table>
                        <thead>
                          <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>User Name</th>
                            <th>Delete</th>
                            <th>Update</th>
                          </tr>
                        </thead>
                        <tbody>
                              <?php
                                $reg = mysqli_query($conexion,"SELECT * from users where Available = 1");
                                while ($result=mysqli_fetch_array($reg)) 
                                {
                                   echo '
                                   <tr>
                                     <td>'.$result["Id_User"].'</td>
                                     <td>'.$result["Name"].'</td>
                                     <td>'.$result["Lastname"].'</td>
                                     <td>'.$result["Username"].'</td>
                                     <td>
                                       <a href="Baja.php?id='.$result["Id_User"].'&tabla=11"><i class="material-icons left grey-text">clear</i></a>
                                     </td>
                                     <td>
                                       <a href="Modif.php?id='.$result["Id_User"].'&tabla=11"><i class="material-icons left grey-text">create</i></a>
                                       </td>
                                   </tr>
                                   ';
                                }
                              ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button data-target="modal_insert_user" class="waves-effect waves-light btn modal-trigger red" data-position="bottom" type="submit" name="action">New<i class="material-icons right">playlist_add</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                  </div>
                </div>
                <div id="modal_insert_user" class="modal modal-fixed-footer">
                  <form method="POST" action="insert.php">
                    <div class="modal-content">
                    <h5>Please complete this fields</h5>
                      <div class="input-field col s11">
                        <i class="material-icons prefix red-text">face</i>
                        <input   type="text" class="validate" required="" placeholder="Username" name="usuario">
                        <input   type="hidden" class="validate" required="" name="tabla" value="11">
                      </div>
                      <div class="input-field col s11">
                        <i class="material-icons prefix red-text">person</i>
                        <input   type="text" class="validate" required="" placeholder="Name" name="nombre">
                      </div>
                      <div class="input-field col s11">
                        <i class="material-icons prefix red-text">person_outline</i>
                        <input   type="text" class="validate" required="" placeholder="Last Name" name="apellido">
                      </div>
                      <div class="input-field col s11">
                        <i class="material-icons prefix red-text">security</i>
                        <input   type="password" class="validate" required="" placeholder="Password" name="password">
                      </div>
                      <div class="input-field col s11">
                        <select class = "browser-default" name="privilegio">
                          <option required="" value="" disabled selected>Select a privilege</option>
                          <?php
                                $reg = mysqli_query($conexion,"SELECT * from privilege where Available = 1");
                                while ($result=mysqli_fetch_array($reg)) 
                                {
                                   echo "<option value=\"".$result['Id_Privilege']."\">".$result['Privilege_Name']."</option>\n";
                                }
                              ?>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="waves-effect waves-light btn red white-text right" type="submit" name="new">Insert<i class="material-icons right">check</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                    </div>
                  </form>
                </div>
                <div class="Division1">
                </div>
                <!--********************************************************* Insertar nuevo team leader *********************************************-->
                <a class="waves-effect waves-light btn modal-trigger red" href="#modal_team_leader">Team Leader<i class="material-icons right">add_circle_outline</i></a>
                <div id="modal_team_leader" class="modal modal_team_leader modal-fixed-footer">
                  <div class="modal-content">
                    <h5>Current Catalogue</h5>
                    <p></p>
                    <div class="tabla">
                      <table>
                        <thead>
                          <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Lastname</th>
                            <th>Delete</th>
                            <th>Update</th>
                          </tr>
                        </thead>
                        <tbody>
                              <?php
                                $reg = mysqli_query($conexion,"SELECT * from team_leader where Available = 1");
                                while ($result=mysqli_fetch_array($reg)) 
                                {
                                   echo '
                                   <tr>
                                     <td>'.$result["Id_Team_Leader"].'</td>
                                     <td>'.$result["Name"].'</td>
                                     <td>'.$result["Lastname"].'</td>
                                     <td>
                                       <a href="Baja.php?id='.$result["Id_Team_Leader"].'&tabla=12"><i class="material-icons left grey-text">clear</i></a>
                                     </td>
                                     <td>
                                       <a href="Modif.php?id='.$result["Id_Team_Leader"].'&tabla=12"><i class="material-icons left grey-text">create</i></a>
                                       </td>
                                   </tr>
                                   ';
                                }
                              ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button data-target="modal_insert_team_leader" class="waves-effect waves-light btn modal-trigger red" data-position="bottom" type="submit" name="action">New<i class="material-icons right">playlist_add</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                  </div>
                </div>
                <div id="modal_insert_team_leader" class="modal modal-fixed-footer">
                  <form method="POST" action="insert.php">
                    <div class="modal-content">
                    <h5>Please complete this fields</h5>
                      <div class="input-field col s11">
                        <i class="material-icons prefix red-text">face</i>
                        <input   type="text" class="validate" required="" placeholder="Team Leader Name" name="nombre">
                        <input   type="hidden" class="validate" required="" name="tabla" value="12">
                      </div>
                      <div class="input-field col s11">
                        <i class="material-icons prefix red-text">person</i>
                        <input   type="text" class="validate" required="" placeholder="Last Name" name="apellido">
                      </div>
                      <div class="input-field col s11">
                        <i class="material-icons prefix red-text">email</i>
                        <input   type="email" class="validate" required="" placeholder="Email" name="email">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="waves-effect waves-light btn red white-text right" type="submit" name="new">Insert<i class="material-icons right">check</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                    </div>
                  </form>
                </div>
                <div class="Division1">
                </div>
                <!--********************************************************* Insertar nuevo especialista *********************************************-->
                <a class="waves-effect waves-light btn modal-trigger red" href="#modal_especialista">Specialist<i class="material-icons right">assignment_ind</i></a>
                <div id="modal_especialista" class="modal modal_especialista modal-fixed-footer">
                  <div class="modal-content">
                    <h5>Current Catalogue</h5>
                    <p></p>
                    <div class="tabla">
                      <table>
                        <thead>
                          <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Delete</th>
                            <th>Update</th>
                          </tr>
                        </thead>
                        <tbody>
                              <?php
                                $reg = mysqli_query($conexion,"SELECT * from specialist where Available = 1");
                                while ($result=mysqli_fetch_array($reg)) 
                                {
                                   echo '
                                   <tr>
                                     <td>'.$result["Id_Specialist"].'</td>
                                     <td>'.$result["Name"].'</td>
                                     <td>'.$result["Lastname"].'</td>
                                     <td>
                                       <a href="Baja.php?id='.$result["Id_Specialist"].'&tabla=13"><i class="material-icons left grey-text">clear</i></a>
                                     </td>
                                     <td>
                                       <a href="Modif.php?id='.$result["Id_Specialist"].'&tabla=13"><i class="material-icons left grey-text">create</i></a>
                                       </td>
                                   </tr>
                                   ';
                                }
                              ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button data-target="modal_insert_specialist" class="waves-effect waves-light btn modal-trigger red" data-position="bottom" type="submit" name="action">New<i class="material-icons right">playlist_add</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                  </div>
                </div>
                <div id="modal_insert_specialist" class="modal modal-fixed-footer">
                  <form method="POST" action="insert.php">
                    <div class="modal-content">
                    <h5>Please complete this fields</h5>
                      <div class="input-field col s11">
                        <i class="material-icons prefix red-text">face</i>
                        <input   type="text" class="validate" required="" placeholder="Name" name="nombre">
                        <input   type="hidden" class="validate" required="" name="tabla" value="13">
                      </div>
                      <div class="input-field col s11">
                        <i class="material-icons prefix red-text">person</i>
                        <input   type="text" class="validate" required="" placeholder="Last Name" name="apellido">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="waves-effect waves-light btn red white-text right" type="submit" name="new">Insert<i class="material-icons right">check</i>
                      </button>
                      <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                      </button>
                    </div>
                  </form>
                </div>
                <div class="Division1">
                </div>
                <!--********************************************************* Insertar nuevo item con modal *********************************************-->
                <a class="waves-effect waves-light btn modal-trigger red" href="#modal_relacion">Insert new relation<i class="material-icons right">format_list_numbered</i></a>
                <div id="modal_relacion" class="modal modal_relacion modal-fixed-footer">
                    <div class="modal-content">
                      <h5>Current Catalogue</h5>
                      <p></p>
                      <div class="tabla1 imagenes">
                        <table class="striped">
                          <thead>
                            <tr>
                              <th>Code</th>
                              <th>Service Line</th>
                              <th>Country</th>
                              <th>Process</th>
                              <th>Transaction</th>
                              <th>Subtransaction</th>
                              <th>Document</th>
                              <th>Check</th>
                              <th>Delete</th>
                              <th>Component</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            require_once 'sqls.php';
                              $reg=Consulttr($conexion);
                              while ($result=mysqli_fetch_array($reg))
                              {
                            ?>
                                <tr>
                                  <td>
                                  <?php
                                    echo "<option value=\"".$result['Relation']."\">".$result['Relation']."</option>\n";
                                  ?>
                                  </td>
                                  <td>
                                  <?php
                                    echo "<option value=\"".$result['Relation']."\">".$result['Service Line']."</option>\n";
                                  ?>
                                  </td>
                                  <td>
                                  <?php
                                    echo "<option value=\"".$result['Relation']."\">".$result['Country']."</option>\n";
                                  ?>
                                  </td>
                                  <td>
                                  <?php
                                    echo "<option value=\"".$result['Relation']."\">".$result['Process']."</option>\n";
                                  ?>
                                  </td>
                                  <td>
                                  <?php
                                    echo "<option value=\"".$result['Relation']."\">".$result['Transaction']."</option>\n";
                                  ?>
                                  </td>
                                  <td>
                                  <?php
                                    echo "<option value=\"".$result['Relation']."\">".$result['Sub Transaction']."</option>\n";
                                  ?>
                                  </td>
                                  <td>
                                  <?php
                                    echo "<option value=\"".$result['Relation']."\">".$result['Checks']."</option>\n";
                                  ?>
                                  </td>
                                  <td>
                                  <?php
                                    echo "<option value=\"".$result['Relation']."\">".$result['Document']."</option>\n";
                                  ?>
                                  </td>
                                  <td>
                                    <?php
                                      echo '<a href="Baja.php?id='.$result["Relation"].'&tabla=14"><i class="material-icons left grey-text">clear</i></a> ';
                                    ?>  
                                  </td>
                                  <td>
                                    <?php
                                      echo '<a href="Modif.php?id='.$result["Relation"].'&tabla=14"><i class="material-icons left grey-text">apps</i></a> ';
                                    ?>
                                  </td>
                                </tr>
                                <?php
                                  }
                                ?>

                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button data-target="modal_insert_relacion" class="waves-effect waves-light btn modal-trigger red" data-position="bottom" type="submit" name="action">New<i class="material-icons right">playlist_add</i>
                        </button>
                        <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                        </button>
                    </div>
                </div>
                <div id="modal_insert_relacion" class="modal modal-fixed-footer">
                    <h5>Please select all options</h5>
                    <form>
                      <div class="modal-content">
                        <div class="tabla1">
                          <div class="input-field col s11">
                            <select class = "browser-default" name="country">
                              <option required="" value="" disabled selected>Select a Country</option>
                              <?php
                                    $reg = mysqli_query($conexion,"SELECT * from country where Available = 1");
                                    while ($result=mysqli_fetch_array($reg)) 
                                    {
                                       echo "<option value=\"".$result['Id_Country']."\">".$result['Country_Name']."</option>\n";
                                    }
                                  ?>
                            </select>
                          </div>
                          <div class="input-field col s11">
                            <select class = "browser-default" name="service_line">
                              <option required="" value="" disabled selected>Select a Service Line</option>
                              <?php
                                    $reg = mysqli_query($conexion,"SELECT * from service_line where Available = 1");
                                    while ($result=mysqli_fetch_array($reg)) 
                                    {
                                       echo "<option value=\"".$result['Id_SL']."\">".$result['Service_Line_Name']."</option>\n";
                                    }
                                  ?>
                            </select>
                          </div>
                          <div class="input-field col s11">
                            <select class = "browser-default" name="process">
                              <option required="" value="" disabled selected>Select a Process</option>
                              <?php
                                    $reg = mysqli_query($conexion,"SELECT * from process where Available = 1");
                                    while ($result=mysqli_fetch_array($reg)) 
                                    {
                                       echo "<option value=\"".$result['Id_Process']."\">".$result['Process_Name']."</option>\n";
                                    }
                                  ?>
                            </select>
                          </div>
                          <div class="input-field col s11">
                            <select class = "browser-default" name="transaction">
                              <option required="" value="" disabled selected>Select a Transaction</option>
                              <?php
                                    $reg = mysqli_query($conexion,"SELECT * from transaction where Available = 1");
                                    while ($result=mysqli_fetch_array($reg)) 
                                    {
                                       echo "<option value=\"".$result['Id_Transaction']."\">".$result['Transaction_Name']."</option>\n";
                                    }
                                  ?>
                            </select>
                          </div>
                          <div class="input-field col s11">
                            <select class = "browser-default" name="sub_transaction">
                              <option required="" value="" disabled selected>Select a Sub Transaction</option>
                              <?php
                                    $reg = mysqli_query($conexion,"SELECT * from sub_transaction where Available = 1");
                                    while ($result=mysqli_fetch_array($reg)) 
                                    {
                                       echo "<option value=\"".$result['Id_Sub_Transaction']."\">".$result['Sub_Transaction_Name']."</option>\n";
                                    }
                                  ?>
                            </select>
                          </div>
                          <div class="input-field col s11">
                            <select class = "browser-default" name="document_type">
                              <option required="" value="" disabled selected>Select a Counting File</option>
                              <?php
                                    $reg = mysqli_query($conexion,"SELECT * from document_type where Available = 1");
                                    while ($result=mysqli_fetch_array($reg)) 
                                    {
                                       echo "<option value=\"".$result['Id_Document_Type']."\">".$result['Document_Type_Name']."</option>\n";
                                    }
                                  ?>
                            </select>
                          </div>
                          <div class="input-field col s11">
                            <select class = "browser-default" name="checks">
                              <option required="" value="" disabled selected>Select a Check</option>
                              <?php
                                    $reg = mysqli_query($conexion,"SELECT * from checks where Available = 1");
                                    while ($result=mysqli_fetch_array($reg)) 
                                    {
                                       echo "<option value=\"".$result['Id_Check']."\">".$result['Check_Name']."</option>\n";
                                    }
                                  ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                          <button class="waves-effect waves-light btn red white-text right" type="submit" name="action">Insert<i class="material-icons right">check</i>
                          </button>
                          <button class="waves-effect waves-light btn red white-text left modal-close" type="button">Close<i class="material-icons right">close</i>
                          </button>
                      </div>
                    </form>
                </div>
              </div>
              <!--****************************************************Fin de la caja 2*****************************************************************-->
            </div>
          </div>
        </div>
    </div>
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++Seccion de footer ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --> 
    <footer class="page-footer red">
          <div class="container" align="left">
            <div class="row imagenes">
                <h4 class="white-text">GBS Quality finance</h4>
                <h5 class="grey-text text-lighten-4">Application made for Quality Framework, tool to perform audits of the finance area.</h5>
                <h6>Quality Framework</h6>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
            </div>
          </div>
    </footer>
  </body>

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
</html>