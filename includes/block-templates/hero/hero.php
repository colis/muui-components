<?php
/**
 * Hero Block Template.
 *
 * @package MUUIComponents
 */

// Load values and assing defaults.
$hero_title              = get_field( 'hero_title' ) ?: 'Your title here...';
$hero_content            = get_field( 'hero_content' ) ?: 'Your content here...';
$hero_primary_cta        = get_field( 'hero_primary_cta' ) ?: 'Primary CTA';
$hero_secondary_cta      = get_field( 'hero_secondary_cta' ) ?: 'Secondary CTA';
$hero_background_color   = get_field( 'hero_background_color' );
$hero_text_color         = get_field( 'hero_color' );
$hero_backgroud_image    = get_field( 'hero_background_image' );
$hero_show_secondary_cta = get_field( 'hero_show_secondary_cta' );

if ( $hero_primary_cta ) {
	$hero_primary_cta_url    = $hero_primary_cta['url'];
	$hero_primary_cta_title  = $hero_primary_cta['title'];
	$hero_primary_cta_target = $hero_primary_cta['target'] ?: '_self';
}

?>
<section class="hero">
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
			<a href="<?php echo esc_attr( $hero_primary_cta_url ); ?>" class="button" target="<?php echo esc_attr( $hero_primary_cta_target ); ?>"><?php echo esc_html( $hero_primary_cta_title ); ?></a>
		</div>
	</div>
</div>
