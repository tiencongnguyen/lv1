<?php 
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
$args = array ('paged' => $paged);
//the query using arguments above
$wp_query = new WP_Query( $args );

//use the query for paging
$wp_query->query_vars[ 'paged' ] > 1 ? $current = $wp_query->query_vars[ 'paged' ] : $current = 1;

//set the "paginate_links" array to do what we would like it it. Check the codex for examples http://codex.wordpress.org/Function_Reference/paginate_links
$pagination = array(
    'base' => @add_query_arg( 'paged', '%#%' ),
    //'format' => '',
    'showall' => false,
    'end_size' => 4,
    'mid_size' => 4,
    'total' => $wp_query->max_num_pages,
    'current' => $current,
    'type' => 'plain'
);

//build the paging links
if ( $wp_rewrite->using_permalinks() )
    $pagination[ 'base' ] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

//more paging links
if ( !empty( $wp_query->query_vars[ 's' ] ) )
    $pagination[ 'add_args' ] = array( 's' => get_query_var( 's' ) );

//run the query
if ( $wp_query->have_posts() ) : 
    while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
    endwhile; 
wp_reset_query();endif;
echo '<div class="pydPaging">' . paginate_links($pagination) . '</div>';