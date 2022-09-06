<?php
include_once __DIR__ . "/../provider/RandomUserProvider.php";


class User extends Model
{
    use TModel;

    public static function findOne(): array
    {
        $provider = new RandomUserProvider();
        return self::getArray($provider->generate()[0]);
    }

    public static function findAll(): array
    {
        $provider = new RandomUserProvider();

        $users = $provider->generate(100);

        foreach ($users as &$user) {
            $user = self::getArray($user);
        }

        return $users;
    }

    public static function getArray(array $user = []): array {
        return [
            'name' => "{$user['name']['title']}. {$user['name']['first']} {$user['name']['last']}",
            'email' => $user['email'],
            'login' => $user['login']['username'],
            'password' => $user['login']['sha256'],
            'phone' => $user['phone']
        ];
    }


    protected static array $data = [
        [
            'name' => 'Ivan',
            'sur_name' => 'Ivanov'
        ], [
            'name' => 'Petr',
            'sur_name' => 'Petrov'
        ]
    ];
}
