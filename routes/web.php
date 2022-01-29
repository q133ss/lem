<?php

use Illuminate\Support\Facades\Route;
Auth::routes();

Route::get('/', function(){
    $locale = session()->get('lang', app()->currentLocale());
    return redirect()->route('home', $locale);
});
Route::group([
    'prefix'        => 'admin',
    'middleware'    => 'auth',
    'as'            => 'admin.'
], function(){
    Route::view('/', 'admin.index')->name('index');
    Route::resources([
        'users' => App\Http\Controllers\Admin\UserController::class,
        'posts' => App\Http\Controllers\Admin\PostController::class,
        'roles' => App\Http\Controllers\Admin\RoleController::class,
        'projects' => App\Http\Controllers\Admin\ProjectController::class,
        'regions' => App\Http\Controllers\Admin\RegionController::class,
        'categories' => App\Http\Controllers\Admin\PostCategoryController::class,
        'directions' => App\Http\Controllers\Admin\DirectionController::class,
        'rewards' => App\Http\Controllers\Admin\RewardController::class,
        'project_types' => App\Http\Controllers\Admin\ProjectTypeController::class,
        'vacancies' => App\Http\Controllers\Admin\VacancyController::class
    ]);
});
Route::group([
    'prefix'    => '{locale?}',
    'middleware'    => 'localized'
], function(){
    Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('home');
    Route::get('/about', [App\Http\Controllers\Front\AboutController::class, 'index'])->name('about');
    Route::view('/contacts', 'contacts')->name('contacts');
    Route::resource('/projects', App\Http\Controllers\Front\ProjectController::class)->only(['index', 'show']);
    Route::resource('/directions', App\Http\Controllers\Front\DirectionController::class)->only(['index', 'show']);
    Route::resource('/vacancies', App\Http\Controllers\Front\VacancyController::class)->only(['index']);
    Route::get('/posts', [ App\Http\Controllers\Front\PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [ App\Http\Controllers\Front\PostController::class, 'show'])->name('posts.show');

    Route::get('/ico', function(){
        $dir = App\Models\Direction::find(6);
        $dir->icon = '/assets/svg/deflation/icons-6.svg';
        $dir->save();
        echo '))';
    });


    Route::get('/vid', function(){
        $file = new App\Models\File();
        $file->src = '/storage/directions/Gubkin01.mov';
        $file->name = 'Gubkin01';
        $file->category = 'Video';
        $file->filable_type = 'App\Models\Project';
        $file->filable_id = 9;
        $file->save();

        $file2 = new App\Models\File();
        $file2->src = '/storage/directions/Kingisept07.mov';
        $file2->name = 'Kingisept07';
        $file2->category = 'Video';
        $file2->filable_type = 'App\Models\Project';
        $file2->filable_id = 10;
        $file2->save();

        $file3 = new App\Models\File();
        $file3->src = '/storage/directions/novgorod.mov';
        $file3->name = 'novgorod';
        $file3->category = 'Video';
        $file3->filable_type = 'App\Models\Project';
        $file3->filable_id = 11;
        $file3->save();


        $file4 = new App\Models\File();
        $file4->src = '/storage/directions/StarOskol.mov';
        $file4->name = 'StarOskol';
        $file4->category = 'Video';
        $file4->filable_type = 'App\Models\Project';
        $file4->filable_id = 12;
        $file4->save();




        

        // $file = App\Models\File::where('src', '/storage/app/public/directions/N-novgorodArzamac05.mov');
        // $file->delete();

        // $file1 = App\Models\File::where('src', '/storage/directions/N-novgorodArzamac05.mov');
        // $file1->delete();
    });

});