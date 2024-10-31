<?php

// Design of Sendstrap in WordPress Settings
function sendstrap_options_page()
{
	// Check For User Capabilities
	if ( !current_user_can('manage_options') )
		return;
?>


	<div class="wrap">

		<?php	
			$image = '<img src="'. SENDSTRAP_URL .'assets/images/sendstrap.png" class="admin-img"> ';
			$title = $image . get_admin_page_title() .'<br>';
		?>

		<h1 class="admin-title"><?php echo  $title;  ?></h1>

		<form method="post" action="options.php">
			
			<!-- Display Necessary Hidden Fields For Settings -->
			<?php settings_fields( 'sendstrap_settings' ); ?>
			
			<!-- Hook to Display The Settings Sections For This Page -->
			<?php do_settings_sections( 'sendstrap' ); ?>
			
			<!-- Submit Button -->
			<?php submit_button(); ?>
		
		</form>

	</div>

<?php
}
