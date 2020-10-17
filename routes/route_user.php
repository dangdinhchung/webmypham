<?php

    Route::group(['prefix' => 'account','namespace' => 'User','middleware' => 'check_user_login'], function() {
        Route::get('','UserDashboardController@dashboard')->name('get.user.dashboard'); // tong quan

        Route::get('update-info','UserInfoController@updateInfo')->name('get.user.update_info'); // cập nhật thông tin
        Route::post('update-info','UserInfoController@saveUpdateInfo');

        Route::get('transaction','UserTransactionController@index')->name('get.user.transaction'); // đơn hàng
        /*Route::get('transaction/cancel/{id}','UserTransactionController@cancelTransaction')->name('get.user.transaction.cancel');*/
        Route::post('transaction/cancel/{id}','UserTransactionController@cancelTransaction')->name('get.user.transaction.cancel'); // huỷ đơn hàng
        Route::get('order/view/{id}','UserTransactionController@viewOrder')->name('get.user.order'); // chi tiết đơn hàng

        Route::get('rating','UserRatingController@index')->name('get.user.rating'); // list đánh giá
        Route::get('rating/delete/{id}','UserRatingController@delete')->name('get.user.rating.delete'); // xoá đánh giá

        Route::get('comment','UserCommentController@index')->name('get.user.comment'); // commend 
        Route::get('comment/delete/{id}','UserCommentController@delete')->name('get.user.comment.delete'); // xoá commend 

		Route::get('management-transaction','UserManagementTransaction@index')->name('get.user.management_transaction'); // Biết động tài khoản

		Route::post('/process','RechargeOnlineController@processSendData')
			->name('post.recharge.process'); //  xử lý nạp tiền

		Route::get('process-success','ProcessRechargeOnlineController@callbackSuccess')
			->name('get.recharge.success'); // callback khi nạp tiền xong

		Route::get('process-cancel','ProcessRechargeOnlineController@callbackCancel')
			->name('get.recharge.cancel'); // huỷ nạp tiền

        Route::get('log-login','LogLoginUserController@index')->name('get.user.log_login'); // lịch sử đăng nhập

        Route::get('seller','SellerController@index')->name('seller.index'); // seller
        Route::get('view-seller','SellerController@detail')->name('seller.detail.index'); // seller
        Route::post('view-seller','SellerController@update'); // seller
        Route::post('seller','SellerController@store')->name('seller.store'); // create seller
        Route::get('seller-product','SellerController@product')->name('seller.product.index'); // seller product
        Route::get('seller-create-product','SellerController@create')->name('seller.product.create'); // seller product
        Route::post('seller-create-product','SellerController@storeSeller')->name('seller.product.store'); // store seller product
        Route::get('seller-create-product/delete/{id}','SellerController@delete')->name('seller.product.delete'); // store seller product
        Route::get('seller-edit-product/{id}','SellerController@edit')->name('seller.product.update'); // store seller product
        Route::post('seller-edit-product/{id}','SellerController@updateShop'); // store seller product

        Route::get('tracking/view/{id}','UserTransactionController@getTrackingTransaction')->name('get.user.tracking_order'); // theo dõi trạng thái đơn hang

        Route::get('favourite','UserFavouriteController@index')->name('get.user.favourite'); // sp yêu thích
        Route::get('favourite-delete/{id}','UserFavouriteController@delete')->name('get.user.favourite.delete'); // xoá sp yêu thích

        // Route::get('management-transaction','UserManagementTransaction@index')->name('get.user.management_transaction');

        Route::post('ajax-favourite/{idProduct}','UserFavouriteController@addFavourite')->name('ajax_get.user.add_favourite'); // thêm sp yêu thích
        Route::post('ajax-rating','UserRatingController@addRatingProduct')->name('ajax_post.user.rating.add'); // thêm dánh giá
        Route::post('captcha', 'CaptchaController@authCaptchaResume')->name('ajax_post.captcha.resume'); // validation capcha 
        Route::get('ajax-invoice-transaction/{id}','UserTransactionController@exportInvoiceTransaction')
			->name('ajax_get.user.invoice_transaction');
    });
