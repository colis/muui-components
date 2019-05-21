<?php

namespace MUUIComponents;

use function MUUIComponents\Core\style_url as style_url;

/**
 * Handle ACF Gutenberg Blocks.
 */
class BlocksLoader {

	/**
	 * Add a new ACF Local JSON save point.
	 *
	 * @param string $path The default ACF Local JSON path.
	 */
	public function acf_json_save_point( $path ) {
		$path = MUUI_COMPONENTS_ACF_LOCAL_JSON_PATH;

		return $path;
	}

	/**
	 * Add a new ACF Local JSON load point.
	 *
	 * @param array $paths The default array of ACF Local JSON paths.
	 */
	public function acf_json_load_point( $paths ) {
		// remove original path (optional)
		unset( $paths[0] );

		$paths[] = MUUI_COMPONENTS_ACF_LOCAL_JSON_PATH;

		return $paths;
	}

	/**
	 * Add the MUUI Components block category to the default ones.
	 *
	 * @param array $categories The default block categories.
	 */
	public function muui_components_block_category( $categories ) {
		return array_merge(
			$categories,
			[
				[
					'slug'  => 'muui-components',
					'title' => __( 'MUUI Components', 'muui-components' ),
				],
			]
		);
	}

	/**
	 * Register ACF Blocks.
	 *
	 * @see https://www.advancedcustomfields.com/resources/acf_register_block_type/
	 */
	public function register_acf_blocks() {
		if ( ! function_exists( 'acf_register_block_type' ) ) {
			return;
		}

		acf_register_block_type(
			[
				'name'            => 'pwl-hero',
				'title'           => __( 'Hero', 'muui-components' ),
				'render_callback' => [ $this, 'muui_block_render_callback' ],
				'category'        => 'muui-components',
				'icon'            => 'wordpress',
				'mode'            => 'preview',
				'keywords'        => [ 'hero' ],
				'enqueue_style'   => style_url( 'shared-style', 'shared' ),
			]
		);

		acf_register_block_type(
			[
				'name'            => 'pwl-media-panel',
				'title'           => __( 'Media Panel', 'muui-components' ),
				'render_callback' => [ $this, 'muui_block_render_callback' ],
				'category'        => 'muui-components',
				'icon'            => 'wordpress',
				'mode'            => 'preview',
				'keywords'        => [ 'media', 'text' ],
				'enqueue_style'   => style_url( 'shared-style', 'shared' ),
			]
		);

		acf_register_block_type(
			[
				'name'            => 'pwl-message-box',
				'title'           => __( 'Message Box', 'muui-components' ),
				'render_callback' => [ $this, 'muui_block_render_callback' ],
				'category'        => 'muui-components',
				'icon'            => 'wordpress',
				'mode'            => 'preview',
				'keywords'        => [ 'message' ],
				'enqueue_style'   => style_url( 'shared-style', 'shared' ),
			]
		);

		acf_register_block_type(
			[
				'name'            => 'pwl-newsletter-cta',
				'title'           => __( 'Newsletter CTA', 'muui-components' ),
				'render_callback' => [ $this, 'muui_block_render_callback' ],
				'category'        => 'muui-components',
				'icon'            => 'wordpress',
				'mode'            => 'preview',
				'keywords'        => [ 'newsletter' ],
				'enqueue_style'   => style_url( 'shared-style', 'shared' ),
			]
		);
	}

	/**
	 * Generic render callback.
	 *
	 * @param array $block The block settings and attributes.
	 */
	public function muui_block_render_callback( $block ) {
		$slug = str_replace( 'acf/pwl-', '', $block['name'] );

		if ( file_exists( MUUI_COMPONENTS_BLOCK_TEMPLATES_PATH . "{$slug}/{$slug}.php" ) ) {
			include MUUI_COMPONENTS_BLOCK_TEMPLATES_PATH . "{$slug}/{$slug}.php";
		}
	}
}
