<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gold_Book_LOPN
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php

$lo_logo = get_field('gold_book_logo', 'option');

?>


<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'gold-book-lopn' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header-inner">
			<?php if($lo_logo) { ?>
				<img src="<?php echo esc_url($lo_logo['url']); ?>" alt="<?php echo esc_attr($lo_logo['alt']); ?>">
			<?php } ?>
		</div>
	</header>
