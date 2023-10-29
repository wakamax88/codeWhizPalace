<?php include $this->resolve('partials/_headerApp.php'); ?>
<!-- Start Main Content Area -->
<section>
    <div class="container">

        <div class="row"></div>

        <form class="row gutters-sm" method="post">
            <?php include $this->resolve('partials/_csrf.php'); ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center"><img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" width="150" />
                            <div class="mt-3">
                                <h4><span><?= e($profile['firstname'] ?? '') ?></span> <span><?= e($profile['lastname'] ?? '') ?></span></h4>
                                <p class="text-secondary mb-1">Full Stack Developer</p>
                                <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p><button class="btn btn-primary">Follow</button><button class="btn btn-outline-primary">Message</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <!-- Portfolio  -->
                        <div class="row g-3 align-items-center">
                            <div class="col-sm-1">
                                <a href=""><i class="fa-solid fa-globe"></i></a>
                            </div>
                            <div class="col-sm-3">
                                <label for="portfolio" class="col-form-label">Portfolio</label>
                            </div>
                            <div class="col-auto">
                                <input value="<?= e($profile['portfolio'] ?? '') ?>" type="text" id="portfolio" name="portfolio" class="form-control text-secondary" placeholder="<?= e($profile['portfolio'] ?? '') ?>">
                            </div>
                            <div class="col-auto">
                                <?php if (array_key_exists('portfolio', $errors)) { ?>
                                    <span class="form-text text-muted">
                                        <?php echo e($errors['portfolio'][0]); ?>
                                    </span>
                                <?php } ?>
                            </div>
                        </div>
                        <hr>
                        <!-- Github  -->
                        <div class="row g-3 align-items-center">
                            <div class="col-sm-1">
                                <a href=""><i class="fa-brands fa-github pe-3"></i></a>
                            </div>
                            <div class="col-sm-3">
                                <label for="github" class="col-form-label">
                                    Github</label>
                            </div>
                            <div class="col-auto">
                                <input value="<?= e($profile['github'] ?? '') ?>" type="text" id="github" name="github" class="form-control text-secondary" placeholder="<?= e($profile['github'] ?? '') ?>">
                            </div>
                            <div class="col-auto">
                                <?php if (array_key_exists('github', $errors)) { ?>
                                    <span class="form-text text-muted">
                                        <?php echo e($errors['github'][0]); ?>
                                    </span>
                                <?php } ?>
                            </div>
                        </div>
                        <hr>
                        <!-- Linkedin -->
                        <div class="row g-3 align-items-center">
                            <div class="col-sm-1">
                                <a href=""><i class="fa-brands fa-linkedin pe-3"></i></a>
                            </div>
                            <div class="col-sm-3">
                                <label for="github" class="col-form-label">
                                    Linkedin</label>
                            </div>
                            <div class="col-auto">
                                <input value="<?= e($profile['linkedin'] ?? '') ?>" type="text" id="linkedin" name="linkedin" class="form-control text-secondary" placeholder="<?= e($profile['linkedin'] ?? '') ?>">
                            </div>
                            <div class="col-auto">
                                <?php if (array_key_exists('linkedin', $errors)) { ?>
                                    <span class="form-text text-muted">
                                        <?php echo e($errors['linkedin'][0]); ?>
                                    </span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <!-- Firstname -->
                        <div class="row g-3 align-items-center">
                            <div class="col-sm-2">
                                <label for="firstname" class="col-form-label">Firstname</label>
                            </div>
                            <div class="col-auto">
                                <input value="<?= e($profile['firstname'] ?? '') ?>" type="text" id="firstname" name="firstname" class="form-control text-secondary" placeholder="<?= e($profile['firstname'] ?? '') ?>">
                            </div>
                            <div class="col-auto">
                                <?php if (array_key_exists('firstname', $errors)) { ?>
                                    <span class="form-text text-muted">
                                        <?php echo e($errors['firstname'][0]); ?>
                                    </span>
                                <?php } ?>
                            </div>
                        </div>
                        <hr />
                        <!-- Lastname -->
                        <div class="row g-3 align-items-center">
                            <div class="col-sm-2">
                                <label for="lastname" class="form-label">Lastname</label>
                            </div>
                            <div class="col-auto">
                                <input value="<?= e($profile['lastname'] ?? '') ?>" type="text" id="lastname" name="lastname" class="form-control text-secondary" placeholder="<?= e($profile['lastname'] ?? '') ?>">
                            </div>
                            <div class="col-auto">
                                <?php if (array_key_exists('lastname', $errors)) { ?>
                                    <span class="form-text text-muted">
                                        <?php echo e($errors['lastname'][0]); ?>
                                    </span>
                                <?php } ?>
                            </div>
                        </div>
                        <hr />
                        <!-- Birthday  -->
                        <div class="row g-3 align-items-center">
                            <div class="col-sm-2">
                                <label for="birthday" class="col-form-label">Birthday</label>
                            </div>
                            <div class="col-auto">
                                <input value="<?= e($profile['formatted_date'] ?? '') ?>" type="date" id="birthday" name="birthday" class="form-control text-secondary">
                            </div>
                            <div class="col-auto">
                                <?php if (array_key_exists('birthday', $errors)) { ?>
                                    <span class="form-text text-muted">
                                        <?php echo e($errors['birthday'][0]); ?>
                                    </span>
                                <?php } ?>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                fip@jukmuh.al
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                (239) 816-9029
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Mobile</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                (320) 380-4539
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                Bay Area, San Francisco, CA
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="mb-3"><button class="btn btn-primary d-block" type="submit">Submit</button></div>
                        </div>
                    </div>
                </div>
                <div class="row gutters-sm">
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6><small>Web Design</small>
                                <div class="progress mb-3" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div><small>Website Markup</small>
                                <div class="progress mb-3" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div><small>One Page</small>
                                <div class="progress mb-3" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 89%;" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                </div><small>Mobile Template</small>
                                <div class="progress mb-3" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div><small>Backend API</small>
                                <div class="progress mb-3" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 66%;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6><small>Web Design</small>
                                <div class="progress mb-3" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div><small>Website Markup</small>
                                <div class="progress mb-3" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div><small>One Page</small>
                                <div class="progress mb-3" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 89%;" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                </div><small>Mobile Template</small>
                                <div class="progress mb-3" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div><small>Backend API</small>
                                <div class="progress mb-3" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 66%;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</section>
<?php include $this->resolve('partials/_footerApp.php'); ?>