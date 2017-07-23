<?php
//use Spatie\Analytics\Period;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    /**
     * Authentication routes
     */
    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::get('/', 'AuthController@getIndex');
        Route::get('/login', 'AuthController@getIndex');
        Route::post('/login', 'AuthController@postLogin')->name('admin.login');
        Route::get('/logout', 'AuthController@getLogout')->name('admin.logout');
    });

    Route::group(['middleware' => 'auth.admin'], function () {
        /*
        * home route
        */
        Route::get('/', ['as' => 'admin.home', 'uses' => 'HomeController@getIndex']);

        /*
         * settings routes
         */
        Route::group(['prefix' => 'settings'], function () {
            Route::get('/', ['as' => 'admin.settings', 'uses' => 'SettingController@getIndex']);
            Route::post('/', ['as' => 'admin.settings', 'uses' => 'SettingController@postIndex']);
            Route::get('/map', ['as' => 'admin.settings.map', 'uses' => 'SettingController@getMap']);
            Route::post('/map', ['as' => 'admin.settings.map', 'uses' => 'SettingController@postMap']);
        });

        /*
         * profile routes
         */
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', ['as' => 'admin.profile', 'uses' => 'ProfileController@getIndex']);
            Route::post('/', ['as' => 'admin.profile', 'uses' => 'ProfileController@postIndex']);
        });

        /**
         * subscribers routes
         */
        Route::group(['prefix' => 'subscribers'], function () {
            Route::get('/', 'SubscriberController@getIndex')->name('admin.subscribtions.index');
            Route::post('/send', 'SubscriberController@postSend')->name('admin.subscribtions.send');
            Route::post('/action/{action}', 'SubscriberController@postAction');
            Route::get('/filter/{filter}', 'SubscriberController@getFilter');
            Route::get('/search/{q?}', 'SubscriberController@getSearch');
            Route::get('/delete/{id}', 'SubscriberController@getDelete')->name('admin.subscribtions.delete');
        });

        /*
         * Contact us routes
         */
        Route::group(['prefix' => 'contact-us'] ,function (){
            Route::get('/', ['as' => 'admin.contact' ,'uses' => 'ContactUsController@getIndex']);
            Route::post('/', ['as' => 'admin.contact.add' ,'uses' => 'ContactUsController@postIndex']);
            Route::get('/edit/{id}', ['as' => 'admin.contact.edit' ,'uses' => 'ContactUsController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.contact.edit' ,'uses' => 'ContactUsController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.contact.delete' ,'uses' => 'ContactUsController@getDelete']);
        });

        /*
         * Category Routes
         */
        Route::group(['prefix' => 'category'] ,function (){
            Route::get('/',['as' => 'admin.category' ,'uses' => 'CategoryController@getIndex']);
            Route::post('/',['as' => 'admin.category' ,'uses' => 'CategoryController@postIndex']);
            Route::post('/main',['as' => 'admin.category.main' ,'uses' => 'CategoryController@postMain']);
            Route::get('/edit/{id}',['as' => 'admin.category.edit','uses' => 'CategoryController@getEdit']);
            Route::post('/edit/{id}',['as' => 'admin.category.edit','uses' => 'CategoryController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.category.delete' ,'uses' => 'CategoryController@getDelete']);
        });

        /*
         *Types Routes
         */
        Route::group(['prefix' => 'types'],function (){
            Route::get('/{id}',['as' => 'admin.types' ,'uses' => 'TypeController@getIndex']);
            Route::post('/{id}' ,['as' => 'admin.types' ,'uses' => 'TypeController@postIndex']);
            Route::get('/edit/{id}' ,['as' => 'admin.types.edit','uses' => 'TypeController@getEdit']);
            Route::post('/edit/{id}' ,['as' => 'admin.types.edit','uses' => 'TypeController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.types.delete','uses' => 'TypeController@getDelete']);
        });

        /*
         * About routes
         */
        Route::group(['prefix' => 'about-us'] ,function (){
            Route::get('/' ,['as' => 'admin.about' ,'uses' => 'AboutController@getIndex']);
            Route::get('/edit/{id}' ,['as' => 'admin.about.edit' ,'uses' => 'AboutController@getEdit']);
            Route::post('/edit/{id}' ,['as' => 'admin.about.edit' ,'uses' => 'AboutController@postIndex']);
        });

        /*
         * Social links routes
         */
        Route::group(['prefix' => 'social-links'] ,function (){
            Route::get('/' ,['as' => 'admin.social' ,'uses' => 'SocialLinksController@getIndex']);
            Route::get('/edit/{id}' ,['as' => 'admin.social.edit' ,'uses' => 'SocialLinksController@getEdit']);
            Route::post('/' ,['as' => 'admin.social.add' ,'uses' => 'SocialLinksController@postIndex']);
            Route::post('/edit/{id}' ,['as' => 'admin.social.edit' ,'uses' => 'SocialLinksController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.social.delete' ,'uses' => 'SocialLinksController@getDelete']);
        });
        /*
         * Package routes
         */
        Route::group(['prefix' => 'packages'] ,function (){
            Route::get('/' ,['as' => 'admin.package' ,'uses' => 'PackageController@getIndex']);
            Route::post('/' ,['as' => 'admin.package' ,'uses' => 'PackageController@postIndex']);
        });

        /*
         * Chunks routes
         */
        Route::group(['prefix' => 'chunks'] ,function (){
            Route::get('/' ,['as' => 'admin.chunk' ,'uses' => 'ChunckController@getIndex']);
            Route::post('/' ,['as' => 'admin.chunk' ,'uses' => 'ChunckController@postIndex']);
        });
        /*
         * Blog category routes
         */
        Route::group(['prefix' => 'blogs-category'] ,function (){
            Route::get('/' ,['as' => 'admin.blogcat' ,'uses' => 'BlogController@getIndex']);
            Route::get('/edit/{id}' ,['as' => 'admin.blogcat.edit' ,'uses' => 'BlogController@getEdit']);
            Route::post('/' ,['as' => 'admin.blogcat' ,'uses' => 'BlogController@postIndex']);
            Route::post('/edit/{id}' ,['as' => 'admin.blogcat.edit' ,'uses' => 'BlogController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.blogcat.delete' ,'uses' => 'BlogController@getDelete']);
        });

        /*
         * Blogs routes
         */
        Route::group(['prefix' => 'blogs'] ,function (){
            Route::get('/' ,['as' => 'admin.blog' ,'uses' => 'BlogController@getBlogs']);
            Route::post('/' ,['as' => 'admin.blog' ,'uses' => 'BlogController@postBlog']);
            Route::get('/edit/{id}' ,['as' => 'admin.blog.edit' ,'uses' => 'BlogController@getEditBlog']);
            Route::post('/edit/{id}' ,['as' => 'admin.blog.edit' ,'uses' => 'BlogController@postEditBlog']);
            Route::get('/delete/{id}' ,['as' => 'admin.blog.delete' ,'uses' => 'BlogController@getDeleteBlog']);
        });

        /*
         * users routes
         */
        Route::group(['prefix' => 'members'] ,function (){
            Route::get('/' ,['as' => 'admin.member' ,'uses' => 'MemberController@getIndex']);
            Route::post('/' ,['as' => 'admin.member' ,'uses' => 'MemberController@postIndex']);
            Route::get('/edit/{id}' ,['as' => 'admin.member.edit' ,'uses' => 'MemberController@getEdit']);
            Route::post('/edit/{id}' ,['as' => 'admin.member.edit' ,'uses' => 'MemberController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.member.delete' ,'uses' => 'MemberController@getDelete']);
            Route::post('/condition' ,['as' => 'admin.member.condition' ,'uses' =>'MemberController@postChangeCondition']);
        });

        /*
         * Ads routes
         */
        Route::group(['prefix' => 'ads'] ,function (){
            Route::get('/' ,['as' => 'admin.ads' ,'uses' => 'AdsController@getIndex']);
            Route::get('/delete/{id}' ,['as' => 'admin.ads.delete' ,'uses' => 'AdsController@getDelete']);
            Route::post('/condition' ,['as' => 'admin.ad.condition' ,'uses' => 'AdsController@postChangeStatus']);
        });
    });
});

/////////////////////////////// site routes ////////////////////////////////////
Route::group(['namespace' => 'Site'] ,function (){
    /**
     * Auth Route
     */
    Route::group(['prefix'=>'auth'],function (){
        Route::get('/','AuthController@getLogin')->name('site.login');
        Route::get('/login','AuthController@getLogin')->name('site.login');
        Route::post('/login','AuthController@postLogin')->name('site.login');
        Route::get('/register','AuthController@getRegister')->name('site.register');
        Route::post('/register','AuthController@postRegister')->name('site.register');
        Route::get('/logout','AuthController@logout')->name('site.logout');

        Route::get('/confirm/{username}','AuthController@getConfirm')->name('site.confirm');
        Route::post('/confirm/{username}','AuthController@postConfirm')->name('site.confirm');
    });

    /*
     * home routes
     */
    Route::get('/' ,['as' => 'site.home' , 'uses' => 'HomeController@getIndex']);
    Route::post('/subscribe', 'HomeController@postSubscribe')->name('site.subscribe');


    /*
     * Category Routes
     */
    Route::get('/category/{slug}' ,['as' => 'site.category' ,'uses' => 'CategoryController@getIndex']);

    /*
     * Wishlist routes
     */
    Route::post('wishlist' ,['as' => 'site.wishlist' ,'uses' => 'WishlistController@postIndex']);

    /*
     * public profile routes
     */
    Route::get('/public-profile/{username}' ,['as' => 'site.profile.public' ,'uses' => 'PublicController@getIndex']);
    Route::get('/public-ads/{username}' ,['as' => 'site.profile.ads' ,'uses' => 'PublicController@getAds']);
    Route::get('/public-contact/{username}' ,['as' => 'site.profile.contact' ,'uses' => 'PublicController@getContact']);
    Route::post('/public-contact/{username}' ,['as' => 'site.profile.contact' ,'uses' => 'PublicController@postContact']);


    /**
     * middleware Route
     */
    Route::group(['middleware'=>'auth.site'],function (){

    });

});
