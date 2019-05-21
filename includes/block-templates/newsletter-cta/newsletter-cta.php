<?php
/**
 * Newsletter CTA Block Template.
 *
 * @package MUUIComponents
 */

// create id attribute for specific styling
$block_id = 'newsletter-cta-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Load values and assing defaults.
$newsletter_cta_content         = get_field( 'newsletter_cta_content' ) ?: __( 'Your content here...', 'muui-components' );
$newsletter_cta_button_text     = get_field( 'newsletter_cta_button_text' ) ?: __( 'Submit', 'muui-components' );
$newsletter_cta_backgroud_image = get_field( 'newsletter_cta_background_image' );

?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="box <?php echo esc_attr( $align_class ); ?>">
	<div class="container">
		<figure class="image">
			<?php echo wp_get_attachment_image( $newsletter_cta_backgroud_image, 'full' ); ?>
		</figure>
		<p class="subtitle">
			<?php echo esc_html( $newsletter_cta_content ); ?>
		</p>
		<div class="field">
			<label class="label"><?php esc_html_e( 'Email', 'muui-components' ); ?></label>
			<div class="control has-icons-left has-icons-right">
				<input class="input is-danger" type="email" placeholder="Email input" value="hello@">
				<span class="icon is-small is-left">
					<i class="fas fa-envelope"></i>
				</span>
				<span class="icon is-small is-right">
					<i class="fas fa-exclamation-triangle"></i>
				</span>
			</div>
			<p class="help is-danger"><?php esc_html_e( 'This email is invalid', 'muui-components' ); ?></p>
			<button class="button is-link"><?php echo esc_html( $newsletter_cta_button_text ); ?></button>
		</div>
	</div>
</div>
<style type="text/css">
	#<?php echo esc_html( $block_id ); ?> {
		background: <?php the_field( 'newsletter_cta_background_color' ); ?>;
	}
	#<?php echo esc_html( $block_id ); ?> h1, #<?php echo esc_html( $block_id ); ?> h2 {
		color: <?php the_field( 'newsletter_cta_text_color' ); ?>;
	}
</style>
