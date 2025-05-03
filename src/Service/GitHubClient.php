<?php

namespace App\Service;

use Github\Client;
use Github\Exception\ApiLimitExceedException;

class GitHubClient {
    public static function getUserRepos(): array {
        $client = new Client();
        $username = CONFIG['GH']['USER'] ?? 'GitHub';
        try {
            return $client->api('user')->repositories($username, 
				sort: CONFIG['GH']['REPOS']['SORT'] ?? 'updated',
				direction: CONFIG['GH']['REPOS']['DIRECTION'] ?? 'desc');
        } catch (ApiLimitExceedException $e) {
            error_log("GitHubClient ApiLimitExceedException: " . $e->getMessage());
            echo "Límite de peticiones a la API de GitHub alcanzado. Inténtalo más tarde.";
            return [];
        } catch (\Exception $e) {
			error_log("GitHubClient Exception " . $username . ": " . $e->getMessage());
			echo "Error desconocido.";
            return [];
        }
    }
}
