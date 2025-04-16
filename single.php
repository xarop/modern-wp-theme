<?php
/**
 * The template for displaying single posts
 */

$context = Timber::context();
$context['post'] = Timber::get_post();
$templates = ['single.twig'];

Timber::render($templates, $context);
