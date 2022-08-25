<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Intern
 * @package App\Models
 *
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string university
 * @property string level
 */
class Intern extends Model
{
    use HasFactory;

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
