<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //reset a tabela animal
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('animals')->truncate(); //apagar todos os dados da tabela

        //gerar 3 animais
        $faker = Factory::create();

        $animal1 = new Animal();
        $animal1->id = '12ab649e-691b-4c33-924f-bd1ad43c9453';
        $animal1->owner_id = '99ab649e-691b-4c33-924f-bd1ad43c9453';
        $animal1->name = 'Papagaio';
        $animal1->specie = 'Ave';
        $animal1->race = 'Raça Animal';
        $animal1->image = 'animal-1.jpg';
        $animal1->description = $faker->text(rand(250, 300));
        $animal1->save();

        $animal2 = new Animal();
        $animal2->id = '00ab649e-691b-4c33-924f-bd1ad43c9453';
        $animal2->owner_id = '99ab64a1-c42b-4949-a9dd-cd7a1a3ce1a6';
        $animal2->name = 'Gato';
        $animal2->specie = 'Mamífero';
        $animal2->race = 'Raça Animal 2';
        $animal2->image = 'animal-2.jpg';
        $animal2->description = $faker->text(rand(250, 300));
        $animal2->save();

        $animal3 = new Animal();
        $animal3->id = '20ab649e-691b-4c33-924f-bd1ad43c9453';
        $animal3->owner_id = '99ab64a2-42ff-4450-89aa-3b3313bb2332';
        $animal3->name = 'Cão';
        $animal3->specie = 'Mamífero';
        $animal3->race = 'Bulldog';
        $animal3->image = 'animal-3.jpg';
        $animal3->description = $faker->text(rand(250, 300));
        $animal3->save();
    }
}
