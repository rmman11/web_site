<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\FrontEnd\FrontController;
use App\Http\Controllers\FrontEnd\CartController;
use App\Http\Controllers\FrontEnd\EventsController;
use App\Http\Controllers\FrontEnd\ContactController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\FrontEnd\Profile2Controller;
use App\Models\User;






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



Route::get('/', [FrontController::class,'welcome'])->name('welcome');
Route::get('/show/{id}', [FrontController::class,'showInfo'])->name('showInfo');
Route::get('/about', [FrontController::class,'about'])->name('about');
Route::get('/contact', [FrontController::class ,'contact'])->name('contact');



///cart in the shopping online

Route::get('/cart', [CartController::class,'index'])->name("cart.index");
Route::get('/cart/delete', [CartController::class,'delete'])->name("cart.delete");
Route::post('/cart/add/{id}', [CartController::class,'add'])->name("cart.add");



//-------- routa de contact-------------//

Route::middleware(['auth'])->group(function () {


    Route::get('/home', [HomeController::class, 'home'])->name('home');
    
    Route::get('/faq', [HomeController::class,'faq'])->name('faq');
    Route::get('/cart/purchase', [CartController::class,'purchase'])->name("cart.purchase");
   Route::post('/mail', [ContactController::class, 'ContactUsForm'])->name('mail.store');
   Route::get('/mail', [ContactController::class,'index'])->name('mail');

   Route::get('profile2/{id}', [Profile2Controller::class,'profileFront'])->name('profile2');


});




Route::get('/dashboard', function () {

   $userData = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');

    return view('admin.dashboard',compact('userData'));   
})->middleware(['auth'])->name('dashboard');

//--------------routele de administrare---------------
      Route::prefix('admin')->middleware(['auth'])->group(function () {


        Route::get('/users', [UserController::class ,'showUsers'])->name('users');
        Route::get('/user-new', [UserController::class ,'newUser'])->name('user.new');
        Route::post('/user-new', [UserController::class ,'create'])->name('admin.user.create');


        Route::delete('/users/destroy/{id}', [UserController::class ,'destroy'])->name('users.destroy');

        Route::get('/user/show/{id}', [UserController::class ,'show'])->name('users.show');

        Route::get('/user/edit/{id}', [UserController::class ,'edit'])->name('users.edit');
        /*daca in route avem parametru id si in editare trebuie sa avem parametru id la action : $user->id*/
        Route::put('/user/edit/{id}', [UserController::class ,'update'])->name('users.update');

        Route::resource('/user', UserController::class);


        
              // CategoryController categories
              Route::get('/categories',[CategoriesController::class ,'index'])->name('categories.index');
              Route::delete('/categories', [CategoriesController::class ,'destroy'])->name('categories.destroy');
              Route::get('categories/edit/{id}', [CategoriesController::class, 'edit'])
              ->name('categories.edit');
              Route::put('categories/update/{id}',[CategoriesController::class, 'update'])->name('categories.update');

              Route::resource('/categories', CategoriesController::class);
              


              // Products
              Route::delete('products/destroy', [ProductController::class ,'destroy'])->name('products.destroy');
              Route::put('products/update/{id}',[ProductController::class, 'update'])->name('products.update');
              Route::resource('/products', ProductController::class);


              Route::get('tasks', [TaskController::class, 'index'])
              ->name('tasks.index');
                  
              Route::get('/tasks/create', [TaskController::class, 'create'])
              ->name('tasks.create');
          
              Route::post('/tasks', [TaskController::class, 'store'])
              ->name('tasks.store');
          
              Route::get('tasks/edit/{id}', [TaskController::class, 'edit'])
              ->name('tasks.edit');
              Route::put('tasks/update/{id}',[TaskController::class, 'update'])->name('tasks.update');
          
              
              Route::get('/show/{id}',[TaskController::class, 'show'])->name('tasks.show');
          
              Route::get('/cpuinfo', [PageController::class, 'cpuinfo'])->name('pages.cpuinfo');


              /*Excel import export*/
              Route::get('export', [PageController::class, 'export'])->name('export');
              Route::get('importExportView', [PageController::class, 'importExportView']);
              Route::get('/export',[PageController::class,'exportUsers'])->name('export');

              Route::post('import',   [PageController::class, 'import'])->name('import');
                            
              Route::get('/siteMap', [PageController::class, 'siteMap'])->name('pages.siteMap');

              Route::get('/chart', [ChartController::class, 'chart'])->name('pages.chart');
              
              Route::get('/calendar', [PageController::class, 'calendar'])->name('pages.calendar');

             Route::post('/fullcalenderAjax', [PageController::class, 'ajax']);


           //--------------------route videos play any video information----------------//
             Route::get('/videos', [VideoController::class , 'index'])->name('videos.index');
             Route::post('/uploadVideo', [VideoController::class ,'uploadVideo'])->name('upload');
             Route::delete('/videos/destroy/{id}', [VideoController::class ,'destroy'])->name('videos.destroy');


//-----------------route chart------------------------------//

  /*Route::get('stock/add',[StockController::class, 'create'])->name('pages.stock');
  Route::post('/stock',[StockController::class, 'store'])->name('stock.store');*/

  Route::get('/chart',[ChartController::class, 'chart'])->name('pages.chart');







             //-------------route order --------------//


             Route::get('/',[OrderController::class ,'index'])->name('orders.index');
              Route::delete('/order', [OrderController::class ,'destroy'])->name('orders.destroy');
              Route::resource('/order', OrderController::class);     
          
          //delete from table
              Route::delete('/tasks/destroy/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');




    });
    // <======= routele de administrare ======= 


    //--------- ruotele pentru utilizator------

    Route::prefix('admin')->middleware(['auth' ,'verified'])->group(function () {
        ///profile for user

        Route::get('/profile/{id}', [ProfileController::class ,'profile'])->name('profile');
        Route::put('/profile/{id}', [ProfileController::class ,'updateProfile'])->name('profile.update');
        Route::get('/settings',     [ProfileController::class ,'settings'])->name('settings');
      //routa pentru restarea parolei

      Route::put('reset-password' ,[ProfileController::class,'resetPassword'])->name('reset-password');

    });


require __DIR__.'/auth.php';

