@extends('layouts.users')
@section('contents')

{{-- Vue route --}}
<router-view v-if="show==2 | show==1"></router-view>
<shop-Home-Page :products="products" :show="show" v-if="show==3"></shop-Home-Page>
<router-view name="userProfile"></router-view>
<router-view name="wishlistDisplay"></router-view>
{{--End  Vue route --}}

@endsection
