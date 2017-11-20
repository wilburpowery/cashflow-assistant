@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h2>Menu</h2>
            <ul class="list-group">
                <li class="list-group-item">Link</li>
                <li class="list-group-item">Link</li>
                <li class="list-group-item">Link</li>
                <li class="list-group-item">Link</li>
                <li class="list-group-item">Link</li>
            </ul>
        </div>
        <div class="col-md-6">
            <h2>Main View</h2>
            <router-view></router-view>
        </div>
        <div class="col-md-3">
            <h2>Activity Status</h2>
            <ul class="list-group">
                <li class="list-group-item">Random Activity</li>
                <li class="list-group-item">Random Activity</li>
                <li class="list-group-item">Random Activity</li>
                <li class="list-group-item">Random Activity</li>
                <li class="list-group-item">Random Activity</li>
                <li class="list-group-item">Random Activity</li>
                <li class="list-group-item">Random Activity</li>
                <li class="list-group-item">Random Activity</li>
                <li class="list-group-item">Random Activity</li>
                <li class="list-group-item">Random Activity</li>
            </ul>
        </div>
    </div>
</div>
@endsection
