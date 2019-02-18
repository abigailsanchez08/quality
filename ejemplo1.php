<?php
  function ConsultAudits($conexion,$date)
  {
    if(empty($date)){
      //echo "Date has not been set";
      $d = date("d");
      $m = date("m");
      $y = date("Y");
      $dates = $y."-".$m."-".$d;
      //$date = $_POST['fecha'];
    }
    elseif (!empty($date))
    {
      $sql_Admin= "select
                    k.Id_Audit,
                    a.Service_Line_Name as 'Service Line',
                    b.Country_Name as Country,
                    c.Process_Name  as Process,
                    d.Transaction_Name as Transaction,
                    e.Sub_transaction_Name as 'Sub Transaction',
                    f.Check_Name as 'Checks',
                    g.Document_Type_Name as Document,
                    k.Document_Number as 'Document Id',
                    k.Register_Number as 'SAP Id Register',
                    k.Date as 'Date',
                    k.Comment as Comment,
                    K.Status as Status,
                    h.Username as Auditor,
                    i.Name as 'Team Lead Name',
                    i.Lastname as 'Team Lead Last Name',
                    l.Id_Specialist as 'Specialist'
                  from
                    service_line a,
                    country b,
                    process c,
                    transaction d,
                    sub_transaction e,
                    checks f,
                    document_type g,
                    users h,
                    team_leader i,
                    rejection_type j,
                    check_audit k,
                    specialist l,
                    tr m
                  Where
                    k.Date = ? and
                    k.Available = 1 and 
                    k.Id_Relation = m.Id_Relation and
                    m.Id_SL = a.Id_SL and
                    m.Id_Country = b.Id_Country and
                    m.Id_Process = c.Id_Process and
                    m.Id_Transaction = d.Id_Transaction and
                    m.Id_Sub_Transaction = e.Id_Sub_Transaction and
                    m.Id_Check = f.Id_Check and
                    m.Id_Document_Type = g.Id_Document_Type and
                    k.Id_User = h.Id_User and
                    k.ID_Team_Leader = i.Id_Team_Leader and
                    k.Id_Specialist = l.Id_Specialist
                    group by Id_Audit;";

      $sql_Auditor= "select
                      k.Id_Audit,
                      a.Service_Line_Name as 'Service Line',
                      b.Country_Name as Country,
                      c.Process_Name  as Process,
                      d.Transaction_Name as Transaction,
                      e.Sub_transaction_Name as 'Sub Transaction',
                      f.Check_Name as 'Checks',
                      g.Document_Type_Name as Document,
                      k.Document_Number as 'Document ID',
                      k.Register_Number as 'SAP ID Register',
                      k.Date as 'Date Audit',
                      k.Comment as Coment,
                      K.Status as Status,
                      h.Username as Auditor,
                      i.Name as 'Team Lead Name',
                      i.Lastname as 'Team Lead Last Name',
                      l.Id_Specialist as 'Specialist'
                    from
                      service_line a,
                      country b,
                      process c,
                      transaction d,
                      sub_transaction e,
                      checks f,
                      document_type g,
                      users h,
                      team_leader i,
                      rejection_type j,
                      check_audit k,
                      specialist l,
                      tr m
                    Where
                      k.Date = ? and
                      k.Available = 1 and 
                      k.Id_Relation = m.Id_Relation and
                      m.Id_SL = a.Id_SL and
                      m.Id_Country = b.Id_Country and
                      m.Id_Process = c.Id_Process and
                      m.Id_Transaction = d.Id_Transaction and
                      m.Id_Sub_Transaction = e.Id_Sub_Transaction and
                      m.Id_Check = f.Id_Check and
                      m.Id_Document_Type = g.Id_Document_Type and
                      h.Id_User = ? and
                      k.ID_Team_Leader = i.Id_Team_Leader
                      group by Id_Audit;";

      if (isset($_SESSION['loggedin'])== true && isset($_SESSION['usuario']) && $_SESSION['usuario'] == 2) 
      {
          $nombre = $_SESSION['nombre'];
          $priv = mysqli_query($conexion,"SELECT Id_Privilege from users where Username = '$nombre'");
          $reg = mysqli_query($conexion,"SELECT * from users where Username = '$nombre'");
          while ($result=mysqli_fetch_array($reg)) 
          {
              $privilegio = $result['Id_Privilege'];
              $auditor =  $result['Id_User'];
          }
          if ($privilegio == 1)
          {
            $resultado = $conexion -> prepare($sql_Admin);
            $resultado->bind_param("s",$date);
            $resultado->execute();
            return $resultado->get_result();
          }
          else if ($privilegio == 2)
          {
            $resultado = $conexion -> prepare($sql_Admin);
            $resultado->bind_param("si",$date,$auditor);
            $resultado->execute();
            return $resultado->get_result();
            
          }
      }
    }
  }
?>
               