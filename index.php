<?php get_header(); ?>

<div class='articles'>

	<?php if (have_posts()): ?>

		<?php for($i = 1; $i < 4; $i++): ?>
			<?php $count = 0; ?>

			<div class='column column-<?php echo $i; ?>'>
				<?php while (have_posts()) : the_post(); ?>

					<?php if($count % 3 + 1 == $i): ?>

						<div class="article-short">
							<h2>
								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark">
									<?php the_title(); ?>
								</a>
							</h2>

							<div class='article-meta'>
								<?php if (get_post_meta($post->ID, 'author', true)): ?>
									By <strong><?php echo get_post_meta($post->ID, 'author', true); ?></strong> |
								<?php endif; ?>
								<?php the_time("F jS"); ?>
							</div>

							<?php if ( has_post_format('image') ): ?>
								<div class='thumbnail'>
									<?php if ( has_post_thumbnail() ): ?>
										<?php the_post_thumbnail('medium'); ?>
									<?php else: ?>
										<img width='300px' height='300px' src='<?php bloginfo('template_url') ?>/images/placeholder.png'/>
									<?php endif; ?>
								</div>
							<?php else: ?>
								<div class='excerpt'>
									<?php the_excerpt(); ?>
								</div>
							<?php endif; ?>
						</div><!-- article-short -->

					<?php endif; ?>

					<?php $count += 1; ?>
				<?php endwhile; ?>
			</div><!-- column-<?php echo $i; ?> -->
		<?php endfor; ?>

	<?php else: ?>

		<div class="no-results">
			Sorry, nothing here yet.
		</div>

	<?php endif; ?>

	<div class='clearfix'></div>

	<div class="previous-next">
		<div class='previous'>
			<?php next_posts_link('&laquo; Older Entries') ?>
		</div>
		<div class='next'>
			<?php previous_posts_link('Newer Entries &raquo;') ?>
		</div>
		<div class='clearfix'></div>
	</div>

</div><!-- articles -->

<?php get_footer(); ?>
