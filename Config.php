<?php

class Config {
    public static $baseUrl      = "/";
    public static $serverUrl    = "localhost";
    public static $lessPath     = "styles/less/main.less";
    public static $cssPath      = "styles/css/main.css";
    
    public static function init() {
        @include "Config.local.php";
        
        Config::autoCompileLess();
    }
    
    public static function autoCompileLess() {
        if (Config::$lessPath != "" && Config::$cssPath != "" && file_exists(Config::$lessPath)) {
            require_once 'scripts/lessc.inc.php';
            
            // load the cache
            $cacheFileName = Config::$lessPath . ".cache";
            if (file_exists($cacheFileName)) {
                $cache = unserialize(file_get_contents($cacheFileName));
            } else {
                $cache = Config::$lessPath;
            }

            $less = new lessc;
            $lessBaseUrl = Config::$baseUrl;
            $less->setVariables(array(
                "baseUrl" => "'$lessBaseUrl'"
            ));
            
            
            $newCache = $less->cachedCompile($cache);

            if (!is_array($cache) || $newCache['updated'] > $cache['updated']) {
                file_put_contents($cacheFileName, serialize($newCache));
                file_put_contents(Config::$cssPath, $newCache['compiled']);
            }
        }
    }
}

Config::init();
session_start();
?>