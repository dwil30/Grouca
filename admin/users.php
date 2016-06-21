<?php 
session_start();
if($_SESSION['logged_in']!="true")
{header( 'Location: error.html' );}
$_SESSION['Update'] = null;

if(isset($_POST['Open'])) 
{
    $_SESSION['Update'] = 1;
    $ID = $_POST['group1']; 
    $_SESSION['ID'] = $ID;
    include("connect.php");  
    
    $sql_search = $mysqli->query("SELECT * FROM users WHERE user_id ='".$ID."'");
    $users = $sql_search->fetch_assoc(); 
    
     echo '<div style="color:red;">Record Found. See Update Position section below to update.</div>'; 
}  

if(isset($_POST['Change'])) 
{   
    include("connect.php"); 
    $email = mysqli_real_escape_string($_POST['user']);
    $join = mysqli_real_escape_string($_POST['join']);
    $status = mysqli_real_escape_string($_POST['status']);
    $sub = mysqli_real_escape_string($_POST['subscribe']);
    $phone= mysqli_real_escape_string($_POST['phone']);
            $phone = str_replace("-","",$phone);
            $phone = str_replace(".","",$phone);
            $phone = str_replace("/","",$phone);
            $phone = str_replace("(","",$phone);
            $phone = str_replace(")","",$phone);
            $phone = str_replace(" ","",$phone);
    $carrier = mysqli_real_escape_string($_POST['carrier']);
    
    if ($status == 'Delete'){
    $sql_update = $mysqli->query("DELETE FROM users Where user_email='".$email."'");
    }
    else {
    $sql_update = $mysqli->query("UPDATE users SET user_email='".$email."',JoinDate='".$join."',AccountType = '".$status."', Subscribed = '".$sub."', Phone = '".$phone."', Carrier = '".$carrier."'
    WHERE user_id = '".$_SESSION['ID'] ."'");
    }
     echo '<div style="color:red;">User Successfully Update.</div>'; 
      $_SESSION['Update'] = null;
}

?>
<!DOCTYPE html>
<html data-wf-site="541b82a7c42f775924361e9a" data-wf-page="541b82a7c42f775924361e9c">
<head>
  <meta charset="utf-8">
  <title>Grouca | The very best Trade Intelligence Platform</title>
  <meta name="description" content="Grouca is an option trading utility that gives you step-by-step directions for setting up trades that generate above average returns.  It shows you how to rebalance portfolio risk, and intervenes with adjustments when existing trades get in trouble.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Webflow">
  <link rel="stylesheet" type="text/css" href="../css/normalize.css">
  <link rel="stylesheet" type="text/css" href="../css/webflow.css">
  <link rel="stylesheet" type="text/css" href="../css/labtrade-a-gemological-company.webflow.css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="favicons/favicon-32x32.png">
  <link rel="apple-touch-icon" href="favicons/apple-touch-icon-180x180.png">
    <style>
    table {
  border-collapse: collapse;
  width: 100%;
}
th, td, tr {
  padding: 0.25rem;
  text-align: center;
  border: 1px solid #ccc;
    
}
        
        tr td:first-child {
            text-align:center;
        }
    </style>
  
    <script>
    WebFont.load({
      google: {
        families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic"]
      }
    });
  </script>
</head>
<body>
<a href="grouca.php">Go to Trade Info</a>  
   <div class="w-row">
         <div class="w-col w-col-6">
   <h3>Users</h3>
    <form method="post" action="">
         <table style="width:100%;table:1px solid black;tr:1px solid black;td:1px solid black;">
        <tr>
            <th>Update</th>
            <th>User Email</th>
            <th>Join Date</th>
            <th>Status</th>
            <th>Subscribed</th>
            <th>Phone@Carrier</th>
        </tr>    
    <?php 
    include("connect.php");
    $sql_users = mysql_query("SELECT * FROM users");
    while ($row = mysql_fetch_assoc($sql_users)){
        echo'
        <tr>
            <td><input type="radio" name="group1" value="'.$row['user_id'].'"></td>  
            <td>'.$row['user_email'].'</td>
            <td>'.$row['JoinDate'].'</td>
            <td>'.$row['AccountType'].'</td>';
        if ($row['Subscribed'] == 1){echo '<td>Yes</td>';}
        else {echo '<td>No</td>';}
            echo '<td>'.$row['Phone'].'@'.$row['Carrier'].'</td>';
        echo '</tr>';
    }
             ?>
    </table>
          <br><input name="Open" id="send" type="submit" class="w-button button-send" value="Update" style="color:black;"/>
 </form>
    </div></div>
    <hr>
          <h3>Update Position</h3>
       <?php if (isset($_SESSION['Update'])){?>
      <div class="w-row">
         <div class="w-col w-col-6">
    <form method="post" action="">
    <table style="width:100%;table:1px solid black;tr:1px solid black;td:1px solid black;">
        <tr>
            <th>User Email</th>
            <th>Join Date</th>
            <th>Status</th>
            <th>Subscribed</th>
            <th>Phone</th>
            <th>Carrier</th>
        </tr>    
         <tr>
        <td><input type="text" name="user" value="<?PHP echo $users['user_email']; ?>"></td>
        <td><input type="text" name="join" value="<?PHP echo $users['JoinDate']; ?>"></td>
        <td><select required name="status">
            <option value="Trial" <?php if ($users['AccountType'] == 'Trial'){echo 'selected="selected"';} ?>>Trial</option>
            <option value="Paid" <?php if ($users['AccountType'] == 'Paid'){echo 'selected="selected"';} ?>>Paid</option>
            <option value="Expired" <?php if ($users['AccountType'] == 'Expired'){echo 'selected="selected"';} ?>>Expired</option>
            <option value="Delete">Delete</option>
            </select></td>  
              <td><select required name="subscribe">
            <option value="1" <?php if ($users['Subscribed'] == 1){echo 'selected="selected"';} ?>>Yes</option>
            <option value="0" <?php if ($users['Subscribed'] == 0){echo 'selected="selected"';} ?>>No</option>
            </select></td> 
            <td><input type="text" name="phone" value="<?PHP echo $users['Phone']; ?>"></td>
            <td> 
             <select name="carrier"><option value="mobile.att.net" <?php if ($users['Carrier'] == "mobile.att.net"){echo 'selected="selected"';} ?>>AT&amp;T</option><option value="cell1.textmsg.com" <?php if ($users['Carrier'] == "cell1.textmsg.com"){echo 'selected="selected"';} ?>>Cellular One</option><option value="cingularme.com" <?php if ($users['Carrier'] == "cingularme.com"){echo 'selected="selected"';} ?>>Cingular</option><option value="metropcs.sms.us" <?php if ($users['Carrier'] == "metropcs.sms.us"){echo 'selected="selected"';} ?>>Metro PCS</option><option value="messaging.nextel.com" <?php if ($users['Carrier'] == "messaging.nextel.com"){echo 'selected="selected"';} ?>>NexTel</option><option value="pcs.rogers.com" <?php if ($users['Carrier'] == "pcs.rogers.com"){echo 'selected="selected"';} ?>>Rogers</option><option value="messaging.sprintpcs.com" <?php if ($users['Carrier'] == "messaging.sprintpcs.com"){echo 'selected="selected"';} ?>>Sprint</option><option value="tmomail.net" <?php if ($users['Carrier'] == "tmomail.net"){echo 'selected="selected"';} ?>>T-Mobile</option><option value="email.uscc.net" <?php if ($users['Carrier'] == "email.uscc.net"){echo 'selected="selected"';} ?>>US Cellular</option><option value="vmobl.com" <?php if ($users['Carrier'] == "vmobl.com"){echo 'selected="selected"';} ?>>Virgin Mobile</option><option value="vtext.com" <?php if ($users['Carrier'] == "vtext.com"){echo 'selected="selected"';} ?>>Verizon</option></select></td> 
             
        </tr>
         </table>
             <br><input name="Change" type="submit" class="w-button button-send" value="Update" style="color:black;"/>
        </form>
      
            
    <br><br></div></div>
 <?php
}
else
{
?>
                  <p>Select a user above to update</p>        
                <?php
}
?>
 <div>
    <div class="section footer">
      <div class="w-container">
        <div class="w-row">
          <div class="w-col w-col-6 copyright">
            <p class="copyright-text">© 2016 Grouca&nbsp;</p>
          </div>
          <div class="w-col w-col-6">
            <div class="team-icons footer">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/webflow.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>