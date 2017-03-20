<?php 
include 'header.php';

$search = $_SESSION['search'];

if(isset($_GET['c'])){
    $category = $_GET['c'];
}

if(isset($_POST['submit'])) {
    $_SESSION['search']= $_POST['search'];   
}

$_SESSION['url'] = $_SERVER['REQUEST_URI'];  
    
$search = $_SESSION['search'];

$key = 'AIzaSyDDkc3RGXMleae5PNesQT_mZaHGP1nltvw';

$xml = simplexml_load_file("https://maps.googleapis.com/maps/api/geocode/xml?address=".$search."&key=".$key);

$city = $xml->result->address_component[0]->short_name;
$full = $xml->result->formatted_address;

include 'connect.php';

if(isset($_SESSION['LoggedIn']) &&  ($_SESSION['LoggedIn'] == 1)){
    if ($_SESSION['City_Prov'] == $city){
        $update_count = "INSERT INTO Search (Search, Home, UserID) VALUES ('$full', 1, '".$_SESSION['UserID']."');";
    }
    elseif ($_SESSION['City_Prov'] != $city){
        $update_count = "INSERT INTO Search (Search, Away, UserID) VALUES ('$full', 1, '".$_SESSION['UserID']."');";
    }
}
else {
        $update_count = "INSERT INTO Search (Search, NotLoggedIn) VALUES ('$full', 1);";
}
$execute = $mysqli->query($update_count);

if ($xml->status == 'OK'){
$address = $xml->result->formatted_address;
}

foreach ($xml->result->address_component as $value){
    if ($value->type == 'administrative_area_level_1'){
        $state = $value->short_name;
    }
    if ($value->type == 'country'){
        $country = $value->short_name;
    }
     if ($value->type == 'locality'){
        $local = $value->short_name;
     }
}    
 

if ((isset($_SESSION['LoggedIn']))&&($_SESSION['LoggedIn'] == 1)){
    $sql1 = "SELECT * FROM `Business` WHERE (ResponseID ='".$_SESSION['Q3']."' and City = '".$city."' and State_Province = '".$state."' AND Type = 'Lodging' AND Approved = '1' AND Categories like '%".$category."%') 
    OR (Type = 'Restaurant' and City = '".$city."' and State_Province = '".$state."' AND ResponseID ='".$_SESSION['Q1']."' AND Approved = '1' AND Categories like '%".$category."%') 
    OR (Type = 'Nightlife' and City = '".$city."' and State_Province = '".$state."' and ResponseID ='".$_SESSION['Q2']."' AND Approved = '1' AND Categories like '%".$category."%') 
    OR (Type = 'Attraction' and City = '".$city."' and State_Province = '".$state."' and ResponseID ='".$_SESSION['Q4']."' AND Approved = '1' AND Categories like '%".$category."%') 
    OR (Type = 'Shopping' and City = '".$city."' and State_Province = '".$state."' and ResponseID ='".$_SESSION['Q5']."' AND Approved = '1' AND Categories like '%".$category."%');";
    $sql2 = "SELECT * FROM `Business` WHERE Type = 'Lodging' and City = '".$city."' and State_Province = '".$state."' and ResponseID = '".$_SESSION['Q3']."' AND Approved = '1' AND Categories like '%".$category."%';";
$sql3 = "SELECT * FROM `Business` WHERE Type = 'Restaurant' and City = '".$city."' and State_Province = '".$state."' and ResponseID = '".$_SESSION['Q1']."' AND Approved = '1' AND Categories like '%".$category."%';";
$sql4 = "SELECT * FROM `Business` WHERE Type = 'Nightlife' and City = '".$city."' and State_Province = '".$state."' and ResponseID = '".$_SESSION['Q2']."' AND Approved = '1' AND Categories like '%".$category."%';";
$sql5 = "SELECT * FROM `Business` WHERE Type = 'Attraction' and City = '".$city."' and State_Province = '".$state."' and ResponseID = '".$_SESSION['Q4']."' AND Approved = '1' AND Categories like '%".$category."%';";
$sql6 = "SELECT * FROM `Business` WHERE Type = 'Shopping' and City = '".$city."' and State_Province = '".$state."' and ResponseID = '".$_SESSION['Q5']."' AND Approved = '1' AND Categories like '%".$category."%';";
    $result1 = $mysqli->query($sql1);
    $result2 = $mysqli->query($sql2);
    $result3 = $mysqli->query($sql3);
    $result4 = $mysqli->query($sql4);
    $result5 = $mysqli->query($sql5);
    $result6 = $mysqli->query($sql6);
    $rows1 = mysqli_num_rows($result1);
    $rows2 = mysqli_num_rows($result2);
    $rows3 = mysqli_num_rows($result3);
    $rows4 = mysqli_num_rows($result4);
    $rows5 = mysqli_num_rows($result5);
    $rows6 = mysqli_num_rows($result6);
}
else{
    $sql1 = "SELECT * FROM `Business` WHERE City = '".$city."' AND Approved = '1';";
    $sql2 = "SELECT * FROM `Business` WHERE Type = 'Lodging' and City = '".$city."' AND Approved = '1';";
    $sql3 = "SELECT * FROM `Business` WHERE Type = 'Restaurant' and City = '".$city."' AND Approved = '1';";
    $sql4 = "SELECT * FROM `Business` WHERE Type = 'Nightlife' and City = '".$city."' AND Approved = '1';";
    $sql5 = "SELECT * FROM `Business` WHERE Type = 'Attraction' and City = '".$city."' AND Approved = '1';";
    $sql6 = "SELECT * FROM `Business` WHERE Type = 'Shopping' and City = '".$city."' AND Approved = '1';";
    $result1 = $mysqli->query($sql1);
    $result2 = $mysqli->query($sql2);
    $result3 = $mysqli->query($sql3);
    $result4 = $mysqli->query($sql4);
    $result5 = $mysqli->query($sql5);
    $result6 = $mysqli->query($sql6);
    $rows1 = mysqli_num_rows($result1);
    $rows2 = mysqli_num_rows($result2);
    $rows3 = mysqli_num_rows($result3);
    $rows4 = mysqli_num_rows($result4);
    $rows5 = mysqli_num_rows($result5);
    $rows6 = mysqli_num_rows($result6);
}
    
?>
<?php if (empty($_SESSION['LoggedIn'])){ ?>
   <div class="blur"></div>
      <div class="popup">
        <h1 class="quiz quizpopup"><strong>Not a member?</strong>&nbsp;<br>Complete our 5 question quiz to access customized travel tips from the locals</h1><a class="button popup-button" href="quiz.php">Start Quiz</a><a class="w-inline-block login-link" href="login.php"><h1 class="quiz quizpopup">ALREADY A MEMBER?&nbsp;SIGN IN ▶</h1></a>
    </div>
 <?php } ?>
  <div class="w-section body">
    <div class="w-container container results">
      <h1 class="quiz"><?php echo $category; ?> - ‘<?php echo $address; ?>’</h1>
         <?php if (count($xml->result) > 1){
        echo '
      <h5 class="sub-header">Did you mean?</h6>';
       unset($xml->result[0]);
foreach ($xml->result as $value){
 echo '<span class="city"><a href="http://myclique.com/search-results.php?q='.$value->address_component[0]->short_name.' '.$value->address_component[2]->short_name.'" id="city">'.$value->formatted_address.'</a></span>';
    }
    }
      ?>   
      <div class="w-tabs tabs" data-duration-in="300" data-duration-out="100">
        <div class="w-tab-menu">
          <a class="w-tab-link w--current w-clearfix w-inline-block tab-link" data-w-tab="Tab 1"><img class="icon" src="images/earth186.png" height="25" alt="54e4ba7759e6fba8249399ca_earth186.png">
            <h2 class="filters">All Results</h2>
            <h2 class="filters">(<?php echo $rows1; ?>)</h2>
          </a>
          <a class="w-tab-link w-clearfix w-inline-block tab-link" data-w-tab="Tab 2"><img class="icon" src="images/home150.png" height="25" alt="54e4cb7d267eb9d02b92698e_home150.png">
            <h2 class="filters">Sleep</h2>
            <h2 class="filters">(<?php echo $rows2; ?>)</h2>
          </a>
          <a class="w-tab-link w-clearfix w-inline-block tab-link" data-w-tab="Tab 3"><img class="icon" src="images/plate17.png" height="25" alt="54e4cbba267eb9d02b926992_plate17.png">
            <h2 class="filters">Eat</h2>
            <h2 class="filters">(<?php echo $rows3; ?>)</h2>
          </a>
          <a class="w-tab-link w-clearfix w-inline-block tab-link" data-w-tab="Tab 4"><img class="icon" src="images/photo147.png" height="25" alt="54e4cc36b2135fce2b6ce277_photo147.png">
            <h2 class="filters">Play</h2>
            <h2 class="filters">(<?php echo $rows5; ?>)</h2>
          </a>
          <a class="w-tab-link w-clearfix w-inline-block tab-link" data-w-tab="Tab 5"><img class="icon" src="images/musical116.png" height="25" alt="54e4cc62b2135fce2b6ce27a_musical116.png">
            <h2 class="filters">Drink</h2>
            <h2 class="filters">(<?php echo $rows4; ?>)</h2>
          </a>
          <a class="w-tab-link w-clearfix w-inline-block tab-link" data-w-tab="Tab 6"><img class="icon" src="images/wallet17.png" height="25" alt="54e4cc9259e6fba824939c31_wallet17.png">
            <h2 class="filters">Shop</h2>
            <h2 class="filters">(<?php echo $rows6; ?>)</h2>
          </a>
        </div>
        <div class="add-business">
          <h3>Missing a place?&nbsp;</h3>
          <div class="ad-text">Can’t find the place you're looking for? Please add it.
            <br>&nbsp;</div><a class="button" href="refer-a-merchant.php">Refer a Merchant</a>
        </div>
        <div class="w-tab-content tabs-content">
          <div class="w-tab-pane w--tab-active tab-plane" data-w-tab="Tab 1"><?php $x=1; include 'list-business.php'; ?></div>
          <div class="w-tab-pane" data-w-tab="Tab 2"><?php $x=2; include 'list-business.php'; ?></div>
          <div class="w-tab-pane" data-w-tab="Tab 3"><?php $x=3; include 'list-business.php'; ?></div>
          <div class="w-tab-pane" data-w-tab="Tab 4"><?php $x=5; include 'list-business.php'; ?></div>
          <div class="w-tab-pane" data-w-tab="Tab 5"><?php $x=4; include 'list-business.php'; ?></div>
          <div class="w-tab-pane" data-w-tab="Tab 6"><?php $x=6; include 'list-business.php'; ?></div>
        </div>
      </div>
    </div>
  </div>
<?php include 'footer.php'; ?>