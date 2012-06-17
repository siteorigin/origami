<?php
/**
 * This is a file that themes can include to give basic read-only options. It also adds a page that encourages people to install Simple Options.
 *
 * @copyright Greg Priday <greg@siteorigin.com> 2012
 * @license GPL 2.0 <http://www.gnu.org/licenses/gpl-2.0.html>
 */

// Ignore Simple Options Lite if the full version is already installed
if(!function_exists('simple_options_get')) :
	/**
	 * Just initialize all the options.
	 */
	function simple_options_init(){
		do_action('simple_options_init');
	}
	add_action('init', 'simple_options_init');

	/**
	 * Add an admin page for Simple options installation info
	 * @action admin_menu
	 */
	function simple_options_install_info(){
		if(!current_user_can('edit_theme_options')) return;

		add_theme_page(
			__('Theme Options', 'siteorigin'),
			__('Theme Options', 'siteorigin'),
			'edit_theme_options',
			'simple-options',
			'_simple_options_install_info_render'
		);
	}
	add_action('admin_menu', 'simple_options_install_info');

	/**
	 * Render the page that displays Simple Options installation info.
	 */
	function _simple_options_install_info_render(){
		if(is_multisite()) $url = network_admin_url('plugin-install.php');
		else $url = admin_url('plugin-install.php');

		$url = add_query_arg(array(
			'tab' => 'plugin-information',
			'plugin' => 'simple-options',
			'TB_iframe' => 'true',
			'width' => 640,
			'height' => 773
		), $url);

		$info = get_theme_data(get_template_directory().'/style.css');

		?>
	<div class="wrap">
		<div id="icon-themes" class="icon32"><br></div>
		<h2><?php _e('Install Simple Options', 'siteorigin') ?></h2>
		<p>
			<?php printf(__('%s uses the Simple Options plugin to handle theme options.', 'siteorigin'), $info['Name']) ?>
			<?php _e("It's a free plugin that only takes a few seconds to install.", 'siteorigin') ?>
		</p>
		<br/>
		<p>
			<a href="<?php print $url ?>" class="thickbox button-primary"><?php _e('Install Simple Options', 'siteorigin') ?></a>
		</p>
	</div>
	<?php
	}

	/**
	 * Enqueue scripts for the Simple Options install page.
	 *
	 * @param $suffix
	 */
	function _simple_options_admin_enqueue($suffix){
		if($suffix != 'appearance_page_simple-options') return;
		wp_enqueue_script('plugin-install');
		add_thickbox();
	}
	add_action('admin_enqueue_scripts', '_simple_options_admin_enqueue');

	/**
	 * Add an options field
	 *
	 * @param string $page
	 * @param array $settings
	 */
	function simple_options_add_page($page, $settings){
		// We'll just ignore this
	}

	/**
	 * Add a section title before $page, $field
	 * @param $page
	 * @param $field
	 * @param $title
	 */
	function simple_options_add_section_title($page, $field, $title){
		// We'll just ignore this
	}

	/**
	 * Add an options field
	 *
	 * @param string $page
	 * @param string $field
	 * @param $type
	 * @param array $settings
	 */
	function simple_options_add($page, $field, $type, $settings){
		global $simple_options_fields;
		if(empty($simple_options_fields[$page])) $simple_options_fields[$page] = array();
		$simple_options_fields[$page][$field] = $settings;
	}

	/**
	 * Get an option value
	 *
	 * @param string $page
	 * @param string $field
	 * @return mixed|WP_Error
	 */
	function simple_options_get($page, $field){
		global $simple_options_fields, $simple_options_values;
		if(is_null($simple_options_fields)){
			$simple_options_values = get_option('simple-options-'.basename(get_template_directory()), array());
		}

		if(!isset($simple_options_fields[$page])) return new WP_Error('', 'Unknown options page');
		if(!isset($simple_options_fields[$page][$field])) return new WP_Error('', 'Unknown field');
		if(!isset($simple_options_fields[$page][$field]['default'])) return false;

		return isset($simple_options_values[$page][$field]) ? $simple_options_values[$page][$field] : $simple_options_fields[$page][$field]['default'];
	}

endif;