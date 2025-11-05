<?php
require 'data/db.php';
function formats_all(): array
{
    $pdo = get_pdo();
    return $pdo->query("SELECT id, name FROM `formats` ORDER BY name DESC")->fetchAll();
}

function records_all(): array
{
    $pdo = get_pdo();
    return $pdo->query("SELECT r.artist, r.title, r.price, f.name FROM `records` AS r JOIN `formats` as f ON f.id = r.format_id ORDER BY r.created_at DESC")->fetchAll();
}

function record_create(string $title, string $author, float $price, int $format_id): void
{
    $pdo = get_pdo();
    $stmt = $pdo->prepare("
INSERT INTO records (title, artist, price, format_id) 
VALUES (:title, :artist, :price, :format_id)");
    $stmt->execute([
        ':title' => $title,
        ':author' => $author,
        ':price' => $price,
        ':format_id' => $format_id
    ]);
}
