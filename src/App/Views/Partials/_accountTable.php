<?php foreach ($contents as $key => $row) { ?>
    <tr id="account_<?= e($row['id'] ?? '') ?>">
        <td><?= e($row['id'] ?? '') ?></td>
        <td><img class="rounded-circle me-2" width="30" height="30" src="/assets/img/profile/<?= e($row['profileImage'] ?? 'avatar.jpg') ?>" /></td>
        <td><?= e($row['email'] ?? '') ?></td>
        <td><?= e($row['profileFirstname'] ?? '') ?></td>
        <td><?= e($row['profileLastname'] ?? '') ?></td>
        <td>
            <select class="form-select role" name="role" id="role_<?= e($row['id'] ?? '') ?>">
                <?php foreach ($roles as $key => $role) { ?>
                    <option value="<?= e($role['id'] ?? '') ?>" <?= e($row['roleName'] ?? '') == $role['name'] ? 'selected' : '' ?>><?= $role['name'] ?></option>
                <?php } ?>
                <?= e($row['roleName'] ?? '') ?>
            </select>
        </td>
        <td class=""><button type="button" class="btn btn-primary cwp-delete-btn"><i class="fa-regular fa-trash-can"></i></button></td>
    </tr>
<?php } ?>