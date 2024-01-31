<?php
/**
* Template Name: WC Order Details
*/
wp_head();
echo do_shortcode('[WC-ORDER-DETAILS]');

while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content', 'page-full' );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
				
wp_footer();