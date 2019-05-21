<?php
/**
 * Media Panel Block Template.
 *
 * @package MUUIComponents
 */

// create id attribute for specific styling
$block_id = 'media-panel-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Load values and assing defaults.
$media_panel_title   = get_field( 'media_panel_title' ) ?: __( 'Your title here...', 'muui-components' );
$media_panel_content = get_field( 'media_panel_content' ) ?: __( 'Your content here...', 'muui-components' );
$media_panel_image   = get_field( 'media_panel_image' );

?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="card <?php echo esc_attr( $align_class ); ?>">
	<div class="card-image">
		<figure class="image">
			<?php echo wp_get_attachment_image( $media_panel_image, 'full' ); ?>
		</figure>
	</div>
	<div class="card-content">
		<div class="content">
			<h2 class="title">
				<?php echo esc_html( $media_panel_title ); ?>
			</h2>
			<p class="subtitle">
				<?php echo esc_html( $media_panel_content ); ?>
			</p>
		</div>
	</div>
</div>
