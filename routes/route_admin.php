<?php

    Route::group(['prefix' => 'laravel-filemanager','middleware' => 'check_admin_login'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    Route::group(['prefix' => 'api-admin','namespace' => 'Admin','middleware' => 'check_admin_login'], function() {
        Route::get('','AdminController@index')->name('get.admin.index')->middleware('permission:statistical|full');
 
        Route::get('statistical','AdminStatisticalController@index')->name('admin.statistical')->middleware('permission:statistical|full');
        Route::get('contact','AdminContactController@index')->name('admin.contact')->middleware('permission:contact|full');
		Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('admin.logs.index')->middleware('permission:logs|full');
        Route::get('contact/delete/{id}','AdminContactController@delete')->name('admin.contact.delete')->middleware('permission:contact_delete|full');

        Route::get('profile','AdminProfileController@index')->name('admin.profile.index')->middleware('permission:profile|full');
        Route::post('profile/{id}','AdminProfileController@update')->name('admin.profile.update')->middleware('permission:profile_update|full');

        /**
         * Route danh mục sản phẩm
         **/
        Route::group(['prefix' => 'system-pay','namespace' => 'SystemPay'], function(){
            Route::group(['prefix' => 'pay-in'], function(){
                Route::get('','AdminPayInController@index')->name('admin.system_pay_in.index');
                Route::get('create','AdminPayInController@create')->name('admin.system_pay_in.create');
                Route::post('create','AdminPayInController@store');

                Route::get('update/{id}','AdminPayInController@edit')->name('admin.system_pay_in.update');
                Route::post('update/{id}','AdminPayInController@update');

                Route::get('delete/{id}','AdminPayInController@delete')->name('admin.system_pay_in.delete');
            });
        });

        /**
         * Route danh mục sản phẩm
         **/
        Route::group(['prefix' => 'category'], function(){
            Route::get('','AdminCategoryController@index')->name('admin.category.index')->middleware('permission:category_index|full');;
            Route::get('create','AdminCategoryController@create')->name('admin.category.create')->middleware('permission:category_create|full');;
            Route::post('create','AdminCategoryController@store')->middleware('permission:category_create|full');

            Route::get('update/{id}','AdminCategoryController@edit')->name('admin.category.update')->middleware('permission:category_update|full');
            Route::post('update/{id}','AdminCategoryController@update')->middleware('permission:category_update|full');

            Route::get('active/{id}','AdminCategoryController@active')->name('admin.category.active')->middleware('permission:category_active|full');
            Route::get('hot/{id}','AdminCategoryController@hot')->name('admin.category.hot')->middleware('permission:category_hot|full');
            Route::get('delete/{id}','AdminCategoryController@delete')->name('admin.category.delete')->middleware('permission:category_delete|full');
        });

		Route::group(['prefix' => 'ncc'], function (){
			Route::get('','AdminSupplierController@index')->name('admin.ncc.index')->middleware('permission:full');
			Route::get('create','AdminSupplierController@create')->name('admin.ncc.create')->middleware('permission:full');
			Route::post('create','AdminSupplierController@store')->middleware('permission:full');

			Route::get('update/{id}','AdminSupplierController@edit')->name('admin.ncc.update')->middleware('permission:full');
			Route::post('update/{id}','AdminSupplierController@update')->middleware('permission:full');

			Route::get('delete/{id}','AdminSupplierController@delete')->name('admin.ncc.delete')->middleware('permission:full');
		});
		Route::group(['prefix' => 'invoice_entered'], function (){
			Route::get('','AdminInvoiceEnteredController@index')->name('admin.invoice_entered.index')->middleware('permission:full');
			Route::get('create','AdminInvoiceEnteredController@create')->name('admin.invoice_entered.create')->middleware('permission:full');
			Route::post('create','AdminInvoiceEnteredController@store')->middleware('permission:full');

			Route::get('update/{id}','AdminInvoiceEnteredController@edit')->name('admin.invoice_entered.update')->middleware('permission:full');
			Route::post('update/{id}','AdminInvoiceEnteredController@update')->middleware('permission:full');

			Route::get('delete/{id}','AdminInvoiceEnteredController@delete')->name('admin.invoice_entered.delete')->middleware('permission:full');
		});

        Route::group(['prefix' => 'keyword'], function(){
            Route::get('','AdminKeywordController@index')->name('admin.keyword.index')->middleware('permission:full');
            Route::get('create','AdminKeywordController@create')->name('admin.keyword.create')->middleware('permission:full');
            Route::post('create','AdminKeywordController@store')->middleware('permission:full');

            Route::get('update/{id}','AdminKeywordController@edit')->name('admin.keyword.update')->middleware('permission:full');
            Route::post('update/{id}','AdminKeywordController@update')->middleware('permission:full');
            Route::get('hot/{id}','AdminKeywordController@hot')->name('admin.keyword.hot')->middleware('permission:full');

            Route::get('delete/{id}','AdminKeywordController@delete')->name('admin.keyword.delete')->middleware('permission:full');

        });

        Route::group(['prefix' => 'flash-sale'], function(){
            Route::get('','AdminFlashSaleController@index')->name('admin.flash.index')->middleware('permission:full');
            Route::get('create','AdminFlashSaleController@create')->name('admin.flash.create')->middleware('permission:full');
            Route::post('create','AdminFlashSaleController@store')->name('admin.flash.store')->middleware('permission:full');
            Route::post('flash_deals/product_discount', 'AdminFlashSaleController@product_discount')->name('flash_sales.product_discount');
        });

        Route::group(['prefix' => 'attribute'], function(){
            Route::get('','AdminAttributeController@index')->name('admin.attribute.index')->middleware('permission:attribute_index|full');
            Route::get('create','AdminAttributeController@create')->name('admin.attribute.create')->middleware('permission:attribute_create|full');
            Route::post('create','AdminAttributeController@store')->middleware('permission:attribute_create|full');

            Route::get('update/{id}','AdminAttributeController@edit')->name('admin.attribute.update')->middleware('permission:attribute_update|full');
            Route::post('update/{id}','AdminAttributeController@update')->middleware('permission:full');
            Route::get('hot/{id}','AdminAttributeController@hot')->name('admin.attribute.hot')->middleware('permission:attribute_hot|full');

            Route::get('delete/{id}','AdminAttributeController@delete')->name('admin.attribute.delete')->middleware('permission:attribute_delete|full');

        });

        Route::group(['prefix' => 'user'], function(){
            Route::get('','AdminUserController@index')->name('admin.user.index')->middleware('permission:full');

            Route::get('update/{id}','AdminUserController@edit')->name('admin.user.update')->middleware('permission:full');
            Route::post('update/{id}','AdminUserController@update')->middleware('permission:full');

            Route::get('delete/{id}','AdminUserController@delete')->name('admin.user.delete')->middleware('permission:full');
			Route::get('ajax/transaction/{userId}','AdminUserController@transaction')->name('admin.user.transaction')->middleware('permission:full');
        });

        Route::group(['prefix' => 'transaction'], function(){
            Route::get('','AdminTransactionController@index')->name('admin.transaction.index')->middleware('permission:full');
            Route::get('delete/{id}','AdminTransactionController@delete')->name('admin.transaction.delete')->middleware('permission:full');
            Route::get('order-delete/{id}','AdminTransactionController@deleteOrderItem')->name('ajax_admin.transaction.order_item')->middleware('permission:full');
            Route::get('view-transaction/{id}','AdminTransactionController@getTransactionDetail')->name('ajax.admin.transaction.detail')->middleware('permission:full');
            Route::get('action/{action}/{id}','AdminTransactionController@getAction')->name('admin.action.transaction')->middleware('permission:full');
        });


        Route::group(['prefix' => 'product'], function(){
            Route::get('','AdminProductController@index')->name('admin.product.index')->middleware('permission:product_index|full');
            Route::get('create','AdminProductController@create')->name('admin.product.create')->middleware('permission:product_create|full');
            Route::post('create','AdminProductController@store');

            Route::get('hot/{id}','AdminProductController@hot')->name('admin.product.hot')->middleware('permission:product_hot|full');
            Route::get('active/{id}','AdminProductController@active')->name('admin.product.active')->middleware('permission:product_active|full');
            Route::get('update/{id}','AdminProductController@edit')->name('admin.product.update')->middleware('permission:product_update|full');
            Route::post('update/{id}','AdminProductController@update')->middleware('permission:product_update|full');

            Route::get('delete/{id}','AdminProductController@delete')->name('admin.product.delete')->middleware('check_admin')->middleware('permission:product_delete|full');
            Route::get('delete-image/{id}','AdminProductController@deleteImage')->name('admin.product.delete_image')->middleware('permission:product_delete_image|full');

            Route::post('coupon/get_products_by_category', 'AdminProductController@getProductByCategory')->name('products.get_products_by_subsubcategory');
        });

        Route::group(['prefix' => 'rating'], function(){
            Route::get('','AdminRatingController@index')->name('admin.rating.index')->middleware('permission:rating_index|full');
            Route::get('delete/{id}','AdminRatingController@delete')->name('admin.rating.delete')->middleware('permission:rating_delete|full');
        });
        Route::group(['prefix' => 'inventory'], function(){
            Route::get('import','AdminInventoryController@getWarehousing')->name('admin.inventory.warehousing')->middleware('permission:full');
            Route::get('export','AdminInventoryController@getOutOfStock')->name('admin.inventory.out_of_stock')->middleware('permission:full');
        });

        Route::group(['prefix' => 'menu'], function(){
            Route::get('','AdminMenuController@index')->name('admin.menu.index')->middleware('permission:menu_index|full');
            Route::get('create','AdminMenuController@create')->name('admin.menu.create')->middleware('permission:menu_create|full');
            Route::post('create','AdminMenuController@store')->middleware('permission:menu_create|full');

            Route::get('update/{id}','AdminMenuController@edit')->name('admin.menu.update')->middleware('permission:menu_update|full');
            Route::post('update/{id}','AdminMenuController@update')->middleware('permission:menu_update|full');

            Route::get('active/{id}','AdminMenuController@active')->name('admin.menu.active')->middleware('permission:menu_active|full');
            Route::get('hot/{id}','AdminMenuController@hot')->name('admin.menu.hot')->middleware('permission:menu_hot|full');
            Route::get('delete/{id}','AdminMenuController@delete')->name('admin.menu.delete')->middleware('permission:menu_delete|full');
        });
        Route::group(['prefix' => 'comment'], function(){
            Route::get('','AdminCommentController@index')->name('admin.comment.index')->middleware('permission:comment_index|full');
            Route::get('delete/{id}','AdminCommentController@delete')->name('admin.comment.delete')->middleware('permission:comment_delete|full');
        });

        Route::group(['prefix' => 'coupon'], function(){
            Route::get('','AdminCouponController@index')->name('admin.coupon.index')->middleware('permission:coupon_index|full');
            Route::get('delete/{id}','AdminCouponController@delete')->name('admin.coupon.delete')->middleware('permission:coupon_delete|full');

            Route::get('active/{id}','AdminCouponController@active')->name('admin.coupon.active')->middleware('permission:coupon_active|full');
            Route::get('update/{id}','AdminCouponController@edit')->name('admin.coupon.update')->middleware('permission:coupon_update|full');
            Route::post('update/{id}','AdminCouponController@update')->middleware('permission:coupon_update|full');
            Route::get('create','AdminCouponController@create')->name('admin.coupon.create')->middleware('permission:coupon_create|full');
            Route::post('create','AdminCouponController@store')->name('admin.coupon.store');
            Route::get('delete/{id}','AdminCouponController@delete')->name('admin.coupon.delete')->middleware('permission:coupon_delete|full');
        });

        Route::group(['prefix' => 'article'], function(){
            Route::get('','AdminArticleController@index')->name('admin.article.index')->middleware('permission:article_index|full');
            Route::get('create','AdminArticleController@create')->name('admin.article.create')->middleware('permission:article_create|full');
            Route::post('create','AdminArticleController@store')->middleware('permission:article_create|full');

            Route::get('update/{id}','AdminArticleController@edit')->name('admin.article.update')->middleware('permission:article_update|full');
            Route::post('update/{id}','AdminArticleController@update')->middleware('permission:article_update|full');

            Route::get('active/{id}','AdminArticleController@active')->name('admin.article.active')->middleware('permission:article_active|full');
            Route::get('hot/{id}','AdminArticleController@hot')->name('admin.article.hot')->middleware('permission:article_hot|full');
            Route::get('delete/{id}','AdminArticleController@delete')->name('admin.article.delete')->middleware('permission:article_delete|full');

        });

        Route::group(['prefix' => 'shop'], function(){
            Route::get('','AdminShopController@index')->name('admin.shop.index')->middleware('permission:shop_index|full');
            Route::get('active/{id}','AdminShopController@active')->name('admin.shop.active')->middleware('permission:full');
        });

        Route::group(['prefix' => 'slide'], function(){
            Route::get('','AdminSlideController@index')->name('admin.slide.index')->middleware('permission:full');
            Route::get('create','AdminSlideController@create')->name('admin.slide.create')->middleware('permission:full');
            Route::post('create','AdminSlideController@store')->middleware('permission:full');

            Route::get('update/{id}','AdminSlideController@edit')->name('admin.slide.update')->middleware('permission:full');
            Route::post('update/{id}','AdminSlideController@update')->middleware('permission:full');

            Route::get('active/{id}','AdminSlideController@active')->name('admin.slide.active')->middleware('permission:full');
            Route::get('hot/{id}','AdminSlideController@hot')->name('admin.slide.hot')->middleware('permission:full');
            Route::get('delete/{id}','AdminSlideController@delete')->name('admin.slide.delete')->middleware('permission:full');
        });

        Route::group(['prefix' => 'event'], function(){
            Route::get('','AdminEventController@index')->name('admin.event.index')->middleware('permission:full');
            Route::get('create','AdminEventController@create')->name('admin.event.create')->middleware('permission:full');
            Route::post('create','AdminEventController@store')->middleware('permission:full');

            Route::get('update/{id}','AdminEventController@edit')->name('admin.event.update')->middleware('permission:full');
            Route::post('update/{id}','AdminEventController@update')->middleware('permission:full');

            Route::get('delete/{id}','AdminEventController@delete')->name('admin.event.delete')->middleware('permission:full');
        });

        Route::group(['prefix' => 'page-static'], function(){
            Route::get('','AdminStaticController@index')->name('admin.static.index')->middleware('permission:full');
            Route::get('create','AdminStaticController@create')->name('admin.static.create')->middleware('permission:full');
            Route::post('create','AdminStaticController@store')->middleware('permission:full');

            Route::get('update/{id}','AdminStaticController@edit')->name('admin.static.update')->middleware('permission:full');
            Route::post('update/{id}','AdminStaticController@update')->middleware('permission:full');

            Route::get('delete/{id}','AdminStaticController@delete')->name('admin.static.delete')->middleware('permission:full');
        });

		Route::group(['prefix' => 'permission'], function () {
			Route::get('/','AclPermissionController@index')->name('admin.permission.list')->middleware('permission:full');
			Route::get('create','AclPermissionController@create')->name('admin.permission.create')->middleware('permission:full');
			Route::post('create','AclPermissionController@store');

			Route::get('update/{id}','AclPermissionController@edit')->name('admin.permission.update')->middleware('permission:full');
			Route::post('update/{id}','AclPermissionController@update');
			Route::get('delete/{id}','AclPermissionController@delete')->name('admin.permission.delete')->middleware('permission:full');
		});

		Route::group(['prefix' => 'role'], function () {
			Route::get('/','AclRoleController@index')->name('admin.role.list')->middleware('permission:full');
			Route::get('create','AclRoleController@create')->name('admin.role.create')->middleware('permission:full');
			Route::post('create','AclRoleController@store');
			Route::get('update/{id}','AclRoleController@edit')->name('admin.role.update')->middleware('permission:full');
			Route::post('update/{id}','AclRoleController@update')->middleware('permission:full');
			Route::get('delete/{id}','AclRoleController@delete')->name('admin.role.delete')->middleware('permission:full');
		});

		Route::group(['prefix' => 'account-admin'], function (){
			Route::get('','AdminAccountController@index')->name('admin.account_admin.index')->middleware('permission:full');
			Route::get('create','AdminAccountController@create')->name('admin.account_admin.create')->middleware('permission:full');
			Route::post('create','AdminAccountController@store')->middleware('permission:full');

			Route::get('update/{id}','AdminAccountController@edit')->name('admin.account_admin.update')->middleware('permission:full');
			Route::post('update/{id}','AdminAccountController@update')->middleware('permission:full');

			Route::get('delete/{id}','AdminAccountController@delete')->name('admin.account_admin.delete')->middleware('permission:full');
		});


//        Route::group(['prefix' => 'setting'], function(){
//			Route::get('','AdminSettingController@index')->name('admin.setting.index');
//		});
    });
