<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

final readonly class ChangePassword
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $user = Auth::user();

        if (!Hash::check($args["currentPassword"], $user->password)) {
            throw ValidationException::withMessages([
                "message" => ["The current password is incorrect."],
                ]);
        }

        $user->password = Hash::make($args["newPassword"]);
        $user->save();

        return [
            "message" => "Password changed successfully.",
        ];
    }
}
