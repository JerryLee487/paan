<?php

namespace App\Policies;

use App\Models\Categories;
use Moonshine\Laravel\Models\MoonshineUser;

class CategoriesPolicy
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
     * Ver lista de categorías
     */
    public function viewAny(MoonshineUser $user): bool
    {
        return true;//Todos lo pueden ver
    }

    /**
     * Ver detalle
     */
    public function view(MoonshineUser $user, Categories $category): bool
    {
        return true;//Todos lo pueden ver
    }

    /**
     * Crear categorías
     */
    public function create(MoonshineUser $user): bool
    {
        //Admin (1) y Coordinador (2) pueden crear
        return in_array($user->moonshine_user_role_id, [1, 2]);
    }

    /**
     * Editar categorías
     */
    public function update(MoonshineUser $user, Categories $category): bool
    {
        //Admin (1) y Coordinador (2) pueden editar
        return in_array($user->moonshine_user_role_id, [1, 2]);
    }

    /**
     * Eliminar categorías
     */
    public function delete(MoonshineUser $user, Categories $category): bool
    {
        //Solo Admin (1) puede eliminar
        return $user->moonshine_user_role_id === 1;
    }

    /**
     * Restaurar categorías
     */
    public function restore(MoonshineUser $user, Categories $category): bool
    {
        //Solo Admin (1) puede restaurar
        return $user->moonshine_user_role_id === 1;
    }

    /**
     * Eliminación permanente
     */
    public function forceDelete(MoonshineUser $user, Categories $category): bool
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
