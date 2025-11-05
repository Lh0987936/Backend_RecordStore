<?php 
require_once 'data/functions.php';

$record_list = records_all();
?>
<div>
    <table>
        <th>Title</th>
        <th>Artist</th>
        <th>Price</th>
        <th>Format</th>
        <?php if (count($record_list) > 0): ?>
        <?php foreach ($record_list as $row) { ?>
        <tr>
            <td><?=htmlspecialchars($row['title'])?></td>
            <td><?=htmlspecialchars($row['artist'])?></td>
            <td>$<?=number_format((float)$row['price'], 2)?></td>
            <td><?=htmlspecialchars($row['name'])?></td>
        </tr>    
        <?php } endif; ?>
    </table>
</div>