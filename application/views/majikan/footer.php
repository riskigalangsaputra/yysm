<footer id="sticky-footer" class="py-4 bg-footer">
    <div class="container text-center">
        <small>&copy; <?= date('Y') ?> - Yayasan Sarana Mulia</small>
    </div>
</footer>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!-- JS OwlCarousel -->
<script src="<?= base_url('assets/majikan/vendor/OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/majikan/vendor/OwlCarousel2-2.3.4/dist/owl.carousel.js'); ?>"></script>
<!-- JS DataTables -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/r-2.2.5/sc-2.0.2/sp-1.1.1/datatables.min.js"></script>
<!-- Toaster Notifikasi -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    $('.loop').owlCarousel({
        center: true,
        nav: true,
        dots: false,
        loop: true,
        margin: 20,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive: {
            100: {
                items: 1,
            },
            700: {
                items: 1
            }
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>

<!-- JavaScript Toast Notifikasi -->
<script type="text/javascript">
    <?php if ($this->session->flashdata('success')) { ?>
        toastr.success("<?= $this->session->flashdata('success'); ?>");
    <?php } else if ($this->session->flashdata('error')) {  ?>
        toastr.error("<?= $this->session->flashdata('error'); ?>");
    <?php } else if ($this->session->flashdata('warning')) {  ?>
        toastr.warning("<?= $this->session->flashdata('warning'); ?>");
    <?php } else if ($this->session->flashdata('info')) {  ?>
        toastr.info("<?= $this->session->flashdata('info'); ?>");
    <?php } ?>
</script>

</body>

</html>