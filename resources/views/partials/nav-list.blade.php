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
        echo '<li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-whatsapp"></i>
                    <!--i class="menu-icon fa fa-folder"></i-->
                    <span class="menu-text">Contacts Whatsapp</span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <!--a href="https://api.whatsapp.com/send?phone=23796559339&text=&source=&data=" class="" target="_blank"-->
                        <a href="https://wa.me/23796559339" class="" target="_blank">
                            <i class="menu-icon fa fa-bookmark-o"></i>
                            Inbox M. Francis
                        </a>
                    </li>
                </ul>
                <ul class="submenu">
                    <li class="">
                        <a href="https://wa.me/23773186356" class="" target="_blank">
                            <i class="menu-icon fa fa-bookmark-o"></i>
                            Inbox W. Carine
                        </a>
                    </li>
                </ul>
                <ul class="submenu">
                    <li class="">
                        <a href="https://wa.me/23774415915" class="" target="_blank">
                            <i class="menu-icon fa fa-bookmark-o"></i>
                            Inbox K. Carine
                        </a>
                    </li>
                </ul>
                <ul class="submenu">
                    <li class="">
                        <a href="https://chat.whatsapp.com/BaHg5vNN2xLCMIMLBvpqPV" class="" target="_blank">
                            <i class="menu-icon fa fa-bookmark-o"></i>
                            Intégrer le Groupe Whatsapp
                        </a>
                    </li>
                </ul>
        </li>';
    ?>
</ul>