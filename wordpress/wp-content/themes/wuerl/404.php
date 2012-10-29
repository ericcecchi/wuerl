<?php get_header(); ?>
			
<div id="content" class="row-fluid">
	<div id="main" class="span12" role="main">
		<article id="post-not-found">
			<header>
					<h1 class="page-title">Uh-oh. That's a 404: Page Not Found.</h1>
					<h2>It worked 'til you broke it!</h2>
			</header> <!-- end article header -->
			<section class="post_content">
				<p>Whatever you were looking for was not found. You should probably go <a href="/">home</a> now.</p>
				<div class="row-fluid">
					<div class="span12">
						<?php get_search_form(); ?>
					</div>
				</div>
			</section> <!-- end article section -->		
		</article> <!-- end article -->
	</div> <!-- end #main -->
</div> <!-- end #content -->

<?php get_footer(); ?>