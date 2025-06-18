<?php

namespace Bootstrap\Addons;

class PhpEnv
{
    public static function run(string|null $path = null) {
        self::execute($path);
        return true;
    }

    public static function execute(string|null $path = null)
    {
        if (!file_exists($path)) {
            return throw new \Exception("File not found: " . $path);
        }

        $rows = explode("\n", file_get_contents($path));

        foreach ($rows as $key => $row) {
            if (str_starts_with($row, "#")) {
                unset($rows[$key]);
            }

            if (str_starts_with($row, " ")) {
                unset($rows[$key]);
            }
        }

        $rows =  array_values($rows);
        return self::load($rows);
    }

    public static function load(array $content)
    {
        foreach ($content as $key => $row) {
            $parts = explode("=", $row);

            if (!empty($parts[0])) {
                putenv($row);
            }
        }

        return true;
    }
}
