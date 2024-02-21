<?php
/**
 * Created by PhpStorm.
 * User: Dagmar Mpheio
 * Date: 11/2/2020
 * Time: 1:13 PM
 */

function check_user_permissions($request, $actionName = NULL, $id = NULL)
{
//pegar o usuario actual
    $currentUser = $request->user();

    //pegar a accao actual
    if ($actionName) {
        $currentActionName = $actionName;
    } else {
        $currentActionName = ($request->route()->getActionName());
    }

    list($controller, $method) = explode('@', $currentActionName);
    $controller = str_replace(["App\\Http\Controllers\\Backend\\", "Controller"], "", $controller);
        //dd("C: $controller M: $method");

    //mapa classe
    $classesMap = [
        'Animals' => 'animal',
        'Users' => 'user',
        'Agendas' => 'agendamento',
        'Pedidos' => 'pedido',
        'Produtos' => 'produto',
        'Feedback' => 'feedback',
    ];

    //mapa das permissoes
    $crudPermissionsMap = [
        'crud' => ['create', 'store', 'edit', 'update', 'destroy', 'restore', 'forceDestroy', 'index', 'view']
    ];

    foreach ($crudPermissionsMap as $permission => $methods) {
        //se o metodo actual existe na lista de metodos,
        //vamos verificar a permissao
        if (in_array($method, $methods) && isset($classesMap[$controller])) {

            $classeName = $classesMap[$controller];

            if (!$currentUser->hasPermission("{$permission}-{$classeName}")) {
                /*abort(403, "Acesso Proíbido!");*/
                return false;
            }
            break;
        }

    }
    return true;
}