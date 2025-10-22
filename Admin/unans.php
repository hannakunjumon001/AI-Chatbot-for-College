<<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>

<?php  
	if (isset($_POST['save'])) {
		$question=$_POST['question'];
		$answer=$_POST['answer'];
		$q1="select * from reqres where question='$question'";
        $r=mysqli_query($con,$q1);
        if(!mysqli_num_rows($r)>0){
		$query="insert into reqres(question,answer)values('$question','$answer')";
		$run=mysqli_query($con,$query);
		if ($run) {
            $q2="update unans set status='1' where question='$question'";
        $r2=mysqli_query($con,$q2);
			echo "successfully";
		}
		else{
			echo "not";
		}
    }
	}
?>


<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Chatbot</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>ChatBot Management</h4>
				</div>
				
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements table-three-tr" cellpadding="3">
								<tr class="table-tr-head table-three text-white">
									<th>Sr.No</th>
									<th>Question </th>
									<th>Answer</th>
									
									<th>Action</th>
								</tr>
								<?php
									$sr=1;
									$query="select * from unans where status='0'";
									$run=mysqli_query($con,$query);
									while($row=mysqli_fetch_array($run)) {
                                    echo "<form method='post' action=''>";
									echo	"<tr>";
									echo	"<td>".$sr++."</td>";
									echo	"<td>".$row['question']."</td>";

                                    ?>
                                    <input type='hidden' value='<?php echo $row['question'] ?>' name='question'>
                                    <?php
                                    
										echo	"<td> <input type='text' name='answer' class='form-control' required placeholder='Enter Answer' required></td>";
								
									echo	"<td width='20'><button class='btn btn-primary' value='save' name='save' type='submit'>Save</button></td>";
									echo	"</tr>";
                                    echo "</form>";
									} 
								?>
							</table>				
						</section>
					</div>
				</div>
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
