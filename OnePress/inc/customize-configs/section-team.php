<?php
/**
 * Section: Team
 */
$wp_customize->add_panel( 'onepress_team' ,
	array(
		'priority'        => 250,
		'title'           => esc_html__( 'Section: Team', 'onepress' ),
		'description'     => '',
		'active_callback' => 'onepress_showon_frontpage'
	)
);

$wp_customize->add_section( 'onepress_team_settings' ,
	array(
		'priority'    => 3,
		'title'       => esc_html__( 'Section Settings', 'onepress' ),
		'description' => '',
		'panel'       => 'onepress_team',
	)
);

// Show Content
$wp_customize->add_setting( 'onepress_team_disable',
	array(
		'sanitize_callback' => 'onepress_sanitize_checkbox',
		'default'           => '',
	)
);
$wp_customize->add_control( 'onepress_team_disable',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__('Hide this section?', 'onepress'),
		'section'     => 'onepress_team_settings',
		'description' => esc_html__('Check this box to hide this section.', 'onepress'),
	)
);
// Section ID
$wp_customize->add_setting( 'onepress_team_id',
	array(
		'sanitize_callback' => 'onepress_sanitize_text',
		'default'           => esc_html__('team', 'onepress'),
	)
);
$wp_customize->add_control( 'onepress_team_id',
	array(
		'label'     	=> esc_html__('Section ID:', 'onepress'),
		'section' 		=> 'onepress_team_settings',
		'description'   => 'The section ID should be English character, lowercase and no space.'
	)
);

// Title
$wp_customize->add_setting( 'onepress_team_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__('Our Team', 'onepress'),
	)
);
$wp_customize->add_control( 'onepress_team_title',
	array(
		'label'    		=> esc_html__('Section Title', 'onepress'),
		'section' 		=> 'onepress_team_settings',
		'description'   => '',
	)
);

// Sub Title
$wp_customize->add_setting( 'onepress_team_subtitle',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__('Section subtitle', 'onepress'),
	)
);
$wp_customize->add_control( 'onepress_team_subtitle',
	array(
		'label'     => esc_html__('Section Subtitle', 'onepress'),
		'section' 		=> 'onepress_team_settings',
		'description'   => '',
	)
);

// Description
$wp_customize->add_setting( 'onepress_team_desc',
	array(
		'sanitize_callback' => 'onepress_sanitize_text',
		'default'           => '',
	)
);
$wp_customize->add_control( new OnePress_Editor_Custom_Control(
	$wp_customize,
	'onepress_team_desc',
	array(
		'label' 		=> esc_html__('Section Description', 'onepress'),
		'section' 		=> 'onepress_team_settings',
		'description'   => '',
	)
));

// Team layout
$wp_customize->add_setting( 'onepress_team_layout',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '3',
	)
);

$wp_customize->add_control( 'onepress_team_layout',
	array(
		'label' 		=> esc_html__('Team Layout Settings', 'onepress'),
		'section' 		=> 'onepress_team_settings',
		'description'   => '',
		'type'          => 'select',
		'choices'       => array(
			'3' => esc_html__( '4 Columns', 'onepress' ),
			'4' => esc_html__( '3 Columns', 'onepress' ),
			'6' => esc_html__( '2 Columns', 'onepress' ),
		),
	)
);

onepress_add_upsell_for_section( $wp_customize, 'onepress_team_settings' );

$wp_customize->add_section( 'onepress_team_content' ,
	array(
		'priority'    => 6,
		'title'       => esc_html__( 'Section Content', 'onepress' ),
		'description' => '',
		'panel'       => 'onepress_team',
	)
);

// Team member settings
$wp_customize->add_setting(
	'onepress_team_members',
	array(
		'sanitize_callback' => 'onepress_sanitize_repeatable_data_field',
		'transport' => 'refresh', // refresh or postMessage
	) );


$wp_customize->add_control(
	new Onepress_Customize_Repeatable_Control(
		$wp_customize,
		'onepress_team_members',
		array(
			'label'     => esc_html__('Team members', 'onepress'),
			'description'   => '',
			'section'       => 'onepress_team_content',
			//'live_title_id' => 'user_id', // apply for unput text and textarea only
			'title_format'  => esc_html__( '[live_title]', 'onepress'), // [live_title]
			'max_item'      => 4, // Maximum item can add
			'limited_msg' 	=> wp_kses_post( __( 'Upgrade to <a target="_blank" href="https://www.famethemes.com/plugins/onepress-plus/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=onepress_customizer#get-started">OnePress Plus</a> to be able to add more items and unlock other premium features!', 'onepress' ) ),
			'fields'    => array(
				'user_id' => array(
					'title' => esc_html__('User media', 'onepress'),
					'type'  =>'media',
					'desc'  => '',
				),
				'link' => array(
					'title' => esc_html__('Custom Link', 'onepress'),
					'type'  =>'text',
					'desc'  => '',
				),
			),

		)
	)
);