<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Chamados</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menu
            </li>

            <li class="sidebar-item <?= $pag == 'dashboard' ? 'active' : ''  ?>">
                <a class="sidebar-link" href="index.php">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item <?= $pag == 'abrir_chamado' ? 'active' : ''  ?>">
                <a class="sidebar-link" href="index.php?pag=abrir_chamado">
                    <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Abrir
                        chamado</span>
                </a>
            </li>
        </ul>
    </div>
</nav>