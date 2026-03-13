<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$users = App\Models\User::all()->makeVisible(['password'])->map(function($u) {
    return [
        'name' => $u->name,
        'email' => $u->email,
        'password' => $u->password
    ];
})->toArray();

file_put_contents('users_data.json', json_encode($users, JSON_PRETTY_PRINT));
echo "Usuarios guardados en users_data.json\n";
