<?php
if (!function_exists('lv1080_the_breadcrumb')) {
    function lv1080_the_breadcrumb() {
        $seperator = '<div class="seperator">/</div>';
        echo '<div><i class="fa fa-home"></i></div> <div typeof="v:Breadcrumb" class="root"><a rel="v:url" property="v:title" href="';
        echo home_url();
        echo '">'.sprintf( __( "Trang chủ","lv1080"));
        echo '</a></div>' . $seperator;

        if (is_category()) {
            $categories = get_the_category();
            $output = '';
            if($categories){
                foreach($categories as $category) {
                    if ($category->parent == 0) {
                        echo '<div><span>' . $category->cat_name . '</span></div>';
                    } else {
                        echo '<div typeof="v:Breadcrumb"><a href="'.get_category_link( $category->term_id ).'" rel="v:url" property="v:title">'.$category->cat_name.'</a></div><div>' . $seperator . '</div>';
                    }
                }
            }
        } elseif (is_single()) {
            $categories = get_the_category();
            $output = '';
            if($categories){
                foreach($categories as $category) {
                    echo '<div typeof="v:Breadcrumb"><a href="'.get_category_link( $category->term_id ).'" rel="v:url" property="v:title">'.$category->cat_name.'</a></div>' . $seperator;
                }
            }
            echo "<div><span>";
            the_title();
            echo "</span></div>";
        } elseif (is_page()) {
            echo "<div><span>";
            the_title();
            echo "</span></div>";
        } else {
            echo '<span class="hidden"></<span>';
        }
    }
}