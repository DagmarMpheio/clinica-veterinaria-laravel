<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        //apagar tudo da tabela permission
        DB::table('permissions')->truncate(); //apagar todos os dados da tabela

        //crud agendamentos
        $crudAgendamento = new Permission();
        $crudAgendamento->name = "crud-agendamento";
        $crudAgendamento->save();

        //crud animais
        $crudAnimal = new Permission();
        $crudAnimal->name = "crud-animal";
        $crudAnimal->save();

        //crud produtos
        $crudProduto = new Permission();
        $crudProduto->name = "crud-produto";
        $crudProduto->save();

        //crud feedbacks
        $crudFeedback = new Permission();
        $crudFeedback->name = "crud-feedback";
        $crudFeedback->save();

        //crud pedidos
        $crudPedido = new Permission();
        $crudPedido->name = "crud-pedido";
        $crudPedido->save();

        //crud users
        $crudUser = new Permission();
        $crudUser->name = "crud-user";
        $crudUser->save();

        //definir as permission referentes aos cargos
        $admin = Role::whereName('admin')->first();
        $cliente = Role::whereName('cliente')->first();

        $admin->removePermissions([$crudUser, $crudAgendamento, $crudAnimal, $crudProduto, $crudPedido, $crudFeedback]);
        $admin->givePermissions([$crudUser, $crudAgendamento, $crudAnimal, $crudProduto, $crudPedido, $crudFeedback]);

        $cliente->removePermission($crudAgendamento, $crudAnimal, $crudPedido);
        $cliente->givePermission($crudAgendamento, $crudAnimal, $crudPedido);
    }
}
