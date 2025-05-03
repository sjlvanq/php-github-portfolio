<?php

$uri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

switch ($uri) {
    case CONFIG['SITE']['PATH'] . '/readme':
        if (isset($_GET['repo'])) {
            require_once __DIR__ . '/../src/Controller/ReadmeController.php';
            App\Controller\ReadmeController::show($_GET['repo']);
            exit;
        }
        break;

    default:
        require_once __DIR__ . '/../index.php';
        break;
}
