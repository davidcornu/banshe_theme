<?php get_header(); ?>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>

		<div <?php post_class('page'); ?>>
			<h2>
				<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark">
					<?php the_title(); ?>
				</a>
			</h2>

			<div class='page-body'>
				<?php if (has_post_thumbnail()): ?>
					<?php the_post_thumbnail('large'); ?>
				<?php endif; ?>

				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			</div><!-- page-body -->

		</div><!-- page -->

		<?php comments_template('', true); ?>

<?php endwhile; ?>

<?php get_footer(); ?>