<?php get_header(); ?>
<?php $options = html5press_get_options(); ?>
<div id="content" role="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
        
            <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<div class="clear"></div>
			<div class="alignleft prev-post"><?php previous_post_link(); ?></div>
			<div class="alignright next-post"><?php next_post_link(); ?></div>
            <div class="clear"></div>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
			<?php $large_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $options['featured_image_size'] ); ?>
			<?php if ( has_post_thumbnail() ) { ?><figure><a href="<?php echo "$large_image[0]"; ?>" rel="lightbox" title="<?php echo the_title_attribute(); ?>"><img src="<?php echo "$image[0]"; ?>" alt="" class="thumbnail alignleft" /></a></figure><?php } ?>
            
            <?php the_content(__( 'Read more','html5press' )); ?>
			<?php edit_post_link(); ?>
			<footer class="post-meta">
			<p>
				<?php _e( 'In ','html5press'); ?><?php the_category(', '); ?>
				<?php _e( 'by ','html5press'); ?> <span class="author vcard"><?php the_author_posts_link(); ?></span>
				<?php if ($options['fuzzy_timestamps'] == 0) { _e( 'on ','html5press'); } ?> <time datetime="<?php the_time('Y-m-d\TH:i:sO'); ?>" class="timeago" pubdate><?php the_time( get_option( 'date_format' ) ); ?></time><?php if (get_the_modified_time() != get_the_time()) { ?>, updated <time datetime="<?php the_modified_time('Y-m-d\TH:i:sO'); ?>"><?php the_modified_date(); ?></time><?php } ?>
				<?php wp_link_pages( array( 'before' => __( '<span class="alignright">Pages:', 'html5press' ), 'after' => '</span>' ) ); ?>
				<?php the_tags( '<span class="post-tags">' . __( 'Tagged with: ','html5press' ), ', ', '</span>' );	?>
			</p>
			
			</footer> <!-- .post meta -->
			
			<article class="comments">
				<?php comments_template(); ?>
			</article>
        </article> <!-- end post 1 -->
		<?php endwhile; endif; ?>
    
    </div> <!-- end main -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
