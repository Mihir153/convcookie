
<?php
class Conversios_Cookie_Admin
{
	private $plugin_name;
	private $version;
	public function __construct($plugin_name, $version)
	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;	
		add_action('wp_ajax_myaction', array($this, 'myaction'));
		add_action('wp_ajax_process_ajax', array($this, 'process_ajax'));
		add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
	}
	public function enqueue_styles()
	{
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/conversios-cookie-admin.css', array(), $this->version, 'all');
		wp_enqueue_script('jquery', false, array(), false, true);
	}

	public function enqueue_scripts()
	{
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/conversios-cookie-admin.js', array('jquery'), $this->version, false);
	}

	public function myaction()
	{	
		error_log('AJAX call received');
		wp_die();
	}
	public function process_ajax()
	{
		if (isset($_POST['formData'])) {
			$formData = wp_unslash($_POST['formData']); 
			$decodedFormData = json_decode($formData, true);
			if ($decodedFormData !== null) {		
				$title = isset($decodedFormData['title']) ? sanitize_text_field($decodedFormData['title']) : '';
				$message = isset($decodedFormData['message']) ? sanitize_text_field($decodedFormData['message']) : '';
				$buttonlabel1 = isset($decodedFormData['buttonlabel1']) ? sanitize_text_field($decodedFormData['buttonlabel1']) : '';
				$buttonlabel2 = isset($decodedFormData['buttonlabel2']) ? sanitize_text_field($decodedFormData['buttonlabel2']) : '';
				$cookiename = isset($decodedFormData['cookiename']) ? sanitize_text_field($decodedFormData['cookiename']) : '';
				$cookievalue = isset($decodedFormData['cookievalue']) ? sanitize_text_field($decodedFormData['cookievalue']) : '';
				$cookieexpiration = isset($decodedFormData['cookieexpiration']) ? sanitize_text_field($decodedFormData['cookieexpiration']) : '';				
				$jsonFormData = json_encode(array(
					'title' => $title,
					'message' => $message,
					'buttonlabel1' => $buttonlabel1,
					'buttonlabel2' => $buttonlabel2,
					'cookiename' => $cookiename,
					'cookievalue' => $cookievalue,
					'cookieexpiration' => $cookieexpiration,
				));
				update_option('CONVERSIOS_COOKIE_DATA', $jsonFormData);
				echo '<script>alert("Form data saved successfully.")</script>';
			} else {				
				echo 'Error decoding form data.';
			}
		} else {
			echo 'Form data not found in the request.';
		}
		wp_die();
	}
	public function enqueue_admin_scripts()
	{
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/conversios-cookie-admin.js', array('jquery'), '1.0.0', true);
		// Localize script to pass AJAX URL
		wp_localize_script(
			$this->plugin_name,
			'ajax_object',
			array('ajaxurl' => admin_url('admin-ajax.php'))
		);
	}
}
