	</div><!-- container -->

	<div class='footer'>
		<div class='footer-container'>
			<table>
				<tr>
					<td>
						<h2><?php bloginfo('name'); ?></h2>
						&copy; <?php echo date("Y") ?> All Rights Reserved.
						<form method="get" class="search-form" action="<?php bloginfo('home'); ?>">
							<input type='text' name='s'/>
							<input type='submit' value=''/>
						</form>
					</td>
					<td>
						<h5>Content</h5>
						<ul>
							<?php wp_list_categories(array('hide_empty' => false, 'exclude' => '1', 'title_li' => '')); ?>
						</ul>
					</td>
					<td>
						<h5>About</h5>
						<ul>
							<?php wp_list_pages(array('title_li' => '')); ?>
						</ul>
					</td>
					<td>
						<a href="<?php bloginfo('rss2_url'); ?>" rel="nofollow">
							<img width='30px' height='30px' src='<?php bloginfo('template_url'); ?>/images/rss.png'/>
						</a>
					</td>
				</tr>
			</table>
		</div><!-- footer-container -->
	</div><!-- footer -->

	<?php wp_footer(); ?>

</body>
</html>