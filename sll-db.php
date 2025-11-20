<?php


function SLL_create_table() {

	global $wpdb;

	$SLL_table_name=$wpdb->prefix."sll_options";

	$charset_collate = $wpdb->get_charset_collate();

	$SLL_query = "CREATE TABLE $SLL_table_name (
		id int(10) NOT NULL AUTO_INCREMENT,
		primary_title varchar (250)  DEFAULT '',
		primary_meta_title varchar (250)  DEFAULT '',
		primary_description varchar (250)  DEFAULT '',
		og_type varchar (250)  DEFAULT '',
		og_url varchar (250)  DEFAULT '',
		og_title varchar (250)  DEFAULT '',
		og_description varchar (250)  DEFAULT '',
		og_image varchar (250)  DEFAULT '',
		twitter_card varchar (250)  DEFAULT '',
		twitter_url varchar (250)  DEFAULT '',
		twitter_title varchar (250)  DEFAULT '',
		twitter_description varchar (250)  DEFAULT '',
		twitter_image varchar (250)  DEFAULT '',
		PRIMARY KEY (id)
	) $charset_collate;";

	require_once(ABSPATH ."wp-admin/includes/upgrade.php");
	dbDelta($SLL_query);
}

?>