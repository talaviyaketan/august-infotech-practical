<?php
/**
* Plugin Name: News Plugin
* Plugin URI: https://www.your-site.com/
* Description: Test.
* Version: 0.1
* Author: your-name
* Author URI: https://www.your-site.com/
**/



add_action( 'init', 'activate_myplugin' );
function activate_myplugin() {

    $labels = array(
        'name'               => __( 'News' ),
        'singular_name'      => __( 'News' ),
        'add_new'            => __( 'Add New News' ),
        'add_new_item'       => __( 'Add New News' ),
        'edit_item'          => __( 'Edit News' ),
        'new_item'           => __( 'New News' ),
        'all_items'          => __( 'All News' ),
        'view_item'          => __( 'View News' ),
        'search_items'       => __( 'Search News' ),
        'featured_image'     => 'News Image',
        'set_featured_image' => 'Add Image'
    );

    // The arguments for our post type, to be entered as parameter 2 of register_post_type()
    $args = array(
        'labels'            => $labels,
        'description'       => 'News for the custom products',
        'public'            => true,
        'menu_position'     => 5,
        'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
        'has_archive'       => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
    );
    // Call the actual WordPress function
    // Parameter 1 is a name for the post type
    // Parameter 2 is the $args array
    register_post_type('news', $args);

}

function myplugin_flush_rewrites() {
        activate_myplugin();
}

register_activation_hook( __FILE__, 'myplugin_flush_rewrites' );


add_action( 'add_meta_boxes', 'additional_product_tabs_metabox' );
function additional_product_tabs_metabox()
{
    add_meta_box(
        'add_product_metabox_additional_tabs',
        __( 'Additional Product News Tabs', 'woocommerce' ),
        'additional_product_tabs_metabox_content',
        'product',
        'normal',
        'high'
    );
}

function additional_product_tabs_metabox_content($post, $metabox ){
    
    $option = '<label>Select news : </label>';
    $option .= '<select name="select_news">';
    $option .= '<option value="">Select</option>';

    $get_meta = get_post_meta( $post->ID, 'select_news', true );

    $query = new WP_Query(array(
        'post_type' => 'news',
        'posts_per_page' => -1,
    ));

    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $post_title = get_the_title();

        if($get_meta == $post_id){
            $selected = 'selected';
        }
        else
        {
            $selected = '';
        }
        $option .= '<option value="'.$post_id.'" '.$selected.'>'.$post_title.'</option>';
    }

    wp_reset_query();

    $option .= '</select>';
    echo $option;
}


// Save product data
add_action( 'save_post_product', 'save_additional_product_tabs', 10, 1 );
function save_additional_product_tabs( $post_id ) {

    // Security check
    if ( ! isset( $_POST[ 'select_news' ] ) ) {
        return $post_id;
    }
    
    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    if ( ! current_user_can( 'edit_product', $post_id ) ) {
        return $post_id;
    }

    // Sanitize user input and save the post meta fields values.
    if( isset($_POST[ 'select_news' ]) && $_POST[ 'select_news' ] != '' )
        update_post_meta( $post_id, 'select_news', $_POST[ 'select_news' ] );

}


add_filter( 'woocommerce_product_tabs', 'woo_custom_product_tabs' );
function woo_custom_product_tabs( $tabs ) {

    // Adding new tabs and set the right order
    $tabs['product_news_tab'] = array(
        'title'     => __( 'Product Related News', 'woocommerce' ),
        'priority'  => 10,
        'callback'  => 'woo_display_news_tab_content'
    );

    return $tabs;
}
    

function woo_display_news_tab_content()  {
    global $product;

    $post_id = $product->get_meta( 'select_news' );
    $post_data = get_post($post_id);
    $url = wp_get_attachment_url( get_post_thumbnail_id($post_id), 'thumbnail' );
    $get_meta = get_post_meta( $post_id, 'no_of_view', true );

    // echo "<pre>";
    // print_r($post_data);
    // echo "</pre>";

    echo '<h5>'.$post_data->post_title.'</h5>';
    echo '<img src="'.$url.'">';
    echo '<p>'.$post_data->post_content.'</p>';
    echo '<p>No of views : <b>'.$get_meta.'</b></p>';
}


// Render the custom product field in cart and checkout
add_filter( 'woocommerce_get_item_data', 'wc_add_cooking_to_cart', 10, 2 );
function wc_add_cooking_to_cart( $cart_data, $cart_item ) 
{
    $custom_items = array();

    if( !empty( $cart_data ) )
        $custom_items = $cart_data;

    // Get the product ID
    $product_id = $cart_item['product_id'];

    if( get_post_meta( $product_id, 'select_news', true ) )
    {

        $get_news_id = get_post_meta( $product_id, 'select_news', true );
        $post_data = get_post($get_news_id);
        $url = wp_get_attachment_url( get_post_thumbnail_id($get_news_id), 'thumbnail' );

        $news = '<a href="'.$post_data->guid.'"><img src="'.$url.'"></a>';

        $custom_items[] = array(
            'name'      => __( 'Related News', 'woocommerce' ),
            'value'     => $news,
            'display'   => $news,
        );
    }
    return $custom_items;
}