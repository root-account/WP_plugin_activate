<?php

/*
  - This function I took out from a store locator plugin I was working on which can viewed in action here http://gacreativebrands.co.za/ga-store-locator/

  - To make this work with whatever plugin you working on, just copy the code to your plugin files then change table and field names and you good to go.

*/

//Craete database table for the plugin when activated
function activate_plug(){
  global $wpdb;

  // These are the tables names for the tables to be created in the DB.
  $store_details = "store_details";
  $table_styles = "styles";
  $table_types = "types";
  $table_makers = "map_makers";


  $charset = $wpdb->get_charset_collate();

  //Create fields for the table "store_details"
  $createSQL = "CREATE TABLE $store_details(

    id int(11) NOT NULL AUTO_INCREMENT,
    store_name varchar(255) NOT NULL,
    store_address varchar(255) NOT NULL,
    business_hours varchar(150) NOT NULL,
    latitude varchar(255) NOT NULL,
    longitude varchar(255) NOT NULL,
    telephone varchar(100) NOT NULL,
    type_brands varchar(200) NOT NULL,
    country varchar(150) NOT NULL,
    province varchar(150) NOT NULL,
    city varchar(150) NOT NULL,
    area_country varchar(150) NOT NULL,
    store_id varchar(150) NOT NULL,
    source int(11),

    PRIMARY KEY  (id)

  )$charset;";


  //Create fields for the table "table_styles"
  $createSQL2 = "CREATE TABLE $table_styles(

    id int(11) NOT NULL AUTO_INCREMENT,
    style_name varchar(200) NOT NULL,
    category varchar(200) NOT NULL,
    store_ids text NOT NULL,
    brand varchar(200) NOT NULL,
    source int(11),

    PRIMARY KEY  (id)

  )$charset;";


  //Create fields for the table "table_types"
  $createSQL3 = "CREATE TABLE $table_types(

    id int(11) NOT NULL AUTO_INCREMENT,
    category varchar(200) NOT NULL,
    store_ids text NOT NULL,
    source int(11),

    PRIMARY KEY  (id)

  )$charset;";

  //Create fields for the table "table_makers"
  $createSQL4 = "CREATE TABLE $table_makers(
    id int(11) NOT NULL,
    maker_name varchar(200) NOT NULL,
    maker_url text NOT NULL,
    PRIMARY KEY  (id)

  )$charset;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

  
  dbDelta($createSQL);
  dbDelta($createSQL2);
  dbDelta($createSQL3);
  dbDelta($createSQL4);



}

register_activation_hook(__FILE__, 'activate_plug');






