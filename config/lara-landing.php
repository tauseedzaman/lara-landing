<?php

return [
    // Default layout to use for admin pages
    'admin_layout' => 'layouts.app',

    // Default section to inject content into
    'admin_section' => 'content',

    'admin_routes_middlewars' => ['web', 'auth'], // Middlewares for admin routes

    'admin_routes_prefix' => 'admin/landing', // Prefix for admin routes

    // Frontend/User Side
    'frontend' => [

        // Default layout for public-facing landing pages
        'layout' => 'layouts.app',

        // Section name where content will be injected
        'styles_section' => '',
        'scripts_section' => '',
        'title_section' => '',
        'content_section' => 'content',

        // Whether to use default header/footer if not defined in DB
        'default_show_header' => true,
        'default_show_footer' => true,
    ],
];
