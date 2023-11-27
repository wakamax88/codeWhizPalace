<?php include $this->resolve('partials/_header_v2.php'); ?>
<!-- Start Main Content Area -->
<section>

    <div class="container">
        <div class="row">
            <!-- Page Title -->
            <h3>Contact Page</h3>
        </div>
        <hr>
        <div class="row">
            <section class="position-relative py-4 py-xl-5">
                <div class="container position-relative">
                    <div class="row mb-5">
                        <div class="col-md-8 col-xl-6 text-center mx-auto">
                            <h2>Contact us</h2>
                            <p class="w-lg-50"></p>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6 col-lg-5 col-xl-4">
                            <div>
                                <form class="p-3 p-xl-4" method="post">
                                    <?php include $this->resolve('partials/_csrf.php'); ?>
                                    <div class="mb-3"><input id="name-1" class="form-control" type="text" name="name" placeholder="Name" /></div>
                                    <div class="mb-3"><input id="email-1" class="form-control" type="email" name="email" placeholder="Email" /></div>
                                    <div class="mb-3"><textarea id="message-1" class="form-control" name="message" rows="6" placeholder="Message"></textarea></div>
                                    <div><button class="btn btn-primary d-block w-100" type="submit">Send </button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<!-- End Main Content Area -->
<?php include $this->resolve('partials/_footer_v2.php'); ?>