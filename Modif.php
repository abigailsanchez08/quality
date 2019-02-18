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
          <div class="modificar">
      			<?php 
        			$datos=$_GET;
        			$tabla = $_GET["tabla"];
        			switch($tabla)
        			{
                //Country
        				case 1:
        					$id_modif = $_GET["id"];
        					?>
                  <div class="modify">
          					<h5>Modify Country Data</h5>
          					<form method="POST" action="modify.php">
          						<?php 
      	                $result = mysqli_query($conexion,"SELECT * from country where Id_Country = $id_modif");
                        while ($reg=mysqli_fetch_array($result))  
      	                  {
      	                    $id_pais = $reg["Id_Country"];
      	                    $nombre = $reg["Country_Name"];
      	                  }
      	              ?>
                      <div class="row row1 right">
                        <h6>Country Code</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">assignment</i>
                          <input id="icon_prefix" type="text" name="serie1" class="validate" required="" disabled <?php echo 'value="'.$id_pais.'"';?>>
                          <input id="icon_prefix" type="text" name="serie" class="validate" required="" hidden <?php echo 'value="'.$id_pais.'"';?>>
                          <input id="icon_prefix" type="hidden" class="validate" required="" name="tabla" value="1">
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>Country Name</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">flag</i>
                          <input id="icon_prefix" type="text" name="nombre_pais" class="validate" required="" <?php echo 'value="'.$nombre.'"';?>>
                        </div>
                      </div>
                      <div class="row">
                        <div class="modif1 col s4 left">
                          <button class="btn waves-effect waves-light red white-text"><a href="insert.php" class="white-text">Cancel
                            <i class="material-icons right">clear</i></a>
                          </button>
                        </div>
                        <div class="modif col s4 right">
                          <button class="btn waves-effect waves-light red white-text" type="submit" name="action">Update
                            <i class="material-icons right">send</i>
                          </button>
                        </div>
                      </div>
      				      </form>
                  </div>
            		  <?php
            		break;
                //Service Line
                case 2:
                  $id = $_GET["id"];
                  ?>
                  <div class="modify">
                    <h5>Modify Service Line Data</h5>
                    <form method="POST" action="modify.php">
                      <?php 
                        $reg = mysqli_query($conexion,"SELECT * from service_line where Id_SL = $id");
                        while ($result=mysqli_fetch_array($reg))  
                          {
                            $id_area = $result["Id_SL"];
                            $nombre = $result["Service_Line_Name"];
                          }
                      ?>
                      <div class="row row1 right">
                        <h6>Service Line Code</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">assignment</i>
                          <input id="icon_prefix" type="text" name="serie1" class="validate" disabled required="" <?php echo 'value="'.$id_area.'"';?>>
                          <input id="icon_prefix" type="text" name="serie" class="validate" hidden required="" <?php echo 'value="'.$id_area.'"';?>>
                          <input id="icon_prefix" type="hidden" class="validate" required="" name="tabla" value="2">
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>Service Line Name</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">line_weight</i>
                          <input id="icon_prefix" type="text" name="nombre_area" class="validate" required="" <?php echo 'value="'.$nombre.'"';?>>
                        </div>
                      </div>
                      <div class="row">
                        <div class="modif1 col s4 left">
                          <button class="btn waves-effect waves-light red white-text"><a href="insert.php" class="white-text">Cancel
                            <i class="material-icons right">clear</i></a>
                          </button>
                        </div>
                        <div class="modif col s4 right">
                          <button class="btn waves-effect waves-light red white-text" type="submit" name="action">Update
                            <i class="material-icons right">send</i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <?php
                break;
                //Process
                case 3:
                  $id = $_GET["id"];
                  ?>
                  <div class="modify">
                    <h5>Modify Process Data</h5>
                    <form method="POST" action="modify.php">
                      <?php 
                        $reg = mysqli_query($conexion,"SELECT * from process where Id_Process = $id");
                        while ($result=mysqli_fetch_array($reg))  
                          {
                            $id_proceso = $result["Id_Process"];
                            $nombre = $result["Process_Name"];
                          }
                      ?>
                      <div class="row row1 right">
                        <h6>Process Code</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">assignment</i>
                          <input id="icon_prefix" type="text" name="serie1" class="validate" disabled required="" <?php echo 'value="'.$id_proceso.'"';?>>
                          <input id="icon_prefix" type="text" name="serie" class="validate" hidden required="" <?php echo 'value="'.$id_proceso.'"';?>>
                          <input id="icon_prefix" type="hidden" class="validate" required="" name="tabla" value="3">
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>Process Name</h6>
                        <div class="input-field col s12 black-text">
                          <i class="material-icons prefix black-text">folder</i>
                          <input id="icon_prefix" type="text" name="nombre_proceso" class="validate" required="" <?php echo 'value="'.$nombre.'"';?>>
                        </div>
                      </div>
                      <div class="row">
                        <div class="modif1 col s4 left">
                          <button class="btn waves-effect waves-light red white-text"><a href="insert.php" class="white-text">Cancel
                            <i class="material-icons right">clear</i></a>
                          </button>
                        </div>
                        <div class="modif col s4 right">
                          <button class="btn waves-effect waves-light red white-text" type="submit" name="action">Update
                            <i class="material-icons right">send</i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <?php
                break;
                //Transaction
                case 4:
                  $id = $_GET["id"];
                  ?>
                  <div class="modify">
                    <h5>Modify Transaction Data</h5>
                    <form method="POST" action="modify.php">
                      <?php 
                        $reg = mysqli_query($conexion,"SELECT * from transaction where Id_Transaction = $id");
                        while ($result=mysqli_fetch_array($reg))  
                          {
                            $id_transaccion = $result["Id_Transaction"];
                            $nombre = $result["Transaction_Name"];
                          }
                      ?>
                      <div class="row row1 right">
                        <h6>Transaction Code</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">assignment</i>
                          <input id="icon_prefix" type="text" name="serie1" class="validate" disabled required="" <?php echo 'value="'.$id_transaccion.'"';?>>
                          <input id="icon_prefix" type="text" name="serie" class="validate" hidden required="" <?php echo 'value="'.$id_transaccion.'"';?>>
                          <input id="icon_prefix" type="hidden" class="validate" required="" name="tabla" value="4">
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>Transaction Name</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">vertical_align_bottom</i>
                          <input id="icon_prefix" type="text" name="nombre_transaccion" class="validate" required="" <?php echo 'value="'.$nombre.'"';?>>
                        </div>
                      </div>
                      <div class="row">
                        <div class="modif1 col s4 left">
                          <button class="btn waves-effect waves-light red white-text"><a href="insert.php" class="white-text">Cancel<i class="material-icons right">clear</i></a>
                          </button>
                        </div>
                        <div class="modif col s4 right">
                          <button class="btn waves-effect waves-light red white-text" type="submit" name="action">Update
                            <i class="material-icons right">send</i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <?php
                break;
                //Sub-Transaction
                case 5:
                  $id = $_GET["id"];
                  ?>
                  <div class="modify">
                    <h5>Modify Sub-Transaction Data</h5>
                    <form method="POST" action="modify.php">
                      <?php 
                        $reg = mysqli_query($conexion,"SELECT * from sub_transaction where Id_Sub_Transaction = $id");
                        while ($result=mysqli_fetch_array($reg))  
                          {
                            $id_subtransaccion = $result["Id_Sub_Transaction"];
                            $nombre = $result["Sub_Transaction_Name"];
                          }
                      ?>
                      <div class="row row1 right">
                        <h6>Sub-Transaction Code</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">assignment</i>
                          <input id="icon_prefix" type="text" name="serie1" class="validate" disabled required="" <?php echo 'value="'.$id_subtransaccion.'"';?>>
                          <input id="icon_prefix" type="text" name="serie" class="validate" hidden required="" <?php echo 'value="'.$id_subtransaccion.'"';?>>
                          <input id="icon_prefix" type="hidden" class="validate" required="" name="tabla" value="5">
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>Sub-Transaction Name</h6>
                        <div class="input-field col s12 black-text">
                          <i class="material-icons prefix black-text">import_contacts</i>
                          <input id="icon_prefix" type="text" name="nombre_subtransaccion" class="validate" required="" <?php echo 'value="'.$nombre.'"';?>>
                        </div>
                      </div>
                      <div class="row">
                        <div class="modif1 col s4 left">
                          <button class="btn waves-effect waves-light red white-text"><a href="insert.php" class="white-text">Cancel<i class="material-icons right">clear</i></a>
                          </button>
                        </div>
                        <div class="modif col s4 right">
                          <button class="btn waves-effect waves-light red white-text" type="submit" name="action">Update
                            <i class="material-icons right">send</i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <?php
                break;
                //Check
                case 6:
                  $id = $_GET["id"];
                  ?>
                  <div class="modify">
                    <h5>Modify Check Data</h5>
                    <form method="POST" action="modify.php">
                      <?php 
                        $reg = mysqli_query($conexion,"SELECT * from checks where Id_Check = $id");
                        while ($result=mysqli_fetch_array($reg))  
                          {
                            $id_check = $result["Id_Check"];
                            $nombre = $result["Check_Name"];
                          }
                      ?>
                      <div class="row row1 right">
                        <h6>Check Code</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">assignment</i>
                          <input id="icon_prefix" type="text" name="serie1" class="validate" disabled required="" <?php echo 'value="'.$id_check.'"';?>>
                          <input id="icon_prefix" type="text" name="serie" class="validate" hidden required="" <?php echo 'value="'.$id_check.'"';?>>
                          <input id="icon_prefix" type="hidden" class="validate" required="" name="tabla" value="6">
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>Check Name</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">beenhere</i>
                          <input id="icon_prefix" type="text" name="nombre_check" class="validate" required="" <?php echo 'value="'.$nombre.'"';?>>
                        </div>
                      </div>
                      <div class="row">
                        <div class="modif1 col s4 left">
                          <button class="btn waves-effect waves-light red white-text"><a href="insert.php" class="white-text">Cancel<i class="material-icons right">clear</i></a>
                          </button>
                        </div>
                        <div class="modif col s4 right">
                          <button class="btn waves-effect waves-light red white-text" type="submit" name="action">Update
                            <i class="material-icons right">send</i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <?php
                break;
                //Counting File
                case 7:
                  $id = $_GET["id"];
                  ?>
                  <div class="modify">
                    <h5>Modify Counting File Data</h5>
                    <form method="POST" action="modify.php">
                      <?php 
                        $reg = mysqli_query($conexion,"SELECT * from document_type where Id_Document_Type = $id");
                        while ($result=mysqli_fetch_array($reg))  
                          {
                            $id_archivo = $result["Id_Document_Type"];
                            $nombre = $result["Document_Type_Name"];
                          }
                      ?>
                      <div class="row row1 right">
                        <h6>Counting File Code</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">assignment</i>
                          <input id="icon_prefix" type="text" name="serie1" class="validate" disabled required="" <?php echo 'value="'.$id_archivo.'"';?>>
                          <input id="icon_prefix" type="text" name="serie" class="validate" hidden required="" <?php echo 'value="'.$id_archivo.'"';?>>
                          <input id="icon_prefix" type="hidden" class="validate" required="" name="tabla" value="7">
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>Old Counting File Name</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">class</i>
                          <input id="icon_prefix" type="text" name="nombre_archivo" class="validate" required="" <?php echo 'value="'.$nombre.'"';?>>
                        </div>
                      </div>
                      <div class="row">
                        <div class="modif1 col s4 left">
                          <button class="btn waves-effect waves-light red white-text"><a href="insert.php" class="white-text">Cancel<i class="material-icons right">clear</i></a>
                          </button>
                        </div>
                        <div class="modif col s4 right">
                          <button class="btn waves-effect waves-light red white-text" type="submit" name="action">Update
                            <i class="material-icons right">send</i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <?php
                break;
                //Componente
                case 8:
                  $id = $_GET["id"];
                  ?>
                  <div class="modify">
                    <h5>Modify Component Data</h5>
                    <form method="POST" action="modify.php">
                      <?php 
                        $reg = mysqli_query($conexion,"SELECT * from component where Id_Component = $id");
                        while ($result=mysqli_fetch_array($reg))  
                          {
                            $id_componente = $result["Id_Component"];
                            $nombre = $result["Component_Name"];
                          }
                      ?>
                      <div class="row row1 right">
                        <h6>Component Code</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">assignment</i>
                          <input id="icon_prefix" type="text" name="serie1" class="validate" disabled required="" <?php echo 'value="'.$id_componente.'"';?>>
                          <input id="icon_prefix" type="text" name="serie" class="validate" hidden required="" <?php echo 'value="'.$id_componente.'"';?>>
                          <input id="icon_prefix" type="hidden" class="validate" required="" name="tabla" value="8">
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>Old Component Name</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">add_box</i>
                          <input id="icon_prefix" type="text" name="nombre_componente" class="validate" required="" <?php echo 'value="'.$nombre.'"';?>>
                        </div>
                      </div>
                      <div class="row">
                        <div class="modif1 col s4 left">
                          <button class="btn waves-effect waves-light red white-text"><a href="insert.php" class="white-text">Cancel<i class="material-icons right">clear</i></a>
                          </button>
                        </div>
                        <div class="modif col s4 right">
                          <button class="btn waves-effect waves-light red white-text" type="submit" name="action">Update
                            <i class="material-icons right">send</i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <?php
                break;
                //Rejection Type
                case 9:
                  $id = $_GET["id"];
                  ?>
                  <div class="modify">
                    <h5>Modify Rejection Type Data</h5>
                    <form method="POST" action="modify.php">
                      <?php 
                        $reg = mysqli_query($conexion,"SELECT * from rejection_type where Id_Rejection_Type = $id");
                        while ($result=mysqli_fetch_array($reg))  
                          {
                            $id_rejection = $result["Id_Rejection_Type"];
                            $nombre = $result["Rejection_Type_Name"];
                          }
                      ?>
                      <div class="row row1 right">
                        <h6>User Code</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">assignment</i>
                          <input id="icon_prefix" type="text" name="serie1" class="validate" disabled required="" <?php echo 'value="'.$id_rejection.'"';?>>
                          <input id="icon_prefix" type="text" name="serie" class="validate" hidden required="" <?php echo 'value="'.$id_rejection.'"';?>>
                          <input id="icon_prefix" type="hidden" class="validate" required="" name="tabla" value="9">
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>Old Component Name</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">border_all</i>
                          <input id="icon_prefix" type="text" name="rejection_name" class="validate" required="" <?php echo 'value="'.$nombre.'"';?>>
                        </div>
                      </div>
                      <div class="row">
                        <div class="modif1 col s4 left">
                          <button class="btn waves-effect waves-light red white-text"><a href="insert.php" class="white-text">Cancel<i class="material-icons right">clear</i></a>
                          </button>
                        </div>
                        <div class="modif col s4 right">
                            <button class="btn waves-effect waves-light red white-text" type="submit">Update<i class="material-icons right">beenhere</i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <?php
                break;
                //Privilege
                case 10:
                  $id = $_GET["id"];
                  ?>
                  <div class="modify">
                    <h5>Modify Privilege Data</h5>
                    <form method="POST" action="modify.php">
                      <?php 
                        $reg = mysqli_query($conexion,"SELECT * from privilege where Id_Privilege = $id");
                        while ($result=mysqli_fetch_array($reg))  
                          {
                            $id_privi = $result["Id_Privilege"];
                            $nombre = $result["Privilege_Name"];
                          }
                      ?>
                      <div class="row row1 right">
                        <h6>Privilege Code</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">assignment</i>
                          <input id="icon_prefix" type="text" name="serie1" class="validate" disabled required="" <?php echo 'value="'.$id_privi.'"';?>>
                          <input id="icon_prefix" type="text" name="serie" class="validate" hidden required="" <?php echo 'value="'.$id_privi.'"';?>>
                          <input id="icon_prefix" type="hidden" class="validate" required="" name="tabla" value="10">

                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>Old Privilege Name</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">pin_drop</i>
                          <input id="icon_prefix" type="text" name="nombre_privilegio" class="validate" required="" <?php echo 'value="'.$nombre.'"';?>>
                        </div>
                      </div>
                      <div class="row">
                        <div class="modif1 col s4 left">
                          <button class="btn waves-effect waves-light red white-text"><a href="insert.php" class="white-text">Cancel<i class="material-icons right">clear</i></a>
                          </button>
                        </div>
                        <div class="modif col s4 right">
                          <button class="btn waves-effect waves-light red white-text" type="submit" name="action">Update
                            <i class="material-icons right">send</i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <?php
                break;
                //Users
                case 11:
                  $id = $_GET["id"];
                  ?>
                  <div class="modify">
                    <h5>Modify User Data</h5>
                    <form method="POST" action="modify.php">
                      <?php 
                        $reg = mysqli_query($conexion,"SELECT * from users where Id_User = $id");
                        while ($result=mysqli_fetch_array($reg))  
                          {
                            $id_usuario = $result["Id_User"];
                            $nombre = $result["Name"];
                            $apellido = $result["Lastname"];
                            $usuario = $result["Username"];
                            $password = $result["Password"];

                          }
                      ?>
                      <div class="row row1 right">
                        <h6>User Code</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">assignment</i>
                          <input id="icon_prefix" type="text" name="serie1" class="validate" disabled required="" <?php echo 'value="'.$id_usuario.'"';?>>
                          <input id="icon_prefix" type="text" name="serie" class="validate" hidden required="" <?php echo 'value="'.$id_usuario.'"';?>>
                          <input id="icon_prefix" type="hidden" class="validate" required="" name="tabla" value="11">
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>Name</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">account_circle</i>
                          <input id="icon_prefix" type="text" name="nombre_auditor" class="validate" required="" <?php echo 'value="'.$nombre.'"';?>>
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>Last Name</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">account_circle</i>
                          <input id="icon_prefix" type="text" name="apellido_auditor" class="validate black-text" required="" <?php echo 'value="'.$apellido.'"';?>>
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>User Name</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">face</i>
                          <input id="icon_prefix" type="text" name="usuario" class="validate" required="" <?php echo 'value="'.$usuario.'"';?>>
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>Last Password</h6>
                        <div class="input-field col s12 black-text">
                          <i class="material-icons prefix black-text">security</i>
                          <input id="icon_prefix" type="password" name="password_o" class="validate"  disabled required="" <?php echo 'value="'.$password.'"';?>>
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>New Password</h6>
                        <div class="input-field col s12 black-text">
                          <i class="material-icons prefix black-text">security</i>
                          <input id="icon_prefix" type="password" name="password" class="validate" required="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="modif1 col s4 left">
                          <button class="btn waves-effect waves-light red white-text"><a href="insert.php" class="white-text">Cancel<i class="material-icons right">clear</i></a>
                          </button>
                        </div>
                        <div class="modif col s4 right">
                          <button class="btn waves-effect waves-light red white-text" type="submit" name="action">Update
                            <i class="material-icons right">send</i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <?php
                break;
                //Team Leader
                case 12:
                  $id = $_GET["id"];
                  ?>
                  <div class="modify">
                    <h5>Modify Team Leader Data</h5>
                    <form method="POST" action="modify.php">
                      <?php 
                        $reg = mysqli_query($conexion,"SELECT * from team_leader where Id_Team_Leader = $id");
                        while ($result=mysqli_fetch_array($reg))  
                          {
                            $id_usuario = $result["Id_Team_Leader"];
                            $nombre = $result["Name"];
                            $apellido = $result["Lastname"];
                            $email = $result["Email"];

                          }
                      ?>
                      <div class="row row1 right">
                        <h6>Team Leader Code</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">assignment</i>
                          <input id="icon_prefix" type="text" name="serie1" class="validate" disabled required="" <?php echo 'value="'.$id_usuario.'"';?>>
                          <input id="icon_prefix" type="text" name="serie" class="validate" hidden required="" <?php echo 'value="'.$id_usuario.'"';?>>
                          <input id="icon_prefix" type="hidden" class="validate" required="" name="tabla" value="12">
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>Name</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">account_circle</i>
                          <input id="icon_prefix" type="text" name="nombre_team" class="validate" required="" <?php echo 'value="'.$nombre.'"';?>>
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>Last Name</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">account_circle</i>
                          <input id="icon_prefix" type="text" name="apellido_team" class="validate black-text" required="" <?php echo 'value="'.$apellido.'"';?>>
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>Email</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">email</i>
                          <input id="icon_prefix" type="email" name="email" class="validate" required="" <?php echo 'value="'.$email.'"';?>>
                        </div>
                      </div>
                      <div class="row">
                        <div class="modif1 col s4 left">
                          <button class="btn waves-effect waves-light red white-text"><a href="insert.php" class="white-text">Cancel<i class="material-icons right">clear</i></a>
                          </button>
                        </div>
                        <div class="modif col s4 right">
                          <button class="btn waves-effect waves-light red white-text" type="submit" name="action">Update
                            <i class="material-icons right">send</i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <?php
                break;
                //Specialist
                case 13:
                  $id = "'".$_GET["id"]."'";
                  ?>
                  <div class="modify">
                    <h5>Modify User Data</h5>
                    <form method="POST" action="modify.php">
                      <?php 
                        $reg = mysqli_query($conexion,"SELECT * from specialist where Id_Specialist = $id");
                        while ($result=mysqli_fetch_array($reg))   
                          {
                            $id = "'".$result["Id_Specialist"]."'";
                            $id_usuario = $result["Id_Specialist"];
                            $nombre = $result["Name"];
                            $apellido = $result["Lastname"];

                          }
                      ?>
                      <div class="row row1 right">
                        <h6>User Code</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">assignment</i>
                          <input id="icon_prefix" type="text" name="serie1" class="validate" disabled required="" <?php echo 'value="'.$id_usuario.'"';?>>
                          <input id="icon_prefix" type="text" name="serie" class="validate" hidden required="" <?php echo 'value="'.$id_usuario.'"';?>>
                          <input id="icon_prefix" type="hidden" class="validate" required="" name="tabla" value="13">
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>Name</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">account_circle</i>
                          <input id="icon_prefix" type="text" name="nombre_specialist" class="validate" required="" <?php echo 'value="'.$nombre.'"';?>>
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>Last Name</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">account_circle</i>
                          <input id="icon_prefix" type="text" name="apellido_specialist" class="validate black-text" required="" <?php echo 'value="'.$apellido.'"';?>>
                        </div>
                      </div>
                      <div class="row">
                        <div class="modif1 col s4 left">
                          <button class="btn waves-effect waves-light red white-text"><a href="insert.php" class="white-text">Cancel<i class="material-icons right">clear</i></a>
                          </button>
                        </div>
                        <div class="modif col s4 right">
                          <button class="btn waves-effect waves-light red white-text" type="submit" name="action">Update
                            <i class="material-icons right">send</i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <?php
                break;
                //Relation
                case 14:
                  $id =$_GET["id"];
                  ?>
                  <div class="component-table">
                    <table>
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
                        </tr>
                      </thead>
                      <tbody>
                            <?php
                            require_once 'sqls.php';
                              $reg=Consulttr1($conexion, $id);
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
                                </tr>
                                <?php
                                  }
                                ?>

                          </tbody>
                    </table>
                  </div>
                  <div class="Division1">
                  </div>
                  <div class="component-table1">
                    <table>
                      <thead>
                        <tr>
                          <th>Relation Code</th>
                          <th>Component</th>
                          <th>Characteristic</th>
                          <th>Description</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                              $reg=Consulttrcc($conexion, $id);
                              while ($result=mysqli_fetch_array($reg))
                              {
                        ?>
                        <tr>
                          <td>
                            <?php
                              echo "<option value=\"".$result['rela']."\">".$result['rela']."</option>\n";
                            ?>
                          </td>
                          <td>
                            <?php
                              echo "<option value=\"".$result['rela']."\">".$result['name']."</option>\n";
                            ?>
                          </td>
                          <td>
                            <?php
                              echo "<option value=\"".$result['rela']."\">".$result['carac']."</option>\n";
                            ?>
                          </td>
                          <td>
                            <?php
                              echo "<option value=\"".$result['rela']."\">".$result['des']."</option>\n";
                            }
                            ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="modify">
                    <h5>Modify User Data</h5>
                    <form method="POST" action="modify.php">
                      <?php 
                        $reg = mysqli_query($conexion,"SELECT * from tr where Id_Relation = $id");
                        while ($result=mysqli_fetch_array($reg))   
                          {
                            $id_relation = $result["Id_Relation"];

                          }
                      ?>
                      <div class="row row1 right">
                        <h6>User Code</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">assignment</i>
                          <input id="icon_prefix" type="text" name="serie1" class="validate" disabled required="" <?php echo 'value="'.$id_relation.'"';?>>
                          <input id="icon_prefix" type="text" name="serie" class="validate" hidden required="" <?php echo 'value="'.$id_relation.'"';?>>
                          <input id="icon_prefix" type="hidden" class="validate" required="" name="tabla" value="13">
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>Name</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">account_circle</i>
                          <input id="icon_prefix" type="text" name="nombre_specialist" class="validate" required="" <?php echo 'value="'.$id_relation.'"';?>>
                        </div>
                      </div>
                      <div class="row row1 right">
                        <h6>Last Name</h6>
                        <div class="input-field col s12">
                          <i class="material-icons prefix black-text">account_circle</i>
                          <input id="icon_prefix" type="text" name="apellido_specialist" class="validate black-text" required="" <?php echo 'value="'.$id_relation.'"';?>>
                        </div>
                      </div>
                      <div class="row">
                        <div class="modif1 col s4 left">
                          <button class="btn waves-effect waves-light red white-text"><a href="insert.php" class="white-text">Cancel<i class="material-icons right">clear</i></a>
                          </button>
                        </div>
                        <div class="modif col s4 right">
                          <button class="btn waves-effect waves-light red white-text" type="submit" name="action">Update
                            <i class="material-icons right">send</i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <?php
                break;
            		default:
            		break;
          		}
      	    ?>
          </div>
		    </div>
    </div>
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
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
      $(".button-collapse").sideNav();
    </script>

    <script>
      function myFunction() {
        pass1 = document.getElementById("field1").value;
        pass2 = document.getElementById("field2").value;
        if(pass1 == pass2)
        {
          alert("Son iguales");
        }
        else
        {
          alert("No son iguales");
        }
      }
    </script>

  </body>
</html>