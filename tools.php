<?php 
session_start();

// This code will execute if the user entered a search query in the form
// and submitted the form. Otherwise, the page displays the form above.


  // Call set_include_path() as needed to point to your client library.
  set_include_path('google-api-php-client-master/src');
  require_once ('Google/Client.php');
  require_once ('Google/Service/YouTube.php');

  /*
   * Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
   * {{ Google Cloud Console }} <{{ https://cloud.google.com/console }}>
   * Please ensure that you have enabled the YouTube Data API for your project.
   */
  $DEVELOPER_KEY = 'AIzaSyDEJsGckuscgw0wkVFwbhTjImLSaj_oegM ';

  $client = new Google_Client();
  $client->setDeveloperKey($DEVELOPER_KEY);

  // Define an object that will be used to make all API requests.
  $youtube = new Google_Service_YouTube($client);

// Define search terms
    $search1 = $_GET["song"]. ' ' . $_GET["artist"];
    $search2 = 'How to play ' . $search1 . ' on guitar';
    $search3 = $search1 . ' acoustic cover'; 
    $ID = $_GET["id"];
    
// Update database to indicate which song was selected
include 'mysql_connect.php';
$string = mysql_real_escape_string($search1);
$artist = mysql_real_escape_string($_GET["artist"]);
$song = mysql_real_escape_string($_GET["song"]);
$query = "INSERT INTO Count (ArtistSong, Counter, Artist, Song, ID, LastAddDate) VALUES ('$string', 1, '$artist', '$song',$ID, CURDATE()) ON DUPLICATE KEY UPDATE Counter=Counter+1, LastAddDate = CURDATE()";
mysql_query($query);
mysql_close();

  try {
    // Call the search.list method to retrieve results for original song
    $searchResponse = $youtube->search->listSearch('id,snippet', array(
        'type'=>'video',
        'q' => $search1,
        'maxResults' => '10',
        'videoEmbeddable' => 'true',
        'safeSearch' => 'none',
        'order' => 'relevance'
      ));

    $videos_og = $videos_tutorial = $videos_cover = array();

    // Add each result to the appropriate list, and then display the lists of
    // matching videos, channels, and playlists.
    foreach ($searchResponse['items'] as $searchResult) {
      switch ($searchResult['id']['kind']) {
        case 'youtube#video':
           $videos_og[] = $searchResult['id']['videoId'];
        break;
      }
    }

    // Call the search.list method to retrieve results for guitar tutorial
      $searchResponse1 = $youtube->search->listSearch('id,snippet', array(
        'q' => $search2,
        'type'=>'video',
        'maxResults' => '10',
        'videoEmbeddable' => 'true',
        'safeSearch' => 'none',
        'order' => 'relevance'
      ));

    // Add each result to the appropriate list, and then display the lists of
    // matching videos, channels, and playlists.
    foreach ($searchResponse1['items'] as $searchResult1) {
      switch ($searchResult1['id']['kind']) {
        case 'youtube#video':
           $videos_tutorial[] = $searchResult1['id']['videoId'];
        break;
      }
    }
          // Call the search.list method to retrieve results for guitar tutorial
      $searchResponse2 = $youtube->search->listSearch('id,snippet', array(
        'q' => $search3,
        'type'=>'video',
        'maxResults' => '10',
        'videoEmbeddable' => 'true',
        'safeSearch' => 'none',
        'order' => 'relevance'
      ));


    // Add each result to the appropriate list, and then display the lists of
    // matching videos, channels, and playlists.
    foreach ($searchResponse2['items'] as $searchResult2) {
      switch ($searchResult2['id']['kind']) {
        case 'youtube#video':
           $videos_cover[] = $searchResult2['id']['videoId'];
        break;
      }
    }
  }
    catch (Google_ServiceException $e) {
    $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
    htmlspecialchars($e->getMessage()));
         print_r($htmlBody); 
  } 
    catch (Google_Exception $e) {
    $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
    htmlspecialchars($e->getMessage()));
    print_r($htmlBody);  
  }

$tabs2 = $_SESSION['tabs'];
// Create array of all UG tab ID's if the song matches selection
foreach($tabs2 as $inner_arr){
        if (($inner_arr[0] == $_GET['song']) && ($inner_arr[1] == $_GET['artist'])) {
            $tabs1[] = $inner_arr[3];
        }     
    }

// Check if array exists, if not create array of tablature using the ID's
include 'mysql_connect.php';
$result_1 = mysql_query("SELECT ID FROM Tabs WHERE ID = $ID");
if(mysql_num_rows($result_1) == 0) { //array does not exist
    for ($i = 0; $i < count($tabs1); $i++) {
    $tabs_array[] = file_get_contents('http://app.ultimate-guitar.com/iphone/tab.php?id=' . $tabs1[$i]);
    }
    $array_string = mysql_escape_string(serialize($tabs_array));
    mysql_query("INSERT INTO Tabs (ID, TabArray) values($ID,'$array_string')");
}
else { //array exists
$query2 = mysql_query("SELECT TabArray FROM Tabs WHERE ID = $ID");
$info = mysql_fetch_assoc($query2);
$mydata = unserialize($info['TabArray']);
$tabs_array = $mydata;    
}

    $tabs_chords = $tabs_array; //create copy to use in the pics
    $tabs_array = str_replace("[ch]","<bold>",$tabs_array);
    $tabs_array = str_replace("[/ch]","</bold>",$tabs_array);
    $tabs_chords = str_replace("[ch]","<div>",$tabs_chords);
    $tabs_chords = str_replace("[/ch]","</div>",$tabs_chords);
    $chords = $array = array();

//create array with all unique chords from $tabs_chords
for ($y=0; $y < count($tabs_chords); $y++){
$dom = new DomDocument; 
$dom->loadHTML($tabs_chords[$y]); 
$dom->preserveWhiteSpace = false; 
$divs = $dom->getElementsByTagName('div'); 
foreach ($divs as $key=>$div) {
    $array[$y][$key] = $div->nodeValue;
    }
foreach ($array as $key => $value){
    $array[$key] = array_values(array_unique($array[$key]));
    }
}
//store chords names into DB for later use
//$array_chords = mysql_escape_string(serialize($array));
//mysql_query("INSERT IGNORE INTO Chords (song_id, chords) values($ID,'$array_chords')");

$trans = array("/","#");
$final_chords = array();

foreach ($array as $key => $value){
    $final_chords[$key] = str_replace($trans, "Z", $array[$key]);
}

$max = $max1 = $storage = $final = array();

//create array with HTML of guitar chord shape info
foreach ($final_chords as $key1 => $value1){
    $counter = 1;
    foreach ($value1 as $key2 => $value2)
    {
        $final_chords[$key1][$key2] = '<div class="w-col w-col-4"><img class="chord" src="images/chords/' . $final_chords[$key1][$key2] . '.png" alt="' . $final_chords[$key1][$key2]   . '"></div>';
        
        if ($counter % 3 == 0) {$final_chords[$key1][$key2] .= '</div><div class="w-row shapes-row">';}
        
        $storage[$key1][$key2] = $counter;
        $counter++;    
    }
}

//add all values into a single array
    foreach ($final_chords as $key => $value){
        foreach ($value as $key1 => $value1){
            $final[$key] = implode($value);
        }
    }
?>
<!DOCTYPE html>
<html data-wf-site="54a2b66d2aece3f15d25e0fe" data-wf-page="54a2b66d2aece3f15d25e0ff">
<head>
  <meta charset="utf-8">
  <title>Vizzy Guitar - All the visual tools to learn a song on guitar</title>
  <meta name="description" content="Vizzy Guitar consolidates all the tools required to learn on a song on guitar into a single location. Lyrics, chords, and tutorial videos all in spot. ">
  <meta name="keywords" content="learn guitar, how to play guitar, how to learn guitar">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Webflow">
  <link rel="image_src" href="http://vizzyguitar.com/images/VizzyGuitar.jpg">
  <meta property="og:image" content="http://vizzyguitar.com/images/VizzyGuitar.jpg"/>
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/webflow.css">
  <link rel="stylesheet" type="text/css" href="css/vizzyguitar.webflow.css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic","Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic","Muli:300,regular"]
      }
    });
  </script>
  <script type="text/javascript" src="js/modernizr.js"></script>  
  <link rel="shortcut icon" type="image/x-icon" href="images/VizzyFavIcon.png">
  <link rel="apple-touch-icon" href="images/AppleIcon.jpg">
  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-49877324-1'], ['_trackPageview']);
    (function() {
      var ga = document.createElement('script');
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
       <script>
        function myFunction() {
        alert("Login via Facebook to add songs to your songbook");}   
      </script>
       <script>
            var cnt=0, cnt1=0, count=0, count2=0;
            var originals = new Array();
            originals = <?php echo json_encode($videos_og); ?>;
            var tutorials = new Array();
            tutorials = <?php echo json_encode($videos_tutorial); ?>;
            var song = new Array();
            song = <?php echo json_encode($videos_cover); ?>;
            var chords = new Array();
            chords = <?php echo json_encode($tabs_array); ?>;
            var shapes = new Array();
            shapes = <?php echo json_encode($final); ?>;            
            
  $(document).ready(function(){
      $("div#next a").click(function(e) {
        e.preventDefault();
        cnt++;
        if (cnt>= originals.length) cnt=0; // wrap  
        $("#original").attr("src", "http://www.youtube.com/embed/" + originals[cnt]);
        return false; // mandatory!
    })
});
            
$(document).ready(function(){
      $("div#previous a").click(function(e) {
        e.preventDefault();
        cnt--;
       if (cnt<0) cnt=originals.length-1; // wrap
        $("#original").attr("src", "http://www.youtube.com/embed/" + originals[cnt]);
           return false; // mandatory!
    })
});
           
$(document).ready(function(){
      $("div#previous1 a").click(function(e) {
        e.preventDefault();
        cnt1--;
           if (cnt1<0) cnt1=tutorials.length-1; // wrap
        $("#tutorial").attr("src", "http://www.youtube.com/embed/" + tutorials[cnt1]);
           return false; // mandatory!
    })
});
           
$(document).ready(function(){
      $("div#next1 a").click(function(e) {
        e.preventDefault();
        cnt1++;
           if (cnt1>= tutorials.length) cnt1=0; // wrap  
        $("#tutorial").attr("src", "http://www.youtube.com/embed/" + tutorials[cnt1]);
           return false; // mandatory!
    })
});
           
    $(document).ready(function(){
      $("div#next2 a").click(function(e) {
        e.preventDefault();
        count++;
        if (count>= song.length) count=0; // wrap  
        $("#acoustic").attr("src", "http://www.youtube.com/embed/" + song[count]);
        return false; // mandatory!
    })
});
           
    $(document).ready(function(){
      $("div#previous2 a").click(function(e) {
        e.preventDefault();
        count--;
         if (count<0) count=song.length-1; // wrap 
        $("#acoustic").attr("src", "http://www.youtube.com/embed/" + song[count]);
        return false; // mandatory!
    })
});
    
    $(document).ready(function(){
      $("div#next3 a").click(function(e) {
        e.preventDefault();
        count2++;
        if (count2>= chords.length) count2=0; // wrap  
        $('#tablature').html(chords[count2]);
        $('#shapes').html(shapes[count2]);
        return false; //mandatory
    })
});
           
    $(document).ready(function(){
      $("div#previous3 a").click(function(e) {
        e.preventDefault();
        count2--;
         if (count2<0) count2=chords.length-1; // wrap 
        $('#tablature').html(chords[count2]);
        $('#shapes').html(shapes[count2]);
        return false; //mandatory
    })
});
            </script>
</head>
<body>
  <div class="w-nav navbar" data-collapse="medium" data-animation="default" data-duration="400" data-contain="1">
    <div class="w-container">
      <a class="w-nav-brand logo-image" href="index.php"><img src="images/Vizzy-Logo2.png" width="62" alt="Vizzy Guitar Logo">
      </a>
         <?php if ($_SESSION['FBID']): ?>      <!--  After user login  -->
           <a class="w-inline-block login-button" href="#"><img class="facebook-profile" src="https://graph.facebook.com/<?php echo $_SESSION['FBID'];?>/picture" alt="Vizzy Guitar Facebook Icon"></a>
      <div class="w-dropdown dropdown" data-delay="0">
        <div class="w-dropdown-toggle dropdown-toggle">
          <div><?php echo $_SESSION['FIRST'];?></div>
          <div class="w-icon-dropdown-toggle icon"></div>
        </div>
        <nav class="w-dropdown-list"><a class="w-dropdown-link" href="logout.php">Logout</a><a class="w-dropdown-link" href="songbook.php">Songbooks</a>
        </nav>
      </div>
    
          <?php else: ?>     <!-- Before login --> 
                <a class="w-inline-block login-button" href="fbconfig.php"><img class="facebook-login" src="images/FB.png" width="200" alt="Vizzy Guitar Facebook Login">
      </a>
                <?php endif ?>
    
      <nav class="w-nav-menu nav-menu" role="navigation">
          <a class="w-nav-link nav-link" href="index.php#Home">Vizzy Guitar</a>
          <a class="w-nav-link nav-link" href="index.php#How-It-Works">How It Works</a>
          <a class="w-nav-link nav-link" href="index.php#About">About</a>
          <a class="w-nav-link nav-link" href="songbook.php">Songbooks</a>
      </nav>
      <div class="w-nav-button menu-button">
        <div class="w-icon-nav-menu"></div>
      </div>
    </div>
  </div>
  <div class="search">
    <div class="search-bar">
      <div class="w-form search-nav">
           <form class="search-form-home" id="search-form" method="post" action="search.php">
          <input class="w-input search-nav-text" type="text" name='bar' placeholder="Search song or artist..." required="required" autofocus="autofocus">
          <input class="w-button search-nav-submit" type="submit" value="Search" data-wait="Please wait...">
        </form>
      </div>
    </div>
          <div class="w-container search-container">
              <div class="social-container">
                    <?php echo '<a href="https://twitter.com/home?status=Learning%20how%20to%20play%20'.$song.'%20using%20%40VizzyGuitar%20-%20vizzyguitar.com" target="_blank">';?> <img src="images/twitter.png" title="Share on Twitter" alt="Share song on Twitter"></a> 
              <?php 
         if (!empty($_SESSION['FBID'])){   
                echo '<a href="add.php?song='.$song.'&artist='.$artist.'&id='.$ID.'"><img src="images/Plus.png" alt="Add to Vizzy Guitar Songbook" title="Add to your Songbook"></a>';}
                else {
                echo '<a href="#" onClick="myFunction()"><img src="images/Plus.png" alt="Add to Vizzy Guitar Songbook" title="Add to your Songbook"></a>';}
            ?>    
        </div>
                  
         <form class="space2" method="post" action="search.php">    
        <h4><?php echo $_GET["song"]. ' / <button class="band" name="bar" value="'. $_GET["artist"] .'">' . $_GET["artist"] . '</button>'; ?></h4></form>
    </div>
    <div class="w-row tools-section">
      <div class="w-col w-col-6">
        <h6 class="title">Original Song</h6>  
        <div class="w-clearfix arrows-div-block"><div id="previous"><a class="w-inline-block left-arrows" href="#"><h6>&lt;&lt;</h6></a></div><div id="next"><a class="w-inline-block right-arrows" href="#"><h6>&gt;&gt;</h6></a></div></div>
             <div class="w-embed w-video" style="padding-top: 56.20608899297424%;">
        <iframe name='original' id='original' src="https://www.youtube.com/embed/<?php echo $videos_og['0']; ?>?rel=0" frameborder="0" allowfullscreen></iframe>   
        </div>
      </div>
      <div class="w-col w-col-6">
        <h6 class="title">Song Tutorial</h6>
      <div class="w-clearfix arrows-div-block"><div id="previous1"><a class="w-inline-block left-arrows" href="#"><h6>&lt;&lt;</h6></a></div><div id="next1"><a class="w-inline-block right-arrows" href="#"><h6>&gt;&gt;</h6></a></div></div>
           <div class="w-embed w-video" style="padding-top: 56.20608899297424%;">
             <iframe name='tutorial' id='tutorial' src="https://www.youtube.com/embed/<?php echo $videos_tutorial['0']; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    <div class="w-row tools-section">
      <div class="w-col w-col-6">
        <h6 class="title">Song Cover</h6>
       <div class="w-clearfix arrows-div-block"><div id="previous2"><a class="w-inline-block left-arrows" href="#"><h6>&lt;&lt;</h6></a></div><div id="next2"><a class="w-inline-block right-arrows" href="#"><h6>&gt;&gt;</h6></a></div></div>
            <div class="w-embed w-video" style="padding-top: 56.20608899297424%;">
        <iframe name='acoustic' id='acoustic' src="https://www.youtube.com/embed/<?php echo $videos_cover['0']; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
        <h6 class="title">Guitar Chord Shapes</h6>
          <div id="shapes"><div class="w-row shapes-row">  
           <?php   if(empty($final[0]))
                                {echo 'No chord pics available for tabs';}
                            else{echo $final[0];}
            ?>
    </div>
    </div>
    </div>
        
      <div class="w-col w-col-6">
        <h6 class="title">Lyrics and Chords</h6>
           <?php if(count($tabs_array) > 1){echo '<div class="w-clearfix arrows-div-block"><div id="previous3"><a class="w-inline-block left-arrows" href="#"><h6>&lt;&lt;</h6></a></div><div id="next3"><a class="w-inline-block right-arrows" href="#"><h6>&gt;&gt;</h6></a></div></div>';}?>      
            <div id="tablature"><?php echo $tabs_array[0]; ?></div>
        </div>
      </div>
    </div>
 <div class="footer-section">
    <div class="w-container footer-container">
      <a class="w-inline-block social-link" href="http://twitter.com/VizzyGuitar" target="_blank"><img src="images/twitter-icon.png" alt="54a34597e70c32c535cca738_twitter-icon.png">
      </a>
      <a class="w-inline-block social-link" href="mailto:damon@vizzyguitar.com?subject=VizzyGuitar%20-%20Email" target="_blank"><img src="images/email-icon.png" alt="54a346cdbd74db8e2e02ea39_email-icon.png">
      </a>
      <a class="w-inline-block social-link" href="http://facebook.com/VizzyGuitar" target="_blank"><img src="images/facebook-icon.png" alt="54a344ffbd74db8e2e02ea30_facebook-icon.png">
      </a>
      <a class="w-inline-block social-link" href="http://twitter.com/VizzyGuitar" target="_blank"><img src="images/youtube-512.png" alt="54a347dc89b2bc8c2e9640bd_youtube-512.png">
      </a>
      <div class="footer-text">@2015 VizzyGuitar | <a href="privacy-policy.php">Privacy Policy</a> | <a href="terms-of-use.php">Terms of Use</a> | <a href="help.php">Help</a></div>
    </div>
  </div>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/webflow.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>