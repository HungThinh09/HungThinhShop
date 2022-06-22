<?php
return [
    // [
    //     'label' => 'Dashboard',
    //     'route' => 'admin',
    //     'icon' => 'fa-home'
    // ],
     [
        'label' => 'Danh mục',
        'route' => 'category.index',
        'icon' => 'fa-shopping-cart',
        'can' => 'category',
        'items' => [

            [
                'label' => 'Danh sách danh mục',
                'route' => 'category.index',


            ], [
                'label' => 'Thêm danh mục',
                'route' => 'category.create',
            ]
        ]
    ], [
        'label' => 'Sản phẩm',
        'route' => 'product.index',
        'icon' => 'fa-shopping-cart',
        'can' => 'product',
        'items' => [
            [
                'label' => 'Danh sách sản phẩm',
                'route' => 'product.index',

            ], [
                'label' => 'Thêm Sản phẩm',
                'route' => 'product.create',
            ]
        ]
    ],[
        'label' => 'Banner',
        'route' => 'banner.index',
        'icon' => 'fa-image',
        'can' => 'banner',
        'items' => [
            [
                'label' => 'Danh sách banner',
                'route' => 'banner.index',

            ], [
                'label' => 'Thêm banner',
                'route' => 'banner.create',
            ]
        ]
    ],[
        'label' => 'Setting',
        'route' => 'setting.index',
        'icon' => 'fa-cog',
        'can' => 'setting',
        'items' => [
            [
                'label' => 'Danh sách Setting',
                'route' => 'setting.index',

            ], [
                'label' => 'Thêm Setting',
                'route' => 'setting.create',
            ]
        ]
    ],[
        'label' => 'User',
        'route' => 'user.index',
        'icon' => 'fa-users',
        'can' => 'user',
        'items' => [
            [
                'label' => 'Danh sách nhân viên',
                'route' => 'user.index',

            ], [
                'label' => 'Thêm nhân viên',
                'route' => 'user.create',
            ]
        ]
    ],[
        'label' => 'Role',
        'route' => 'role.index',
        'icon' => 'fa-user-tag',
        'can' => 'role',
        'items' => [
            [
                'label' => 'Danh sách Role',
                'route' => 'role.index',

            ], [
                'label' => 'Thêm Role',
                'route' => 'role.create',
            ]
        ]
    ],[
        'label' => 'Permisstion',
        'route' => 'permisstion.index',
        'icon' => 'fa-user-tag',
        'can' => 'permisstion',
        'items' => [
            [
                'label' => 'Danh sách Permisstion',
                'route' => 'permisstion.index',

            ], [
                'label' => 'Thêm Permisstion',
                'route' => 'permisstion.create',
            ]
        ]
    ],
    [
        'label' => 'Manager Order',
        'route' => 'managerOrder.index',
        'icon' => 'fa-tasks',
        'can' => 'order',
        'items' => [
            [
                'label' => 'Danh sách Order',
                'route' => 'managerOrder.index',

            ]
        ]
    ]
];
