<?php

//Home
Route::get('/','Homecontroller@index' );
Route::get('/trangchu','Homecontroller@index' );

Route::post('/tim-kiem','Homecontroller@search' );


//Home-Brand
Route::get('/thuong-hieu-san-pham/{brand_id}','Brandsproduct@show_brand_home' );
Route::get('/chi-tiet-san-pham/{product_id}','Productcontroller@detail_product' );

//Home-Cart
Route::post('/add-to-cart','Cartcontroller@save_cart' );
Route::post('/update-quantity','Cartcontroller@update_cart' );

Route::get('/gio-hang','Cartcontroller@show_cart' );
Route::get('/xoa-san-pham-gio-hang/{rowId}','Cartcontroller@delete_to_cart' );

//Home-Payment
Route::get('/dang-nhap-thanh-toan','Checkoutcontroller@login_checkout' );
Route::get('/thanh-toan','Checkoutcontroller@checkout' );
Route::get('/hinh-thuc-thanh-toan','Checkoutcontroller@save_payment' );

Route::post('/luu-thong-tin','Checkoutcontroller@save_order' );
Route::post('/login-customer','Checkoutcontroller@login_customer' );
Route::post('/save-checkout','Checkoutcontroller@save_checkout' );
Route::post('/add-customer','Checkoutcontroller@add_customer' );

//Admin
Route::get('/admin','Admincontroller@index' );
Route::get('/dashboard','Admincontroller@show_dashboard' );
Route::get('/logout','Admincontroller@logout' );

Route::post('/admin-dashboard','Admincontroller@dashboard' );

//Admin-Brand
Route::get('/add-brand-product','Brandsproduct@add_brand_product' );
Route::get('/list-brand-product','Brandsproduct@list_brand_product' );
Route::get('/edit-brand-product/{brand_id}','Brandsproduct@edit_brand_product' );
Route::get('/delete-brand-product/{brand_id}','Brandsproduct@delete_brand_product' );

Route::post('/save-brand-product','Brandsproduct@save_brand_product' );
Route::post('/update-brand-product/{brand_id}','Brandsproduct@update_brand_product' );

//Admin-Product
Route::get('/add-product','Productcontroller@add_product' );
Route::get('/list-product','Productcontroller@list_product' );
Route::get('/edit-product/{product_id}','Productcontroller@edit_product' );
Route::get('/delete-product/{product_id}','Productcontroller@delete_product' );

Route::post('/save-product','Productcontroller@save_product' );
Route::post('/update-product/{product_id}','Productcontroller@update_product' );

//Admin-Order
Route::get('/manager-order','Checkoutcontroller@manager_order' );
Route::get('/view-order','Checkoutcontroller@view_order' );

//Admin-Customer
Route::get('/manager-customer','Customercontroller@manager_customer' );

