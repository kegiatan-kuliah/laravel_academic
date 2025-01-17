{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Students" icon="la la-graduation-cap" :link="backpack_url('student')" />
<x-backpack::menu-item title="Teachers" icon="la la-school" :link="backpack_url('teacher')" />