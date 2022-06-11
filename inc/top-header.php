<div class="top-header-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="top-header-content d-flex align-items-center justify-content-between">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index"><h3 style="color:white;">Scientifique Article</h3></a>
                    </div>

                    <!-- Login Search Area -->
                    <div class="login-search-area d-flex align-items-center">
                        <!-- Login -->
                        <div class="login d-flex">
                            <?php
                            
                               if(isset($_SESSION['email'])){?>
                             
                                <li class="nav-item" style="list-style: none;"><a href='<?php $_SERVER["DOCUMENT_ROOT"]?>/scienceArticles/admin/index' class="nav-link text-white"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                                <li class="nav-item" style="list-style: none;"><a href='<?php $_SERVER["DOCUMENT_ROOT"]?>/scienceArticles/admin/logout' class="nav-link text-white"><i class="fa fa-sign-out"></i> Logout</a></li>
                                <?php } else{?>
                                
                            
                            <a href="admin/login">Login</a>
                            <a href="#">Register</a>
                            <?php
                            }
                            ?>
                        </div>
                        <!-- Search Form -->
                        <div class="search-form">
                            <form action="#" method="post">
                                <input type="search" name="search" class="form-control" placeholder="Search">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>