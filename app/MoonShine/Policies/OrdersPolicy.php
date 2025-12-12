<?php

namespace App\Policies;

use App\Models\Orders;
use Moonshine\Laravel\Models\MoonshineUser;

class OrdersPolicy
{
   /**
    * Admin puede hacer todo
    */
    public function before(MoonshineUser $user, $ability): ?bool
    {
        //Verificar si es Admin (ID del rol=1)
        if ($user->moonshine_user_role_id === 1) {
            return true;
        }
        return null;
    }
    
    /**
     * Ver lista de órdenes
     */
    public function viewAny(MoonshineUser $user): bool
    {
        return true;//Todos lo pueden ver
    }

    /**
     * Ver detalle
     */
    public function view(MoonshineUser $user, Orders $order): bool
    {
        return true;//Todos lo pueden ver
    }

    /**
     * Crear órdenes
     */
    public function create(MoonshineUser $user, Orders $order): bool
    {
        //Admin (1) y Coordinador (2) pueden crear
        return in_array($user->moonshine_user_role_id, [1, 2]);
    }

    /**
     * Editar órdenes
     */
    public function update(MoonshineUser $user, Orders $order): bool
    {
        //Admin (1) y Coordinador (2) pueden editar
        return in_array($user->moonshine_user_role_id, [1, 2]);
    }

    /**
     * Eliminar órdenes
     */
    public function delete(MoonshineUser $user, Orders $order): bool
    {
        //Solo Admin (1) puede eliminar
        return $user->moonshine_user_role_id === 1;
    }

    /**
     * Restaurar órdenes
     */
    public function restore(MoonshineUser $user, Orders $order): bool
    {
        //Solo Admin (1) puede restaurar
        return $user->moonshine_user_role_id === 1;
    }

    /**
     * Eliminar permanentemente
     */
    public function forceDelete(MoonshineUser $user, Orders $order): bool
    {
        //Solo Admin (1) puede eliminar permanentemente
        return $user->moonshine_user_role_id === 1;
    }

    /**
     * Eliminación masiva
     */
    public function massDelete(MoonshineUser $user): bool
    {
        //Solo Admin (1) puede hacer eliminación masiva
        return $user->moonshine_user_role_id === 1;
    }
}
