<ul class="nav nav-list">
    <li class="active">
        <a href="{{ url('/') }}">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Dashboard </span>
        </a>
        <b class="arrow"></b>
    </li>

    <?php
    if(Session::has('menus'))
        echo (Session::get('menus'));
    ?>
</ul>