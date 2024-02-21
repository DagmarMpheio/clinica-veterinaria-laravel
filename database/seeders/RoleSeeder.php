<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //apagar tudo da tabela roles
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('roles')->truncate(); //apagar todos os dados da tabela

        //Create Admin role
        $admin = new Role();
        $admin->id = "99ab694e-edc6-4dcd-ac17-d900039998d1";
        $admin->name = "admin";
        $admin->display_name = "Admin";
        $admin->save();

        //Create cliente role
        $cliente = new Role();
        $cliente->id = "99ab6950-b448-4e5f-99ba-68cd0a92e9a7";
        $cliente->name = "cliente";
        $cliente->display_name = "Cliente";
        $cliente->save();

        /*atribuir os cargos*/
        //primeiro usuario com administrador
        $user1 = User::find('99ab649e-691b-4c33-924f-bd1ad43c9453');
        $user1->removeRole($admin); //retirar cargo existente
        $user1->addRole($admin); //add cargo


        //segundo usuario com cliente
        $user2 = User::find('99ab64a1-c42b-4949-a9dd-cd7a1a3ce1a6');
        $user2->removeRole($cliente); //retirar cargo existente
        $user2->addRole($cliente); //add cargo


        //terceiro usuario com autor
        $user3 = User::find('99ab64a2-42ff-4450-89aa-3b3313bb2332');
        $user3->removeRole($cliente); //retirar cargo existente
        $user3->addRole($cliente);//add cargo
    }
}
