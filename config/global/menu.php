<?php

return array(
    // Documentation menu
    'documentation' => array(
        // Getting Started
        array(
            'heading' => 'Getting Started',
        ),

        // Overview
        array(
            'title' => 'Overview',
            'path' => 'documentation/getting-started/overview',
            // 'role' => ['admin'],
            // 'permission' => [],
        ),

        // Build
        array(
            'title' => 'Build',
            'path' => 'documentation/getting-started/build',
        ),

        array(
            'title' => 'Multi-demo',
            'attributes' => array("data-kt-menu-trigger" => "click"),
            'classes' => array('item' => 'menu-accordion'),
            'sub' => array(
                'class' => 'menu-sub-accordion',
                'items' => array(
                    array(
                        'title' => 'Overview',
                        'path' => 'documentation/getting-started/multi-demo/overview',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'Build',
                        'path' => 'documentation/getting-started/multi-demo/build',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // File Structure
        array(
            'title' => 'File Structure',
            'path' => 'documentation/getting-started/file-structure',
        ),

        // Customization
        array(
            'title' => 'Customization',
            'attributes' => array("data-kt-menu-trigger" => "click"),
            'classes' => array('item' => 'menu-accordion'),
            'sub' => array(
                'class' => 'menu-sub-accordion',
                'items' => array(
                    array(
                        'title' => 'SASS',
                        'path' => 'documentation/getting-started/customization/sass',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'Javascript',
                        'path' => 'documentation/getting-started/customization/javascript',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // Dark skin
        array(
            'title' => 'Dark Mode Version',
            'path' => 'documentation/getting-started/dark-mode',
        ),

        // RTL
        array(
            'title' => 'RTL Version',
            'path' => 'documentation/getting-started/rtl',
        ),

        // Troubleshoot
        array(
            'title' => 'Troubleshoot',
            'path' => 'documentation/getting-started/troubleshoot',
        ),

        // Changelog
        array(
            'title' => 'Changelog <span class="badge badge-changelog badge-light-danger bg-hover-danger text-hover-white fw-bold fs-9 px-2 ms-2">v' . theme()->getVersion() . '</span>',
            'breadcrumb-title' => 'Changelog',
            'path' => 'documentation/getting-started/changelog',
        ),

        // References
        array(
            'title' => 'References',
            'path' => 'documentation/getting-started/references',
        ),


        // Separator
        array(
            'custom' => '<div class="h-30px"></div>',
        ),

        // Configuration
        array(
            'heading' => 'Configuration',
        ),

        // General
        array(
            'title' => 'General',
            'path' => 'documentation/configuration/general',
        ),

        // Menu
        array(
            'title' => 'Menu',
            'path' => 'documentation/configuration/menu',
        ),

        // Page
        array(
            'title' => 'Page',
            'path' => 'documentation/configuration/page',
        ),

        // Page
        array(
            'title' => 'Add NPM Plugin',
            'path' => 'documentation/configuration/npm-plugins',
        ),


        // Separator
        array(
            'custom' => '<div class="h-30px"></div>',
        ),

        // General
        array(
            'heading' => 'General',
        ),

        // DataTables
        array(
            'title' => 'DataTables',
            'classes' => array('item' => 'menu-accordion'),
            'attributes' => array("data-kt-menu-trigger" => "click"),
            'sub' => array(
                'class' => 'menu-sub-accordion',
                'items' => array(
                    array(
                        'title' => 'Overview',
                        'path' => 'documentation/general/datatables/overview',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // Remove demos
        array(
            'title' => 'Remove Demos',
            'path' => 'documentation/general/remove-demos',
        ),


        // Separator
        array(
            'custom' => '<div class="h-30px"></div>',
        ),

        // HTML Theme
        array(
            'heading' => 'HTML Theme',
        ),

        array(
            'title' => 'Components',
            'path' => '//preview.keenthemes.com/metronic8/demo1/documentation/base/utilities.html',
        ),

        array(
            'title' => 'Documentation',
            'path' => '//preview.keenthemes.com/metronic8/demo1/documentation/getting-started.html',
        ),
    ),

    // Main menu
    'main' => array(
        //// Dashboard
        array(
            'title' => 'Dashboard',
            'path' => '',
            'icon' => '<i class="bi bi-grid-1x2-fill" style="font-weight: 600;font-size: 18px;"></i>',
        ),

        //// Customer Profile
        array(
            'title' => 'Customer',
            'path' => 'identity/profile',
            'icon' => '<i class="bi bi-person-circle" style="font-weight: 600;font-size: 18px;"></i>',
            'classes' => array('item' => 'menu-accordion'),
        ),

        ////Master
        array(
            'title' => 'Master',
            'icon' => '<i class="bi bi-nut-fill" style="font-weight: 600;font-size: 18px;"></i>',

            'classes' => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub' => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(

                    array(
                        'title' => 'Parameter Master',
                        'path' => 'parameters',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),

                    array(
                        'title' => 'Category',
                        'path' => 'categories',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        ////Access Control
        array(
            'title' => 'Access Control',
            'icon' => '<i class="bi bi-stack" style="font-weight: 600;font-size: 18px;"></i>',
            'classes' => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub' => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(

                    array(
                        'title' => 'Roles',
                        'path' => 'roles',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'Users',
                        'path' => 'users',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),

                ),
            ),
        ),

        ////Setting
        array(
            'title' => 'Settings',
            'icon' => '<i class="bi bi-gear-fill" style="font-weight: 600;font-size: 18px;"></i>',

            'classes' => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub' => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(

                    array(
                        'title' => 'Social Media',
                        'path' => 'setting/social_media',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'Push Notification',
                        'path' => 'setting/push_notification',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),

                ),
            ),
        ),

        //// Modules
        // array(
        //     'classes' => array('content' => 'pt-8 pb-2'),
        //     'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">Modules</span>',
        // ),

        // Account
        // array(
        //     'title'      => 'Account',
        //     'icon'       => array(
        //         'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/communication/com006.svg", "svg-icon-2"),
        //         'font' => '<i class="bi bi-person fs-2"></i>',
        //     ),
        //     'classes'    => array('item' => 'menu-accordion'),
        //     'attributes' => array(
        //         "data-kt-menu-trigger" => "click",
        //     ),
        //     'sub'        => array(
        //         'class' => 'menu-sub-accordion menu-active-bg',
        //         'items' => array(
        //             array(
        //                 'title'  => 'Overview',
        //                 'path'   => 'account/overview',
        //                 'bullet' => '<span class="bullet bullet-dot"></span>',
        //             ),
        //             array(
        //                 'title'  => 'Settings',
        //                 'path'   => 'account/settings',
        //                 'bullet' => '<span class="bullet bullet-dot"></span>',
        //             ),
        //             array(
        //                 'title'      => 'Security',
        //                 'path'       => '#',
        //                 'bullet'     => '<span class="bullet bullet-dot"></span>',
        //                 'attributes' => array(
        //                     'link' => array(
        //                         "title"             => "Coming soon",
        //                         "data-bs-toggle"    => "tooltip",
        //                         "data-bs-trigger"   => "hover",
        //                         "data-bs-dismiss"   => "click",
        //                         "data-bs-placement" => "right",
        //                     ),
        //                 ),
        //             ),
        //         ),
        //     ),
        // ),

        // System
        // array(
        //     'title'      => 'System',
        //     'icon'       => array(
        //         'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
        //         'font' => '<i class="bi bi-layers fs-3"></i>',
        //     ),
        //     'classes'    => array('item' => 'menu-accordion'),
        //     'attributes' => array(
        //         "data-kt-menu-trigger" => "click",
        //     ),
        //     'sub'        => array(
        //         'class' => 'menu-sub-accordion menu-active-bg',
        //         'items' => array(
        //             array(
        //                 'title'      => 'Settings',
        //                 'path'       => '#',
        //                 'bullet'     => '<span class="bullet bullet-dot"></span>',
        //                 'attributes' => array(
        //                     'link' => array(
        //                         "title"             => "Coming soon",
        //                         "data-bs-toggle"    => "tooltip",
        //                         "data-bs-trigger"   => "hover",
        //                         "data-bs-dismiss"   => "click",
        //                         "data-bs-placement" => "right",
        //                     ),
        //                 ),
        //             ),
        //             array(
        //                 'title'  => 'Audit Log',
        //                 'path'   => 'log/audit',
        //                 'bullet' => '<span class="bullet bullet-dot"></span>',
        //             ),
        //             array(
        //                 'title'  => 'System Log',
        //                 'path'   => 'log/system',
        //                 'bullet' => '<span class="bullet bullet-dot"></span>',
        //             ),
        //             array(
        //                 'title'  => 'Error 404',
        //                 'path'   => 'error/error-404',
        //                 'bullet' => '<span class="bullet bullet-dot"></span>',
        //             ),
        //             array(
        //                 'title'  => 'Error 500',
        //                 'path'   => 'error/error-500',
        //                 'bullet' => '<span class="bullet bullet-dot"></span>',
        //             ),
        //         ),
        //     ),
        // ),

        //// Help
        // array(
        //     'classes' => array('content' => 'pt-8 pb-2'),
        //     'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">Help</span>',
        // ),

        // Documentation
        // array(
        //     'title' => 'Documentation',
        //     'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/abstract/abs027.svg", "svg-icon-2"),
        //     'path'  => 'documentation/getting-started/overview',
        // ),

        // Changelog
        // array(
        //     'title' => 'Changelog v'.theme()->getVersion(),
        //     'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/coding/cod003.svg", "svg-icon-2"),
        //     'path'  => 'documentation/getting-started/changelog',
        // ),

    ),

    // Horizontal menu
    'horizontal' => array(
        // Dashboard
        // array(
        //     'title' => 'Dashboard',
        //     'path' => '',
        //     'classes' => array('item' => 'me-lg-1'),
        // ),

        // Resources
        // array(
        //     'title'      => 'Resources',
        //     'classes'    => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
        //     'attributes' => array(
        //         'data-kt-menu-trigger'   => "click",
        //         'data-kt-menu-placement' => "bottom-start",
        //     ),
        //     'sub'        => array(
        //         'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
        //         'items' => array(
        //             // Documentation
        //             array(
        //                 'title' => 'Documentation',
        //                 'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/abstract/abs027.svg", "svg-icon-2"),
        //                 'path'  => 'documentation/getting-started/overview',
        //             ),

        //             // Changelog
        //             array(
        //                 'title' => 'Changelog v'.theme()->getVersion(),
        //                 'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen005.svg", "svg-icon-2"),
        //                 'path'  => 'documentation/getting-started/changelog',
        //             ),
        //         ),
        //     ),
        // ),

        // Account
        // array(
        //     'title' => 'Employee Profile',
        //     'classes' => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
        //     'attributes' => array(
        //         'data-kt-menu-trigger' => "click",
        //         'data-kt-menu-placement' => "bottom-start",
        //     ),
        //     'sub' => array(
        //         'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
        //         'items' => array(

        //             array(
        //                 'title' => 'Profile Details',
        //                 'path' => 'identity/profile',
        //                 'bullet' => '<span class="bullet bullet-dot"></span>',
        //             ),

        //         ),
        //     ),
        // ),

        // System
        // array(
        //     'title'      => 'System',
        //     'classes'    => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
        //     'attributes' => array(
        //         'data-kt-menu-trigger'   => "click",
        //         'data-kt-menu-placement' => "bottom-start",
        //     ),
        //     'sub'        => array(
        //         'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
        //         'items' => array(
        //             array(
        //                 'title'      => 'Settings',
        //                 'path'       => '#',
        //                 'bullet'     => '<span class="bullet bullet-dot"></span>',
        //                 'attributes' => array(
        //                     'link' => array(
        //                         "title"             => "Coming soon",
        //                         "data-bs-toggle"    => "tooltip",
        //                         "data-bs-trigger"   => "hover",
        //                         "data-bs-dismiss"   => "click",
        //                         "data-bs-placement" => "right",
        //                     ),
        //                 ),
        //             ),
        //             array(
        //                 'title'  => 'Audit Log',
        //                 'path'   => 'log/audit',
        //                 'bullet' => '<span class="bullet bullet-dot"></span>',
        //             ),
        //             array(
        //                 'title'  => 'System Log',
        //                 'path'   => 'log/system',
        //                 'bullet' => '<span class="bullet bullet-dot"></span>',
        //             ),
        //         ),
        //     ),
        // ),
    ),
);
