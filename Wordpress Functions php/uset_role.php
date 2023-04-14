<?php


add_role( 'gestore',  __( 'gestore'  ),  array(
 
        'read_private_posts'    => true,
        'edit_private_pages'    => true,
        'edit_private_posts'    => true,
        'edit_published_pages'  => true,
        'edit_published_posts'  => true,
        'delete_others_pages'   => true,
        'delete_others_posts'   => true,
        'delete_pages'  => true,
        'delete_posts'  => true,
        'delete_private_pages'  => true,
        'delete_private_posts'  => true,
        'delete_published_pages'    => true,
        'delete_published_posts'    => true,
        'edit_others_pages'     => true,
        'edit_others_posts'     => true,
        'edit_pages'    => true,
        'edit_posts'    => true,
        'manage_categories'     => true,
        'manage_links'  => true,
        'moderate_comments'     => true,
        'publish_pages'     => true,
        'publish_posts'     => true,
        'read'  => true,
        'read_private_pages'    => true,
        'read_private_posts'    => true,
        'wpseo_manage_options' => true,
        // 'manage_options' => true,
        'is_gestore' => true,
        'upload_files'  => true,
    ));

add_action( 'admin_init', 'my_customize_user_pages',20 );

function my_customize_user_pages() {



// Aggiunge ruolo custom

$role = get_role( 'gestore' );

$role->add_cap( 'gravityforms_view_entries' ); 
$role->add_cap( 'gravityforms_delete_entries' ); 
$role->add_cap( 'gravityforms_edit_forms' ); 

}
