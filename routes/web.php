<?php

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

Auth::routes();

Route::group(['namespace' => 'Admin'], function()
{
    # Dashboard page route
    Route::get('/admin/dashboard', 'DashboardController@dashboard')->name('admin.dashboard');

    # Dropshipper
    Route::get('/admin/dropshipper', 'DashboardController@dropshipper')->name('admin.dropshipper');
    Route::get('/admin/dropshipper/{id}','DashboardController@dropshipperDetail')->name('admin.dropshipper.details');
    Route::get('/admin/dropshipper/transactions/{id}','DashboardController@dropshipperTransaction')->name('admin.dropshipper.transactions');
    Route::get('/admin/dropshipper/password/{id}','DashboardController@dropshipperPassword')->name('admin.dropshipper.password');
    Route::post('/admin/dropshipper/password/update/{id}','DashboardController@passwordUpdate')->name('admin.dropshipper.password.update');

    # Toko
    Route::get('/admin/toko','DashboardController@toko')->name('admin.toko');
    # Supplier
    Route::get('/admin/supplier','DashboardController@supplier')->name('admin.supplier');
    # Withdraws
    Route::get('/admin/withdraw','DashboardController@withdraw')->name('admin.withdraw');
    # Category
    Route::get('/admin/category','DashboardController@category')->name('admin.category');
    Route::get('/admin/category/create','CategoryController@create')->name('admin.category.create');
    Route::get('/admin/category/edit/{id}','CategoryController@edit')->name('admin.category.edit');
    Route::post('/admin/category/store','CategoryController@store')->name('admin.category.store');
    Route::post('/admin/category/update/{id}','CategoryController@update')->name('admin.category.update');
    Route::get('/admin/category/delete/{id}','CategoryController@delete')->name('admin.category.delete');
    # Design
    Route::get('/admin/design','DashboardController@design')->name('admin.design');
    # Testimony
    Route::get('/admin/testimony','DashboardController@testimony')->name('admin.testimony');
    # Variant
    Route::get('/admin/variant','DashboardController@variant')->name('admin.variant');
    Route::get('/admin/variant/create','VariantController@variantCreate')->name('admin.variant.create');
    Route::get('/admin/variant/edit/{id}','VariantController@variantEdit')->name('admin.variant.edit');
    Route::post('/admin/variant/store','VariantController@variantStore')->name('admin.variant.store');
    Route::post('/admin/variant/update/{id}','VariantController@variantUpdate')->name('admin.variant.update');
    Route::get('/admin/variant/delete/{id}','VariantController@variantDelete')->name('admin.variant.delete');
    # Logs
    Route::get('/admin/logs','DashboardController@logs')->name('admin.logs');
    # Mutation
    Route::get('/admin/mutation','DashboardController@mutation')->name('admin.mutation');
    # Settings
    Route::get('/admin/settings','DashboardController@settings')->name('admin.settings');
});

Route::group(['namespace' => 'Suppliers'], function()
{
    # Dashboard page route
    Route::get('/supplier/dashboard', 'DashboardController@dashboard')->name('supplier.dashboard');

    # Product
    Route::get('/supplier/product','DashboardController@product')->name('supplier.product');

    # Order
    Route::get('/supplier/orders','DashboardController@orders')->name('supplier.orders');

    # Transaction History
    Route::get('/supplier/history','DashboardController@transactionHistory')->name('supplier.history');

    # Withdraw
    Route::get('/supplier/withdraw','DashboardController@withdraw')->name('supplier.withdraw');

    # Profile
    Route::get('/supplier/profile','DashboardController@profile')->name('supplier.profile');
});

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/home', function () {
    if(Auth::check())
    {
        if(Auth::user()->isAdmin()) {
            return redirect('admin/dashboard');
        } else if(Auth::user()->isSupplier()) {
            return redirect('supplier/dashboard');
        } else {
            return redirect('https://pvotdigital.com');
        }
    } else {
        return redirect('/login');
    }
});
