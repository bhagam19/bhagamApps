<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <form
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <?php
                    $path = $_SERVER['DOCUMENT_ROOT'];
                    $_SESSION['ruta']=$path."/negocioNormal/admin";
                    /*$path .= "/negocioNormal/admin/3-control/alertas.php";
                    include($path);*/
                    $path = $_SERVER['DOCUMENT_ROOT'];
                    include($path.'/negocioNormal/admin/1-model/conex.php');
                    $consulta="SELECT * FROM usuarioxalertas WHERE idUsuario='".$_SESSION['id']."' ORDER BY fecha DESC";
                    $query=$con->query($consulta);
                    $cont=mysqli_num_rows($query);
                    $_SESSION['numAlertas']=$cont;
                    function cambiaf_a_espanol($fecha){
                        preg_match( '/([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})/', $fecha, $mifecha);
                        switch ($mifecha[2]){
                            case 1: $mifecha[2]="Enero";
                            break;
                            case 2: $mifecha[2]="Febrero";
                            break;
                            case 3: $mifecha[2]="Marzo";
                            break;
                            case 4: $mifecha[2]="Abril";
                            break;
                            case 5: $mifecha[2]="Mayo";
                            break;
                            case 6: $mifecha[2]="Junio";
                            break;
                            case 7: $mifecha[2]="Julio";
                            break;
                            case 8: $mifecha[2]="Agosto";
                            break;
                            case 9: $mifecha[2]="Septiembre";
                            break;
                            case 10: $mifecha[2]="Octubre";
                            break;
                            case 11: $mifecha[2]="Noviembre";
                            break;
                            case 12: $mifecha[2]="Diciembre";
                            break;
                        }
                        $lafecha=$mifecha[2]." ".$mifecha[3]." de ".$mifecha[1];
                        return $lafecha;
                    }
                ?>
                


                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter"><?= $_SESSION['numAlertas']?></span>
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Centro de Alertas 
                        </h6>

                        <?php
                            $i=0;
                            if($cont>=1){                  
                                while($row=mysqli_fetch_row($query)){
                                    $_SESSION['idAlerta']=$row[0];
                                    $i++;
                                    if ($row[4]==2){
                                        echo'
                                            <a class="dropdown-item d-flex align-items-center" href="#" data-toggle="modal" data-target="#alertasModal'.$row[0].'">
                                            ';
                                        $fila=$row[3];
                                        switch ($fila){
                                            case 1:
                                                echo '
                                                    <div class="mr-3">
                                                        <div class="icon-circle bg-primary">
                                                            <i class="fas fa-file-alt text-white"></i>
                                                        </div>
                                                    </div>
                                                ';
                                            break;
                                            case 2:
                                                echo '
                                                    <div class="mr-3">
                                                        <div class="icon-circle bg-success">
                                                            <i class="fas fa-donate text-white"></i>
                                                        </div>
                                                    </div>
                                                ';
                                            break;
                                            case 3:
                                                echo '
                                                    <div class="mr-3">
                                                        <div class="icon-circle bg-warning">
                                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                                        </div>
                                                    </div>
                                                ';
                                            break;
                                        }
                                        echo '  
                                                <div>
                                                    <div class="small tediv clxt-gray-500">'.cambiaf_a_espanol($row[3]).'</div>
                                                    <span class="font-weight-bold">'.$row[4].'</span>
                                                </div>
                                            </a>                                        
                                        ';
                                    }
                                }
                                echo'
                                    <p class="dropdown-header2">Alertas Leídas</p>
                                ';
                                $consulta="SELECT * FROM alertas WHERE idAlerta=".$_SESSION['idAlerta'];
                                echo $consulta;
                                $query=$con->query($consulta);
                                while ($row2=mysqli_fetch_row($query)) {
                                    if ($row[4]==1){
                                        echo'
                                            <a class="dropdown-item d-flex align-items-center" href="#" data-toggle="modal" data-target="#alertasModal'.$row2[0].'">
                                            ';
                                        $fila=$row2[3];
                                        switch ($fila){
                                            case 1:
                                                echo '
                                                    <div class="mr-3">
                                                        <div class="icon-circle bg-primary">
                                                            <i class="fas fa-file-alt text-white"></i>
                                                        </div>
                                                    </div>
                                                ';
                                            break;
                                            case 2:
                                                echo '
                                                    <div class="mr-3">
                                                        <div class="icon-circle bg-success">
                                                            <i class="fas fa-donate text-white"></i>
                                                        </div>
                                                    </div>
                                                ';
                                            break;
                                            case 3:
                                                echo '
                                                    <div class="mr-3">
                                                        <div class="icon-circle bg-warning">
                                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                                        </div>
                                                    </div>
                                                ';
                                            break;
                                        }
                                        echo '  
                                                <div>
                                                    <div class="small tediv clxt-gray-500">'.cambiaf_a_espanol($row2[2]).'</div>
                                                    <span class="font-weight-bold">'.$row2[4].'</span>
                                                </div>
                                            </a>                                        
                                        ';
                                    }
                                    $i++;
                                }
                                echo'
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Ver todas sus alertas ('.$_SESSION['numAlertas'].')</a>
                                ';
                            }else{
                                echo'
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-none">
                                                <i class="fas fa-donate text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small tediv clxt-gray-500"></div>
                                            <span class="font-weight-bold">¡Bien hecho! Usted no tiene alertas nuevas.</span>
                                        </div>
                                    </a>
                                ';
                                
                            }
                        ?>
                    </div>
                </li>

                <!-- Nav Item - Messages -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-envelope fa-fw"></i>
                        <!-- Counter - Messages -->
                        <span class="badge badge-danger badge-counter">7</span>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">
                            Message Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="/negocioNormal/admin/img/undraw_profile_1.svg"
                                    alt="...">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                    problem I've been having.</div>
                                <div class="small text-gray-500">Emily Fowler · 58m</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="/negocioNormal/admin/img/undraw_profile_2.svg"
                                    alt="...">
                                <div class="status-indicator"></div>
                            </div>
                            <div>
                                <div class="text-truncate">I have the photos that you ordered last month, how
                                    would you like them sent to you?</div>
                                <div class="small text-gray-500">Jae Chun · 1d</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="/negocioNormal/admin/img/undraw_profile_3.svg"
                                    alt="...">
                                <div class="status-indicator bg-warning"></div>
                            </div>
                            <div>
                                <div class="text-truncate">Last month's report looks great, I am very happy with
                                    the progress so far, keep up the good work!</div>
                                <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                    alt="...">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div>
                                <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                    told me that people say this to all dogs, even if they aren't good...</div>
                                <div class="small text-gray-500">Chicken the Dog · 2w</div>
                            </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        
                        <?php
                            $consulta="SELECT * FROM usuarios WHERE usuario='".$_SESSION['usuario']."'";
                            $query=$con->query($consulta);
                                $row=mysqli_fetch_row($query);
                                    echo '
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">'.$row[1].'<br />'.$row[5]. '</span>
                                    ';
                                    if ($row[6]!=null){
                                        echo '                                    
                                            <img class="img-profile rounded-circle"
                                            src="'.$row[6].'">
                                        ';
                                    }else{
                                        echo '
                                            <img class="img-profile rounded-circle"
                                            <!--src="'.$row[6].'">-->
                                            src="/negocioNormal/admin/img/undraw_profile.svg">
                                        ';
                                    }
                                
                        ?>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="/negocioNormal/admin/2-vista/perfil.php">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Perfil
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Cerrar Sesión
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
            <!-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->
            <!-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->
<!-- End of Topbar -->
