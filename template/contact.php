<?php include('head.php');?>

    <section id="wrapper">
        <header class="main-header header-v1">
            <?php include('header.php');?>
        </header>
        <!-- /main-header -->
        <section class="head-v1 left-sidebar">
            <div><?php include('map.php');?></div>
            <section class="head-title">
                <h2>Contact</h2>
            </section>
            <!-- /head-title -->
        </section>
        <!-- /head -->
        <div class="container left-sidebar">
            <aside id="sidebar">
                <?php include('left-menu.php');?>
                <br />
            </aside>
            <section id="content">
                <h3 class="col6">Contact</h3>
                <p>Lorem Ipsum este pur şi simplu o machetă pentru text a industriei tipografice. Lorem Ipsum a fost macheta standard a industriei încă din secolul al XVI-lea, când un tipograf anonim a luat o planşetă de litere şi le-a amestecat pentru a crea o carte demonstrativă pentru literele respective. Nu doar că a supravieţuit timp de cinci secole, dar şi a facut saltul în tipografia electronică practic neschimbată. A fost popularizată în anii '60 odată cu ieşirea colilor Letraset care conţineau pasaje Lorem Ipsum, iar mai recent, prin programele de publicare pentru calculator, ca Aldus PageMaker care includeau versiuni de Lorem Ipsum.</p>
                <hr>
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-sm-8 col-md-8 col-lg-8">
                                    <input class="form-control input-lg" type="text" placeholder="Introdu nume prenume">
                                </div>
                                <!-- /col-md-8 -->
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <span class="form-label">Nume Prenume</span>
                                </div>
                                <!-- /col-md-4 -->
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /col-12 -->
                    </div>
                    <!-- /row -->
                    <br>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-sm-8 col-md-8 col-lg-8">
                                    <input class="form-control input-lg" type="text" placeholder="Introdu telefon" required>
                                </div>
                                <!-- /col-md-8 -->
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <span class="form-label">Telefon</span>
                                </div>
                                <!-- /col-md-4 -->
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /col-12 -->
                    </div>
                    <!-- /row -->
                    <br>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-sm-8 col-md-8 col-lg-8">
                                    <input class="form-control input-lg" type="text" placeholder="Introdu Email" required>
                                </div>
                                <!-- /col-md-8 -->
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <span class="form-label">Email</span>
                                </div>
                                <!-- /col-md-4 -->
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /col-12 -->
                    </div>
                    <!-- /row -->
                    <br>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-sm-8 col-md-8 col-lg-8">
                                    <textarea rows="10" class="form-control input-lg" type="text" placeholder="Scrie mesaj" required></textarea>
                                </div>
                                <!-- /col-md-8 -->
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <span class="form-label">Mesaj</span>
                                </div>
                                <!-- /col-md-4 -->
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /col-12 -->
                    </div>
                    <!-- /row -->
                </form>
                <br>
                <button type="submit" class="btn btn-icon btn-primary"><i class="fa fa-inbox"></i> Trimite</button>
            </section>
            <!-- content -->
        </div>
        <!-- /container -->
        <?php include('footer.php');?>