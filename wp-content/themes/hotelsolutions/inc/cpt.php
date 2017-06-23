<?php

add_filter( 'rwmb_meta_boxes', 'hotelsolutions_register_meta_boxes' );

function hotelsolutions_register_meta_boxes( $meta_boxes ) {
    $prefix = 'rw_';
    // 1st meta box
    $meta_boxes[] = array(
        'id'         => 'additional',
        'title'      => __( 'Additional Information', 'textdomain' ),
        'post_types' => array( 'registro'),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            
             array(
                'name'  => __( 'Email', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'email',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
              array(
                'name'  => __( 'Archivos', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'files',
                'type'  => 'file_advanced',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
            
           
        )
    );
    // 2nd meta box
    /*$meta_boxes[] = array(
        'title'      => __( 'Media', 'textdomain' ),
        'post_types' => 'movie',
        'fields'     => array(
            array(
                'name' => __( 'URL', 'textdomain' ),
                'id'   => $prefix . 'url',
                'type' => 'text',
            ),
        )
    );*/
    return $meta_boxes;
}

add_action( 'restrict_manage_posts', 'hotelsolutions_admin_registros_filter_restrict_manage_posts' );
/**
 * First create the dropdown
 * make sure to change POST_TYPE to the name of your custom post type
 * 
 * @author Ohad Raz
 * 
 * @return void
 */
function hotelsolutions_admin_registros_filter_restrict_manage_posts(){
    $type = 'post';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }

    $taxonomy  = 'puesto'; // change to your taxonomy
    //only add filter to post type you want
    if ('registro' == $type){
        //change this to the list of values you want to show
        //in 'label' => 'value' format
        $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Show All {$info_taxonomy->label}"),
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => $selected,
            'show_count'      => true,
            'hide_empty'      => true,
        ));
        ?>
        <!-- <select name="ADMIN_FILTER_FIELD_VALUE">
        <option value=""><?php _e('Filter By ', 'hotelsolutions'); ?></option>
        <?php
            $current_v = isset($_GET['ADMIN_FILTER_FIELD_VALUE'])? $_GET['ADMIN_FILTER_FIELD_VALUE']:'';
            foreach ($values as $label => $value) {
                printf
                    (
                        '<option value="%s"%s>%s</option>',
                        $value,
                        $value == $current_v? ' selected="selected"':'',
                        $label
                    );
                }
        ?>
        <!--</select> -->
        <?php
    }
}

function hotelsolutions_search_distinct( $where ){
    global $pagenow, $wpdb;

    if ( is_admin() && $pagenow=='edit.php' && $_GET['post_type']=='registro' && $_GET['s'] != '') {
    return "DISTINCT";

    }
    return $where;
}
add_filter( 'posts_distinct', 'hotelsolutions_search_distinct' );

add_filter('posts_join', 'hotelsolutions_search_join' );
function hotelsolutions_search_join ($join){
    global $pagenow, $wpdb;
    // I want the filter only when performing a search on edit page of Custom Post Type named "registro"
    if ( is_admin() && $pagenow=='edit.php' && $_GET['post_type']=='registro' && $_GET['s'] != '') {    
        $join .='LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    return $join;
}

add_filter( 'posts_where', 'hotelsolutions_search_where' );
function hotelsolutions_search_where( $where ){
    global $pagenow, $wpdb;
    // I want the filter only when performing a search on edit page of Custom Post Type named "registro"
    if ( is_admin() && $pagenow=='edit.php' && $_GET['post_type']=='registro' && $_GET['s'] != '') {
        $where = preg_replace(
       "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
       "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }
    return $where;
}



/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_filter('parse_query', 'hotelsolutions_convert_id_to_term_in_query');

function hotelsolutions_convert_id_to_term_in_query($query) {
    global $pagenow;
    $post_type = 'registro'; // change to your post type
    $taxonomy  = 'puesto'; // change to your taxonomy
    $q_vars    = &$query->query_vars;
    if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}

/**
 * if submitted filter by post meta
 * 
 * make sure to change META_KEY to the actual meta key
 * and POST_TYPE to the name of your custom post type
 * @author Ohad Raz
 * @param  (wp_query object) $query
 * 
 * @return Void
 */
//add_filter( 'parse_query', 'hotelsolutions_posts_filter' );
/*function hotelsolutions_posts_filter( $query ){
    global $pagenow;
    $type = 'post';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }
    if ( 'registro' == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['ADMIN_FILTER_FIELD_VALUE']) && $_GET['ADMIN_FILTER_FIELD_VALUE'] != '') {
        $query->query_vars['meta_key'] = 'email';
        $query->query_vars['meta_value'] = $_GET['ADMIN_FILTER_FIELD_VALUE'];
    }
}*/


