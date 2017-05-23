        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="<?= ($_GET['page'] == 'default' || !isset($_GET['page'])) ? 'active-menu' : ''  ; ?>" href="?page="><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li>
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
                        <a href="#"><i class="fa fa-file-o"></i> Pages<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Inicio</a>
                            </li>
                            <li>
                                <a href="#">Contactos</a>
                            </li>
                            <li>
                                <a href="#">Serviços<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Consultoria</a>
                                    </li>
                                    <li>
                                        <a href="#">WebDesign</a>
                                    </li>
                                    <li>
                                        <a href="#">Software</a>
                                    </li>
                                     <li>
                                        <a href="#">Gestão de Redes Sociais</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
					<li class="<?= ($_GET['page'] == 'mailbox/get') ? 'active-menu' : ''  ; ?>">
                        <a  href="?page=mailbox/get"><i class="fa fa-envelope"></i> Mail Box</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-share-square"></i> Social Media</a>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-table"></i> Gallery</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> Forms </a>
                    </li>



                    <li>
                        <a href="logout"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                    </li>
                </ul>

            </div>

        </nav>