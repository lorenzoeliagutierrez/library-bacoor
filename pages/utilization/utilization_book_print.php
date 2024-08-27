<?php 
ob_start();

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
.alert-danger{
	color:red;
}
.alert-success{
	color: green;
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
				<center><h5 style = "font-style:Calibri; margin-top:-14px;"></h5>  &nbsp; Library Management System</center>
				<center><h5 style = "font-style:Calibri; margin-top:-14px;"></h5>Saint Francis Of Assisi College</center>
				

			<center><p style = "margin-left:10px; margin-top:20px; font-size:14pt; font-weight:bold;">Monthly Library Resources Utilization</p></center>
			<button type="submit" id="print" onclick="printPage()">Print</button>
        <div align="right">
		<b style="color:blue;">Date Prepared:</b>
		<?php include('../../includes/currentdate.php'); ?>
        </div>			
    <?php include('../../includes/session.php'); ?>
<?php 
include ('../../includes/conn.php');
							$return_query= mysqli_query($con,"SELECT * from borrow_book 
							LEFT JOIN book ON borrow_book.book_id = book.book_id 
							LEFT JOIN user ON borrow_book.user_id = user.user_id 
							where borrow_book.date_borrowed BETWEEN '".$_SESSION['datefrom']." 00:00:01' and '".$_SESSION['dateto']." 23:59:59'
							order by borrow_book.date_borrowed") 
							or die (mysql_error());
							$return_count = mysqli_num_rows($return_query);
								
							
?>
						<table cellpadding="2" cellspacing="2" border="2" class="table table-striped" style="border: 1px solid">
                                <div class="pull-left">
                                <div class="span">
                                	<div class="alert alert-info"><i class="icon-credit-card icon-large"></i>&nbsp;Date: From&nbsp;<?php echo date("M d, Y",strtotime($_SESSION['datefrom'])); ?> To&nbsp;<?php echo date("M d, Y",strtotime($_SESSION['dateto'])); ?></div>
                                </div>
                                <div class="span" style="margin-top: 5px">
                                	<div class="alert alert-info"><i class="icon-credit-card icon-large"></i>&nbsp;Total Library Users Registered in the Logbook =</div>
                                </div>
                                </div>
								<br />
						  <thead>
								<tr>
									<th>No.</th>
									<th>Accession No./Barcode</th>
									<th>Name</th>
									<th>Title of Book / Author / Date</th>
									<th>Date Borrowed</th>
									<th>Date Returned</th>
									<th>Remark</th>
								</tr>
						  </thead>   
						  <tbody>
<?php
						$i = 1;
							while ($return_row= mysqli_fetch_array ($return_query) ){
							$id=$return_row['borrow_book_id'];
?>
							<tr>
								<td style="text-align:center;">
					                <?php
					                    echo $i;
					                    $i++;
					                ?>
					            </td>
								<td style="text-align:center;"><?php echo $return_row['accession_no']; ?></td>
								<td style="text-transform: capitalize; text-align:center;"><?php echo $return_row['firstname']." ".$return_row['middlename']." ".$return_row['lastname']; ?></td>
								<td style="text-transform: capitalize; text-align:center;"><?php echo $return_row['title'].' / '.$return_row['author'].' / '.$return_row['date_of_publ']; ?></td>
							<!---	<td style="text-transform: capitalize"><?php // echo $return_row['author']; ?></td>
								<td><?php // echo $return_row['isbn']; ?></td>	-->
								<td style="text-align:center;"><?php echo date("M d, Y h:m:s a",strtotime($return_row['date_borrowed'])); ?></td>
								<td><?php echo ($return_row['date_returned'] == "0000-00-00 00:00:00") ? "Pending" : date("M d, Y h:m:s a",strtotime($return_row['date_returned'])); ?></td>
								<?php
                                    if ($return_row['borrowed_status'] != 'returned') {
                                        echo "<td class='alert-danger'>".$return_row['borrowed_status']."</td>";
                                    } else {
                                        echo "<td  class='alert-success'>".$return_row['borrowed_status']."</td>";
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
											<td style="padding:10px;" class="alert alert-danger">No Books returned at this Date</td>
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
								$user_query=mysqli_query($con,"select * from admin where admin_id='$id_session'")or die(mysql_error());
								$row=mysqli_fetch_array($user_query); {
							?>        <h2><i class="glyphicon glyphicon-user"></i> <?php echo '<span style="color:blue; font-size:15px;">Prepared by:'."<br /><br /> ".$row['firstname']." ".$row['lastname']." ".'</span>';?></h2>
								<?php } ?>


			</div>
	
	
	
	

	</div>
</body>


</html>