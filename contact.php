    <?php
        require_once 'inc/db.php';
        require_once 'inc/head.php';
    ?>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

    <!-- Top Header Area -->
    <?php
        require_once 'inc/top-header.php';
    ?>

    <!-- Navbar Area -->
    <?php
        require_once 'inc/navbar.php';
    ?>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8">
                
                </div>

 
            </div>
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Contact Form Area Start ##### -->
    <div class="contact-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-title">
                        <h2>Contact us</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="contact-form-area">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <input type="text" class="form-control" id="name" placeholder="Nom">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <input type="email" class="form-control" id="email" placeholder="E-mail">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" id="subject" placeholder="Objet">
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn newspaper-btn mt-30 w-100" type="submit">Envoyer Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

           
            </div>

            <!-- Google Maps -->
            <div class="map-area">
                <div id="googleMap"></div>
            </div>

        </div>
    </div>
    <!-- ##### Contact Form Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php
        require_once 'inc/footer.php';
    ?>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Files ##### -->
    <?php
        require_once 'inc/scripts.php';
    ?>