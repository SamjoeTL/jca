@extends('layouts.app')
@section('menu')

<li class="{{ request()->is('dashboard*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('dashboard')}}"><i data-feather="dashboard"></i><span class="menu-title text-truncate">Dashboard</span></a></li>



<li class="navigation-header"><span>Website Content</span><i data-feather="more-horizontal"></i>
</li>


<li class="{{ request()->is('admin/home*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('admin.home')}}"><i data-feather='thumbs-up'></i><span class="menu-title text-truncate">Home</span></a></li>
<li class="{{ request()->is('admin/about*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('admin.about')}}"><i data-feather='thumbs-up'></i><span class="menu-title text-truncate">About</span></a></li>

<li class="{{ request()->is('admin/product*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('admin.product')}}"><i data-feather='map-pin'></i><span class="menu-title text-truncate">Product</span></a></li>
<li class="{{ request()->is('admin-link*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('admin.link')}}"><i data-feather='thumbs-up'></i><span class="menu-title text-truncate">Drive</span></a></li>

<li class="nav-item mb-3"><a class="d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i data-feather="power"></i><span class="menu-title text-truncate">Logout</span></a></li>

@endsection
