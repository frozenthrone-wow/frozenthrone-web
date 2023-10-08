@extends('layouts.main')

@section('sidebar')
    <div class="flex">
        <div class="">

        </div>
    </div>
@stop

@section('content')
    <h1 class="mt-5">OLDER NEWS</h1>

    <ul id="older-news">
    </ul>
@stop


@section('js')
    $('#cancel-registration').on('click', () => {
        sidebarControl();
    })
@stop
