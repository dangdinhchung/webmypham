<?php

    Route::group(['prefix' => 'laravel-filemanager','middleware' => 'check_admin_login'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    Route::group(['prefix' => 'api-admin','namespace' => 'Admin','middleware' => 'check_admin_login'], function() {
        Route::get('','AdminController@index')->name('get.admin.index');
 
        Route::get('statistical','AdminStatisticalController@index')->name('admin.statistical')->middleware('check_permission_acl:statistical-list');
        Route::get('contact','AdminContactController@index')->name('admin.contact');
		Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('admin.logs.index');
        Route::get('contact/delete/{id}','AdminContactController@delete')->name('admin.contact.delete');

        Route::get('profile','AdminProfileController@index')->name('admin.profile.index');
        Route::post('profile/{id}','AdminProfileController@update')->name('admin.profile.update');

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
            Route::get('','AdminCategoryController@index')->name('admin.category.index')->middleware('check_permission_acl:category-list');
            Route::get('create','AdminCategoryController@create')->name('admin.category.create')->middleware('check_permission_acl:category-add');
            Route::post('create','AdminCategoryController@store')->middleware('check_permission_acl:category-add');

            Route::get('update/{id}','AdminCategoryController@edit')->name('admin.category.update')->middleware('check_permission_acl:category-edit');
            Route::post('update/{id}','AdminCategoryController@update')->middleware('check_permission_acl:category-edit');

            Route::get('active/{id}','AdminCategoryController@active')->name('admin.category.active')->middleware('check_permission_acl:category-edit');
            Route::get('hot/{id}','AdminCategoryController@hot')->name('admin.category.hot')->middleware('check_permission_acl:category-edit');
            Route::get('delete/{id}','AdminCategoryController@delete')->name('admin.category.delete')->middleware('check_permission_acl:category-delete');
        });

		Route::group(['prefix' => 'ncc'], function (){
			Route::get('','AdminSupplierController@index')->name('admin.ncc.index');
			Route::get('create','AdminSupplierController@create')->name('admin.ncc.create');
			Route::post('create','AdminSupplierController@store');

			Route::get('update/{id}','AdminSupplierController@edit')->name('admin.ncc.update');
			Route::post('update/{id}','AdminSupplierController@update');

			Route::get('delete/{id}','AdminSupplierController@delete')->name('admin.ncc.delete');
		});
		Route::group(['prefix' => 'invoice_entered'], function (){
			Route::get('','AdminInvoiceEnteredController@index')->name('admin.invoice_entered.index');
			Route::get('create','AdminInvoiceEnteredController@create')->name('admin.invoice_entered.create');
			Route::post('create','AdminInvoiceEnteredController@store');

			Route::get('update/{id}','AdminInvoiceEnteredController@edit')->name('admin.invoice_entered.update');
			Route::post('update/{id}','AdminInvoiceEnteredController@update');

			Route::get('delete/{id}','AdminInvoiceEnteredController@delete')->name('admin.invoice_entered.delete');
		});

        Route::group(['prefix' => 'keyword'], function(){
            Route::get('','AdminKeywordController@index')->name('admin.keyword.index');
            Route::get('create','AdminKeywordController@create')->name('admin.keyword.create');
            Route::post('create','AdminKeywordController@store');

            Route::get('update/{id}','AdminKeywordController@edit')->name('admin.keyword.update');
            Route::post('update/{id}','AdminKeywordController@update');
            Route::get('hot/{id}','AdminKeywordController@hot')->name('admin.keyword.hot');

            Route::get('delete/{id}','AdminKeywordController@delete')->name('admin.keyword.delete');

        });

        Route::group(['prefix' => 'flash-sale'], function(){
            Route::get('','AdminFlashSaleController@index')->name('admin.flash.index')->middleware('check_permission_acl:flash-sale-list');
            Route::get('create','AdminFlashSaleController@create')->name('admin.flash.create')->middleware('check_permission_acl:flash-sale-add');
            Route::post('create','AdminFlashSaleController@store')->name('admin.flash.store')->middleware('check_permission_acl:flash-sale-add');
            Route::post('flash_deals/product_discount', 'AdminFlashSaleController@product_discount')->name('flash_sales.product_discount')->middleware('check_permission_acl:flash-sale-add');
            Route::post('flash_deals/product_discount_edit', 'AdminFlashSaleController@product_discount_edit')->name('flash_sales.product_discount_edit')->middleware('check_permission_acl:flash-sale-add');

            Route::get('update/{id}','AdminFlashSaleController@edit')->name('admin.flash.update')->middleware('check_permission_acl:flash-sale-edit');
            Route::post('update/{id}','AdminFlashSaleController@update')->middleware('check_permission_acl:flash-sale-edit');
            Route::get('delete/{id}','AdminFlashSaleController@delete')->name('admin.flash.delete')->middleware('check_permission_acl:flash-sale-delete');
            Route::get('active/{id}','AdminFlashSaleController@active')->name('admin.flash.active')->middleware('check_permission_acl:flash-sale-delete');
        });

        Route::group(['prefix' => 'attribute'], function(){
            Route::get('','AdminAttributeController@index')->name('admin.attribute.index');
            Route::get('create','AdminAttributeController@create')->name('admin.attribute.create');
            Route::post('create','AdminAttributeController@store');

            Route::get('update/{id}','AdminAttributeController@edit')->name('admin.attribute.update');
            Route::post('update/{id}','AdminAttributeController@update');
            Route::get('hot/{id}','AdminAttributeController@hot')->name('admin.attribute.hot');

            Route::get('delete/{id}','AdminAttributeController@delete')->name('admin.attribute.delete');

        });

        Route::group(['prefix' => 'user'], function(){
            Route::get('','AdminUserController@index')->name('admin.user.index');

            Route::get('update/{id}','AdminUserController@edit')->name('admin.user.update');
            Route::post('update/{id}','AdminUserController@update');

            Route::get('delete/{id}','AdminUserController@delete')->name('admin.user.delete');
			Route::get('ajax/transaction/{userId}','AdminUserController@transaction')->name('admin.user.transaction');
        });

        Route::group(['prefix' => 'transaction'], function(){
            Route::get('','AdminTransactionController@index')->name('admin.transaction.index')->middleware('check_permission_acl:transaction-list');
            Route::get('delete/{id}','AdminTransactionController@delete')->name('admin.transaction.delete');
            Route::get('order-delete/{id}','AdminTransactionController@deleteOrderItem')->name('ajax_admin.transaction.order_item');
            Route::get('view-transaction/{id}','AdminTransactionController@getTransactionDetail')->name('ajax.admin.transaction.detail');

            Route::get('view-invoice/{id}','AdminTransactionController@getInvoiceDetail')->name('ajax.admin.transaction.invoice');

            /*Route::get('action/{action}/{id}','AdminTransactionController@getAction')->name('admin.action.transaction')->middleware('check_permission_acl:transaction-edit');*/

            //admin.action.transaction
            Route::get('action/process/{id}','AdminTransactionController@checkProcess')->name('admin.action.transaction.process')->middleware('check_permission_acl:transaction-process');
            Route::get('action/success/{id}','AdminTransactionController@checkSuccess')->name('admin.action.transaction.success')->middleware('check_permission_acl:transaction-success');
            Route::get('action/cancel/{id}','AdminTransactionController@checkCancel')->name('admin.action.transaction.cancel')->middleware('check_permission_acl:transaction-cancel');

            Route::get('detail-transaction/{id}','AdminTransactionController@showDeatailView')->name('admin.transaction.view');

            Route::post('process-shipping','AdminTransactionController@processShipping')->name('admin.process-shipping')->middleware('check_permission_acl:transaction-shipping');

        });


        Route::group(['prefix' => 'product'], function(){
            Route::get('','AdminProductController@index')->name('admin.product.index')->middleware('check_permission_acl:product-list');
            Route::get('create','AdminProductController@create')->name('admin.product.create')->middleware('check_permission_acl:product-add');
            Route::post('create','AdminProductController@store')->middleware('check_permission_acl:product-add');

            Route::get('hot/{id}','AdminProductController@hot')->name('admin.product.hot');
            Route::get('active/{id}','AdminProductController@active')->name('admin.product.active');
            Route::get('update/{id}','AdminProductController@edit')->name('admin.product.update')->middleware('check_permission_acl:product-edit');
            Route::post('update/{id}','AdminProductController@update')->middleware('check_permission_acl:product-edit');

            Route::get('delete/{id}','AdminProductController@delete')->name('admin.product.delete')->middleware('check_permission_acl:product-delete');
            Route::get('delete-image/{id}','AdminProductController@deleteImage')->name('admin.product.delete_image')->middleware('check_permission_acl:product-delete');

            Route::post('coupon/get_products_by_category', 'AdminProductController@getProductByCategory')->name('products.get_products_by_subsubcategory');
        });

        Route::group(['prefix' => 'rating'], function(){
            Route::get('','AdminRatingController@index')->name('admin.rating.index');
            Route::get('delete/{id}','AdminRatingController@delete')->name('admin.rating.delete');
        });
        Route::group(['prefix' => 'inventory'], function(){
            Route::get('import','AdminInventoryController@getWarehousing')->name('admin.inventory.warehousing');
            Route::get('export','AdminInventoryController@getOutOfStock')->name('admin.inventory.out_of_stock');
        });

        Route::group(['prefix' => 'menu'], function(){
            Route::get('','AdminMenuController@index')->name('admin.menu.index');
            Route::get('create','AdminMenuController@create')->name('admin.menu.create');
            Route::post('create','AdminMenuController@store');

            Route::get('update/{id}','AdminMenuController@edit')->name('admin.menu.update');
            Route::post('update/{id}','AdminMenuController@update');

            Route::get('active/{id}','AdminMenuController@active')->name('admin.menu.active');
            Route::get('hot/{id}','AdminMenuController@hot')->name('admin.menu.hot');
            Route::get('delete/{id}','AdminMenuController@delete')->name('admin.menu.delete');
        });
        Route::group(['prefix' => 'comment'], function(){
            Route::get('','AdminCommentController@index')->name('admin.comment.index');
            Route::get('delete/{id}','AdminCommentController@delete')->name('admin.comment.delete');
        });

        Route::group(['prefix' => 'coupon'], function(){
            Route::get('','AdminCouponController@index')->name('admin.coupon.index')->middleware('check_permission_acl:coupon-list');
            Route::get('delete/{id}','AdminCouponController@delete')->name('admin.coupon.delete')->middleware('check_permission_acl:coupon-delete');

            Route::get('active/{id}','AdminCouponController@active')->name('admin.coupon.active')->middleware('check_permission_acl:coupon-edit');
            Route::get('update/{id}','AdminCouponController@edit')->name('admin.coupon.update')->middleware('check_permission_acl:coupon-edit');
            Route::post('update/{id}','AdminCouponController@update')->middleware('check_permission_acl:coupon-edit');
            Route::get('create','AdminCouponController@create')->name('admin.coupon.create')->middleware('check_permission_acl:coupon-add');
            Route::post('create','AdminCouponController@store')->name('admin.coupon.store')->middleware('check_permission_acl:coupon-add');
            Route::get('delete/{id}','AdminCouponController@delete')->name('admin.coupon.delete')->middleware('check_permission_acl:coupon-delete');
        });

        Route::group(['prefix' => 'article'], function(){
            Route::get('','AdminArticleController@index')->name('admin.article.index')->middleware('check_permission_acl:article-list');
            Route::get('create','AdminArticleController@create')->name('admin.article.create')->middleware('check_permission_acl:article-add');
            Route::post('create','AdminArticleController@store')->middleware('check_permission_acl:article-add');

            Route::get('update/{id}','AdminArticleController@edit')->name('admin.article.update')->middleware('check_permission_acl:article-edit');
            Route::post('update/{id}','AdminArticleController@update')->middleware('check_permission_acl:article-edit');

            Route::get('active/{id}','AdminArticleController@active')->name('admin.article.active')->middleware('check_permission_acl:article-edit');
            Route::get('hot/{id}','AdminArticleController@hot')->name('admin.article.hot')->middleware('check_permission_acl:article-edit');
            Route::get('delete/{id}','AdminArticleController@delete')->name('admin.article.delete')->middleware('check_permission_acl:article-delete');

        });

        Route::group(['prefix' => 'shop'], function(){
            Route::get('','AdminShopController@index')->name('admin.shop.index');
            Route::get('active/{id}','AdminShopController@active')->name('admin.shop.active');
        });

        Route::group(['prefix' => 'slide'], function(){
            Route::get('','AdminSlideController@index')->name('admin.slide.index')->middleware('check_permission_acl:slide-list');
            Route::get('create','AdminSlideController@create')->name('admin.slide.create')->middleware('check_permission_acl:slide-add');
            Route::post('create','AdminSlideController@store')->middleware('check_permission_acl:slide-add');

            Route::get('update/{id}','AdminSlideController@edit')->name('admin.slide.update')->middleware('check_permission_acl:slide-edit');
            Route::post('update/{id}','AdminSlideController@update')->middleware('check_permission_acl:slide-edit');

            Route::get('active/{id}','AdminSlideController@active')->name('admin.slide.active')->middleware('check_permission_acl:slide-edit');
            Route::get('hot/{id}','AdminSlideController@hot')->name('admin.slide.hot')->middleware('check_permission_acl:slide-edit');
            Route::get('delete/{id}','AdminSlideController@delete')->name('admin.slide.delete')->middleware('check_permission_acl:slide-delete');
        });

        Route::group(['prefix' => 'event'], function(){
            Route::get('','AdminEventController@index')->name('admin.event.index');
            Route::get('create','AdminEventController@create')->name('admin.event.create');
            Route::post('create','AdminEventController@store');

            Route::get('update/{id}','AdminEventController@edit')->name('admin.event.update');
            Route::post('update/{id}','AdminEventController@update');

            Route::get('delete/{id}','AdminEventController@delete')->name('admin.event.delete');
        });

        Route::group(['prefix' => 'page-static'], function(){
            Route::get('','AdminStaticController@index')->name('admin.static.index');
            Route::get('create','AdminStaticController@create')->name('admin.static.create');
            Route::post('create','AdminStaticController@store');

            Route::get('update/{id}','AdminStaticController@edit')->name('admin.static.update');
            Route::post('update/{id}','AdminStaticController@update');

            Route::get('delete/{id}','AdminStaticController@delete')->name('admin.static.delete');
        });

		Route::group(['prefix' => 'permission'], function () {
			Route::get('/','AclPermissionController@index')->name('admin.permission.list')->middleware('check_permission_acl:permission-list');
			Route::get('create','AclPermissionController@create')->name('admin.permission.create')->middleware('check_permission_acl:permission-add');
			Route::post('create','AclPermissionController@store')->middleware('check_permission_acl:permission-add');

			Route::get('update/{id}','AclPermissionController@edit')->name('admin.permission.update')->middleware('check_permission_acl:permission-edit');
			Route::post('update/{id}','AclPermissionController@update')->middleware('check_permission_acl:permission-edit');
			Route::get('delete/{id}','AclPermissionController@delete')->name('admin.permission.delete')->middleware('check_permission_acl:permission-delete');
		});

		Route::group(['prefix' => 'role'], function () {
			Route::get('/','AclRoleController@index')->name('admin.role.list')->middleware('check_permission_acl:role-list');
			Route::get('create','AclRoleController@create')->name('admin.role.create')->middleware('check_permission_acl:role-add');
			Route::post('create','AclRoleController@store')->middleware('check_permission_acl:role-add');
			Route::get('update/{id}','AclRoleController@edit')->name('admin.role.update')->middleware('check_permission_acl:role-edit');
			Route::post('update/{id}','AclRoleController@update')->middleware('check_permission_acl:role-edit');
			Route::get('delete/{id}','AclRoleController@delete')->name('admin.role.delete')->middleware('check_permission_acl:role-delete');
		});

		Route::group(['prefix' => 'account-admin'], function (){
			Route::get('','AdminAccountController@index')->name('admin.account_admin.index')->middleware('check_permission_acl:admin-add');
			Route::get('create','AdminAccountController@create')->name('admin.account_admin.create')->middleware('check_permission_acl:admin-add');
			Route::post('create','AdminAccountController@store')->middleware('check_permission_acl:admin-add');

			Route::get('update/{id}','AdminAccountController@edit')->name('admin.account_admin.update')->middleware('check_permission_acl:admin-edit');
			Route::post('update/{id}','AdminAccountController@update')->middleware('check_permission_acl:admin-edit');

			Route::get('delete/{id}','AdminAccountController@delete')->name('admin.account_admin.delete')->middleware('check_permission_acl:admin-delete');
		});

//        ->middleware('permission:full')
//        Route::group(['prefix' => 'setting'], function(){
//			Route::get('','AdminSettingController@index')->name('admin.setting.index');
//		});
    });
