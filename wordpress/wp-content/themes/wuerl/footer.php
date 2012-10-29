			<footer role="contentinfo">
				<hr />
				<div id="widget-footer" class="clearfix row-fluid">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
					<?php endif; ?>
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
					<?php endif; ?>
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
					<?php endif; ?>
				</div>
				<nav class="clearfix">
					<?php bones_footer_links(); // Adjust using Menus in Wordpress Admin ?>
				</nav>
				<p class="pull-right">Design by <a href="http://back3nd.com" id="creditback3nd" title="Design by back3nd.">back3nd</a>.</p>
				<p class="attribution">&copy; <?php bloginfo('name'); ?></p>
			</footer> <!-- end footer -->
		</div> <!-- end #container -->
		<!--[if lt IE 7 ]>
				<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
				<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		<?php wp_footer(); // js scripts are inserted using this function ?>
	</body>
</html>
