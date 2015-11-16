<?php
add_action( 'admin_init', 'adjust_the_wp_menu', 999 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

function adjust_the_wp_menu() {
  //$page = remove_submenu_page( 'themes.php', 'themes.php' );
  //$page = remove_submenu_page( 'themes.php', 'theme-editor.php' );
 $path = get_home_path();
 $caps = array(
        'switch_themes',
        'edit_themes',
        'install_themes',
    );
 if (file_exists($path . ".qilock")) {
    global $wp_roles;
    foreach ( $caps as $cap ) {
        $wp_roles->remove_cap('administrator', $cap);
    }
  } else {
    global $wp_roles;
    foreach ( $caps as $cap ) {
        $wp_roles->add_cap('administrator', $cap );
    }
 }
}

?>
