<!-- SHOW 10 MÓST PREVALENT TAGS -->

<?php 
    $tags = page('all-techniques')->children()->visible()->pluck($filter_on, ',', false);
    $duplicates = array_count_values(array_map('strtolower', $tags));
    arsort($duplicates);
    $first = key($duplicates); 
    //find first of the array 
    $counter = 0;?>
    <div class="sentence-select secondaryFilter" value="<?php echo $filter_on; ?>">
      <div class="input-group-btn dropdown-input">
        <button class="btn dropdown-toggle <?php echo $filter_on; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="<?php echo $first?>"><?php echo $first?></button><span class="caret"></span>
    <ul class="options dropdown-menu" id="<?php echo $filter_on ?>">
    <?php foreach ($duplicates as $key => $value) :
        if ($counter < $limit) : ?>

            <li class="option"><a href="#">
                <?php echo $key ?>
                </a>
            </li>
        <?php endif; 
        $counter += 1; ?>
    <?php endforeach; ?>
    </ul>
  </div><!-- /btn-group -->
  </div>