<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Handle form submission
if ( isset( $_POST['save'] ) ) {
	SLL_insert_data();
}

// Load current data
global $wpdb;
$table_name = $wpdb->prefix . 'sll_options';
$SLL_row = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table_name ORDER BY id DESC LIMIT %d", 1 ) );

$primary_title       = $SLL_row ? esc_html( $SLL_row->primary_title ) : '';
$primary_meta_title  = $SLL_row ? esc_html( $SLL_row->primary_meta_title ) : '';
$primary_description = $SLL_row ? esc_html( $SLL_row->primary_description ) : '';
$og_type             = $SLL_row ? esc_html( $SLL_row->og_type ) : '';
$og_url              = $SLL_row ? esc_url( $SLL_row->og_url ) : '';
$og_title            = $SLL_row ? esc_html( $SLL_row->og_title ) : '';
$og_description      = $SLL_row ? esc_html( $SLL_row->og_description ) : '';
$og_image            = $SLL_row ? esc_url( $SLL_row->og_image ) : '';
$twitter_card        = $SLL_row ? esc_html( $SLL_row->twitter_card ) : '';
$twitter_url         = $SLL_row ? esc_url( $SLL_row->twitter_url ) : '';
$twitter_title       = $SLL_row ? esc_html( $SLL_row->twitter_title ) : '';
$twitter_description = $SLL_row ? esc_html( $SLL_row->twitter_description ) : '';
$twitter_image       = $SLL_row ? esc_url( $SLL_row->twitter_image ) : '';

wp_enqueue_media();

?>

<h1>Social Link Look Settings</h1>

<div class="row">

	<div class="column">

		<form action="" method="post">

			<div class="single-input">
				<input type="hidden" name="primary_title" value="<?php echo $primary_title; ?> ">
			</div>

			<div class="single-input">
				<label for="primaryMetaTitle">Primary Meta Title</label> <br>
				<p>Title of your website which will be shown as link title.</p>
				<input type="text" name="primary_meta_title" value="<?php echo $primary_meta_title; ?>">
			</div>

			<div class="single-input">
				<label for="primaryDesc">Primary Meta Description</label> <br>
				<p>A short description of maximum 2 or 3 phrases. Will be shown as description under your Meta Title.</p>
				<input type="text" name="primary_description" value="<?php echo $primary_description; ?>">
			</div>

			<div class="single-input">
				<label for="ogType">OG Type</label> <br>
				<p>Type of shared multimedia. Very often it's just "website".</p>
				<input type="text" name="og_type" value="<?php echo $og_type; ?>">
			</div>

			<div class="single-input">
				<label for="ogUrl">OG Url</label> <br>
				<p>The canonical URL of your object that will be used as its permanent ID, it mustn't contain parameters or variables. <br> You should use <?php echo esc_url( get_site_url() ); ?></p>
				<input type="text" name="og_url" value="<?php echo $og_url; ?>">
			</div>

			<div class="single-input">
				<label for="ogTitle">OG Title</label> <br>
				<p>Does the same of the Meta Title, but for the Open Graph protocol.</p>
				<input type="text" name="og_title" value="<?php echo $og_title; ?>">
			</div>

			<div class="single-input">
				<label for="ogDesc">OG Description</label> <br>
				<p>Does the same of the Meta Description, but for the Open Graph protocol.</p>
				<input type="text" name="og_description" value="<?php echo $og_description; ?>">
			</div>

			<div class="single-input">
				<label for="ogImage">OG Image</label> <br>
				<p>The image shown when your content is shared. This is important. Recommended size is 1200 x 630px.</p>
				<input type="button" id="btnImage"  value="Upload Image"> <br>
				<img src="<?php echo $og_image; ?>" alt="" id="getImage" style="height: 200px;">
				<input type="hidden" id="ogimginput" name="og_image" value="<?php echo $og_image; ?>">
			</div>

			<div class="single-input">
				<label for="twitterCard">Twitter Card</label> <br>
				<p>Very similar to OG Type, it's often "summary".</p>
				<input type="text" name="twitter_card" value="<?php echo $twitter_card; ?>">
			</div>

			<div class="single-input">
				<label for="twitterUrl">Twitter Url</label> <br>
				<p>Very similar to OG Url, you should use <?php echo esc_url( get_site_url() ); ?></p>
				<input type="text" name="twitter_url" value="<?php echo $twitter_url; ?>">
			</div>

			<div class="single-input">
				<label for="twitterTitle">Twitter Title</label> <br>
				<p>A concise title for the related content. You can use the same as OG Title.</p>
				<input type="text" name="twitter_title" value="<?php echo $twitter_title; ?>">
			</div>

			<div class="single-input">
				<label for="twitterDesc">Twitter Description</label> <br>
				<p>A description that concisely summarizes the content as appropriate for presentation within a Tweet. You should not re-use the title as the description or use this field to describe the general services provided by the website. You can use the same OG Description.</p>
				<input type="text" name="twitter_description" value="<?php echo $twitter_description; ?>">
			</div>

			<div class="single-input">
				<label for="twitterImg">Twitter Image</label> <br>
				<p>A URL to a unique image representing the content of the page. Images for this Card support an aspect ratio of 1:1 with minimum dimensions of 144x144 or maximum of 4096x4096 pixels. Images must be less than 5MB in size. The image will be cropped to a square on all platforms. JPG, PNG, WEBP and GIF formats are supported. Only the first frame of an animated GIF will be used. SVG is not supported.</p>
				<input type="button" id="btnTwImage"  value="Upload Image"> <br>
				<img src="<?php echo $twitter_image; ?>" alt="" id="getTwImage" style="height: 200px;">
				<input type="hidden" id="twimginput" name="twitter_image" value="<?php echo $twitter_image; ?>">
			</div>

			<?php wp_nonce_field( 'sll_save_settings', 'sll_nonce' ); ?>

			<button class="sendbtn" type="submit" name="save">Save</button>


		</form>
	</div>

	<div class="column">

		<div class="right-side">

			<h1>Made by Sebastiano Riva</h1>

			<img src="<?php echo esc_url( plugins_url( '', __FILE__ ) . '/assets/images/sll-icon.png' ); ?>" alt="">
			<h3>Social Link Look</h3>

			<div class="btns">
				<a class="github-button" href="https://github.com/skebby11/social-link-look/subscription" data-icon="octicon-eye" data-size="large" aria-label="Watch skebby11/social-link-look on GitHub">Watch</a>
				<a class="github-button" href="https://github.com/skebby11/social-link-look" data-icon="octicon-star" data-size="large" aria-label="Star skebby11/social-link-look on GitHub">Star</a>
				<a class="github-button" href="https://github.com/skebby11/social-link-look/issues" data-icon="octicon-issue-opened" data-size="large" aria-label="Issue skebby11/social-link-look on GitHub">Issue</a>

			</div>


			<div class="pp-don mt-3">

				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick" />
				<input type="hidden" name="hosted_button_id" value="M53BEMG4Q5WCJ" />
				<input type="image" src="https://www.paypalobjects.com/en_US/IT/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
				<img alt="" border="0" src="https://www.paypal.com/en_IT/i/scr/pixel.gif" width="1" height="1" />
				</form>


			</div>

		</div>


	</div>
</div>

<?php

/**
 * Validate a text field value.
 *
 * @param string $value The value to validate.
 * @param int    $max_length Maximum allowed length.
 * @return bool
 */
function SLL_validate_field( string $value, int $max_length = 250 ): bool {
	if ( empty( $value ) ) {
		return false;
	}
	if ( strlen( trim( $value ) ) > $max_length ) {
		return false;
	}
	return true;
}

function SLL_insert_data() {
	if ( ! isset( $_POST['sll_nonce'] ) || ! wp_verify_nonce( $_POST['sll_nonce'], 'sll_save_settings' ) ) {
		wp_die( 'Security check failed.' );
	}

	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Unauthorized access.' );
	}

	global $wpdb;
	$table_name = $wpdb->prefix . 'sll_options';

	$fields = array(
		'primary_title',
		'primary_meta_title',
		'primary_description',
		'og_type',
		'og_url',
		'og_title',
		'og_description',
		'og_image',
		'twitter_card',
		'twitter_url',
		'twitter_title',
		'twitter_description',
		'twitter_image',
	);

	// Validate all fields are present and within limits
	foreach ( $fields as $field ) {
		if ( ! isset( $_POST[ $field ] ) || ! SLL_validate_field( $_POST[ $field ] ) ) {
			return;
		}
	}

	// Sanitize data
	$url_fields = array( 'og_url', 'og_image', 'twitter_url', 'twitter_image' );
	$data       = array();
	$format     = array();

	foreach ( $fields as $field ) {
		if ( in_array( $field, $url_fields, true ) ) {
			$data[ $field ] = esc_url_raw( wp_unslash( $_POST[ $field ] ) );
		} else {
			$data[ $field ] = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
		}
		$format[] = '%s';
	}

	// Check if a row already exists
	$existing = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM $table_name WHERE id = %d", 1 ) );

	if ( ! $existing ) {
		$wpdb->insert( $table_name, $data, $format );
	} else {
		$wpdb->update( $table_name, $data, array( 'id' => 1 ), $format, array( '%d' ) );
	}

	echo "<script type='text/javascript'>window.location=document.location.href;</script>";
}
