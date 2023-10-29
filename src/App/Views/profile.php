<?php include $this->resolve("partials/_header.php"); ?>

<section class="max-w-2xl mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
    <?php if (!$profile) { ?>
        <div class="bg-gray-100 mt-2 p-2 text-red-500">
            Merci de remplir votre profil utilisateur
        </div>
    <?php } ?>
    <form method="post" class="grid grid-cols-1 gap-6">
        <?php include $this->resolve('partials/_csrf.php'); ?>
        <!-- FirstName -->
        <label class="block">
            <span class="text-gray-700">Firstname</span>
            <input value="<?= e($profile['firstname'] ?? '') ?>" name="firstname" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="<?= e($profile['firstname'] ?? '') ?>" />
            <?php if (array_key_exists('firstname', $errors)) { ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500">
                    <?php echo e($errors['firstname'][0]); ?>
                </div>
            <?php } ?>

        </label>
        <!-- Lastname -->
        <label class="block">
            <span class="text-gray-700">Lastname</span>
            <input value="<?= e($profile['lastname'] ?? '') ?>" name="lastname" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="<?= e($profile['lastname'] ?? '') ?>" />
            <?php if (array_key_exists('lastname', $errors)) { ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500">
                    <?php echo e($errors['lastname'][0]); ?>
                </div>
            <?php } ?>
        </label>
        <!-- Birthday -->
        <label class="block">
            <span class="text-gray-700">Birthday</span>
            <input value="<?= e($profile['formatted_date'] ?? '') ?>" name="birthday" type="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="" />
            <?php if (array_key_exists('birthday', $errors)) { ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500">
                    <?php echo e($errors['birthday'][0]); ?>
                </div>
            <?php } ?>
        </label>
        <button type="submit" class="block w-full py-2 bg-indigo-600 text-white rounded">
            Submit
        </button>
    </form>
</section>

<?php include $this->resolve("partials/_footer.php"); ?>