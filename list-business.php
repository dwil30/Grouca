  <?php $z=1; while ($row = mysqli_fetch_assoc($result1)){
            if (isset($row)){
            ?>
            <div class="w-clearfix search-result">
              <a class="w-inline-block media-avatar" href="<?php echo $row['Website']; ?>"><img src="<?php echo "images/biz/".$row['PicURL']?>">
              </a>
              <div class="w-clearfix media-story"><?php echo "<div class='biz-name'>".$z.".&nbsp</div>"; ?><a class="biz-name" href="<?php echo $row['Website']; ?>"> <?php echo $row['Name'];?> </a><div class="category"><?php $cat = explode(',', $row['Categories']);
    $numItems = count($cat); $c = 0;
    foreach ($cat as $value){echo '<a class="catlinks" href="'.$value.'">'.trim($value)."</a>"; if (++$c != $numItems) {echo ",";}} ?></div>
              </div>
              <div class="address">
                <div><?php echo $row['Street_Address']; ?></div>
                <div><?php echo $row['City']; echo '&nbsp'; echo $row['State_Province']; echo '&nbsp'; echo $row['Zip'];?></div>
                <div><?php echo $row['Phone']; ?></div>
              </div>
              <div class="w-clearfix review"><img class="corners" src="images/users/30s.jpg" alt="54e4e8441dd96d9b17ffedc8_30s.jpg">
                <div class="review-text"><?php echo substr($row['Review'], 0, 193); if (strlen($row['Review']) > 193){echo "...";} ?></div>
              </div>
            </div>
              <?php $z++; }
              else {echo '<h2 class="filters">There are no results for this city</h2>';}}?>