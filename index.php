<?php

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/routes/web.php';

use App\Service\GitHubClient;

$repos = GitHubClient::getUserRepos();

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo CONFIG['SITE']['TITLE']; ?></title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="stylesheet" href="<?php echo CONFIG['SITE']['PATH']; ?>/public/css/styles.css">
  <script src="<?php echo CONFIG['SITE']['PATH']; ?>/public/js/get_readme.js"></script>
</head>
<body class="bg-gray-100 text-gray-900 bg-[url(<?php echo CONFIG['SITE']['PATH']; ?>/public/background.jpg)] bg-fixed bg-cover">
  <div class="mx-auto px-4 py-8 container">
    <h1 class="drop-shadow-sm mb-1 font-extrabold text-gray-800 text-4xl md:text-5xl text-center tracking-tight">
		<?php echo CONFIG['SITE']['TITLE'] ?? 'TITLE'?>
	</h1>
    <h2 class="drop-shadow-sm mb-5 font-extrabold text-1xl text-gray-800 md:text-2xl text-center tracking-tight">
		<?php echo CONFIG['SITE']['SUBTITLE'] ?? 'SUBTITLE'; ?>
	</h2>
    <div class="gap-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
      <?php 
      $excluidos = CONFIG['GH']['REPOS']['EXCLUDED'];
      foreach ($repos as $repo) {
        if (in_array($repo["name"], $excluidos)) continue;
        include __DIR__ . '/templates/card.php';
      } ?>
    </div>
  </div>

  <div id="readmeModal" onClick="closeModal()" class="hidden top-0 left-0 z-50 fixed flex justify-center items-center w-screen h-screen">
    <div class="absolute inset-0 bg-black opacity-20"></div>
      <img id="loadingIndicator" src="<?php echo CONFIG['SITE']['PATH']; ?>/public/icons/loading.gif" alt="cargando..." class="z-10 w-1/5">
    <iframe src="<?php echo CONFIG['SITE']['PATH']; ?>/readme" id="readmeBox" class="hidden z-10 relative bg-white shadow-md p-8 rounded w-[80vw] h-[60vh] overflow-auto overscroll-none"></iframe>
  </div>
 
</body>
</html>

