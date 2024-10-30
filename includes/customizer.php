<?php
include "custom-controls.php";
function ds_ds_soon_customizer($wp_customize) {
$wp_customize->add_section('divi_soon_section', array(    
    'priority' => 1,
    'title' => __('Divi Soon Settings' ),
    ));
    $wp_customize->add_setting( 'dsdsoon_create_layout_heading', array(
        'capability'    => 	'edit_theme_options',
    ) );
    $wp_customize->add_control( new DSDSOONLabel( $wp_customize, 'dsdsoon_create_layout_heading', array(
        'label' 		=> 	__('Create layout'),
        'type' 			=> 	'label',
        'section' 		=> 	'divi_soon_section',
    ) ) );
    $wp_customize->add_setting( 'dsdsoon_descriptions', array(
        'capability'    => 	'edit_theme_options',
    ) );
    $wp_customize->add_control( new  DSDSOONdescriptions( $wp_customize, 'dsdsoon_descriptions', array(
        'label' 		=> 	__('You can create your coming soon layout from the Divi Library'),
        'type' 			=> 	'label',
        'section' 		=> 	'divi_soon_section',
    ) ) );
    $wp_customize->add_setting( 'dsdsoon_new_layout_button', array(
        'capability'    => 	'edit_theme_options',
    ) );
    $wp_customize->add_control( new  DSDSOONbutton( $wp_customize, 'dsdsoon_new_layout_button', array(
        'label' 		=> 	__('Create layout'),
        'type' 			=> 	'button',
        'section' 		=> 	'divi_soon_section',
    ) ) );
    
    $wp_customize->add_setting( 'dsdsoon_socialkit_facebook_divider', array(
        'capability'    => 	'edit_theme_options',
    ) );
    $wp_customize->add_control( new DSDSOONdivider( $wp_customize, 'dsdsoon_socialkit_facebook_divider', array(
        'label' 		=> 	__('Breadcrumbs'),
        'type' 			=> 	'divider',
        'section' 		=> 	'divi_soon_section',
    ) ) );
/*************************************************************** */
$wp_customize->add_setting( 'dsdsoon_soon_settings_heading', array(
    'capability'    => 	'edit_theme_options',
) );
$wp_customize->add_control( new DSDSOONLabel( $wp_customize, 'dsdsoon_soon_settings_heading', array(
    'label' 		=> 	__('Comming soon settings'),
    'type' 			=> 	'label',
    'section' 		=> 	'divi_soon_section',
) ) );
$wp_customize->add_setting('ds_coming_soon_enabler_switch', array(
'default' => false,
'type'        => 'theme_mod',
'capability'  => 'edit_theme_options',
));
$wp_customize->add_control( new DSDSOONswitch( $wp_customize, 'ds_coming_soon_enabler_switch', array(
'label' => __('Enable Divi Soon'),
'section' => 'divi_soon_section',
'type' => 'switch',
'settings' => 'ds_coming_soon_enabler_switch'
) ) );
$wp_customize->add_setting('coming_soon_layout_page', array(
 'capability' => 'edit_theme_options',
 'type' => 'option',
 ));
 $wp_customize->add_control( new DSDSOONlayout( $wp_customize,'coming_soon_layout_page', array(
 'label' => __('Set your Coming soon page'),
 'section' => 'divi_soon_section',
 'type' => 'layout_soon',
 'settings' => 'coming_soon_layout_page',
 ) ) );
 $wp_customize->add_setting('ds_coming_soon_full_screen', array(
'default' => false,
'type'        => 'theme_mod',
'capability'  => 'edit_theme_options',
));
$wp_customize->add_control( new DSDSOONswitch( $wp_customize, 'ds_coming_soon_full_screen', array(
'label' => __('Make section Fullscreem'),
'section' => 'divi_soon_section',
'type' 			=> 	'switch',
'settings' => 'ds_coming_soon_full_screen'
) ) );
}
add_action('customize_register', 'ds_ds_soon_customizer');