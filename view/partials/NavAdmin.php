<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="<?= media(); ?>/img/avatar.png" alt="User Image">
        <div>
            <p class="app-sidebar__user-name"><?= $_SESSION['userData']['nome'] ?></p>
            <p class="app-sidebar__user-designation"><?= $_SESSION['userData']['nome_cargo'] ?></p>
        </div>
    </div>
    <ul class="app-menu">
        <?php if (!empty($_SESSION['permissoes'][1]['consultar'])) { ?>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/dashboard">
                    <i class="app-menu__icon fa fa-dashboard"></i>
                    <span class="app-menu__label">Dashboard</span>
                </a>
            </li>
        <?php } ?>
        <?php if (!empty($_SESSION['permissoes'][2]['consultar'])) { ?>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa-solid fa-users"></i>
                    <span class="app-menu__label">Usuários</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="<?= base_url(); ?>/usuario">
                            <i class="icon fa fa-circle-o"></i>
                            Usuários
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item" href="<?= base_url(); ?>/cargo">
                            <i class="icon fa fa-circle-o"></i>
                            Cargos
                        </a>
                    </li>
                </ul>
            </li>
        <?php } ?>
        <?php if (!empty($_SESSION['permissoes'][3]['consultar'])) { ?>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/cliente">
                    <i class="app-menu__icon fa fa-user"></i>
                    <span class="app-menu__label">Clientes</span>
                </a>
            </li>
        <?php } ?>
        <?php if (!empty($_SESSION['permissoes'][4]['consultar'])) { ?>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa-solid fa-archive"></i>
                    <span class="app-menu__label">Loja</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="<?= base_url(); ?>/produto">
                            <i class="icon fa fa-circle-o"></i>
                            Produtos
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item" href="<?= base_url(); ?>/categoria">
                            <i class="icon fa fa-circle-o"></i>
                            Categorias
                        </a>
                    </li>
                </ul>
            </li>
        <?php } ?>
        <?php if (!empty($_SESSION['permissoes'][5]['consultar'])) { ?>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/pedido">
                    <i class="app-menu__icon fa fa-shopping-cart"></i>
                    <span class="app-menu__label">Pedidos</span>
                </a>
            </li>
        <?php } ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/logout">
                <i class="app-menu__icon fa fa-sign-out"></i>
                <span class="app-menu__label">Logouts</span>
            </a>
        </li>
    </ul>
</aside>