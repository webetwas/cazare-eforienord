<?php include('head.php');?>
<section id="wrapper">
    <header class="main-header header-v1">
        <?php include('header.php');?>
    </header>
    <!-- /main-header -->
    <section class="head-v1 left-sidebar">
        <?php include('banner-page.php');?>
    </section>
    <!-- /head -->
    <div class="container left-sidebar">
        <aside id="sidebar">
            <?php include('left-menu.php');?>
        </aside>
        <section id="content">
            <h1>Finalizeaza Rezervarea: <strong>Tip camera</strong></h1>
            <hr>
            <div class="checkout-info row">
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <span class="checkout-title">Camera:</span>
                    <span class="checkout-value"><a href="">Camera 1</a></span>
                </div>
                <!-- /col-3 -->
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <span class="checkout-title">Persoane:</span>
                    <span class="checkout-value">1 Adult, 0 Copii</span>
                </div>
                <!-- /col-3 -->
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <span class="checkout-title">CHECK IN:</span>
                    <span class="checkout-value">02-07-2014</span>
                </div>
                <!-- /col-3 -->
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <span class="checkout-title">CHECK OUT:</span>
                    <span class="checkout-value">08-07-2014</span>
                </div>
                <!-- /col-3 -->
            </div>
            <!-- /checkout-info row -->
            <hr>
            <br>
            <div class="row">
                <p>Avem dreptul texte texte texte texte texte texte texte texte texte texte texte texte texte texte texte texte texte texte texte texte </p>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-7 col-lg-7">
                    <img src="img/preview-images/checkout.jpg" class="img-responsive">
                </div>
                <!-- /col7 -->
                <div class="col-sm-7 col-md-5 col-lg-5">
                    <div class="price">
                        <span class="price-title">Total Plata:</span>
                        <span class="cost">499 RON</span>
                    </div>
                    <hr>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        <input class="col-sm-12 radius" type="text" disabled="" value="Nume Prenume">
                        <input class="col-sm-12 radius" type="text" disabled="" value="Adresa">
                        <input class="col-sm-12 radius" type="text" disabled="" value="Telefon">
                        <input class="col-sm-12 radius" type="text" disabled="" value="Email">
                    </div>
                </div>
                <!-- /price -->
            </div>
            <!-- /col7 -->
            <div class="row">
                <button type="submit" class="btn btn-primary pull-right">Finalizeaza Rezervarea</button>
            </div>
        </section>
        <!-- content -->
    </div>
    <!-- /row -->
    <!-- /container -->
    <?php include('oferte.php');?>
    <?php include('footer.php');?>