<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Schulte_Roofing
 */

?>

	</div><!-- #content -->

	<footer id="footer" class="site-footer">
	<?php if ( is_active_sidebar( 'sr-top-column-4' ) ) {
				$widget_columns = 4;
			} else if ( is_active_sidebar( 'sr-top-column-3' ) ) {
				$widget_columns = 3;
			} else if ( is_active_sidebar( 'sr-top-column-2' ) ) {
				$widget_columns = 2;
			} else if ( is_active_sidebar( 'sr-top-column-1' ) ) {
				$widget_columns = 1;
			} else {
				$widget_columns = 0;
			}
			if ( $widget_columns > 0 ) : ?>
				<div class="footer-top">
				<?php
					$i = 0;
					while ( $i < $widget_columns ) : $i++;
 						if ( is_active_sidebar( 'sr-top-column-' . $i ) ) : ?>
							<div class="col-<?php echo intval( $widget_columns ); ?>">
								<?php dynamic_sidebar( 'sr-top-column-' . intval( $i ) ); ?>
							</div>
					<?php
						endif;
					endwhile;
				?>
				</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sr-bottom-1' ) ||
				   is_active_sidebar( 'sr-bottom-2' ) ||
				   is_active_sidebar( 'sr-bottom-3' ) ) { ?>
					<div class="footer-bottom">
						<div class="footer-bottom-col footer-bottom-1"><?php dynamic_sidebar( 'sr-bottom-1' ); ?></div>
						<div class="footer-bottom-col footer-bottom-2"><?php dynamic_sidebar( 'sr-bottom-2' ); ?></div>
						<div class="footer-bottom-col footer-bottom-3"><?php dynamic_sidebar( 'sr-bottom-3' ); ?></div>
					</div>
		<?php } ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<!--Quote form popup-->
<div id="quoteform" class="modal">
	<!-- Modal content -->
	<div class="modal-content sr-quote-form">
		<a href="javascript:void(0);" id="sr_quote_close" class="sr-quoteform-close"><i class="far fa-times-circle"></i></a>
		<?php 
		if ( is_active_sidebar( 'sr-quote-sidebar' ) ) {
			dynamic_sidebar( 'sr-quote-sidebar' );
		}
		?>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>