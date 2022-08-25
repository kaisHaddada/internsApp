<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Date;

/**
 * Class Project
 * @package App\Models
 *
 *
 * @property int supervisor_id
 * @property int intern_id
 * @property string title
 * @property string description
 * @property Date start_date
 * @property Date end_date
 * @property string note
 * @property string type
 */
class Project extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function intern(): BelongsTo
    {
        return $this->belongsTo(Intern::class);
    }

    public function follow_ups(): HasMany
    {
        return $this->hasMany(FollowUp::class);
    }
    public function technologies(): HasMany
    {
        return $this->hasMany(Technology::class);
    }
}
