<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Absensi;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbsensiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'nama' => $this->faker->name(),
            'tanggal' => now(),
            'kehadiran' => now(),
            'status' => $this->sequence(
                ['status' => 'hadir'],
                ['status' => 'absen'],
            )
        ];
    }
}
