<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

final readonly class Register
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $role = in_array($args["role"], ["Owner", "Broker"])
            ? $args["role"]
            : "Owner";

        $user = User::create([
            "name" => $args["name"],
            "email" => $args["email"],
            "password" => Hash::make($args["password"]),
            "phone" => $args["phone"],
        ]);

        $user->assignRole($role);
        return [
            "token" => $user->createToken("react")->plainTextToken,
            "user" => $user,
        ];
    }
}
