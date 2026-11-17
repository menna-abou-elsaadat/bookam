<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Nuwave\Lighthouse\Validation\Validator;

final class UpdateProfile extends Validator
{
    /** @param  array{}  $args */

    public function rules(): array
    {
        return [
            "name" => ["required"],
            "email" => ["required", "email", Rule::unique("users", "email")->ignore(Auth::id())],
            "phone" => ["nullable", "min:10"],
        ];
    }
    public function __invoke(null $_, array $args)
    {
        $user = Auth::user();

        if (array_key_exists("phone", $args)) {
            $user->phone = $args["phone"];
        }

        $user->name = $args["name"];
        $user->email = $args["email"];
        $user->save();

        return $user->fresh();
    }
}
