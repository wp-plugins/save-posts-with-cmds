<?php
/*
Plugin Name: Save Posts With Cmd + S
Plugin URI: http://www.mikepayne.co/updating-wordpress-posts-with-ctrls
Version: v1.1
Author: <a href="http://www.mikepayne.co/">Mike Payne</a>
Description: Publishes posts and pages when Ctrl+S is pressed
*/

/**
*
*check for ctrl+s and cmd+s hotkeys
*stop default action from browser
*click Publish button
*/
function mp_postOnSave(){
  ?>
    <script type="text/javascript">
      jQuery(window).keypress(function(event) {
        if (!(event.which == 115 && event.ctrlKey) && !(event.which == 19)){
          return true;
        }
        jQuery('#publish').click();
        event.preventDefault();
        return false;
      );
    </script>
  <?php
}

//add actions to admin footer on post and page edit or creation pages
add_action('admin_footer-post.php','mp_postOnSave');
add_action('admin_footer-post-new.php','mp_postOnSave');