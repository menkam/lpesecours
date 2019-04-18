<ul class="nav nav-list">
    <li class="active">
        <a href="{{ url('/') }}">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Dashboard </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php //if(Session::has('menus')) echo (Session::get('menus')); ?>
    <?php use App\Models\Menu;
        if(!empty(Auth::user()->id)) echo Menu::loadMenus(\Auth::user()->getGroupe_user());
    ?>
</ul>