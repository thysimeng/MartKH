@extends('layouts.users')
    @section('contents')
    {{-- <div id="app"> --}}
        {{-- <router-link to="/food/1">Food1</router-link>
        <router-link to="/food/2">Food2</router-link>
        <router-link to="/food/3/edit">Food3</router-link>
        <router-link to="/drink">Drink</router-link>
        <router-link to="/usersTest">user</router-link>
        <router-view></router-view> --}}
        {{-- <posts></posts> --}}
    {{-- </div> --}}
        @include('users.contents.slideArea')
        @include('users.contents.productsPopular')
        @include('users.contents.productsAll')
    @endsection



