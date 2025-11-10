<?php
require_once 'data/functions.php';

$is_edit = isset($record) && isset($record['id']);
$action = $is_edit ? 'update' : 'create';

$title = $is_edit ? htmlspecialchars($record['title']) : '';
$artist = $is_edit ? htmlspecialchars($record['artist']) : '';
$price = $is_edit ? htmlspecialchars($record['price']) : '';
$format_id = $is_edit ?  (int)$record['format_id'] : 0;

$format_list = formats_all();
?>
<h2> <?= $is_edit ? 'Edit Book' : 'Add Book' ?></h2>
<div>
    <form method="post">
        <div class="col-12">
            <label class="form-label">Title</label>
            <input name="title" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Artist</label>
            <input name="artist" class="form-control" required>
        </div>
        <div class="col-md-3">
            <label class="form-label">Price</label>
            <input name="price" type="number" step="0.01" class="form-control" required>
        </div>
        <div class="col-md-3">
            <label class="form-label">Format</label>
            <select name="format_id" class="form-select" required>
                <option value="">Format</option>
                <?php foreach ($format_list as $f): ?>
                    <?php $fid = (int)$f['id']; ?>
                    <option value="<?= $fid ?>" <?= $fid === $format_id ? 'selected' : '' ?>>
                        <?= htmlspecialchars($f['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="hidden" name="action" value="<?= $action ?>">
        <?php if ($is_edit): ?>
            <input type="hidden" name="id" value="<?= (int)$record['id'] ?>">
        <?php endif; ?>

        <button class="btn">Create</button>
        <a href="?view=list" class="btn">Cancel</a>
    </form>
</div>