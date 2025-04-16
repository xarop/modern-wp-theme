# Modern WordPress Theme

A modern WordPress theme built with SASS, Tailwind CSS, Twig templating (via Timber), and ACF Blocks.

## Requirements

- PHP 7.4 or higher
- WordPress 5.9 or higher
- Node.js 14 or higher
- Composer
- Advanced Custom Fields PRO plugin

## Installation

1. Clone this repository to your WordPress themes directory:
   ```bash
   cd wp-content/themes
   git clone [repository-url] modern-wp-theme
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Install Node.js dependencies:
   ```bash
   npm install
   ```

4. Build assets:
   ```bash
   # For development
   npm run dev

   # For production
   npm run prod

   # For development with watch
   npm run watch
   ```

5. Activate the theme in WordPress admin panel

## Development

- SASS files are located in `src/scss/`
- Twig templates are in `templates/`
- ACF Blocks are in `templates/blocks/`
- PHP functions and classes are in `inc/`

## Building Blocks

1. Create a new Twig template in `templates/blocks/`
2. Register the block in `functions.php`
3. Create ACF fields for the block
4. Style the block using Tailwind classes and/or SASS
