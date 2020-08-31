<?php
return [
    [
        'name' => 'Ql sản phẩm',
        'list-check' => ['attribute','category','keyword','product','comment','rating','coupon'],
        'icon' => 'fa fa-database',
		'level'  => [1,2],
        'sub'  => [
            [
                'name'  => 'Thông tin',
                'namespace' => 'attribute',
                'route' => 'admin.attribute.index',
                'icon'  => 'fa fa-key',
				'level'  => [1,2],
            ],
            [
                'name'  => 'Danh mục',
                'namespace' => 'category',
                'route' => 'admin.category.index',
                'icon'  => 'fa fa-edit',
				'level'  => [1,2],
            ],
//            [
//                'name'  => 'Từ khoá',
//                'namespace' => 'keyword',
//                'route' => 'admin.keyword.index',
//                'icon'  => 'fa fa-key',
//				'level'  => [1,2],
//            ],
            [
                'name'  => 'Sản phẩm',
                'namespace' => 'product',
                'route' => 'admin.product.index',
                'icon'  => 'fa fa-database',
				'level'  => [1,2],
            ],
			[
                'name'  => 'Đánh giá',
                'namespace' => 'rating',
                'route' => 'admin.rating.index',
                'icon'  => 'fa fa-star',
				'level'  => [1,2],
            ],
			[
                'name'  => 'Bình luân',
                'namespace' => 'comment',
                'route' => 'admin.comment.index',
                'icon'  => 'fa fa-comments-o',
				'level'  => [1,2],
			],
			[
                'name'  => 'Mã giảm giá',
                'namespace' => 'coupon',
                'route' => 'admin.coupon.index',
                'icon'  => 'fa fa-gift',
				'level'  => [1,2],
            ],
        ]
    ],
    [
        'name' => 'Quản lý bài viết',
        'list-check' => ['menu','article'],
        'icon' => 'fa fa-edit',
		'level'  => [1,2],
        'sub'  => [
            [
                'name'  => 'Menu',
                'namespace' => 'menu',
                'route' => 'admin.menu.index',
                'icon'  => 'fa-newspaper-o',
				'level'  => [1,2],
            ],
            [
                'name'  => 'Bài viết',
                'namespace' => 'article',
                'route' => 'admin.article.index',
                'icon'  => 'fa-edit',
				'level'  => [1,2],
            ],
        ]
    ],
    [
        'name' => 'Quản lý shop',
        'list-check' => ['shop','commission'],
        'icon' => 'fa fa-shopping-basket',
        'level'  => [1,2],
        'sub'  => [
            [
                'name'  => 'Danh sách shop',
                'namespace' => 'shop',
                'route' => 'admin.shop.index',
                'icon'  => 'fa fa-bars',
                'level'  => [1,2],
            ],
           /* [
                'name'  => 'Hoa hồng',
                'namespace' => 'commission',
                'route' => 'admin.commission.index',
                'icon'  => 'fa fa-money',
                'level'  => [1,2],
            ],*/
        ]
    ],
	[
		'name' => 'Đối tác && Thành viên',
		'list-check' => ['user','ncc'],
		'icon' => 'fa fa-user',
		'level'  => [1,2],
		'sub'  => [
			[
				'name'  => 'Khách hàng',
				'route' => 'admin.user.index',
				'namespace' => 'user',
				'icon'  => 'fa fa-user',
				'level'  => [1,2],
			],
			[
				'name'  => 'Nhà cung cấp',
				'route' => 'admin.ncc.index',
				'namespace' => 'user',
				'icon'  => 'fa fa-users',
				'level'  => [1,2],
			]
		]
	],
    [
        'name' => 'Đơn hàng',
        'list-check' => ['transaction'],
        'icon' => 'fa-shopping-cart',
		'level'  => [1,2],
        'sub'  => [
            [
                'name'  => 'Danh sách',
                'namespace' => 'transaction',
                'route' => 'admin.transaction.index',
                'icon'  => 'fa-opencart',
				'level'  => [1,2],
            ]
        ]
    ],
	[
        'name' => 'Kho',
        'list-check' => ['inventory','import','export','invoice_entered'],
        'icon' => 'fa-folder-open-o',
		'level'  => [1,2],
        'sub'  => [
            [
                'name'  => 'Nhập kho',
                'namespace' => 'import',
                'route' => 'admin.invoice_entered.index',
                'icon'  => 'fa-plus-square',
				'level'  => [1,2],
            ],
			[
				'name'  => 'Xuất kho',
				'namespace' => 'export',
				'route' => 'admin.inventory.out_of_stock',
				'icon'  => 'fa-plus-square',
				'level'  => [1,2],
			],
        ]
    ],
//    [
//        'name' => 'SystemPay',
//        'list-check' => ['pay-in'],
//        'icon' => 'fa  fa-usd',
//        'sub'  => [
//            [
//                'name'  => 'Nạp tiền',
//                'route' => 'admin.system_pay_in.index',
//                'namespace' => 'pay-in',
//                'icon'  => 'fa fa-money'
//            ]
//        ]
//    ],
    [
        'name'  => 'Hệ thống',
        'label' => 'true'
    ],
	[
		'name' => 'Admin',
		'list-check' => ['account-admin','permission','role'],
		'icon' => 'fa-sitemap',
		'level'  => [1,2],
		'sub'  => [
			[
				'name'  => 'Quyền',
				'namespace' => 'permission',
				'route' => 'admin.permission.list',
				'icon'  => 'fa-ban',
				'level'  => [1,2],
			],
			[
				'name'  => 'Nhóm quyền',
				'namespace' => 'role',
				'route' => 'admin.role.list',
				'icon'  => 'fa-user',
				'level'  => [1,2],
			],
			[
				'name'  => 'Admin',
				'namespace' => 'account-admin',
				'route' => 'admin.account_admin.index',
				'icon'  => 'fa-users',
				'level'  => [1,2],
			],
		]
	],
	[
		'name' => 'Hệ thống',
		'list-check' => ['slide','event','page-static','statistical'],
		'icon' => 'fa  fa-usd',
		'level'  => [1,2],
		'sub'  => [
			[
				'name'  => 'Ql Slide',
				'route' => 'admin.slide.index',
				'namespace' => 'pay-in',
				'level'  => [1,2],
				'icon'  => 'fa-circle-o'
			],
			[
				'name'  => 'Ql Event',
				'route' => 'admin.event.index',
				'namespace' => 'pay-in',
				'level'  => [1,2],
				'icon'  => 'fa-circle-o'
			],
			[
				'name'  => 'Ql Page tĩnh',
				'route' => 'admin.static.index',
				'namespace' => 'pay-in',
				'level'  => [1,2],
				'icon'  => 'fa-circle-o'
			]
		]
	],
];
