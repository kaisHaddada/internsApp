<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Follow_up
 * @package App\Models
 *

 * @property string name
 */

class Technology extends Model
{
    use HasFactory;
        public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }
}
