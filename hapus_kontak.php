<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$contact_id = (int)$_GET['id'];

if (isset($_SESSION['contacts'][$contact_id])) {
    array_splice($_SESSION['contacts'], $contact_id, 1);
    $_SESSION['success_message'] = "Kontak berhasil dihapus!";
}

header("Location: index.php");
exit;
?>