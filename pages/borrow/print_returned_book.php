<?php 
ob_start();
include "../../includes/session.php";
if ($_SESSION['userid'] == 99) {
    if (isset($_GET['campus'])) {
        $_SESSION['campus'] = $_GET['campus'];
        
    } else {
        if (isset($_SESSION['campus']) && $_SESSION['campus'] != "All") {
            $_SESSION['campus'] = $_SESSION['campus'];
            
        } else {
            $_SESSION['campus'] = "All";
            
        }
    }
  
    if (isset($_GET['department'])) {
      $_SESSION['department'] = $_GET['department'];
  
    } else {
  
        if (isset($_SESSION['department']) && $_SESSION['department'] != "All") {
            $_SESSION['department'] = $_SESSION['department'];
            
        } else {
            $_SESSION['department'] = "All";
            
        }
        
    }
  } else {
    $campus = mysqli_query($con, "SELECT * FROM campus WHERE campus_id = '$_SESSION[campus_id]'");
    $row1 = mysqli_fetch_array($campus);
    $_SESSION['campus'] = $row1['campus'];
  } 
?>

<html>

<head>
		<title>Library Management System</title>
		
		<style>
		
		
.container {
	width:100%;
	margin:auto;
}
		
.table {
    width: 100%;
    margin-bottom: 20px;
}	

.table-striped tbody > tr:nth-child(odd) > td,
.table-striped tbody > tr:nth-child(odd) > th {
    background-color: #f9f9f9;
}
		
@media print{
#print {
display:none;
}
}

#print {
	width: 90px;
    height: 30px;
    font-size: 18px;
    background: white;
    border-radius: 4px;
	margin-left:28px;
	cursor:hand;
}
		</style>
		
<script>
function printPage() {
    window.print();
}
</script>
</head>


<body>
	<div class = "container">
		<div id = "header">
		<br/>
				<center><img src = "../../img/logo.png" style="text-align: center; width: 130px; height: 130px;"></center>
				<center><h5 style = "font-style:Calibri; margin-top:-14px;"></h5><strong> &nbsp; &nbsp; Library Management System</strong></center>
				<center><h5 style = "font-style:Calibri; margin-top:-14px;"></h5><strong> Saint Francis Of Assisi College</strong></center>
				
				
			<p style = "margin-left:30px; margin-top:50px; font-size:14pt; font-weight:bold;">Returned Book Information FOR <b><?php echo strtoupper($_SESSION['campus'])?> CAMPUS</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
			<button type="submit" id="print" onclick="printPage()">Print</button>
        <div align="right">
		<b style="color:blue;">Date Prepared:</b>
		<?php include('../../includes/currentdate.php'); ?>
        </div>
<?php 
include ('../../includes/conn.php');					 
if ($_SESSION['campus'] == "All") {
	$return_query= mysqli_query($con,"select * from return_book 
	LEFT JOIN book ON return_book.book_id = book.book_id 
	LEFT JOIN user ON return_book.user_id = user.user_id
	LEFT JOIN campus ON campus.campus_id = book.campus_id
	where return_book.return_book_id order by return_book.return_book_id DESC") or die (mysql_error());
		$return_count = mysqli_num_rows($return_query);
		
	$count_penalty = mysqli_query($con,"SELECT sum(book_penalty) FROM return_book
	LEFT JOIN book ON return_book.book_id = book.book_id
	LEFT JOIN campus ON campus.campus_id = book.campus_id")or die(mysql_error());
	$count_penalty_row = mysqli_fetch_array($count_penalty);

} else {
$return_query= mysqli_query($con,"select * from return_book 
LEFT JOIN book ON return_book.book_id = book.book_id 
LEFT JOIN user ON return_book.user_id = user.user_id
LEFT JOIN campus ON campus.campus_id = book.campus_id
where campus = '$_SESSION[campus]' AND return_book.return_book_id order by return_book.return_book_id DESC") or die (mysql_error());
	$return_count = mysqli_num_rows($return_query);
	
$count_penalty = mysqli_query($con,"SELECT sum(book_penalty) FROM return_book
LEFT JOIN book ON return_book.book_id = book.book_id
LEFT JOIN campus ON campus.campus_id = book.campus_id
WHERE campus = '$_SESSION[campus]'")or die(mysql_error());
$count_penalty_row = mysqli_fetch_array($count_penalty);
}
?>
						<table cellpadding="2" cellspacing="2" border="2" class="table table-striped" style="border: 1px solid">
                                <div class="pull-left">
                                    <div class="span"><div class="alert alert-info"><i class="icon-credit-card icon-large"></i>&nbsp;Total Amount of Penalty:&nbsp;<?php echo "Php ".$count_penalty_row['sum(book_penalty)'].".00"; ?></div></div>
                                </div>
								<br />
						  <thead>
								<tr>
									<th>Barcode</th>
									<th>Borrower Name</th>
									<th>Level</th>
									<th>Section</th>
									<th>Title</th>
							<!---<th>Author</th>
							<th>ISBN</th>	-->
									<th>Date Borrowed</th>
									<th>Due Date</th>
									<th>Date Returned</th>
									<th>Penalty</th>
								</tr>
						  </thead>   
						  <tbody>
<?php
							while ($return_row= mysqli_fetch_array ($return_query) ){
							$id=$return_row['return_book_id'];
?>
							<tr>
								<td style="text-align:center;"><?php echo $return_row['accession_no']; ?></td>
								<td style="text-transform: capitalize; text-align:center;"><?php echo $return_row['firstname']." ".$return_row['middlename']." ".$return_row['lastname']; ?></td>
								<td style="text-transform: capitalize; text-align:center;"><?php echo $return_row['level']; ?></td>
								<td style="text-transform: capitalize; text-align:center;"><?php echo $return_row['section']; ?></td>
								<td style="text-transform: capitalize; text-align:center;"><?php echo $return_row['title']; ?></td>
								<td style="text-align:center;"><?php echo date("M d, Y h:m:s a",strtotime($return_row['date_borrowed'])); ?></td>
								<?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='' style='width:100px; text-align:center;'>".date("M d, Y h:m:s a",strtotime($return_row['due_date']))."</td>";
								 }else {
									 echo "<td style='text-align:center;'>".date("M d, Y h:m:s a",strtotime($return_row['due_date']))."</td>";
								 }
								
								?>
								<?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='' style='width:100px; text-align:center;'>".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
								 }else {
									 echo "<td style='text-align:center;'>".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
								 }
								
								?>
								<?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='alert alert-warning' style='width:100px; text-align:center;'>Php ".$return_row['book_penalty'].".00</td>";
								 }else {
									 echo "<td style='text-align:center;'>".$return_row['book_penalty']."</td>";
								 }
								
								?>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							
							<?php 
							}
							if ($return_count <= 0){
								echo '
									<table style="float:right;">
										<tr>
											<td style="padding:10px;" class="alert alert-danger">No Books returned at this moment</td>
										</tr>
									</table>
								';
							} 							
							?>
							</tr>  
						  </tbody> 
					  </table> 
							<?php
								include('../../includes/conn.php');
								$user_query=mysqli_query($con,"select * from admin where admin_id='$id_session'")or die(mysqli_error());
								$row=mysqli_fetch_array($user_query); {
							?>        <h2><i class="fa fa-user"></i> <?php echo '<span style="color:blue; font-size:15px;">Prepared by:'."<br /><br /> ".$row['firstname']." ".$row['lastname']." ".'</span>';?></h2>
								<?php } ?>


			</div>
	
	
	
	

	</div>
</body>

</html>