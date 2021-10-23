<?php
/**
 * Template part for displaying site info
 *
 * @package Bosa Travelers Blog
 */

?>

<div class="site-info">
	<?php echo wp_kses_post( html_entity_decode( esc_html__( 'Copyright &copy; ' , 'bosa-travelers-blog' ) ) );
		echo esc_html( date( 'Y' ) );
		printf( esc_html__( ' Bosa Travelers Blog. Powered by', 'bosa-travelers-blog' ) );
	?>
	<a href="<?php echo esc_url( __( '//bosathemes.com', 'bosa-travelers-blog' ) ); ?>" target="_blank">
		<?php
			printf( esc_html__( 'Bosa Themes', 'bosa-travelers-blog' ) );
		?>
	</a>
</div><!-- .site-info -->