<?php
/**
 * Hero Block Template.
 *
 * @package MUUIComponents
 */

// create id attribute for specific styling
$block_id = 'hero-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Load values and assing defaults.
$hero_title              = get_field( 'hero_title' ) ?: 'Your title here...';
$hero_content            = get_field( 'hero_content' ) ?: 'Your content here...';
$hero_primary_cta        = get_field( 'hero_primary_cta' ) ?: 'Primary CTA';
$hero_secondary_cta      = get_field( 'hero_secondary_cta' ) ?: 'Secondary CTA';
$hero_backgroud_image    = get_field( 'hero_background_image' );
$hero_show_secondary_cta = get_field( 'hero_show_secondary_cta' );

$primary_cta_markup = '';
if ( $hero_primary_cta ) {
	$primary_cta_markup = sprintf(
		'<a href="%s" class="button" target="%s">%s</a>',
		esc_url( $hero_primary_cta['url'] ),
		$hero_primary_cta['target'] ? esc_html( $hero_primary_cta['target'] ) : '_self',
		esc_attr( $hero_primary_cta['title'] )
	);
}

$secondary_cta_markup = '';
if ( $hero_show_secondary_cta && $hero_secondary_cta ) {
	$secondary_cta_markup = sprintf(
		'<a href="%s" class="button" target="%s">%s</a>',
		esc_url( $hero_secondary_cta['url'] ),
		$hero_secondary_cta['target'] ? esc_html( $hero_secondary_cta['target'] ) : '_self',
		esc_attr( $hero_secondary_cta['title'] )
	);
}

?>
<section id="<?php echo esc_attr( $block_id ); ?>" class="hero <?php echo esc_attr( $align_class ); ?>">
	<div class="hero-body">
		<div class="container">
			<figure class="image">
				<?php echo wp_get_attachment_image( $hero_backgroud_image, 'full' ); ?>
			</figure>
			<h1 class="title">
				<?php echo esc_html( $hero_title ); ?>
			</h1>
			<h2 class="subtitle">
				<?php echo esc_html( $hero_content ); ?>
			</h2>
			<?php echo $primary_cta_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Output escaped on construction ?>
			<?php echo $secondary_cta_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Output escaped on construction ?>
		</div>
	</div>
</section>
<style type="text/css">
	#<?php echo esc_html( $block_id ); ?> {
		background: <?php the_field( 'hero_background_color' ); ?>;
	}
	#<?php echo esc_html( $block_id ); ?> h1, #<?php echo esc_html( $block_id ); ?> h2 {
		color: <?php the_field( 'hero_text_color' ); ?>;
	}
</style>
