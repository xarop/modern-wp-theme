<?php
/**
 * Theme functions and definitions
 */

// Composer autoloader
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

// Initialize Timber
use Timber\Timber;
Timber::init();

// Set the directories Timber should look for templates
Timber::$dirname = ['templates'];

// Set up theme defaults
if (!class_exists('ModernWPTheme')) {
    class ModernWPTheme {
        public function __construct() {
            add_action('after_setup_theme', [$this, 'theme_setup']);
            add_action('init', [$this, 'register_blocks']);
            add_action('init', [$this, 'register_menus']);
            add_filter('timber/context', [$this, 'add_to_context']);
            add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
            add_filter('timber/twig', [$this, 'add_to_twig']);
        }

        public function theme_setup() {
            load_theme_textdomain('modern-wp-theme', get_template_directory() . '/languages');

            add_theme_support('title-tag');
            add_theme_support('post-thumbnails');
            add_theme_support('editor-styles');
            add_theme_support('custom-logo');
            add_theme_support('automatic-feed-links');
            add_theme_support('html5', [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script'
            ]);

            // Add support for block styles
            add_theme_support('wp-block-styles');
            
            // Add support for full and wide align blocks
            add_theme_support('align-wide');

            // Add support for responsive embedded content
            add_theme_support('responsive-embeds');

            // Add support for custom line height
            add_theme_support('custom-line-height');

            // Add support for experimental link color control
            add_theme_support('experimental-link-color');
        }

        public function register_menus() {
            register_nav_menus([
                'primary' => __('Primary Menu', 'modern-wp-theme'),
                'footer' => __('Footer Menu', 'modern-wp-theme'),
            ]);
        }

        public function register_blocks() {
            if (function_exists('acf_register_block_type')) {
                acf_register_block_type([
                    'name'              => 'hero',
                    'title'             => __('Hero', 'modern-wp-theme'),
                    'description'       => __('A custom hero block.', 'modern-wp-theme'),
                    'render_template'   => 'templates/blocks/hero.twig',
                    'category'          => 'formatting',
                    'icon'              => 'admin-comments',
                    'keywords'          => ['hero', 'banner'],
                    'supports'          => [
                        'align' => true,
                        'mode' => false,
                    ],
                ]);
            }
        }

        public function add_to_context($context) {
            $context['menu'] = [
                'primary' => Timber::get_menu('primary'),
                'footer' => Timber::get_menu('footer'),
            ];
            
            $context['site'] = $this;
            return $context;
        }

        public function enqueue_scripts() {
            // Enqueue compiled CSS
            wp_enqueue_style(
                'modern-wp-theme-style',
                get_template_directory_uri() . '/dist/css/style.css',
                [],
                '1.0.0'
            );
        }

        public function add_to_twig($twig) {
            // Add custom Twig functions here
            return $twig;
        }

        public function site_logo() {
            return get_custom_logo();
        }
    }
}

new ModernWPTheme();
