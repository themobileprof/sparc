<li class="side-menus">
    <a class="nav-link" href="/home">
        <i class=" fas fa-tachometer-alt"></i><span>Dashboard</span>
    </a>
</li>
<li class="side-menus {{ Request::is('countries*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('countries.index') }}"><i class="fas fa-map-marker-alt"></i><span>Countries</span></a>
</li>

<li class="side-menus {{ Request::is('contexts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('contexts.index') }}"><i class="fas fa-gem"></i><span>Contexts</span></a>
</li>

<li class="side-menus {{ Request::is('contextEntries*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('contextEntries.index') }}"><i class="fas fa-list"></i><span>Context Entries</span></a>
</li>

<li class="side-menus {{ Request::is('components*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('components.index') }}"><i class="fas fa-burn"></i><span>Components</span></a>
</li>

<li class="side-menus {{ Request::is('componentEntries*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('componentEntries.index') }}"><i class="fas fa-list-ul"></i><span>Component Entries</span></a>
</li>

<li class="side-menus {{ Request::is('sponsors*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('sponsors.index') }}"><i class="fas fa-stamp"></i><span>Sponsors</span></a>
</li>

<li class="side-menus {{ Request::is('purchasingFunctions*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('purchasingFunctions.index') }}"><i class="fas fa-object-group"></i><span>Purchasing Functions</span></a>
</li>
