        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="<?= ($_GET['page'] == 'default' || !isset($_GET['page'])) ? 'active-menu' : ''  ; ?>" href="?page="><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li class="<?= (strpos($_GET['page'], 'projects') !== false) ? 'active' : ''  ; ?>" >
                        <a href="#"><i class="fa fa-book "></i> Projects <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="<?= ($_GET['page'] == 'projects/new') ? 'active-menu' : ''  ; ?>" href="?page=projects/new">New project</a>
                            </li>
                            <li>
                                <a class="<?= ($_GET['page'] == 'projects/get') ? 'active-menu' : ''; ?>" href="?page=projects/get">View/Update Project</a>
                            </li>
                        </ul>
                    </li>
                    
					<li>
                        <a class="<?= ($_GET['page'] == 'mailbox/get') ? 'active-menu' : ''  ; ?>" href="?page=mailbox/get"><i class="fa fa-envelope"></i> Mail Box</a>
                    </li>
                    <li>
                        <a href="?page=gallery/view"><i class="fa fa-table"></i> Gallery</a>
                    </li>

                    <li class="<?= (strpos($_GET['page'], 'settings') !== false) ? 'active' : ''  ; ?>">
                        <a href="<?= ($_GET['page'] == 'settings') ? 'active-menu' : ''  ; ?>"><i class="fa fa-cog"></i> Settings<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="<?= ($_GET['page'] == 'settings/recaptcha') ? 'active-menu' : ''  ; ?>" href="?page=settings/recaptcha">Google recaptcha</a>
                            </li>
                            <li>
                                <a class="<?= ($_GET['page'] == 'settings/changepassword') ? 'active-menu' : ''  ; ?>" href="?page=settings/changepassword">Change password</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="logout"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                    </li>
                </ul>

            </div>

        </nav>