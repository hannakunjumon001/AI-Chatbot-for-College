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
	if (isset($_POST['chat'])) {
		$question=$_POST['question'];
		$answer=$_POST['answer'];
		

		$query="insert into reqres(question,answer)values('$question','$answer')";
		$run=mysqli_query($con,$query);
		if ($run) {
			echo "successfully";
		}
		else{
			echo "not";
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
					<div class="col-md-12">
						<form action="request.php" method="post">
							<div class="row mt-3">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Question: </label>
										<input type="text" name="question" class="form-control" required placeholder="Enter Question" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Answer:</label>
										<input type="text" name="answer" class="form-control" required placeholder="Enter Answer" required>
									</div>
								</div>
							</div>
							
							
								
								<div class="col-md-6 mt-4">
									<div class="form-group pt-2">
										<input type="submit" name="chat" value="Add" class="btn btn-primary">
									</div>
								</div>
							
						</form>
					</div>
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
									$query="select * from reqres";
									$run=mysqli_query($con,$query);
									while($row=mysqli_fetch_array($run)) {
									echo	"<tr>";
									echo	"<td>".$sr++."</td>";
									echo	"<td>".$row['question']."</td>";
									echo	"<td>".$row['answer']."</td>";
								
									echo	"<td width='20'><a class='btn btn-danger' href=delete-function.php?id=".$row['id'].">Delete</a></td>";
									echo	"</tr>";
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
