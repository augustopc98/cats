
@extends('master')
@section('header')

<h2>About this site </h2>
There are over <?php echo $number_of_cats; ?> cats on this site!
-- Pagina creada + redireccionamineto desde rutas -- 
-- creando un about.php 
-- Route::get('about', function(){
    return View::make('about')->with('number_of_cats', 9000);
}); --
@stop
@section('content')
    <p>There are over {{$number_of_cats}} cats on site</p>
    @stop
