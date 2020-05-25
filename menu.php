<?php

  $old_user = user_switching::get_old_user();

?>
<div id="Navigation">
<?php 		
  wp_nav_menu(
    array(
      'theme_location' => 'primary'
    )
  ); 
?>
<?php
  if($old_user) {    

    $returnlink = user_switching::maybe_switch_url($old_user)
?>
  <div><a href="<?php echo $returnlink ?>">Back to <?php echo $old_user->first_name ?></a></div>
<?php } ?>
</div>