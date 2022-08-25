<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Uer
 * @package App\Models
 *
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string password
 * @property int role
 */
class User extends Authenticatable
{
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }


}
