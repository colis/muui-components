<?php
/**
 * Message Box Block Template.
 *
 * @package MUUIComponents
 */

// create id attribute for specific styling
$block_id = 'message-box-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Load values and assing defaults.
$message_box_content         = get_field( 'message_box_content' ) ?: __( 'Your content here...', 'muui-components' );
$message_box_cta             = get_field( 'message_box_cta' );
$message_box_backgroud_image = get_field( 'message_box_background_image' );

$message_box_cta_markup = '';
if ( $message_box_cta ) {
	$message_box_cta_markup = sprintf(
		'<a href="%s" class="button" target="%s">%s</a>',
		esc_url( $message_box_cta['url'] ),
		$message_box_cta['target'] ? esc_html( $message_box_cta['target'] ) : '_self',
		esc_attr( $message_box_cta['title'] )
	);
}

?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="box <?php echo esc_attr( $align_class ); ?>">
	<div class="container">
		<figure class="image">
			<?php echo wp_get_attachment_image( $message_box_backgroud_image, 'full' ); ?>
		</figure>
		<p class="subtitle">
			<?php echo esc_html( $message_box_content ); ?>
		</p>
		<?php echo $message_box_cta_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Output escaped on construction ?>
	</div>
</div>
<style type="text/css">
	#<?php echo esc_html( $block_id ); ?> {
		background: <?php the_field( 'message_box_background_color' ); ?>;
	}
	#<?php echo esc_html( $block_id ); ?> h1, #<?php echo esc_html( $block_id ); ?> h2 {
		color: <?php the_field( 'message_box_text_color' ); ?>;
	}
</style>
