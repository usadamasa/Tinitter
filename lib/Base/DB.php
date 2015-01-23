<?php
namespace Base;
class DB
{
    // illuminateのデータベース接続とブートアップ
    static function registerIlluminate(array $setting)
    {
        $capsule = new \Illuminate\Database\Capsule\Manager;
        $capsule->addConnection($setting);
        $capsule->setEventDispatcher(
            new \Illuminate\Events\Dispatcher(
                new \Illuminate\Container\Container()
            )
        );

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
