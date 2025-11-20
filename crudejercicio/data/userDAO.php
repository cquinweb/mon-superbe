<?php
require_once __DIR__ . '/config.php';

function users_all(): array {
    $sql = "SELECT * FROM users ORDER BY id DESC";
    $res = db()->query($sql);
    return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
}

function user_by_id(int $id): ?array {
    $stmt = db()->prepare("SELECT * FROM users WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result()->fetch_assoc();
    return $res ?: null;
}

function user_email_exists(string $email, ?int $excludeId = null): bool {
    if ($excludeId) {
        $stmt = db()->prepare("SELECT id FROM users WHERE email=? AND id<>?");
        $stmt->bind_param("si", $email, $excludeId);
    } else {
        $stmt = db()->prepare("SELECT id FROM users WHERE email=?");
        $stmt->bind_param("s", $email);
    }
    $stmt->execute();
    return (bool) $stmt->get_result()->fetch_assoc();
}

function user_create(array $u): bool {
    $stmt = db()->prepare("
        INSERT INTO users(firstname,lastname,email,gender,birthdate,age)
        VALUES(?,?,?,?,?,?)
    ");
    $stmt->bind_param(
        "sssssi",
        $u['firstname'], $u['lastname'], $u['email'], $u['gender'], $u['birthdate'], $u['age']
    );
    return $stmt->execute();
}

function user_update(int $id, array $u): bool {
    $stmt = db()->prepare("
        UPDATE users
           SET firstname=?, lastname=?, email=?, gender=?, birthdate=?, age=?
         WHERE id=?
    ");
    $stmt->bind_param(
        "sssssii",
        $u['firstname'], $u['lastname'], $u['email'], $u['gender'], $u['birthdate'], $u['age'], $id
    );
    return $stmt->execute();
}

function user_delete(int $id): bool {
    $stmt = db()->prepare("DELETE FROM users WHERE id=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
