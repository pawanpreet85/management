<?php

include("php/dbconnect.php");

if($_POST['type'] == 'searchEmployee'){

	$result = $conn->query("SELECT * FROM employees where name LIKE '".$_POST['search']."%' OR phone LIKE '%".$_POST['search']."%' OR email LIKE '%".$_POST['search']."%' ");
	// var_dump($result); die;
	$data = "";
	while ($row = $result->fetch_assoc()) {

		// var_dump($row); die;
		$status = "";
		$std = "";
		$edit = "<a href='edit-employee.php?id=".$row['id']."' class='btn btn-primary' style='background: #fff'><i class='fa fa-pencil'></i></a>";
		if($row['status'] == '1'){
			$status = 'Active';
			$std = "<a href='manage-employee.php?inid=".$row['id']."' onclick='return confirm('Are you sure you want to block this Employee?');' >  <button class='btn btn-danger'> Inactive</button>";
		}
		else{
			$status = 'Blocked';
			$std = "<a href='manage-employee.php?id=".$row['id']."' onclick='return confirm('Are you sure you want to active this Employee?');'><button class='btn btn-primary'> Active</button> ";
		}
		$i=1;

		$data = $data . "<tr>
		<tr class='odd gradeX'>
		<td class='center'>".$i++."</td>
		<td class='center'>".$row['employee_id']."</td>
		<td class='center'>".$row['name']."</td>
		<td class='center'>".$row['email']."</td>
		<td class='center'>".$row['phone']."</td>
		<td class='center'>".$row['date_of_joining']."</td>
		<td class='center'>".$status."</td>
		<td class='center'>".$std.$edit."</td>
		</tr>";	
	}	
	echo $data;
}

elseif($_POST['type'] == 'searchHr'){

	$result = $conn->query("SELECT * FROM manage where FullName LIKE '".$_POST['search']."%' OR MobileNumber LIKE '%".$_POST['search']."%' OR EmailId LIKE '%".$_POST['search']."%' OR ManageId LIKE '%".$_POST['search']."%' ");
	// var_dump($result); die;
	$data = "";
	while ($row = $result->fetch_assoc()) {

		// var_dump($row); die;
		$status = "";
		$std = "";
		$edit = "<a href='edit-manage-admin.php?id=".$row['id']."' class='btn btn-primary' style='background: #fff'><i class='fa fa-pencil'></i></a>";
		if($row['Status'] == '1'){
			$status = 'Active';
			$std = "<a href='manage-admin.php?inid=".$row['id']."' onclick='return confirm('Are you sure you want to block this HR?');' >  <button class='btn btn-danger'> Inactive</button>";
		}
		else{
			$status = 'Blocked';
			$std = "<a href='manage-admin.php?id=".$row['id']."' onclick='return confirm('Are you sure you want to active this HR?');'><button class='btn btn-primary'> Active</button> ";
		}
		$i=1;

		$data = $data . "<tr>
		<tr class='odd gradeX'>
		<td class='center'>".$i++."</td>
		<td class='center'>".$row['ManageId']."</td>
		<td class='center'>".$row['FullName']."</td>
		<td class='center'>".$row['EmailId']."</td>
		<td class='center'>".$row['MobileNumber']."</td>
		<td class='center'>".$row['RegDate']."</td>
		<td class='center'>".$status."</td>
		<td class='center'>".$std.$edit."</td>
		</tr>";	
	}	
	echo $data;
}

?>