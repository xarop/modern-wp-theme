<?php
/**
 * The main template file
 */

$context = Timber::context();
$context['posts'] = Timber::get_posts();
$templates = ['index.twig'];

Timber::render($templates, $context);
