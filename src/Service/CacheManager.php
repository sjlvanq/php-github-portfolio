<?php

namespace App\Service;

class CacheManager {
    private static $cacheDir = __DIR__ . '/../../cache';
    private static $defaultTTL = 3600; // 1 hora

    public static function get(string $key) {
        $file = self::getCacheFile($key);
        
        if (!file_exists($file)) {
            return null;
        }

        $data = json_decode(file_get_contents($file), true);
        
        // Verificar si ha expirado
        if (time() > $data['expires_at']) {
            unlink($file);
            return null;
        }

        return $data['value'];
    }

    public static function set(string $key, $value, int $ttl = null): void {
        $ttl = $ttl ?? self::$defaultTTL;
        
        if (!is_dir(self::$cacheDir)) {
            mkdir(self::$cacheDir, 0755, true);
        }

        $data = [
            'value' => $value,
            'expires_at' => time() + $ttl
        ];

        file_put_contents(
            self::getCacheFile($key),
            json_encode($data),
            LOCK_EX
        );
    }

    private static function getCacheFile(string $key): string {
        return self::$cacheDir . '/' . md5($key) . '.cache';
    }

    public static function clear(string $key = null): void {
        if ($key === null) {
            array_map('unlink', glob(self::$cacheDir . '/*.cache'));
        } else {
            $file = self::getCacheFile($key);
            if (file_exists($file)) {
                unlink($file);
            }
        }
    }
}