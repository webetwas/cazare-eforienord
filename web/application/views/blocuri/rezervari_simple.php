<div class="booking-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="<?=base_url()?>rezervari" method="POST" id="fcheckrez">
                    <div class="col-lg-4">
                        <input type="text" name="d_start" class="datepicker" value="CHECK IN" data-date-format="dd/mm/yy" required>
                    </div>
                    <!-- /col-md-2 -->
                    <div class="col-lg-4">
                        <input type="text" name="d_end" class="datepicker" value="CHECK OUT" data-date-format="dd/mm/yy" required>
                    </div>
                    <!-- /col-md-2 -->

                    <!-- /col-md-2 -->
                    <div class="col-lg-4">
                        <button type="submit" name="d_submit" class="btn btn-primary">Rezerva!</button>
                    </div>
                    <!-- /col-md-2 -->
                </form>
            </div>
            <!-- /col-md-12 -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /booking-area -->
