<?php



global $wpdb;
$table_name=$wpdb->prefix.'sll_options';
$SLL_results = $wpdb->get_results("SELECT * FROM $table_name ORDER BY id DESC LIMIT 1");

foreach ($SLL_results as $SLL_row) {
	$primary_title = $SLL_row->primary_title;
	$primary_meta_title = $SLL_row->primary_meta_title;
	$primary_description = $SLL_row->primary_description;
	$og_type = $SLL_row->og_type;
	$og_url = $SLL_row->og_url;
	$og_title = $SLL_row->og_title;
	$og_description = $SLL_row->og_description;
	$og_image = $SLL_row->og_image;
	$twitter_card = $SLL_row->twitter_card;
	$twitter_url = $SLL_row->twitter_url;
	$twitter_title = $SLL_row->twitter_title;
	$twitter_description = $SLL_row->twitter_description;
	$twitter_image = $SLL_row->twitter_image;
}

wp_enqueue_media();

?>

<h1>Social Link Look Settings</h1>

<div class="row">

	<div class="column">

		<form action="" method="post">

			<div class="single-input">
				<input type="hidden" name="primary_title" value="<?php echo $primary_title ?> ">
			</div>

			<div class="single-input">
				<label for="primaryMetaTitle">Primary Meta Title</label> <br>
				<p>Title of your website which will be shown as link title.</p>
				<input type="text" name="primary_meta_title" value="<?php echo $primary_meta_title ?>">
			</div>

			<div class="single-input">
				<label for="primaryDesc">Primary Meta Description</label> <br>
				<p>A short description of maximum 2 or 3 phrases. Will be shown as description under your Meta Title.</p>
				<input type="text" name="primary_description" value="<?php echo $primary_description ?>">
			</div>

			<div class="single-input">
				<label for="ogType">OG Type</label> <br>
				<p>Type of shared multimedia. Very often it's just "website".</p>
				<input type="text" name="og_type" value="<?php echo $og_type ?>">
			</div>

			<div class="single-input">
				<label for="ogUrl">OG Url</label> <br>
				<p>The canonical URL of your object that will be used as its permanent ID, it mustn't contain parameters or variables. <br> You should use <?php echo get_site_url(); ?></p>
				<input type="text" name="og_url" value="<?php echo $og_url ?>">
			</div>

			<div class="single-input">
				<label for="ogTitle">OG Title</label> <br>
				<p>Does the same of the Meta Title, but for the Open Graph protocol.</p>
				<input type="text" name="og_title" value="<?php echo $og_title ?>">
			</div>

			<div class="single-input">
				<label for="ogDesc">OG Description</label> <br>
				<p>Does the same of the Meta Description, but for the Open Graph protocol.</p>
				<input type="text" name="og_description" value="<?php echo $og_description ?>">
			</div>

			<div class="single-input">
				<label for="ogImage">OG Image</label> <br>
				<p>The image shown when your content is shared. This is important. Recommended size is 1200 x 630px.</p>
				<input type="button" id="btnImage"  value="Upload Image"> <br>
				<img src="<?php echo $og_image ?>" alt="" id="getImage" style="height: 200px;">
				<input type="hidden" id="ogimginput" name="og_image" value="<?php echo $og_image ?>">
			</div>

			<div class="single-input">
				<label for="twitterCard">Twitter Card</label> <br>
				<p>Very similar to OG Type, it's often "summary".</p>
				<input type="text" name="twitter_card" value="<?php echo $twitter_card ?>">
			</div>

			<div class="single-input">
				<label for="twitterUrl">Twitter Url</label> <br>
				<p>Very similar to OG Url, you should use <?php echo get_site_url(); ?></p>
				<input type="text" name="twitter_url" value="<?php echo $twitter_url ?>">
			</div>

			<div class="single-input">
				<label for="twitterTitle">Twitter Title</label> <br>
				<p>A concise title for the related content. You can use the same as OG Title.</p>
				<input type="text" name="twitter_title" value="<?php echo $twitter_title ?>">
			</div>

			<div class="single-input">
				<label for="twitterDesc">Twitter Description</label> <br>
				<p>A description that concisely summarizes the content as appropriate for presentation within a Tweet. You should not re-use the title as the description or use this field to describe the general services provided by the website. You can use the same OG Description.</p>
				<input type="text" name="twitter_description" value="<?php echo $twitter_description ?>">
			</div>

			<div class="single-input">
				<label for="twitterImg">Twitter Image</label> <br>
				<p>A URL to a unique image representing the content of the page. Images for this Card support an aspect ratio of 1:1 with minimum dimensions of 144x144 or maximum of 4096x4096 pixels. Images must be less than 5MB in size. The image will be cropped to a square on all platforms. JPG, PNG, WEBP and GIF formats are supported. Only the first frame of an animated GIF will be used. SVG is not supported.</p>
				<input type="button" id="btnTwImage"  value="Upload Image"> <br>
				<img src="<?php echo $twitter_image ?>" alt="" id="getTwImage" style="height: 200px;">
				<input type="hidden" id="twimginput" name="twitter_image" value="<?php echo $twitter_image ?>">
			</div>

			<button class="sendbtn" type="submit" name="save">Save</button>
			
		</form>
	</div>

	<div class="column">
		
		<div class="right-side">
		
			<h1>Made by Sebastiano Riva</h1>

			<img src="<?php echo plugins_url('',__FILE__).'/assets/images/sll-icon.png' ?>" alt="">
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
function SLL_insert_data() {
		
		global $wpdb;
		$table_name= $wpdb->prefix.'sll_options';
	
		if(isset($_POST['save'])) {
			
			

			$SLL_primary_title = $_POST['primary_title'];
			$SLL_primary_meta_title = $_POST['primary_meta_title'];
			$SLL_primary_description =$_POST['primary_description'];
			$SLL_og_type = $_POST['og_type'];
			$SLL_og_url = $_POST['og_url'];
			$SLL_og_title = $_POST['og_title'];
			$SLL_og_description =$_POST['og_description'];
			$SLL_og_image =$_POST['og_image'];
			$SLL_twitter_card =$_POST['twitter_card'];
			$SLL_twitter_url =$_POST['twitter_url'];
			$SLL_twitter_title =$_POST['twitter_title'];
			$SLL_twitter_description =$_POST['twitter_description'];
			$SLL_twitter_image =$_POST['twitter_image'];
			
			$SLL_results = $wpdb->get_results("SELECT * FROM $table_name WHERE id = 1");
			
			if($wpdb->num_rows == 0) {
				
			$wpdb->insert($table_name,
							array(
								'primary_title' => $SLL_primary_title,
								'primary_meta_title' => $SLL_primary_meta_title,
								'primary_description' => $SLL_primary_description,
								'og_type' => $SLL_og_type,
								'og_url' => $SLL_og_url,
								'og_title' => $SLL_og_title,
								'og_description' => $SLL_og_description,
								'og_image' => $SLL_og_image,
								'twitter_card' => $SLL_twitter_card,
								'twitter_url' => $SLL_twitter_url,
								'twitter_title' => $SLL_twitter_title,
								'twitter_description' => $SLL_twitter_description,
								'twitter_image' => $SLL_twitter_image
							),
							array(
								'%s',
								'%s',
								'%s',
								'%s',
								'%s',
								'%s',
								'%s',
								'%s',
								'%s',
								'%s',
								'%s',
								'%s',
								'%s'
							)

			);	
				
			} else {
	
			$wpdb->update($table_name,
							array(
								'primary_title' => $SLL_primary_title,
								'primary_meta_title' => $SLL_primary_meta_title,
								'primary_description' => $SLL_primary_description,
								'og_type' => $SLL_og_type,
								'og_url' => $SLL_og_url,
								'og_title' => $SLL_og_title,
								'og_description' => $SLL_og_description,
								'og_image' => $SLL_og_image,
								'twitter_card' => $SLL_twitter_card,
								'twitter_url' => $SLL_twitter_url,
								'twitter_title' => $SLL_twitter_title,
								'twitter_description' => $SLL_twitter_description,
								'twitter_image' => $SLL_twitter_image
							),
						    array(
								'id' => 1
							),
							array(
								'%s',
								'%s',
								'%s',
								'%s',
								'%s',
								'%s',
								'%s',
								'%s',
								'%s',
								'%s',
								'%s',
								'%s',
								'%s'
							)

			);
			}
			
			echo "<script type='text/javascript'>
        window.location=document.location.href;
        </script>";
			
		}
	
}
?>