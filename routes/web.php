<?php

use App\Http\Controllers\DashboardContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataForNavbarController;
use App\Http\Controllers\DetailPesananController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\JenisCleaningController;
use App\Http\Controllers\MailDoneOrderController;
use App\Http\Controllers\MarketPesananController;
use App\Http\Controllers\MarketShoesController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PesananUpdateLessDataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserMarketShoesController;
use App\Http\Controllers\UserPesananViewController;
use App\Http\Controllers\ViewJenisSepatuAndCleaningController;
use App\Models\DetailPesanan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome' , [
        'title' => 'Shoes Clean-Landing Page'
    ]);
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard' , [DashboardController::class , 'dashboard'])->middleware('verified')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* Route market */
    Route::resource('/market_shoes', MarketShoesController::class)->except(['create']);
    Route::get('/user-market-shoes/{id}' , [UserMarketShoesController::class , 'view'])->name('user.market.view')->middleware('user_create_market');
    Route::get('/user-new-market' , [UserMarketShoesController::class , 'create']);
  

    /* Route Pesanan */
    Route::resource('/pesanan', PesananController::class)->except(['index' , 'show' , 'edit']);
    Route::put('/update_less_data/{kode_pesanan}', [PesananUpdateLessDataController::class , 'update_data'])->name('less_data');
    Route::post('/produk_pesanan', [DetailPesananController::class , 'store'])->name('sepatu');
    Route::get('/user-clean-shoe-orders' , [UserPesananViewController::class , 'view_orders'])->name('user.view.orders');
    Route::get('/user-end-shoe-orders/{kode_pesanan}' , [UserPesananViewController::class , 'end_orders'])->name('user.end.orders');
    Route::put('/user-cancel-shoe-orders/{pesanan}' , [UserPesananViewController::class , 'cancel_orders'])->name('cancel.user.orders');


    Route::middleware('from_user')->group(function() {
    
        /* Route show market pada halaman market */
    Route::get('/user-show-market/{market_shoe}' , [UserMarketShoesController::class , 'show_market'])->name('user.show.market');
    Route::get('/user-revenue-market/{market_shoe}' , [UserMarketShoesController::class , 'revenue_market'])->name('user.revenue.market');

    /* Route PDF revenue */
    Route::get('/market-revenue-pdf/{market_shoe}' , [UserMarketShoesController::class , 'generate_pdf'])->name('market.revenue.pdf');

         /* Route jenis cleaning */
     Route::resource('/jenis_cleaning' , JenisCleaningController::class)->except(['index' , 'show' , 'edit']);
   
     /* Route Aksi Pesanan */
     Route::get('/market-pending-order/{slug_id}' , [MarketPesananController::class , 'pending']);
     Route::get('/market-process-order/{slug_id}' , [MarketPesananController::class , 'process']);
     Route::get('/market-done-order/{slug_id}' , [MarketPesananController::class , 'done']);

    });

    /* Route buat cookie unread_notif */
    Route::get('/set-cookie-unread-notif' , [DataForNavbarController::class , 'readed_notif_cookies']);

    /* Route beri rating */
    Route::put('/rating/{id}' , [RatingController::class , 'rating'])->name('rating');

    /* Route Events */
    Route::resource('/all-event', EventController::class)->except('show');

    /* Route Jenis Sepatu And Cleaning But Only For View  */
    Route::get('/jenis-clean-sepatu' , [ViewJenisSepatuAndCleaningController::class , 'view'])->name('jenis.jenis');

    /* Route customize dashboard content */
    Route::put('/dashboard-content-admin/{the_id}' , [DashboardContentController::class , 'content']);
    
});

require __DIR__.'/auth.php';
