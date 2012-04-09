<?php get_header(); ?>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>

		<div <?php post_class('article'); ?>>
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

			<div class='article-body'>
				<?php if (has_post_thumbnail()): ?>
					<?php the_post_thumbnail('large'); ?>
				<?php endif; ?>

				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			</div><!-- article-body -->

			<div class="previous-next">
				<div class='previous'>
					<?php if (get_previous_post(true)) : ?>
						Previous
						<?php previous_post_link('%link', '%title', true) ?>
					<?php endif; ?>
				</div>
				<div class='next'>
					<?php if (get_next_post(true)) : ?>
						Next
						<?php next_post_link('%link', '%title', true) ?>
					<?php endif; ?>
				</div>
				<div class='clearfix'></div>
			</div>

		</div><!-- article -->

		<?php comments_template('', true); ?>

<?php endwhile; ?>

<?php get_footer(); ?>