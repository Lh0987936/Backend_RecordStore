<?php 
require_once 'data/functions.php';

$format_list = formats_all();
?>
<div>
    <form method="post">
        <div class="col-12">
                <label class="form-label">Title</label>
                <input name="title" class="form-control" required>
            </div>
        <div class="col-md-6">
                <label class="form-label">Author</label>
                <input name="artist" class="form-control" required>
            </div>
        <div class="col-md-3">
                <label class="form-label">Price</label>
                <input name="price" type="number" class="form-control" required>
            </div>
        <div class="col-md-3">
                <label class="form-label">Format</label>
                <select name="format_id" class="form-select" required>
                    <option value="">Select...</option>
                    <?php foreach ($format_list as $f): ?>
                        <option value="<?= (int)$f['id'] ?>"><?= htmlspecialchars($f['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>   
        <input type="hidden" name="action" value="create">

        <button class="btn">Create</button>
    </form>
</div>