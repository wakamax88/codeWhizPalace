<?php include $this->resolve("partials/_header_v2.php"); ?>
<section class="position-relative py-4 py-xl-5">

    <div class="container">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Connexion</h2>
                <p class="w-lg-50">Bienvenue sur CodeWhizPalace commençons l'aventure</p>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-5">
                    <div class="card-body d-flex flex-column align-items-center">
                        <form class="text-center" method="post">

                            <?php include $this->resolve('partials/_csrf.php'); ?>

                            <!-- Email -->
                            <div class="text-start mb-3">
                                <label class="form-label text-light">Email *</label>
                                <input value="<?= e($oldFormData['email'] ?? '') ?>" class="form-control" type="email" name="email">

                                <div class="text-muted">
                                    <?= e($errors['email'][0] ?? ''); ?>
                                </div>

                            </div>

                            <!-- Password -->
                            <div class="text-start mb-3">
                                <label class="form-label text-light">Password *</label>
                                <input class="form-control" type="password" name="password">

                                <div class="text-muted">
                                    <?= e($errors['password'][0] ?? ''); ?>
                                </div>

                            </div>


                            <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include $this->resolve("partials/_footer_v2.php"); ?>