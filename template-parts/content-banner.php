<?php 
$sr_banner_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
if( $sr_banner_image ) {
	$sr_image_url = "background-image:url('".$sr_banner_image."');";
	$banner_description = get_field( "banner_description" );
?>
	<div class="sr-header-banner" style="<?php echo $sr_image_url; ?>">
		<div class="container">
			<h1 class="sr-header-title">
				<?php 
					if( !empty( get_field( "banner_title" ) ) ) {
						echo get_field( "banner_title" );
					} else {
						the_title();	
					}
				?>
			</h1>
			<?php if( !empty( get_field( "banner_description" ) ) ) { ?>
					<div class="sr-header-desc">
						<p><?php echo get_field( "banner_description" ); ?></p>
					</div>
			<?php } ?>	
		</div>
	</div>
<?php 
}