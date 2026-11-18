<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package REGENT
 */


if (!function_exists('regent_add_meta')) :
	/**
	 * Add meta tags.
	 */
	function regent_add_meta()
	{ ?>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Explore international hospitality internships and apply for your next opportunity.">
	<?php }
endif;

if (!function_exists('regent_add_links')) :
	/*
	* Add Google fonts, Pingback url, etc.
	*/
	function regent_add_links()
	{ ?>
<?php }
endif;

function my_custom_login()
{
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/custom-login-styles.css" />';
}
add_action('login_head', 'my_custom_login');

function my_login_logo_url()
{
	return get_bloginfo('url');
}
add_filter('login_headerurl', 'my_login_logo_url');

function my_login_logo_url_title()
{
	return 'Regent Hospitality';
}
add_filter('login_headertitle', 'my_login_logo_url_title');

/* Disable WordPress Admin Bar for all users */
add_filter('show_admin_bar', '__return_false');

// form submission handler
add_action('admin_post_nopriv_submit_internship_application', 'submit_internship_application');
add_action('admin_post_submit_internship_application', 'submit_internship_application');

function submit_internship_application()
{

	// Verify nonce
	if (
		!isset($_POST['application_nonce']) ||
		!wp_verify_nonce(
			sanitize_text_field(wp_unslash($_POST['application_nonce'])),
			'submit_internship_application'
		)
	) {
		wp_die('Security verification failed.');
	}

	// Sanitize form fields
	$full_name = sanitize_text_field(wp_unslash($_POST['full_name'] ?? ''));
	$email = sanitize_email(wp_unslash($_POST['email_address'] ?? ''));
	$phone = sanitize_text_field(wp_unslash($_POST['phone_number'] ?? ''));
	$nationality = sanitize_text_field(wp_unslash($_POST['nationality'] ?? ''));
	$applied_for = sanitize_text_field(wp_unslash($_POST['applied_for'] ?? ''));
	$intake = sanitize_text_field(wp_unslash($_POST['intake'] ?? ''));
	$cover = sanitize_textarea_field(wp_unslash($_POST['cover'] ?? ''));

	$vacancy_id = absint($_POST['vacancy_id'] ?? 0);

	// Validate required fields
	if (
		empty($full_name) ||
		!is_email($email) ||
		empty($phone) ||
		empty($nationality) ||
		empty($applied_for) ||
		empty($intake) ||
		!$vacancy_id ||
		get_post_type($vacancy_id) !== 'vacancy'
	) {
		wp_die('Please provide valid application information.');
	}

	// Validate CV
	if (
		!isset($_FILES['cv']) ||
		$_FILES['cv']['error'] !== UPLOAD_ERR_OK
	) {
		wp_die('Please upload your CV.');
	}

	$file = $_FILES['cv'];

	// Maximum file size: 5 MB
	if ($file['size'] > 5 * 1024 * 1024) {
		wp_die('CV file must not exceed 5 MB.');
	}

	// Allowed file types
	$allowed_types = array(
		'pdf'  => 'application/pdf',
		'doc'  => 'application/msword',
		'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
	);

	$file_info = wp_check_filetype_and_ext(
		$file['tmp_name'],
		$file['name'],
		$allowed_types
	);

	if (empty($file_info['ext']) || empty($file_info['type'])) {
		wp_die('Only PDF, DOC and DOCX files are allowed.');
	}

	// Create application post
	$application_id = wp_insert_post(array(
		'post_type'   => 'application',
		'post_title'  => $full_name . ' - ' . get_the_title($vacancy_id),
		'post_status' => 'pending',
	), true);

	if (is_wp_error($application_id)) {
		wp_die('Unable to submit application.');
	}

	// Upload CV to Media Library
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';

	$upload = wp_handle_upload($file, array(
		'test_form' => false,
		'mimes'     => $allowed_types,
	));

	if (isset($upload['error'])) {
		wp_delete_post($application_id, true);
		wp_die(esc_html($upload['error']));
	}

	// Register uploaded file as attachment
	$attachment_id = wp_insert_attachment(array(
		'post_mime_type' => $upload['type'],
		'post_title'     => sanitize_file_name($file['name']),
		'post_status'    => 'inherit',
	), $upload['file'], $application_id);

	if (is_wp_error($attachment_id)) {
		wp_delete_post($application_id, true);
		wp_delete_file($upload['file']);
		wp_die('Unable to save uploaded CV.');
	}

	// Save attachment metadata
	$attachment_metadata = wp_generate_attachment_metadata(
		$attachment_id,
		$upload['file']
	);

	wp_update_attachment_metadata(
		$attachment_id,
		$attachment_metadata
	);

	// Save application information as post meta
	$application_data = array(
		'full_name'      => $full_name,
		'email_address'  => $email,
		'phone_number'   => $phone,
		'nationality'    => $nationality,
		'applied_for'    => $applied_for,
		'vacancy_id'     => $vacancy_id,
		'intake'         => $intake,
		'cover_letter'   => $cover,
		'cv'             => $attachment_id,
	);

	foreach ($application_data as $key => $value) {
		update_post_meta($application_id, $key, $value);
	}

	// Redirect after successful submission
	$redirect_url = add_query_arg(
		'application',
		'success',
		get_permalink($vacancy_id)
	);

	wp_safe_redirect($redirect_url);
	exit;
}
