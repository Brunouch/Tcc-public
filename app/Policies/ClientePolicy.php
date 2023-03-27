<?php

namespace App\Policies;

use App\Facades\UserPermission;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientePolicy
{
    use HandlesAuthorization;

   
    public function viewAny(User $user)
    {
        return UserPermission::isAuthorized('clientes.index');
    }

   
    public function view(User $user, Cliente $cliente)
    {
        return UserPermission::isAuthorized('clientes.show');
    }

   
    public function create(User $user)
    {

        return UserPermission::isAuthorized('clientes.create');


    }

    
    public function update(User $user, Cliente $cliente)
    {
        return UserPermission::isAuthorized('clientes.edit');
    }

   
    public function delete(User $user, Cliente $cliente)
    {
        return UserPermission::isAuthorized('clientes.destroy');
    }

  
    public function restore(User $user, Cliente $cliente)
    {
        //
    }

    
    public function forceDelete(User $user, Cliente $cliente)
    {
        //
    }
}
