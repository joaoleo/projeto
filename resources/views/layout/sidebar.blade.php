
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Geral</h3>
        <ul class="nav side-menu">
            <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i>Home</a></li>
            <li><a href="{{ url('/cotacoes') }}"><i class="fa fa-edit"></i> Cotações</a></li>
            <li><a href="{{ url('/empresas') }}"><i class="fa fa-desktop"></i> Empresas</a></li>
            <li><a><i class="fa fa-table"></i> Apontamentos </a></li>
            <li><a href="{{ url('/projetos') }}"><i class="fa fa-bar-chart-o"></i> Projetos</a></li>
            <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                    <li><a href="fixed_footer.html">Fixed Footer</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>Live On</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-usd"></i> Taxas </a></li>
            <li><a href="{{ url('/users') }}"><i class="fa fa-users"></i> Funcionários </a></li>
            <li><a href="{{ url('/cargos') }}"><i class="fa fa-sitemap"></i> Cargos </a></li>
        </ul>
    </div>
</div>
