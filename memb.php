    <style>
         @media only screen and (min-width:864px){
        #menu-selected {width: 120px !important;left: 596px !important;}
        }
    </style>      

        <?php require_once('include/header.php'); ?>

		<body>

			<ul class="page-list">

				<li class="page-contact" id="page-contact">
					<?php 
                    if ((isset($_SESSION['Account'])) and ($_SESSION['Account']  == 'Expired')){
                        require('page/expired.php');}
                    else {require('page/memberscreen.php');} ?>
				</li>

			</ul>

			<?php require_once('include/contact_footer.php'); ?>