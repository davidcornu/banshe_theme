<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php if ( is_category() ) {
		echo single_cat_title(); echo ' | '; bloginfo( 'name' );
	} elseif ( is_tag() ) {
		echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
	} elseif ( is_archive() ) {
		wp_title(''); echo ' Archive | '; bloginfo( 'name' );
	} elseif ( is_search() ) {
		echo 'Search for &quot;'.wp_specialchars($s).'&quot; | '; bloginfo( 'name' );
	} elseif ( is_home() ) {
		bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
	}  elseif ( is_404() ) {
		echo '404 Not Found | '; bloginfo( 'name' );
	} elseif ( is_single() ) {
		wp_title('');
	} else {
		echo wp_title(''); echo ' | '; bloginfo( 'name' );
	} ?></title>
	<meta name="description" content="<?php wp_title(''); echo ' | '; bloginfo( 'description' ); ?>" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/blueprint/reset.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/blueprint/typography.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/blueprint/forms.css" type="text/css">
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/blueprint/ie.css" type="text/css">
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Averia+Serif+Libre:300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/style.css" type="text/css">
</head>

<body <?php body_class(); ?>>
	<div class='header'>
		<div class='issuu-embed'>
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" style="width:175px;height:100px" id="fa7385a9-73bc-42e8-cde5-df9b482a0270" >
				<param name="movie" value="http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf?mode=mini&amp;shareMenuEnabled=false&amp;backgroundColor=%23222222&amp;documentId=120407045725-321fc6540282455c829daa8c3f3c7683" />
				<param name="allowfullscreen" value="true"/>
				<param name="menu" value="false"/>
				<param name="wmode" value="transparent"/>
				<embed src="http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf" type="application/x-shockwave-flash" allowfullscreen="true" menu="false" wmode="transparent" style="width:175px;height:100px" flashvars="mode=mini&amp;shareMenuEnabled=false&amp;backgroundColor=%23222222&amp;documentId=120407045725-321fc6540282455c829daa8c3f3c7683" />
			</object>
		</div>
		<h1>
			<a href='<?php bloginfo('url'); ?>'>
				<?php bloginfo('name'); ?>
			</a>
		</h1>
		<div class='subhead'><?php bloginfo('description'); ?></div>
	</div>
	<div class='ribbon'>
		<ul class='navigation'>
			<?php wp_list_categories(array('hide_empty' => false, 'exclude' => '1', 'title_li' => '')); ?>
			<li class='pages'>
				<a href='#'>About</a>
				<ul class='drop-down'>
					<?php wp_list_pages(array('title_li' => '')); ?>
				</ul>
			</li>

		</ul>
	</div>
	<div class='container'>