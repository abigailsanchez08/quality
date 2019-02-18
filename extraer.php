<?php
	require_once("conection.php");
	require_once("functions.php");
	$sql1=	"select
			l.Id_CAudit as 'Id Component Audit',
			a.Service_Line_Name as 'Service Line',
			b.Country_Name as Country,
			c.Process_Name	as Process,
			d.Transaction_Name as Transaction,
			e.Sub_transaction_Name as 'Sub Transaction',
			f.Check_Name as 'Checks',
			g.Document_Type_Name as Document,
			h.Component_Name as Component,
			i.Characteristic as Characteristic,
			i.Description as Description,
			j.Rejection_Type_Name as 'Rejection Type',
			k.Document_Number as 'Document ID',
			k.Register_Number as 'SAP ID Register',
			k.Date as 'Date Audit',
			k.Comment as Coment,
			l.Status as Status
			from
			service_line a,
			country b,
			process c,
			transaction d,
			sub_transaction e,
			checks f,
			document_type g,
			component h,
			trcc i,
			rejection_type j,
			check_audit k,
			component_audit l,
			tr m
			Where
			l.Id_Audit = k.Id_Audit and
			l.Id_Rejection_Type = j.Id_Rejection_Type and
			l.Id_TRCC = i.Id_TRCC and
			k.Id_Relation = m.Id_Relation and
			m.Id_SL = a.Id_SL and
			m.Id_Country = b.Id_Country and
			m.Id_Process = c.Id_Process and
			m.Id_Transaction = d.Id_Transaction and
			m.Id_Sub_Transaction = e.Id_Sub_Transaction and
			m.Id_Check = f.Id_Check and
			m.Id_Document_Type = g.Id_Document_Type and
			i.Id_Component = h.Id_Component";
	$sql2 = "
		select Component_Name from component;
	";
	if (isset($_POST["Descargar"])) {
		exportar($conexion,$sql2);	
	}
?>