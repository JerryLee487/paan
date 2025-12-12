<?php

namespace App\Policies;

use App\Models\Products;
use Moonshine\Laravel\Models\MoonshineUser;

class ProductsPolicy
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
     * Ver lista de productos
     */
    public function viewAny(MoonshineUser $user): bool
    {
        return true;//Todos lo pueden ver
    }

    /**
     * Ver detalle
     */
    public function view(MoonshineUser $user, Products $product): bool
    {
        return true;//Todos lo pueden ver
    }

    /**
     * Crear productos
     */
    public function create(MoonshineUser $user): bool
    {
        //Admin (1) y Coordinador (2) pueden crear
        return in_array($user->moonshine_user_role_id, [1, 2]);
    }

    /**
     * Editar productos
     */
    public function update(MoonshineUser $user, Products $product): bool
    {
        //Admin (1) y Coordinador (2) pueden editar
        return in_array($user->moonshine_user_role_id, [1, 2]);
    }

    /**
     * Eliminar productos
     */
    public function delete(MoonshineUser $user, Products $product): bool
    {
        //Solo Admin (1) puede eliminar
        return $user->moonshine_user_role_id === 1;
    }    

    /**
     * Restaurar productos
     */
    public function restore(MoonshineUser $user, Products $product): bool
    {
        //Solo Admin (1) puede restaurar
        return $user->moonshine_user_role_id === 1;
    }

    /**
     * Eliminación permanente
     */
    public function forceDelete(MoonshineUser $user, Products $product): bool
    {
        //Solo Admin (1) puede eliminar permanentemente
        return $user->moonshine_user_role_id === 1;
    }

    /**
     * Eliminación masiva
     */
    public function massDelete(MoonshineUser $user): bool
    {
        //Solo Admin (1) puede eliminar masivamente
        return $user->moonshine_user_role_id === 1;
    }
}
