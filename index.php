<?php 
require 'data/functions.php';

$view = filter_input(INPUT_GET, 'view') ?: 'list'; 
$action = filter_input(INPUT_POST, 'action');

switch ($action) {
    case 'create':
        $title = trim((string)(filter_input(INPUT_POST, 'title') ?? ''));
        $author = trim((string)(filter_input(INPUT_POST, 'author') ?? ''));
        $price = (float)(filter_input(INPUT_POST, 'price') ?? 0);
        $format = (int)(filter_input(INPUT_POST, 'format_id') ?? 0);
        if ($title && $author && $format) {
            record_create($title, $author, $price, $format);
            $view = 'created';
        } else {
            $view = 'create';
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <h1>Record Store</h1>
    <div>
        <?php include "components/nav.php"; ?>
    </div>
    <div>
        <?php
        if ($view == 'list') include 'partials/records-list.php';
        elseif ($view == 'create') include 'partials/record-form.php';
        elseif ($view == 'created') include 'partials/record-created.php';


        ?>
    </div>
</body>
</html>