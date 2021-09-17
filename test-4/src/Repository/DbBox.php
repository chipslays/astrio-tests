<?php

namespace Box\Repository;

use Box\Repository\AbstractBox;
use Illuminate\Database\Capsule\Manager as DB;

class DbBox extends AbstractBox
{
    /**
     * @param array $config
     */
    public static function create(array $config = []): void
    {
        $database = new DB;
        $database->addConnection($config);
        $database->setAsGlobal();
    }

    public static function save(): void
    {
        foreach (self::$data as $key_name => $value) {
            $value = json_encode($value);

            if (DB::table('box')->where('key_name', $key_name)->exists()) {
                DB::table('box')->where('key_name', $key_name)->update(compact('value'));
                continue;
            }

            DB::table('box')->insert(compact('key_name', 'value'));
        }
    }

    public static function load(): void
    {
        $data = DB::table('box')->get();
        self::$data = $data->mapWithKeys(fn ($item) => [$item->key_name => $item->value])->all();
    }
}
