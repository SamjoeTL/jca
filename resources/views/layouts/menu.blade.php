@extends('layouts.app')
@section('menu')

<li class="{{ request()->is('dashboard*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('dashboard')}}"><i data-feather="bookmark"></i><span class="menu-title text-truncate">Dashboard</span></a></li>

<li class="navigation-header"><span>Website Content</span><i data-feather="more-horizontal"></i>
</li>


<li class="{{ request()->is('admin/home*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('admin.home')}}"><i data-feather='home'></i><span class="menu-title text-truncate">Home</span></a></li>
<li class="{{ request()->is('admin/about*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('admin.about')}}"><i data-feather='info'></i><span class="menu-title text-truncate">About</span></a></li>
<li class="{{ request()->is('admin/service*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('admin.service')}}"><i data-feather='server'></i><span class="menu-title text-truncate">Service</span></a></li>
<li class="{{ request()->is('admin/product*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('admin.product')}}"><i data-feather='phone'></i><span class="menu-title text-truncate">Product</span></a></li>
<li class="{{ request()->is('admin/sosmed*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('admin.sosmed')}}"><i data-feather='inbox'></i><span class="menu-title text-truncate">Sosmed</span></a></li>

<li class="nav-item mb-3"><a class="d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i data-feather="power"></i><span class="menu-title text-truncate">Logout</span></a></li>

@endsection
