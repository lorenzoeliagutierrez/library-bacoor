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
				

			<center><p style = "margin-left:10px; margin-top:20px; font-size:14pt; font-weight:bold;">Inventory</p></center>
			<button type="submit" id="print" onclick="printPage()">Print</button>
        <div align="right">
		<b style="color:blue;">Date Prepared:</b>
		<?php include('../../includes/currentdate.php'); ?>
        </div>			
    <?php include('../../includes/session.php'); ?>
<?php 
include ('../../includes/conn.php');
							
					$return_query= mysqli_query($con,
                		"SELECT *,
                		COUNT(call_no) AS total_quantity
                		FROM book 
                		WHERE date_of_publ BETWEEN '".$_SESSION['datefrom']."' AND '".$_SESSION['dateto']."' 
                		AND subject LIKE '%".$_SESSION['subject']."%'
                		GROUP BY call_no
                		ORDER BY date_of_publ ASC") 
						or die (mysqli_error($con));
						$return_count = mysqli_num_rows($return_query);
								
							
?>
						<table cellpadding="2" cellspacing="2" border="2" class="table table-striped" style="border: 1px solid">
                                <div class="pull-left">
                                <div class="span">
                                	<div class="alert alert-info"><i class="icon-credit-card icon-large"></i>&nbsp;Date: From&nbsp;<?php echo ($_SESSION['datefrom']); ?> To&nbsp;<?php echo ($_SESSION['dateto']); ?></div>
                                </div>
                                <div class="span" style="margin-top: 5px">
                                	<div class="alert alert-info"><i class="icon-credit-card icon-large"></i>&nbsp;Total books with the subject: &nbsp;<?php echo ($_SESSION['subject']); ?></div>
                                </div>
                                </div>
								<br />
						  <thead>
								<tr>
									<th>Author</th>
                                    <th>Title</th>
                                    <th>Edition</th>
                                    <th>Publication Date</th>
                                    <th>Quantity</th>
								</tr>
						  </thead>   
						  <tbody>
<?php
							$sum = 0;
							while ($return_row= mysqli_fetch_array ($return_query) ){
							$id=$return_row['book_id'];
							$sum += $return_row['total_quantity']
?>
							<tr>
								<td height="50" style="text-transform: capitalize; text-align:center;"><?php echo $return_row['author']; ?></td>
								<td style="text-transform: capitalize; text-align:center;"><?php echo $return_row['title']; ?></td>
								<td style="text-align:center;"><?php echo $return_row['edition']; ?></td>
								<td style="text-align:center;"><?php echo $return_row['date_of_publ']; ?></td>
								<td style="text-align:center;"><?php echo $return_row['total_quantity']; ?></td>
							</tr>
							
							<?php
							}			
							?>
							
							</tr>  
						  </tbody>
						  <tfoot>
						  	<tr><td  colspan="2"><Strong>Total Books:</Strong></td><td><td><td><center><strong><?php echo $sum; ?></strong></center></td></tr>
						  </tfoot> 
					  </table> 
							<?php
								include('../../includes/conn.php');
								$user_query=mysqli_query($con,"select * from admin where admin_id='$id_session'")or die(mysqli_error($con));
								$row=mysqli_fetch_array($user_query); {
							?>        <h2><i class="glyphicon glyphicon-user"></i> <?php echo '<span style="color:blue; font-size:15px;">Prepared by:'."<br /><br /> ".$row['firstname']." ".$row['lastname']." ".'</span>';?></h2>
								<?php } ?>


			</div>
	
	
	
	

	</div>
</body>


</html>
