@extends('master')

@section('header')
    @if(isset($breed))
        {{link_to('/', 'Back to the overview')}}
        @endif
<h2>
    All @if(issset($breed)) {{$breed->name}} @endif Cats
    <a href="{{url('cats/create')}}" class="btn btn-primary pull-right">
        add a new cat
    </a>
</h2>
@stop
@section('conten')
    @foreach($cats as $cat)
        <div class="cat">
            <a href="{{url('cats/'.%cat->id)}}">
                <strong>{{{%cat->name}}} </strong> - {{{$cat->breed->name}}}
            </a>
        </div>
    @endforeach
@stop