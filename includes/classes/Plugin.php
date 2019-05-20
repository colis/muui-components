<?php

namespace MUUIComponents;

/**
 * MUUIComponents Plugin main class.
 */
class Plugin {

	/**
	 * Instance of the blocks loader.
	 *
	 * @var BlocksLoader
	 */
	private $blocks_loader;

	/**
	 * Configure the plugin.
	 */
	public function __construct() {
		$this->blocks_loader = new BlocksLoader();
	}

	/**
	 * Add hooks.
	 */
	public function init() {
		add_filter( 'acf/settings/save_json', [ $this->blocks_loader, 'acf_json_save_point' ] );
		add_filter( 'acf/settings/load_json', [ $this->blocks_loader, 'acf_json_load_point' ] );
		add_filter( 'block_categories', [ $this->blocks_loader, 'muui_components_block_category' ] );
		add_action( 'acf/init', [ $this->blocks_loader, 'register_acf_blocks' ] );
	}

}
