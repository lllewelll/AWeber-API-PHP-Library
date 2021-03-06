<?php

class MockData {

    public static $oauth = true;
    public static $host = true;

    public static function load($resource) {
        if (!MockData::$host) return '';
        if (!MockData::$oauth) $resource = 'error';
        $dir = dirname(__FILE__);

        $data = file_get_contents($dir."/data/{$resource}.json");
        $json_data = json_decode($data, true);
        if($json_data == null) {
            # used for total_size_links
            return intval($data);
        }
        return $json_data;
    }
}
