<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element
 *
 * @package WordPress
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title(); ?></title>
	<?php 
		wp_head(); 
	?>
</head>