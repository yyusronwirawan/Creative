<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PageController@home');
Route::get('tentang-kami', 'PageController@tentang_kami');

Route::group(['prefix' => 'lakucreative-admin'], function () {
    Route::get('/', function () {
        return redirect('lakucreative-admin/login');
    });
    Route::get('login', 'Admin\AuthController@checkLogin');
    Route::post('auth/login', 'Admin\AuthController@login');
    Route::get('auth/logout', 'Admin\AuthController@logout');

    Route::group(['middleware' => ['checksession']], function () {
        Route::get('dashboard', 'Admin\DashboardController@view');
        Route::get('dashboard/report_product', 'Admin\DashboardController@report_product');
        Route::post('dashboard/export_report_product', 'Admin\DashboardController@export_report_product');

        Route::get('banner', 'Admin\BannerController@view')
            ->name('banner_view');
        Route::get('banner/create', 'Admin\BannerController@create');
        Route::get('banner/edit/{id}', 'Admin\BannerController@edit');
        Route::post('banner/insert', 'Admin\BannerController@insert');
        Route::post('banner/update', 'Admin\BannerController@update');
        Route::get('banner/delete/{id}', 'Admin\BannerController@delete');
        Route::get('banner/status/{id}/{status}', 'Admin\BannerController@status');
        Route::post('banner/update_sort', 'Admin\BannerController@update_sort');

        Route::get('tentang_kami', 'Admin\TentangKamiController@view')
            ->name('tentang_kami_view');
        Route::get('tentang_kami/create', 'Admin\TentangKamiController@create');
        Route::get('tentang_kami/edit/{id}', 'Admin\TentangKamiController@edit');
        Route::post('tentang_kami/insert', 'Admin\TentangKamiController@insert');
        Route::post('tentang_kami/update', 'Admin\TentangKamiController@update');
        Route::get('tentang_kami/delete/{id}', 'Admin\TentangKamiController@delete');
        Route::get('tentang_kami/status/{id}/{status}', 'Admin\TentangKamiController@status');
        Route::post('tentang_kami/update_sort', 'Admin\TentangKamiController@update_sort');

        Route::get('cara_kerja', 'Admin\CaraKerjaController@view')
            ->name('cara_kerja_view');
        Route::get('cara_kerja/create', 'Admin\CaraKerjaController@create');
        Route::get('cara_kerja/edit/{id}', 'Admin\CaraKerjaController@edit');
        Route::post('cara_kerja/insert', 'Admin\CaraKerjaController@insert');
        Route::post('cara_kerja/update', 'Admin\CaraKerjaController@update');
        Route::get('cara_kerja/delete/{id}', 'Admin\CaraKerjaController@delete');
        Route::get('cara_kerja/status/{id}/{status}', 'Admin\CaraKerjaController@status');
        Route::post('cara_kerja/update_sort', 'Admin\CaraKerjaController@update_sort');

        Route::get('bank', 'Admin\BankController@view')
            ->name('bank_view');
        Route::get('bank/create', 'Admin\BankController@create');
        Route::get('bank/edit/{id}', 'Admin\BankController@edit');
        Route::post('bank/insert', 'Admin\BankController@insert');
        Route::post('bank/update', 'Admin\BankController@update');
        Route::get('bank/delete/{id}', 'Admin\BankController@delete');
        Route::get('bank/status/{id}/{status}', 'Admin\BankController@status');
        Route::post('bank/update_sort', 'Admin\BankController@update_sort');

        Route::get('social_media', 'Admin\SocialMediaController@view')
            ->name('social_media_view');
        Route::get('social_media/create', 'Admin\SocialMediaController@create');
        Route::get('social_media/edit/{id}', 'Admin\SocialMediaController@edit');
        Route::post('social_media/insert', 'Admin\SocialMediaController@insert');
        Route::post('social_media/update', 'Admin\SocialMediaController@update');
        Route::get('social_media/delete/{id}', 'Admin\SocialMediaController@delete');
        Route::get('social_media/status/{id}/{status}', 'Admin\SocialMediaController@status');
        Route::post('social_media/update_sort', 'Admin\SocialMediaController@update_sort');

        Route::get('design', 'Admin\DesignController@view')
            ->name('design_view');
        Route::get('design/create', 'Admin\DesignController@create');
        Route::get('design/edit/{id}', 'Admin\DesignController@edit');
        Route::post('design/insert', 'Admin\DesignController@insert');
        Route::post('design/update', 'Admin\DesignController@update');
        Route::get('design/delete/{id}', 'Admin\DesignController@delete');
        Route::get('design/status/{id}/{status}', 'Admin\DesignController@status');
        Route::post('design/update_sort', 'Admin\DesignController@update_sort');


        Route::get('about', 'Admin\DashboardController@about')
            ->name('about_view');
        Route::post('about/update', 'Admin\DashboardController@about_update');

        Route::get('company_data', 'Admin\DashboardController@company_data')
            ->name('company_data_view');
        Route::post('company_data/update', 'Admin\DashboardController@company_data_update');

        Route::get('hubungi_kami', 'Admin\DashboardController@hubungi_kami')
            ->name('hubungi_kami_view');
        Route::post('hubungi_kami/update', 'Admin\DashboardController@hubungi_kami_update');


        Route::get('testimonial', 'Admin\TestimonialController@view')
            ->name('testimonial_view');
        Route::get('testimonial/create', 'Admin\TestimonialController@create');
        Route::get('testimonial/edit/{id}', 'Admin\TestimonialController@edit');
        Route::post('testimonial/insert', 'Admin\TestimonialController@insert');
        Route::post('testimonial/update', 'Admin\TestimonialController@update');
        Route::get('testimonial/delete/{id}', 'Admin\TestimonialController@delete');
        Route::get('testimonial/status/{id}/{status}', 'Admin\TestimonialController@status'); 

        Route::get('change-password', 'Admin\AuthController@changePassword')->name('change_password_view');
        Route::post('auth/update', 'Admin\AuthController@updatePassword');

        Route::get('metadata', 'Admin\MetadataController@view')
            ->name('metadata_view');
        Route::get('metadata/create', 'Admin\MetadataController@create');
        Route::get('metadata/edit/{id}', 'Admin\MetadataController@edit');
        Route::post('metadata/update', 'Admin\MetadataController@update');
        Route::post('metadata/insert', 'Admin\MetadataController@insert');

        Route::post('logo/update', 'Admin\DashboardController@logo_update');

        Route::get('menu/create', 'Admin\MenuController@create');
        Route::get('menu/edit/{id}', 'Admin\MenuController@edit');
        Route::post('menu/insert', 'Admin\MenuController@insert');
        Route::post('menu/update', 'Admin\MenuController@update');
        Route::get('menu/delete/{id}', 'Admin\MenuController@delete');
        Route::get('menu/status/{id}/{status}', 'Admin\MenuController@status');
        Route::post('menu/update_sort', 'Admin\MenuController@update_sort');

        Route::get('admin_color', 'Admin\DashboardController@admin_color')
            ->name('admin_color_view');
        Route::post('admin_color/update', 'Admin\DashboardController@update_admin_color');

        Route::get('mengapa', 'Admin\DashboardController@mengapa')
            ->name('mengapa_view');
        Route::post('mengapa/update', 'Admin\DashboardController@update_mengapa');
    });
});
