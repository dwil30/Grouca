<?php
session_start();

//update account to Paid

$sql = "UPDATE users SET AccountType ='Paid' WHERE user_email ='". $_SESSION['UserName']."'";
include("base.php");
$query_check_user_name = $mysqli->query($sql);
$_SESSION['Account'] = 'Paid';
include_once('send-upgrade.php');

require_once('include/header.php');
?>

		<body>

			<ul class="page-list">


				<li class="page-contact" id="page-contact">
					<?php require_once('page/success.php'); ?>
				</li>

			</ul>

			<?php require_once('include/footer.php'); ?>