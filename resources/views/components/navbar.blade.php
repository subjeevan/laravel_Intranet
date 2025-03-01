<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block m-1">
            <a class="btn btn-sm btn-primary display-4  ">
                <?php
                echo "<align='left'> <font color=white >IP Address:-</font>";
                echo '<span style="font-size: 12pt ">' . get_client_ip() . '</span>';
                function get_client_ip()
                {
                    $ipaddress = '';
                    if (getenv('HTTP_CLIENT_IP'))
                        $ipaddress = getenv('HTTP_CLIENT_IP');
                    else if (getenv('HTTP_X_FORWARDED_FOR'))
                        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
                    else if (getenv('HTTP_X_FORWARDED'))
                        $ipaddress = getenv('HTTP_X_FORWARDED');
                    else if (getenv('HTTP_FORWARDED_FOR'))
                        $ipaddress = getenv('HTTP_FORWARDED_FOR');
                    else if (getenv('HTTP_FORWARDED'))
                        $ipaddress = getenv('HTTP_FORWARDED');
                    else if (getenv('REMOTE_ADDR'))
                        $ipaddress = getenv('REMOTE_ADDR');
                    else
                        $ipaddress = 'UNKNOWN';

                    return $ipaddress;
                }
                ?>

            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block m-1 "> <a
                class="btn btn-sm btn-secondary display-4 ">
                <?php
                echo "<align='left'> <font color=white  font-size: 2pt>Computer Name:-</font>";
                echo '<span style="font-size: 12pt">' . gethostbyaddr($_SERVER['REMOTE_ADDR']) . '</span>'; ?>

            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
