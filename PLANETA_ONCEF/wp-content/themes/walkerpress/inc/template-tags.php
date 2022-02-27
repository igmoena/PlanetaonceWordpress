<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WalkerPress
 */

if ( ! function_exists( 'walkerpress_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function walkerpress_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'walkerpress' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'walkerpress_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function walkerpress_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'walkerpress' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'walkerpress_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function walkerpress_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'walkerpress' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'walkerpress' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'walkerpress' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'walkerpress' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'walkerpress' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'walkerpress' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'walkerpress_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function walkerpress_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

if(!function_exists('walkerpress_custom_category')){
	function walkerpress_custom_category(){?>
		 <span class="category">
            
           <?php $categories = get_the_category();
          if( ! empty( $categories ) ) :
            foreach ( $categories as $category ) { ?>
                <a
                    href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
                <?php }
         endif; ?>
               
        </span>
	<?php }
}

if(!function_exists('walkerpress_singlepage_category')){
	function walkerpress_singlepage_category(){?>
		 <span class="category">
            
           <?php 
           $categories_list = get_the_category_list( esc_html__( ', ', 'walkerpress' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'in %1$s', 'walkerpress' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}?>
               
        </span>
	<?php }
}

if(!function_exists('walkerpress_custom_post_date')){
	function walkerpress_custom_post_date(){
		$archive_year  = get_the_time('Y'); $archive_month = get_the_time('m'); $archive_day = get_the_time('d'); ?>
		<a class="walkerpress-post-date" href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>"><i class="far fa-calendar-check"></i> <?php echo get_the_date(); ?>
        </a>
        
	<?php } 
}

if(!function_exists('walkerpress_custom_post_author')){
	function walkerpress_custom_post_author(){?>
		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="post-author">
            <?php $author_avatar = get_avatar( get_the_author_meta( 'ID' ), $size = 60 ); ?>
            <?php if( $author_avatar ) : ?>
            <div class="author-avtar">
                <?php echo esc_url($author_avatar); ?>
            </div>
            <?php endif; ?>
          <?php echo '<i class="far fa-user-circle"></i> '. esc_html( get_the_author() ); ?>
        </a>
<?php }
}

if(! function_exists('walkerpress_custom_post_tag')):
	function walkerpress_custom_post_tag(){
		$walkerpress_tags = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'walkerpress' ) );
		if ( $walkerpress_tags ) {
			/* translators: 1: list of tags. */
			printf( '<span class="tags-links">  ' . esc_html__( 'Tagged %1$s', 'walkerpress' ) . '</span>', $walkerpress_tags ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
endif;

if(! function_exists('walkerpress_post_comments')):
	function walkerpress_post_comments(){
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link"> <i class="far fa-comment"></i> ';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( '0 Comment <span class="screen-reader-text"> on %s</span>', 'walkerpress' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}
	}
endif;
if ( ! function_exists( 'walkerpress_excerpt' ) ) :
	function walkerpress_excerpt( $limit ) {
	    $excerpt = explode( ' ', get_the_excerpt(), $limit );
	    if ( count( $excerpt ) >= $limit ) {
	        array_pop( $excerpt );
	    }
	    $excerpt = implode( " ", $excerpt ).'...';
		$excerpt = preg_replace( '`[[^]]*]`', '', $excerpt );
		return esc_html( $excerpt );
	}
endif;

if ( ! function_exists( 'walkerpress_excerpt_more' ) ) :
	function walkerpress_excerpt_more( $more ) {
		if ( is_admin() ) {
	        return $more;
	    }
	    return '...';
	}
endif;

if ( ! function_exists( 'walkerpress_add_excerpts_to_theme' ) ) :
	function walkerpress_add_excerpts_to_theme() {
	     add_post_type_support('page', 'excerpt');
	}
endif;
if( !function_exists('walkerpress_pagination')):
function walkerpress_pagination($pages = '', $range = 2){  
	$showitem = ($range * 2)+1;  
	$walkerpress_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	if(empty($walkerpress_paged)) $walkerpress_paged = 1;
	if($pages == ''){
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages){
		 $pages = 1;
		}
	}   

     if(1 != $pages){
         echo "<div class='walkerpress-pagination'>";
         if($walkerpress_paged > 2 && $walkerpress_paged > $range+1 && $showitem < $pages) echo "<a class='first' href='".get_pagenum_link(1)."'>".esc_html('First','walkerpress')."</a>";
         if($walkerpress_paged > 1 && $showitem < $pages) echo "<a class='prev' href='".get_pagenum_link($walkerpress_paged - 1)."'><i class='fas fa-arrow-left'></i></a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $walkerpress_paged+$range+1 || $i <= $walkerpress_paged-$range-1) || $pages <= $showitem ))
             {
                 echo ($walkerpress_paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($walkerpress_paged < $pages && $showitem < $pages) echo "<a class='next' href='".get_pagenum_link($walkerpress_paged + 1)."'><i class='fas fa-arrow-right'></i></a>";  
         if ($walkerpress_paged < $pages-1 &&  $walkerpress_paged+$range-1 < $pages && $showitem < $pages) echo "<a class='last' href='".get_pagenum_link($pages)."'>". esc_html('Last','walkerpress') ."</a>";
         echo "</div>\n";
     }
	}
endif;
if(! function_exists('walkerpress_estimate_reading_time')):
	function walkerpress_estimate_reading_time() {
		$reading_content = get_post_field( 'post_content',get_the_ID() );
		$word_count = str_word_count( strip_tags( $reading_content ) );
		$image_count = substr_count( $reading_content, '<img' );
		$reading_time = $word_count / 200;
		$image_time = ( $image_count * 10 ) / 60;
		$total_time = round( $reading_time + $image_time );
	 
		
		if ( $total_time == 1 ) { 
			$minute = __(' Minute','walkerpress'); 
		}else { 
			$minute =  __(' Minutes','walkerpress');  
		}
	 
		return $total_time . $minute;
	 
	}
endif;

if(!function_exists('walkerpress_article_reading_time')):
	function walkerpress_article_reading_time(){
		echo '<span class="estimate-reading-time" title="'.__('Estimated Reading Time of Article','walkerpress').'"> <i class="far fa-clock"></i> '.walkerpress_estimate_reading_time().'</span>';
	 }
endif;

if(!function_exists('walkerpress_single_post_estimate_reading_time')){
	function walkerpress_single_post_estimate_reading_time(){
		if(walkerpress_set_to_premium()){
			if(get_theme_mod('single_estimate_reading_time_status','true')){?>
				<span class="article-reading-time" title="<?php echo __('Estimated Reading Time of Article','walkerpress');?>"> - <?php echo walkerpress_estimate_reading_time();?></span>
			<?php } 
		}else{?>
			<span class="article-reading-time" title="<?php echo __('Estimated Reading Time of Article','walkerpress');?>"> - <?php echo walkerpress_estimate_reading_time();?></span>
		<?php }
	}
}

if(!function_exists('walkerpress_archive_estimate_reading_time')){
	function walkerpress_archive_estimate_reading_time(){
		if(walkerpress_set_to_premium()){
			if(get_theme_mod('estimate_reading_time_status','true')){
				walkerpress_article_reading_time();
			}
		}else{
			walkerpress_article_reading_time();
		}

	}
}
if(! function_exists('walkerpress_article_estimate_reading_time')){
	function walkerpress_article_estimate_reading_time(){
		if(walkerpress_set_to_premium()){
			if(get_theme_mod('home_estimate_reading_time_status','true')){
				walkerpress_article_reading_time();
			}
		}else{
			walkerpress_article_reading_time();
		}
	}
}