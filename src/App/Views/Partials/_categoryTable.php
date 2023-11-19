<?php foreach ($contents as $key => $row) { ?>
    <tr>
        <td><?= $row['name'] ?? '' ?></td>
        <td><img class="rounded-circle me-2" width="30" height="30" src="/assets/img/category/<?= $row['thumbnail'] ?? 'avatar.jpg' ?>" /></td>
        <td class="text-truncate" style="max-width: 150px;"><?= $row['description'] ?? '' ?></td>

        <td><i class="fa-regular fa-pen-to-square"></i></td>
        <td><i class="fa-regular fa-trash-can"></i></td>
    </tr>
<?php } ?>