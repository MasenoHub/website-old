<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property User $lead
 */
class Project extends Model
{
    use HasFactory;

    /**
     * Get the lead that owns the project.
     */
    public function lead()
    {
        return $this->belongsTo(User::class, 'lead_id');
    }
}
