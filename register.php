<?php include_once('header.php'); ?>
<?php include_once('navbar.php'); ?>

<?php
/* handles session */
if(!empty($_SESSION['user_id'])){
	// if naay session
	// redirect sa admin
	header('Location: admin.php');

}else{
	// if walay session
	// do nothing
}

?>
<?php
/* handles registration */
$alert_class = false;
$message = "";
// check if something is submitted
if(!empty($_POST)){
	$new_user = [
		'tblname' => 'user',
		'columns' => [
			'userlevel',
			'username',
			'password',
			'firstname',
			'midname',
			'lastname',
			'age',
			'email',
			'gender'
		],
		'value' => [
			1,
			$_POST['username'],
			$_POST['password'],
			$_POST['firstname'],
			$_POST['midname'],
			$_POST['lastname'],
			$_POST['age'],
			$_POST['email'],
			$_POST['gender'],
		]
	];
	if ($edb->insertData($new_user)) {
		$alert_class = 'success';
		$message = "User created successfully";
	}else{
		$alert_class = 'danger';
		$message = "Failed to create user";
	}
}
?>
<div class="wrapper access">
    <div class="container">
        <form class="col-md-6 col-md-offset-3" action="#" method="post">
        	<?php if(!empty($_POST)){ ?>
        		<div class="alert alert-<?php echo $alert_class; ?>" role="alert">
        			<?php echo $message ?>
    			</div>
        	<?php } ?>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="username" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <hr/>
             <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="firstname" class="form-control" name="firstname" placeholder="First Name">
            </div>
            <div class="form-group">
                <label for="midname">Mid Name</label>
                <input type="midname" class="form-control" name="midname" placeholder="Mid Name">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="lastname" class="form-control" name="lastname" placeholder="Last Name">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" name="age" placeholder="Age">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <select class="form-control" name="gender">
                	<option value="m">Male</option>
                	<option value="f">Female</option>
                </select>
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

</div>
<?php include_once('footer.php'); ?>