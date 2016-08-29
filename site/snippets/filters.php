<!-- SHOW 10 MÓST PREVALENT TAGS -->
<?php 
    $technology_tags = page('all-techniques')->children()->visible()->pluck($filter_on, ',', false);
    $duplicates = array_count_values(array_map('strtolower', $technology_tags));
    $counter = 0;

    foreach ($duplicates as $key => $value) :
        if ($counter < $limit) :
?>
            <li>
                <?php echo $key ?>
            </li>
        <?php endif; 
        $counter += 1; ?>
<?php endforeach; ?>