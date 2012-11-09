<?php
/*
Template Name: One
*/
?>

<?php get_header(); ?>
<div id="content" class="clearfix row-fluid">
	<div id="main" class="span8 offset2" role="main">
			<?php
				$mypages = get_pages( array( 'sort_column' => 'menu_order' ) );
			
				foreach( $mypages as $page ) {		
					$content = $page->post_content;
					if ( ! $content ) // Check for empty page
						continue;
			
					$content = apply_filters( 'the_content', $content );
				?>
					<article id="<?php echo $page->post_name; ?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">
						<?php if ( $page->post_name != 'home' ) { ?>
						<header>
							<h1 class="page-title" itemprop="headline"><?php echo $page->post_title; ?></h1>
						</header> <!-- end article header -->
						<?php } ?>
						<section class="post_content" itemprop="articleBody">
							<?php echo $content; ?>
						</section> <!-- end article section -->
					</article> <!-- end article -->
				<?php
				}	
			?>
	</div> <!-- end #main -->
</div> <!-- end #content -->
<?php get_footer(); ?>