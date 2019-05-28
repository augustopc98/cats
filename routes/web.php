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
Route::model('cat', 'Cat');

Route::get('/', function(){
    return "All cats";
});

Route::get('cats/{id}', function($id){
    return "Cat #$id";
}) ->where('id', '[0-9]+');

Route::get('/', function(){
    return Redirect::to('cats');
});

Route::get('cats', function(){
    return "All cats";
});

Route::get('about', function(){
    return View::make('about')->with('number_of_cats', 9000);
});

Route::get('master', function(){
    return View::make('master');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('cats', function(){
$cats = Cat::all();
return View::make('cats.index')
    ->with('cats', $cats);
});

Route::get('cats/breeds/{name}', function($name){
    $breed = Breed::whereName($name)->with('cats')->first();
    return View::make('cats.index')
    ->with('breed', $breed)
    ->with('cats', $breed->cats);

});

Route::get('cats/{cat}', function(Cat $cat) { // cats/{id} function($id)
    //$cat = Cat::find($id);
    return View::make('cats.single')
    ->with('cat', $cat);
});

Route::get('cats/create', function(){
    $cat = new Cat;
    return View::make('cats.edit')
    ->with('cat', $cat)
    ->with('method', 'post'); 
});

Route::get('cats/{cat}/edit', function(Cat $cat){
    return View::make('cats.edit')
    ->with('cat', $cat)
    ->with('method', 'put');
});

Route::get('cats/{cat}/delete', function(Cat $cat){
    return View::make('cats.edit')
    ->with('cat', $cat)
    ->with('method', 'delete');
});

Route::post('cats', function(){
    $cat = Cat::create(Input::all());
    return Redirect::to('cats/' . $cat->id)
        ->with('message', 'Successfully created page! ');
});

Route::put('cats/{cat}', function(Cat $cat){
    $cat->update(Input::all());
    return Redirect::to('cats/' . $cat->id)
    ->with('message', 'Successfully updated page!');
});

Route::delete('cats/{cat}', function (Cat $cat){
    $cat->delete();
    return Redirect::to('cats')
    ->with('message', 'Successfully deleted page! ');
});
View::composer('cats.edit', function($view)
{
    $breeds = Breed::all();
    if(count($breeds) > 0){
        $breed_options = array_combine($breeds->lists('id'),
        $breeds->lists('name'));
    } else{
        $breed_options = array (null,'Unspecified');
    }
    $view->with('breed_options', $breed_options);
});