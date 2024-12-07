
@props(['icon' => ''] )


<li class="nav-item">
    <a href="/<?php echo request('host') . $_SESSION['path'].  str_replace(" ","-",strtolower($slot)) ; ?>" class="nav-link {{request()->is(str_replace(" ","-",strtolower($slot))) ? 'active' : ''}}">

       <i class="fas fa-{{ $icon }}"></i>

       <span>{{ $slot }}</span>

   </a>

</li>
