
<nav class="navbar navbar-expand-lg navbar-dark bg-dark list-group-item-primary">
    <div class="container">
        <!-- Logo -->
        <div class="logo">
                        <a href="../"><h3 style="color:white;">Scientifique Article</h3></a>
                    </div>
        <div class="navbar-brand">
            <a href="<?php $_SERVER['DOCUMENT_ROOT']?>/scienceArticles/index"><img src="" alt=""></a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <?php
                if(isset($_SESSION['email']) && $_SESSION['role'] == 'admin'){
                    ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="add_user" class="nav-link text-white"><i class="fa fa-user-plus"></i> Add User</a></li>
                        <li class="nav-item"><a href="add_post" class="nav-link text-white"><i class="fa fa-file"></i> Add Post</a></li>
                        <li class="nav-item"><a href="logout" class="nav-link text-white"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                <?php }
            if(isset($_SESSION['email']) && $_SESSION['role'] == 'author'){
            ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="add_post" class="nav-link text-white"><i class="fa fa-file"></i> Add Post</a></li>
                    <li class="nav-item"><a href="logout" class="nav-link text-white"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
            <?php }?>
        </div>

    </div>
</nav>