@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <menu-sidebar></menu-sidebar>
        </div>
        <transition name="fade" mode="out-in" appear>
            <router-view></router-view>
        </transition>  
    </div>
</div>
@endsection
