<?php
if (!function_exists('lv1080_the_breadcrumb')) {
    function lv1080_the_breadcrumb() {
        $seperator = '';
        echo '<li typeof="v:Breadcrumb" class="root"><a rel="v:url" property="v:title" href="';
        echo home_url();
        echo '">'.sprintf( __( "Trang chủ","lv1080"));
        echo '</a></li>' . $seperator;

        if (is_category()) {
            $categories = get_the_category();
            $output = '';
            if($categories){
                foreach($categories as $category) {
                    if ($category->parent == 0) {
                        echo '<li class="active">' . $category->cat_name . '</div>';
                    } else {
                        echo '<li typeof="v:Breadcrumb"><a href="'.get_category_link( $category->term_id ).'" rel="v:url" property="v:title">'.$category->cat_name.'</a></li>';
                    }
                }
            }
        } elseif (is_single()) {
            $categories = get_the_category();
            $output = '';
            if($categories){
                foreach($categories as $category) {
                    echo '<li typeof="v:Breadcrumb"><a href="'.get_category_link( $category->term_id ).'" rel="v:url" property="v:title">'.$category->cat_name.'</a></li>' . $seperator;
                }
            }
            echo '<li class="active">';
            the_title();
            echo '</li>';
        } elseif (is_page()) {
            echo '<li class="active">';
            the_title();
            echo '</li>';
        } else {
            echo '<li class="hidden"></li>';
        }
    }
}