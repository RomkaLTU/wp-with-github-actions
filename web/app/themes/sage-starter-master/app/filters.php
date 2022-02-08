<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});



// Adds class to current post type parent menu link
add_filter('nav_menu_css_class', function ($classes, $item) {
    $qObject = get_queried_object();
    if (!$qObject) return  $classes;
    // Skip if page - all page menu items would get active class
    if (get_queried_object()->post_type === 'page') return  $classes;

    if (isset($qObject->taxonomy)) {
        $postType = get_taxonomy($qObject->taxonomy)->object_type[0] ?? null;
    } else if (get_queried_object()->post_type != 'page') {
        $postType = get_queried_object()->post_type;
    }

    if (empty($postType)) return  $classes;

    foreach ($item->classes as $class) {
        if ($class == 'menu-item-object-' . $postType) {
            array_push($classes, 'current-item-ancestor');
        }
    }

    return $classes;
}, 10, 2);
