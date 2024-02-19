<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //reset a tabela users
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate(); //apagar todos os dados da tabela

        $faker = Factory::create(); //dados falsos(aleatorios)

        //gerar 3 usuarios
        $user1 = new User();
        $user1->id = '99ab649e-691b-4c33-924f-bd1ad43c9453';
        $user1->name = 'Admin';
        $user1->email = 'admin@test.com';
        $user1->phone = $faker->phoneNumber();
        $user1->password = bcrypt('12345678');
        $user1->bio = $faker->text(rand(250, 300));
        $user1->save();

        $user2 = new User();
        $user2->id = '99ab64a1-c42b-4949-a9dd-cd7a1a3ce1a6';
        $user2->name = 'Velma Doe';
        $user2->email = 'janedoe@test.com';
        $user2->phone = $faker->phoneNumber();
        $user2->password = bcrypt('secret00');
        $user2->bio = $faker->text(rand(250, 300));
        $user2->save();

        $user3 = new User();
        $user3->id = '99ab64a2-42ff-4450-89aa-3b3313bb2332';
        $user3->name = 'Ana Miguel';
        $user3->email = 'anamiguel@test.com';
        $user3->phone = $faker->phoneNumber();
        $user3->password = bcrypt('secret00');
        $user3->bio = $faker->text(rand(250, 300));
        $user3->save();
    }
}
