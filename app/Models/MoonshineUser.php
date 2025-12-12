<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoonshineUser extends Model
{

    /**
     * Verificar si es administrador
     */
   public function isAdmin(): bool
   {
       return $this->moonshine_user_role_id === 1;
   }

   /**
    * Verificar si es coordinador
    */
    public function isCoordinador(): bool
    {
        return $this->moonshine_user_role_id === 2;
    }

    /**
     * Verificar si es vendedor
     */
    public function isVendedor(): bool
    {
        return $this->moonshine_user_role_id === 3;
    }
}
