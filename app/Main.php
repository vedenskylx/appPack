<?php
/**
 * Created by PhpStorm.
 * User: lexgorbachev
 * Date: 13.11.17
 * Time: 17:56
 */
namespace app;

use Symfony\Component\Yaml\Yaml;

class Main
{
    /**
     * Подгружаем настройки приложения, при необходимости очищаем кеш
     */

    public function __construct()
    {

        $settings = Yaml::parse(file_get_contents(__DIR__ . '/../config/settings.yaml'));

        $this->data['settings'] = $settings;

        if(isset($_GET['clear_cache']) && $_GET['clear_cache']=='Y'){
            self::clearCache(__DIR__ .'/../'.$settings['cache_folder']);
        }
    }

    /**
     * Очистка кеша
     *
     * @param $folder
     * @return bool
     */

    public function clearCache($folder)
    {
        if (is_dir($folder)) {
            $handle = opendir($folder);
            while ($subfile = readdir($handle)) {
                if ($subfile == '.' or $subfile == '..') continue;
                if (is_file($subfile)) @unlink("{$folder}/{$subfile}");
                else self::clearCache("{$folder}/{$subfile}");
            }
        }

        return false;
    }

}