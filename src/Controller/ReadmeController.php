<?php

namespace App\Controller;

use Github\Client;
use Michelf\MarkdownExtra;
use Github\Exception\ApiLimitExceedException;
use Github\Exception\RuntimeException;

class ReadmeController {
    public static function show(string $repo) {
        $client = new Client();
        $owner = CONFIG['GH']['USER'] ?? 'GitHub';
        
        try {
            $readme = $client->api('repo')->contents()->show($owner, $repo, 'README.md');
            $decoded = base64_decode($readme['content']);
            //echo nl2br(htmlspecialchars($decoded));
            echo MarkdownExtra::defaultTransform($decoded);
        } catch (ApiLimitExceedException $e) {
            error_log("ReadmeController ApiLimitExceedException: " . $e->getMessage());
            echo "Límite de peticiones a la API de GitHub alcanzado. Inténtalo más tarde.";
        } catch (RuntimeException $e) {
			error_log("ReadmeController RuntimeException " . $repo . ": " . $e->getMessage());
			echo "No se encontró el README.";
            http_response_code(404);
        } catch (\Exception $e) {
			error_log("ReadmeController Exception " . $repo . ": " . $e->getMessage());
			http_response_code(500);
			echo "Error desconocido.";
		}	
    }
}
