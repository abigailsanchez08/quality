<?php 
		function altas (){
			$args=func_get_args();

			switch ($args[1]) {
				case 1:
					//Country
					$sentencia = $args[0]->prepare("INSERT INTO country VALUES (null,?,1)");
					$sentencia->bind_param("s",$args[2]);
					$sentencia->execute();
					break;
				case 2:
					//Service_line
					$sentencia = $args[0]->prepare("INSERT INTO service_line VALUES (null,?,1)");
					$sentencia->bind_param("s",$args[2]);
					$sentencia->execute();
					break;
				case 3:
					//Process
					$sentencia = $args[0]->prepare("INSERT INTO process VALUES (null,?,1)");
					$sentencia->bind_param("s",$args[2]);
					$sentencia->execute();
					break;
				case 4:
					//Transaction
					$sentencia = $args[0]->prepare("INSERT INTO transaction VALUES (null,?,1)");
					$sentencia->bind_param("s",$args[2]);
					$sentencia->execute();
					break;
				case 5:
					//Subtransaction
					$sentencia = $args[0]->prepare("INSERT INTO sub_transaction VALUES (null,?,1)");
					$sentencia->bind_param("s",$args[2]);
					$sentencia->execute();
					break;
				case 6:
					//checks
					$sentencia = $args[0]->prepare("INSERT INTO checks VALUES (null,?,1)");
					$sentencia->bind_param("s",$args[2]);
					$sentencia->execute();
					break;
				case 7: 
					//Document_type
					$sentencia = $args[0]->prepare("INSERT INTO document_type VALUES (null,?,1)");
					$sentencia->bind_param("s",$args[2]);
					$sentencia->execute();
					break;
				case 8:
					//component
					$sentencia = $args[0]->prepare("INSERT INTO component VALUES (null,?,1)");
					$sentencia->bind_param("s",$args[2]);
					$sentencia->execute();
					break;
				case 9:
					$sentencia = $args[0]->prepare("INSERT INTO rejection_type VALUES (null,?,1)");
					$sentencia->bind_param("s",$args[2]);
					$sentencia->execute();
					break;
				case 10:
					$sentencia = $args[0]->prepare("INSERT INTO privilege VALUES (null,?,1)");
					$sentencia->bind_param("s",$args[2]);
					$sentencia->execute();
					break;
				case 11:
					//users(conexion, tabla, name, lastname, username, password, privilege)
					$sentencia = $args[0]->prepare("INSERT INTO users VALUES (null,?,?,?,?,1,?)");
					$sentencia->bind_param("ssssi",$args[2],$args[3],$args[4],$args[5],$args[6]);
					$sentencia->execute();
					break;
				case 12:
					//teamLeader(conexion, tabla, name, lastname, email)
					$sentencia = $args[0]->prepare("INSERT INTO team_leader VALUES (null,?,?,1)");
					$sentencia->bind_param("ss",$args[2],$args[3],$args[7]);
					$sentencia->execute();
					break;
				case 13:
					//specialist($conexion,$tabla,$nombre,$lastname)
					$sentencia = $args[0]->prepare("INSERT INTO specialist VALUES (null,?,?,1)");
					$sentencia->bind_param("ss",$args[2],$args[3]);
					$sentencia->execute();
					break;
				default:
					header("location:index.php");
					break;
			} 
		}
		
		/*=====  End of Altas Generico  ======*/
		
		/*=======================================
		=            Alta auditorias            =
		=======================================*/
		function alta_audit($conexion,$document,$register,$date,$status,$comment,$user,$team_lead,$specialist,$id_relacion){
			$sentencia = $conexion->prepare("INSERT INTO check_audit VALUES (null,?,?,?,?,?,1,?,?,?,?)");
			$sentencia->bind_param("sssisiiii",$document,$register,$date,$status,$comment,$id_relacion,$user,$team_lead,$specialist);
			$sentencia->execute();
		}
		/*=====  End of Alta auditorias  ======*/

		/*=====================================
		=            alta relacion            =
		=====================================*/
		function alta_relacion($conexion,$sl,$country,$process,$tran,$sub_tran,$doc,$check){
			$sentencia = $conexion->prepare("INSERT INTO tr VALUES (null,1,?,?,?,?,?,?,?)");
			$sentencia->bind_param("iiiiiii",$sl,$country,$process,$tran,$sub_tran,$doc,$check);
			$sentencia->execute();
		}
		/*=====  End of alta relacion  ======*/

		/*=============================================
		=            Alta Check Componente            =
		=============================================*/
		function alta_check_componente ($conexion,$characteristic,$Description,$relacion,$componente){
			$sentencia = $conexion->prepare("INSERT INTO trcc VALUES (null,?,?,1,?,?)");
			$sentencia->bind_param("ssii",$characteristic,$Description,$relacion,$componente);
			$sentencia->execute();
		}
		/*=====  End of Alta Check Componente  ======*/

		/*============================================
		=            Consulta Relacion tr            =
		============================================*/
		
	function Consulttr($conexion)
	{
	    $sql_tr= "select
			  m.Id_Relation as 'Relation',
		      a.Service_Line_Name as 'Service Line',
	          b.Country_Name as Country,
	          c.Process_Name  as Process,
	          d.Transaction_Name as Transaction,
	          e.Sub_transaction_Name as 'Sub Transaction',
	          f.Check_Name as 'Checks',
	          g.Document_Type_Name as 'Document'
          	from
            service_line a,
            country b,
            process c,
            transaction d,
            sub_transaction e,
            checks f,
            document_type g,
            tr m
            Where
            m.Id_SL = a.Id_SL and
            m.Id_Country = b.Id_Country and
            m.Id_Process = c.Id_Process and
            m.Id_Transaction = d.Id_Transaction and
            m.Id_Sub_Transaction = e.Id_Sub_Transaction and
            m.Id_Check = f.Id_Check and
            m.Id_Document_Type = g.Id_Document_Type
            order by Relation;";
	        $resultado = $conexion -> prepare($sql_tr);
	        $resultado->execute();
	        return $resultado->get_result();
	}

	function Consulttr1($conexion, $id)//Es necesario modificar para que obtenga el id 
	{
	    $sql_tr= "select
			  m.Id_Relation as 'Relation',
		      a.Service_Line_Name as 'Service Line',
	          b.Country_Name as Country,
	          c.Process_Name  as Process,
	          d.Transaction_Name as Transaction,
	          e.Sub_transaction_Name as 'Sub Transaction',
	          f.Check_Name as 'Checks',
	          g.Document_Type_Name as 'Document'
          	from
            service_line a,
            country b,
            process c,
            transaction d,
            sub_transaction e,
            checks f,
            document_type g,
            tr m
            Where
            m.Id_SL = a.Id_SL and
            m.Id_Country = b.Id_Country and
            m.Id_Process = c.Id_Process and
            m.Id_Transaction = d.Id_Transaction and
            m.Id_Sub_Transaction = e.Id_Sub_Transaction and
            m.Id_Check = f.Id_Check and
            m.Id_Document_Type = g.Id_Document_Type and
            m.Id_Relation = ?
            order by Relation;";
	        $resultado = $conexion -> prepare($sql_tr);
	        $resultado->bind_param("i",$id);
	        $resultado->execute();
	        return $resultado->get_result();
	}

	function Consulttrcc($conexion, $id)
	{
	    $sql_tr= "select 
					m.Id_TRCC as 'rela',
					c.Component_Name as 'name',
				    m.Characteristic as 'carac', 
				    m.Description as 'des',
				    m.Id_Relation as 'relation', 
				    m.Id_Component 'id_compo'
				from 
					trcc m, 
				    component c, 
				    tr a 
				where 
					m.Id_Component = c.Id_Component 
				and 
					m.Id_Relation = ?
                group by
                	m.Id_Component
               	order by
               		m.Id_TRCC;";
	        $resultado = $conexion -> prepare($sql_tr);
	        $resultado->bind_param("i",$id);
	        $resultado->execute();
	        return $resultado->get_result();
	}
 ?>