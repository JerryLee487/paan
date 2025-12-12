<?php

namespace App\Policies;

use App\Models\Bills;
use Moonshine\Laravel\Models\MoonshineUser;

class BillsPolicy
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
     * Ver lista de facturas (bills)
     */
    public function viewAny(MoonshineUser $user): bool
    {
        return true;//Todos lo pueden ver
    }

    /**
     * Ver detalle
     */
    public function view(MoonshineUser $user, Bills $bill): bool
    {
        return true;//Todos lo pueden ver
    }

    /**
     * Crear facturas (bills)
     */
    public function create(MoonshineUser $user, Bills $bill): bool
    {
        //Admin (1) y Coordinador (2) pueden crear
        return in_array($user->moonshine_user_role_id, [1, 2]);
    }

    /**
     * Editar facturas (bills)
     */
    public function update(MoonshineUser $user, Bills $bill): bool
    {
        //Admin (1) y Coordinador (2) pueden editar
        return in_array($user->moonshine_user_role_id, [1, 2]);
    }

    /**
     * Eliminar facturas (bills)
     */
    public function delete(MoonshineUser $user, Bills $bill): bool
    {
        //Solo Admin (1) puede eliminar
        return $user->moonshine_user_role_id === 1;
    }

    /**
     * Restaurar facturas (bills)
     */
    public function restore(MoonshineUser $user, Bills $bill): bool
    {
        //Solo Admin (1) puede restaurar
        return $user->moonshine_user_role_id === 1;
    }

    /**
     * Eliminar permanentemente
     */
    public function forceDelete(MoonshineUser $user, Bills $bill): bool
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
