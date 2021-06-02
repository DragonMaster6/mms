<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'permissions' => 'collection',
        'roles' => 'collection',
    ];

    /**
     * Returns an array of permissions
     * @return Collection
     */
    public function getAllPermissions() {
        // Look at the user's roles and permissions
        $permissions = $this->permissions;

        // Retrieve all permissions given via roles
        $system_roles = config("auth.roles");
        foreach($this->roles as $role_name) {
            $permissions = $permissions->merge(
                collect($system_roles[$role_name] ?? [])
            );
        }
        
        return $permissions->unique();
    }

    /**
     * Determines if the user has a permission or permissions
     * @param array|string $permission
     * @return boolean
     */
    public function hasPermission($permission) : bool {
        return $this->getAllPermissions()->contains($permission);
    }

    ///////////////
    // Accessors //
    ///////////////
}
