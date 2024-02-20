<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //reset a tabela feedback
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('feedbacks')->truncate(); //apagar todos os dados da tabela

        //gerar 3 feedbacks
        $faker = Factory::create();

        $feedback1 = new Feedback();
        $feedback1->id = '23ab649e-691b-4c33-924f-bd1ad43c9453';
        $feedback1->name =  $faker->name();
        $feedback1->email =  $faker->email();
        $feedback1->topic = 'Crítica';
        $feedback1->message = $faker->text(rand(250, 300));
        $feedback1->save();

        $feedback2 = new Feedback();
        $feedback2->id = '30ab649e-691b-4c33-924f-bd1ad43c9453';
        $feedback2->name =  $faker->name();
        $feedback2->email =  $faker->email();
        $feedback2->topic = 'Elogio';
        $feedback2->message = $faker->text(rand(250, 300));
        $feedback2->save();

        $feedback3 = new Feedback();
        $feedback3->id = '12ab649e-691b-4c33-924f-bd1ad43c9453';
        $feedback3->name =  $faker->name();
        $feedback3->email =  $faker->email();
        $feedback3->topic = 'Crítica';
        $feedback3->message = $faker->text(rand(250, 300));
        $feedback3->save();
    }
}
