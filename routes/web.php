<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceDetailController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [InvoiceDetailController::class, 'create']);

Route::post('/get_product_detail', [InvoiceDetailController::class, 'productdatafetach']);

Route::post('/data_store_session', [InvoiceDetailController::class, 'data_store_session']);

Route::get('/delete/{id}', [InvoiceDetailController::class, 'delete_data']);