<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Together
 */

?>

<footer class="dt-footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="dt-foot-logo">
					<?php
					if ( function_exists( 'get_custom_logo' ) && has_custom_logo() ) :
						the_custom_logo();
					else : ?>
					
					<h1>Teaser Movie</h1>

						<!-- <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr( bloginfo( 'name' ) ); ?></a></h1> -->
					<?php endif; ?>
				</div><!-- .dt-foot-logo -->

				<div class="dt-footer-widgets">
			
				<!-- <aside id="media_video-5" class="widget widget_media_video"><div style="width:100%;" class="wp-video">
<video class="wp-video-shortcode" id="video-2-1" preload="metadata" controls="controls" autoplay="on"><source type="video/mp4" src="http://http://art.sfuhost.com//wp-content/uploads/2018/04/wedding_ceremony.mp4?_=1" /><source type="video/mp4" src="http://http://art.sfuhost.com//wp-content/uploads/2018/04/wedding_ceremony.mp4?_=1" /><a href="http://http://art.sfuhost.com//wp-content/uploads/2018/04/wedding_ceremony.mp4">http://http://art.sfuhost.com//wp-content/uploads/2018/04/wedding_ceremony.mp4</a></video></div></aside>	 -->


					<?php dynamic_sidebar( 'dt-footer-widget' ); ?>
				</div>

				<div class="dt-copyright">
					<!-- <?php _e( 'Copyright &copy;', 'together' ); ?> <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
					<span class="sep"> | </span> -->

					<!-- <?php printf( esc_html__( 'Powered %1$s by %2$s', 'together' ), '', '<a href="https://wordpress.org/" target="_blank">WordPress</a>' ); ?> -->
					<!-- <span class="sep"> &amp; </span>
					<?php _e( 'Designed by', 'together' ); ?> <a href="<?php echo esc_url( 'https://www.famethemes.com/'); ?>" target="_blank" rel="designer"><?php _e( 'FameThemes', 'together' )?></a> -->
				</div>
			</div>
		</div>
	</div>
</footer>

<a id="back-to-top" class="transition35"><i class="fa fa-angle-up"></i></a><!-- #back-to-top -->

<?php wp_footer(); ?>

</body>
</html>
