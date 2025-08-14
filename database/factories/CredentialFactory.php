<?php

namespace Database\Factories;

use App\Enums\CredentialType;
use App\Models\Credential;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Credential>
 */
class CredentialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Credential::class;
    public function definition(): array
    {
        return [
           'name' => $this->faker->sentence(),
            'type' => [
                'type'=>CredentialType::Bearer_auth,
                'prefix'=>'Bearer'
            ],
            'value'=>$this->faker->uuid(),
            'user_id'=>User::factory()
        ];
    }
}
