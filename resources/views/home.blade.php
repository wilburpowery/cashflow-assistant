@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <menu-sidebar></menu-sidebar>
        </div>
        <div class="col-md-6">
            <h2>Main View</h2>
            <router-view></router-view>
        </div>
        <div class="col-md-3">
            <activity-sidebar></activity-sidebar>
        </div>
    </div>
</div>
@endsection
