<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //reset a tabela products
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('products')->truncate(); //apagar todos os dados da tabela

        $faker = Factory::create(); //dados falsos(aleatorios)

        //gerar 4 produtos
        $product1 = new Product();
        $product1->id = '32ab649e-691b-4c33-924f-bd1ad43c9453';
        $product1->name = 'Ração para Ave';
        $product1->price = $faker->randomFloat(2,100);
        $product1->stock = 15;
        $product1->image = 'product-1.png';
        $product1->description = $faker->text(rand(250, 300));
        $product1->save();

        $product2 = new Product();
        $product2->id = '93ab649e-691b-4c33-924f-bd1ad43c9453';
        $product2->name = 'Ração para Gato';
        $product2->price = $faker->randomFloat(2,100);
        $product2->stock = 45;
        $product2->image = 'product-2.png';
        $product2->description = $faker->text(rand(250, 300));
        $product2->save();

        $product3 = new Product();
        $product3->id = '78ab649e-691b-4c33-924f-bd1ad43c9453';
        $product3->name = 'Ração Animal 1';
        $product3->price = $faker->randomFloat(2,100);
        $product3->stock = 34;
        $product3->image = 'product-3.png';
        $product3->description = $faker->text(rand(250, 300));
        $product3->save();

        $product1 = new Product();
        $product1->id = '82ab649e-691b-4c33-924f-bd1ad43c9453';
        $product1->name = 'Ração Animal 2';
        $product1->price = $faker->randomFloat(2,100);
        $product1->stock = 12;
        $product1->image = 'product-3.png';
        $product1->description = $faker->text(rand(250, 300));
        $product1->save();
    }
}
