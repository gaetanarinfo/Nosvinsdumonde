<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-text mx-3">Admin V-1</div>
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-brands fa-vaadin"></i>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item <?= (empty($_GET['page'])) ? 'active' : '' ?>">
        <a class="nav-link" href="/app">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de bord</span></a>
    </li>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Ma cave</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestion :</h6>
                <a class="collapse-item" href="/app/vins">Gestion des Vins</a>
                <a class="collapse-item" href="/app/champagnes">Gestion des Champagnes</a>

                <div class="collapse-divider"></div>

                <h6 class="collapse-header">Ajouter :</h6>
                <a class="collapse-item" href="/app/ajouter-vin">Ajouter un Vins</a>
                <a class="collapse-item" href="/app/ajouter-champagne">Ajouter un Champagne</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="false" aria-controls="collapsePages2">
            <i class="fas fa-fw fa-folder"></i>
            <span>Mes ventes</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Statistiques :</h6>
                <a class="collapse-item" href="/app/ventes-vins">Vins</a>
                <a class="collapse-item" href="/app/ventes-champagnes">Champagnes</a>

                <div class="collapse-divider"></div>

                <h6 class="collapse-header">Clients :</h6>
                <a class="collapse-item" href="/app/clients-vins">Vins</a>
                <a class="collapse-item" href="/app/clients-champagnes">Champagnes</a>
            </div>
        </div>

    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="text-center d-none d-md-inline mt-4">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->