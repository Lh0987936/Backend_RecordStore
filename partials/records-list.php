<?php
require_once 'data/functions.php';

$record_list = records_all();
?>
<div>
    <table class="table">
        <th>Title</th>
        <th>Artist</th>
        <th>Price</th>
        <th>Format</th>
        <th>act</th>
        <?php if (count($record_list) > 0): ?>
            <?php foreach ($record_list as $row) { ?>
                <tr>
                    <td><?=(int)$row['id']?></td>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= htmlspecialchars($row['artist']) ?></td>
                    <td>$<?= number_format((float)$row['price'], 2) ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td>
                        <form method="post" class="d-inline">
                            <input type="hidden" name="id" value="<?= (int)$row['id'] ?>">
                            <input type="hidden" name="action" value="edit">
                            <button class="btn">Edit</button>
                        </form>
                        <form method="post" class="d-inline">
                            <input type="hidden" name="id" value="<?= (int)$row['id'] ?>">
                            <input type="hidden" name="action" value="delete">
                            <button class="btn">Delete</button>
                        </form>
                    </td>
                </tr>
        <?php }
        endif; ?>
    </table>
</div>