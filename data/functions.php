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
    return $pdo->query("SELECT r.id, r.artist, r.title, r.price, f.name FROM `records` AS r JOIN `formats` as f ON f.id = r.format_id ORDER BY r.created_at DESC")->fetchAll();
}

function record_create(string $title, string $artist, float $price, int $format_id): void
{
    $pdo = get_pdo();
    $stmt = $pdo->prepare("
INSERT INTO records (title, artist, price, format_id) 
VALUES (:title, :artist, :price, :format_id)");
    $stmt->execute([
        ':title' => $title,
        ':artist' => $artist,
        ':price' => $price,
        ':format_id' => $format_id
    ]);
}
function record_get(int $id) {
    $pdo = get_pdo();
    $stmt = $pdo->prepare("
    Select r.id, r.title, r.artist, r.price, f.name 
    FROM records as r
    JOIN formats as f ON r.format_id = f.format_id
    WHERE r.id = :id");
    $stmt->execute([":id => $id"]);
}
function record_delete(int $id) {
$pdo = get_pdo();
$stmt = $pdo->prepare("DELETE FROM records WHERE id => :id");
$stmt->execute([':id' => $id]);
}
function record_update(int $id, string $title, string $artist, float $price, int $format_id) {
    $pdo = get_pdo();
    $sql = "UPDATE RECORDS SET 
    :title,
    :artist,
    :price,
    :format_id,
    :id
    WHERE id = :id
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':title' => $title,
        ':artist' => $artist,
        ':price' => $price,
        ':format_id' => $format_id,
        ':id' => $id
    ]);
    return $stmt->rowCount();
}