<?php
/**
 * ACF Blocks Registration
 */

if (!defined('ABSPATH')) exit;

class ModernWPTheme_ACF_Blocks {
    public function __construct() {
        add_action('acf/init', [$this, 'register_blocks']);
        add_action('acf/init', [$this, 'register_fields']);
    }

    public function register_blocks() {
        if (!function_exists('acf_register_block_type')) {
            return;
        }

        // Hero Block
        acf_register_block_type([
            'name'              => 'hero',
            'title'             => __('Hero', 'modern-wp-theme'),
            'description'       => __('A hero section with background image and text overlay.', 'modern-wp-theme'),
            'render_template'   => 'templates/blocks/hero.twig',
            'category'          => 'formatting',
            'icon'              => 'cover-image',
            'keywords'          => ['hero', 'banner', 'header'],
            'supports'          => [
                'align' => true,
                'mode' => false,
                'jsx' => true
            ],
        ]);

        // Features Grid Block
        acf_register_block_type([
            'name'              => 'features-grid',
            'title'             => __('Features Grid', 'modern-wp-theme'),
            'description'       => __('A grid of features or services.', 'modern-wp-theme'),
            'render_template'   => 'templates/blocks/features-grid.twig',
            'category'          => 'formatting',
            'icon'              => 'grid-view',
            'keywords'          => ['features', 'grid', 'services'],
            'supports'          => [
                'align' => true,
                'mode' => false,
                'jsx' => true
            ],
        ]);

        // Call to Action Block
        acf_register_block_type([
            'name'              => 'cta',
            'title'             => __('Call to Action', 'modern-wp-theme'),
            'description'       => __('A call to action section with heading, text, and button.', 'modern-wp-theme'),
            'render_template'   => 'templates/blocks/cta.twig',
            'category'          => 'formatting',
            'icon'              => 'megaphone',
            'keywords'          => ['cta', 'call to action', 'button'],
            'supports'          => [
                'align' => true,
                'mode' => false,
                'jsx' => true
            ],
        ]);
    }

    public function register_fields() {
        if (!function_exists('acf_add_local_field_group')) {
            return;
        }

        // Hero Block Fields
        acf_add_local_field_group([
            'key' => 'group_hero',
            'title' => 'Hero Block',
            'fields' => [
                [
                    'key' => 'field_hero_background',
                    'label' => 'Background Image',
                    'name' => 'background_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'required' => 1,
                ],
                [
                    'key' => 'field_hero_heading',
                    'label' => 'Heading',
                    'name' => 'heading',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'key' => 'field_hero_subheading',
                    'label' => 'Subheading',
                    'name' => 'subheading',
                    'type' => 'textarea',
                    'rows' => 2,
                ],
                [
                    'key' => 'field_hero_cta',
                    'label' => 'Call to Action',
                    'name' => 'cta',
                    'type' => 'group',
                    'layout' => 'block',
                    'sub_fields' => [
                        [
                            'key' => 'field_hero_cta_text',
                            'label' => 'Button Text',
                            'name' => 'text',
                            'type' => 'text',
                        ],
                        [
                            'key' => 'field_hero_cta_url',
                            'label' => 'Button URL',
                            'name' => 'url',
                            'type' => 'url',
                        ],
                    ],
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/hero',
                    ],
                ],
            ],
        ]);

        // Features Grid Block Fields
        acf_add_local_field_group([
            'key' => 'group_features',
            'title' => 'Features Grid',
            'fields' => [
                [
                    'key' => 'field_features_title',
                    'label' => 'Section Title',
                    'name' => 'title',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'key' => 'field_features_description',
                    'label' => 'Section Description',
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 3,
                ],
                [
                    'key' => 'field_features_items',
                    'label' => 'Features',
                    'name' => 'features',
                    'type' => 'repeater',
                    'layout' => 'block',
                    'min' => 1,
                    'max' => 6,
                    'sub_fields' => [
                        [
                            'key' => 'field_feature_icon',
                            'label' => 'Icon',
                            'name' => 'icon',
                            'type' => 'image',
                            'return_format' => 'array',
                            'preview_size' => 'thumbnail',
                        ],
                        [
                            'key' => 'field_feature_title',
                            'label' => 'Title',
                            'name' => 'title',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'key' => 'field_feature_description',
                            'label' => 'Description',
                            'name' => 'description',
                            'type' => 'textarea',
                            'rows' => 3,
                        ],
                    ],
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/features-grid',
                    ],
                ],
            ],
        ]);

        // Call to Action Block Fields
        acf_add_local_field_group([
            'key' => 'group_cta',
            'title' => 'Call to Action',
            'fields' => [
                [
                    'key' => 'field_cta_style',
                    'label' => 'Style',
                    'name' => 'style',
                    'type' => 'select',
                    'choices' => [
                        'light' => 'Light',
                        'dark' => 'Dark',
                        'primary' => 'Primary Color',
                    ],
                    'default_value' => 'light',
                ],
                [
                    'key' => 'field_cta_heading',
                    'label' => 'Heading',
                    'name' => 'heading',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'key' => 'field_cta_text',
                    'label' => 'Text',
                    'name' => 'text',
                    'type' => 'textarea',
                    'rows' => 3,
                ],
                [
                    'key' => 'field_cta_button',
                    'label' => 'Button',
                    'name' => 'button',
                    'type' => 'group',
                    'layout' => 'block',
                    'sub_fields' => [
                        [
                            'key' => 'field_cta_button_text',
                            'label' => 'Text',
                            'name' => 'text',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'key' => 'field_cta_button_url',
                            'label' => 'URL',
                            'name' => 'url',
                            'type' => 'url',
                            'required' => 1,
                        ],
                    ],
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/cta',
                    ],
                ],
            ],
        ]);
    }
}

new ModernWPTheme_ACF_Blocks();
