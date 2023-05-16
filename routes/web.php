<?php

Route::prefix('ustora')->group(function () {
    Route::get('/','AdminController@index')->name('ustora.index');
    Route::resource('/pro/tivi','ProTiviController');
    Route::resource('/pro/phone','ProPhoneController');
    Route::resource('/pro/laptop','ProLaptopController');
});
//login_quan-tri
Route::get('/quan-tri/login','LoginController@formLogin')->name('quan-tri.dang-nhap');
Route::post('/quan-tri/login','LoginController@postlogin')->name('quan-tri.postlogin');
Route::get('/quan-tri/logout','LoginController@logout')->name('quan-tri.dang_xuat');

//login_khachhang
Route::get('/ustora/login','LoginCustomerController@formLogin')->name('ustora.customer_login');
Route::post('/ustora/login','LoginCustomerController@postLogin')->name('ustora.postlogin_customer');
Route::get('/ustora/logout','LoginCustomerController@logout')->name('ustora.customer_logout');

//đăng ký khách hàng
Route::get('/ustora/register','RegisterCustomerController@formRegister')->name('ustora.show_customer_register');
Route::post('/ustora/register','RegisterCustomerController@postRegister')->name('ustora.register_customer');

// Hiển thị đơn hàng của khách hàng
Route::group(['prefix' => 'ustora/order_by_customer','middleware'=> ['auth:customer']],function () {

// Hiển thị trang thống kê đơn hàng
    Route::get('/','OrderCustomerController@show_order_by_customer')->name('ustora.order_by_customer');

//Hiển thị đơn hàng mới
    Route::get('/new','OrderCustomerController@show_new')->name('order_by_customer.new');

//Hiển thị đơn hàng đang xử lý
    Route::get('/processing','OrderCustomerController@show_processing')->name('order_by_customer.processing');

//Hiển thị đơn hàng đã xác nhận
    Route::get('/confirmed','OrderCustomerController@show_confirmed')->name('order_by_customer.confirmed');

//Hiển thị đơn hàng đang vận chuyển
    Route::get('/shipping','OrderCustomerController@show_shipping')->name('order_by_customer.shipping');

//Hiển thị đơn hàng giao hàng thành công
    Route::get('/successful_delivery','OrderCustomerController@show_successful_delivery')->name('order_by_customer.successful_delivery');

});
//sản phẩm đặc biêệt
Route::prefix('/ustora/special-product')->group(function () {

//Hiển thị trang sản phẩm Top Seller
    Route::get('/top-new','SpecialProductController@show_top_new')->name('special_product.top_new');

//Hiển thị trang sản phẩm Top New
    Route::get('/top-hot','SpecialProductController@show_top_hot')->name('special_product.top_hot');

//Hiển thị trang sản phẩm Top Hot
    Route::get('/top-seller','SpecialProductController@show_top_seller')->name('special_product.top_seller');

});

//Hiển thi trang Tivi
Route::prefix('/ustora/category-tivi')->group(function () {
    Route::get('/','CatTiviController@index');
    Route::get('/','CatTiviController@show_brand');

});


//Hiển thị trang Phone
Route::prefix('/ustora/category-phone')->group(function () {
    Route::get('/','CatPhoneController@index');
    Route::get('/','CatPhoneController@show_brand');
});

//Hiển thị trang Laptop
Route::prefix('/ustora/category-laptop')->group(function () {
    Route::get('/','CatLaptopController@index');
    Route::get('/','CatLaptopController@show_brand');
});

//Hiển thị trang watch
Route::prefix('/ustora/category-watch')->group(function () {
    Route::get('/','CatWatchController@index');
    Route::get('/','CatWatchController@show_brand');
});

//Hiển thị trang Accessories
Route::prefix('/ustora/category-accessory')->group(function () {
    Route::get('/','CatAccessoryController@index');
    Route::get('/','CatAccessoryController@show_brand');
});

//Hiển thị trang Sounds
Route::prefix('/ustora/category-sound')->group(function () {
    Route::get('/','CatSoundController@index');
    Route::get('/','CatSoundController@show_brand');
});

//Hiển thi trang Product theo Brand
Route::get('/ustora/product_of_brand/with_brand/{id}','BrandProductController@products')->name('brand_of_product.name');
Route::get('/brands/{id}', 'BrandProductController@show')->name('brand_of_product.show');
//Hiển thị trang SingleProduct
Route::get('/ustora/single-product/{id}','SingleProductController@show')->name('single-product.show');
Route::post('/ustora/single-product/{id}','SingleProductController@submitRating')->name('single-product.review.submit');
Route::group(['prefix' => 'ustora','middleware'=> ['auth:customer']],function (){
    //Cart
    Route::get('/cart','CartController@show_cart')->name('cart.index');
    Route::post('/cart/add', 'CartController@addProduct')->name('cart.add');
    Route::post('/cart/update', 'CartController@updateCart')->name('cart.update');
    Route::post('/cart/delete', 'CartController@delete')->name('cart.delete');
    Route::post('/cart/save', 'CartController@saveCart')->name('cart.save');
    // Checkout
    Route::get('/order','OrderProductController@show_order')->name('order.index');
    Route::post('/order/save', 'CartController@order_by_cart')->name('order.save');
});
//Cart
Route::group(['prefix' => 'quan-tri','middleware'=>'auth'],function () {

//Quản trị
    Route::get('/','QuantriController@index')->name('quan-tri.admin');
//Brand
   Route::group(['prefix' => 'brand'],function (){
           Route::get('/','BrandController@index')->middleware('check.role.id:1,2');
           Route::get('/create','BrandController@show_create_brand')->middleware('check.role.id:1,2');
           Route::post('/create','BrandController@create_brand')->name('brand.create-brand');
           Route::get('/destroy/{id}','BrandController@destroy')->name('brand.delete')->middleware('check.role.id:1,2');
           Route::get('/edit/{id}','BrandController@edit')->name('brand.edit')->middleware('check.role.id:1,2');
           Route::put('/edit/{id}','BrandController@update')->name('brand.update-brand');
   });

    // Category

    Route::group(['prefix' => 'category'],function (){

        Route::get('/','CategoryController@index')->middleware('check.role.id:1,2');
        Route::get('/create','CategoryController@show_create_category')->middleware('check.role.id:1,2');
        Route::post('/create','CategoryController@create_category')->name('category.create-category');
        Route::get('/destroy/{id}','CategoryController@destroy')->name('category.delete')->middleware('check.role.id:1,2');
        Route::get('/edit/{id}','CategoryController@edit')->name('category.edit')->middleware('check.role.id:1,2');
        Route::put('/edit/{id}','CategoryController@update')->name('category.update-category');
    });

//Order

    Route::group(['prefix' => 'order'],function (){
        Route::get('/','OrderController@index')->middleware('check.role.id:1,2');
        Route::get('/create','OrderController@show_create_order')->middleware('check.role.id:1,2');
        Route::post('/create','OrderController@create_order')->name('order.create-order');
        Route::get('/destroy/{id}','OrderController@destroy')->name('order.delete')->middleware('check.role.id:1,2');
        Route::get('/edit/{id}','OrderController@edit')->name('order.edit')->middleware('check.role.id:1,2');
        Route::get('/more_info/{id}','OrderController@more_info')->name('order.more_info')->middleware('check.role.id:1,2');
        Route::put('/edit/{id}','OrderController@update')->name('order.update-order');
    });

//Contact

    Route::group(['prefix' => 'customer'],function (){
        Route::get('/','ContactController@index')->middleware('check.role.id:1,2');
        Route::get('/destroy/{id}','ContactController@destroy')->name('customer.delete')->middleware('check.role.id:1,2');

    });
//User
    Route::group(['prefix' => 'user'],function (){
        Route::get('/','UserController@index')->middleware('check.role.id:1');
        Route::get('/create','UserController@show_create_user')->middleware('check.role.id:1');
        Route::post('/create','UserController@create_user')->name('user.create-user');
        Route::get('/destroy/{id}','UserController@destroy')->name('user.delete')->middleware('check.role.id:1');
        Route::get('/edit/{id}','UserController@edit')->name('user.edit')->middleware('check.role.id:1');
        Route::put('/edit/{id}','UserController@update')->name('user.update-user');
    });

//Product

    Route::group(['prefix' => 'product'],function (){
        Route::get('/','ProductController@index')->middleware('check.role.id:1,2');
        Route::get('/create','ProductController@show_create_product')->middleware('check.role.id:1,2');
        Route::post('/create','ProductController@create_product')->name('product.create-product');
        Route::get('/destroy/{id}','ProductController@destroy')->name('product.delete')->middleware('check.role.id:1,2');
        Route::get('/edit/{id}','ProductController@edit')->name('product.edit')->middleware('check.role.id:1,2');
        Route::put('/edit/{id}','ProductController@update')->name('product.update-product');
    });


//Content

    Route::group(['prefix' => 'content'],function (){
        Route::get('/','ContentController@index')->middleware('check.role.id:1,2');
        Route::get('/create','ContentController@show_create_content')->middleware('check.role.id:1,2');
        Route::post('/create','ContentController@create_brand')->name('content.create-content');
        Route::get('/edit/{id}','ContentController@edit')->name('content.edit')->middleware('check.role.id:1,2');
        Route::put('/edit/{id}','ContentController@update')->name('content.update-brand');
    });


//Rating

    Route::group(['prefix' => 'rating'],function (){
        Route::get('/','RatingController@index')->middleware('check.role.id:1,2');
        Route::get('/create','RatingController@show_create_rating')->middleware('check.role.id:1,2');
        Route::post('/create','RatingController@create_rating')->name('rating.create-rating');
        Route::get('/destroy/{id}','RatingController@destroy')->name('rating.delete')->middleware('check.role.id:1,2');
        Route::get('/edit/{id}','RatingController@edit')->name('rating.edit')->middleware('check.role.id:1,2');
        Route::put('/edit/{id}','RatingController@update')->name('rating.update-rating');
    });


//Vendor

    Route::group(['prefix' => 'vendor'],function (){
        Route::get('/','VendorController@index')->middleware('check.role.id:1,2');
        Route::get('/create','VendorController@show_create_vendor')->middleware('check.role.id:1,2');
        Route::post('/create','VendorController@create_vendor')->name('vendor.create-vendor');
        Route::get('/destroy/{id}','VendorController@destroy')->name('vendor.delete')->middleware('check.role.id:1,2');
        Route::get('/edit/{id}','VendorController@edit')->name('vendor.edit')->middleware('check.role.id:1,2');
        Route::put('/edit/{id}','VendorController@update')->name('vendor.update-vendor');
    });

//Article

    Route::group(['prefix' => 'article'],function (){
        Route::get('/','ArticleController@index')->middleware('check.role.id:1,2');
        Route::get('/create','ArticleController@show_create_article')->middleware('check.role.id:1,2');
        Route::post('/create','ArticleController@create_article')->name('article.create-article');
        Route::get('/destroy/{id}','ArticleController@destroy')->name('article.delete')->middleware('check.role.id:1,2');
        Route::get('/edit/{id}','ArticleController@edit')->name('article.edit')->middleware('check.role.id:1,2');
        Route::put('/edit/{id}','ArticleController@update')->name('article.update-article');
    });

//Banner

    Route::group(['prefix' => 'banner'],function (){
        Route::get('/','BannerController@index')->middleware('check.role.id:1,2');
        Route::get('/create','BannerController@show_create_banner')->middleware('check.role.id:1,2');
        Route::post('/create','BannerController@create_banner')->name('banner.create-banner');
        Route::get('/destroy/{id}','BannerController@destroy')->name('banner.delete')->middleware('check.role.id:1,2');
        Route::get('/edit/{id}','BannerController@edit')->name('banner.edit')->middleware('check.role.id:1,2');
        Route::put('/edit/{id}','BannerController@update')->name('banner.update-banner');
    });

//Coupon

    Route::group(['prefix' => 'coupon'],function (){
        Route::get('/',' CouponController@index')->middleware('check.role.id:1,2');
        Route::get('/create','CouponController@show_create_coupon')->middleware('check.role.id:1,2');
        Route::post('/create','CouponController@create_coupon')->name('coupon.create-coupon');
        Route::get('/destroy/{id}','CouponController@destroy')->name('coupon.delete')->middleware('check.role.id:1,2');
        Route::get('/edit/{id}','CouponController@edit')->name('coupon.edit')->middleware('check.role.id:1,2');
        Route::put('/edit/{id}','CouponController@update')->name('coupon.update-coupon');
    });


//Role

    Route::group(['prefix' => 'role'],function (){
        Route::get('/','RoleController@index')->middleware('check.role.id:1');
        Route::get('/create','RoleController@show_create_role')->middleware('check.role.id:1');
        Route::post('/create','RoleController@create_role')->name('role.create-role');
        Route::get('/destroy/{id}','RoleController@destroy')->name('role.delete')->middleware('check.role.id:1');
        Route::get('/edit/{id}','RoleController@edit')->name('role.edit')->middleware('check.role.id:1');
        Route::put('/edit/{id}','RoleController@update')->name('role.update-role');
    });
//tìm kiếm

    Route::get('/search', 'SearchController@search')->name('search');

//List_customer

    Route::group(['prefix' => 'list_customer'],function (){
        Route::get('/',' RegisterCustomerController@index');
        Route::get('/destroy/{id}','RegisterCustomerController@destroy')->name('list_customer.delete');
    });

});
