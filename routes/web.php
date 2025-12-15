<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\AdminsController;

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

// Public Routes
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about-us', [App\Http\Controllers\HomeController::class, 'company'])->name('company');
Route::get('/contact-us', [App\Http\Controllers\HomeController::class, 'contact_us'])->name('contact-us');
Route::get('/careers', [App\Http\Controllers\HomeController::class, 'careers'])->name('careers');
Route::get('/center-of-excellence', [App\Http\Controllers\HomeController::class, 'center_of_excellences'])->name('center-of-excellence');
Route::get('/center-of-excellence/{slung}', [App\Http\Controllers\HomeController::class, 'center_of_excellence'])->name('center-of-excellence-single');
Route::get('/portfolio', [App\Http\Controllers\HomeController::class, 'portfolio'])->name('portfolios');
Route::get('/portfolio/{single}', [App\Http\Controllers\HomeController::class, 'folio'])->name('portfolio');
Route::get('/copyright', [App\Http\Controllers\HomeController::class, 'copyright'])->name('copyright');
Route::get('/terms-and-conditions', [App\Http\Controllers\HomeController::class, 'terms_and_conditions'])->name('terms-and-conditions');
Route::get('/privacy-policy', [App\Http\Controllers\HomeController::class, 'privacy_policy'])->name('privacy-policy');
Route::get('/blog/{slung}', [App\Http\Controllers\HomeController::class, 'blogs'])->name('blogs');
Route::post('/submitMessage', [App\Http\Controllers\HomeController::class, 'submitMessage'])->name('submitMessage');

// SEO Routes
Route::get('/sitemap.xml', function() {
    return response()->file(public_path('sitemap.xml'));
})->name('sitemap');
Route::get('/robots.txt', function() {
    return response()->file(public_path('robots.txt'));
})->name('robots');

// Authentication Routes
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes (Protected)
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    // Dashboard
    Route::get('/', [AdminsController::class, 'index'])->name('admin.index');

    // RESTful Resource Routes
    Route::resource('blogs', BlogController::class)->names([
        'index' => 'admin.blogs.index',
        'create' => 'admin.blogs.create',
        'store' => 'admin.blogs.store',
        'edit' => 'admin.blogs.edit',
        'update' => 'admin.blogs.update',
        'destroy' => 'admin.blogs.destroy',
    ]);

    Route::resource('portfolios', PortfolioController::class)->names([
        'index' => 'admin.portfolios.index',
        'create' => 'admin.portfolios.create',
        'store' => 'admin.portfolios.store',
        'edit' => 'admin.portfolios.edit',
        'update' => 'admin.portfolios.update',
        'destroy' => 'admin.portfolios.destroy',
    ]);

    Route::resource('services', ServiceController::class)->names([
        'index' => 'admin.services.index',
        'create' => 'admin.services.create',
        'store' => 'admin.services.store',
        'edit' => 'admin.services.edit',
        'update' => 'admin.services.update',
        'destroy' => 'admin.services.destroy',
    ]);

    Route::resource('categories', CategoryController::class)->names([
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
    ]);

    Route::resource('clients', ClientController::class)->names([
        'index' => 'admin.clients.index',
        'create' => 'admin.clients.create',
        'store' => 'admin.clients.store',
        'edit' => 'admin.clients.edit',
        'update' => 'admin.clients.update',
        'destroy' => 'admin.clients.destroy',
    ]);

    // Messages Routes
    Route::get('messages', [MessageController::class, 'index'])->name('admin.messages.index');
    Route::get('messages/{message}', [MessageController::class, 'show'])->name('admin.messages.show');
    Route::post('messages/{message}/mark-read', [MessageController::class, 'markAsRead'])->name('admin.messages.mark-read');
    Route::post('messages/{message}/mark-unread', [MessageController::class, 'markAsUnread'])->name('admin.messages.mark-unread');
    Route::post('messages/mark-all-read', [MessageController::class, 'markAllAsRead'])->name('admin.messages.mark-all-read');
    Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('admin.messages.destroy');

    // Slider Routes
    Route::get('/slider', [AdminsController::class, 'slider'])->name('admin.slider.index');
    Route::get('/addSlider', [AdminsController::class, 'addSlider'])->name('admin.slider.create');
    Route::post('/add_Slider', [AdminsController::class, 'add_Slider'])->name('admin.slider.store');
    Route::get('/editSlider/{id}', [AdminsController::class, 'editSlider'])->name('admin.slider.edit');
    Route::post('/edit_Slider/{id}', [AdminsController::class, 'edit_Slider'])->name('admin.slider.update');
    Route::get('/deleteSlider/{id}', [AdminsController::class, 'deleteSlider'])->name('admin.slider.delete');

    // Site Settings Routes
    Route::get('/sitesettings', [AdminsController::class, 'sitesettings'])->name('admin.sitesettings.index');
    Route::post('/savesitesettings', [AdminsController::class, 'savesitesettings'])->name('admin.sitesettings.update');
});
