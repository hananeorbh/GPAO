<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ArretController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ConsommationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RecetteController;



// Les routes sans middleware
Route::get('/', function () {
    return view('auth.login');
});

Route::get('admin', function () {
    return view('dashbords.admin');
});
Route::get('operateur', function () {
    return view('dashbords.operateur');
});
Route::get('responsable', function () {
    return view('dashbords.responsable');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('productions', ProductionController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('recettes', RecetteController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::view('ligne', 'livewire.ligne-component');
    Route::view('atelier', 'livewire.atelier-component');
    Route::view('catalog', 'livewire.catalog-component');
    Route::view('planning', 'livewire.planning-component');
    Route::view('cadence', 'livewire.cadence-component');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/get-lignes/{atelierId}', [ProductionController::class, 'getLignes']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/productions/{production}/declarer_arret', [ArretController::class, 'store'])->name('production.store');
    Route::resource('arrets', ArretController::class);});
  


    Route::resource('consommations', ConsommationController::class);
    Route::post('/consommation/{productionId}', [ConsommationController::class, 'store'])->name('consommation.store');

    Route::get('/get-articles-by-type', [ArticleController::class, 'getArticlesByType'])->name('get.articles.by.type');


 
 
    Route::get('/consommations-ip/{productionId}', [RecetteController::class, 'getConsommationsIp'])->name('consommations-ip');
    Route::get('/consommations-ip/{productionId}/{articleId}', [RecetteController::class, 'getConsommationDetails'])->name('consommations-ip.details');
    