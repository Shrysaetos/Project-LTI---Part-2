<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    private $totalUsers = 6;

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $contadorGlobal = 0;

        $this->command->line("");
        $this->command->line("##################################################################################");
        $this->command->line("Creating Users");
        $this->command->line("##################################################################################");

        $faker = Faker\Factory::create('pt_PT');

        for ($i = 0; $i < $this->totalUsers; $i++) {
            $contadorGlobal++;
            $user = $this->fakeUser($faker, 'user', $i);
            DB::table('users')->insert($user);
            $this->command->info("Created User $contadorGlobal/$this->totalUsers: " . $user['name']);
        }
    }

    private function fakeUser(Faker\Generator $faker, $type, $idx, $softDelete = false)
    {
        $createdAt = Carbon\Carbon::now()->subDays(600);

        $gender = rand(0,1) == 1 ? 'male' : 'female';

        return [
            'name' => $faker->name($gender),
            'email' => $type.$idx.'@mail.pt',
            'password' => bcrypt('123'),
            'remember_token' => str_random(10),
            'created_at' => $createdAt,
            'updated_at' => $faker->dateTimeBetween($createdAt),
            'deleted_at' => $softDelete ? $faker->dateTimeBetween($createdAt) : null,
        ];
    }
}
