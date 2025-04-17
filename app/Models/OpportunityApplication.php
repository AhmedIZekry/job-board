<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;

class OpportunityApplication extends Model
{
    /** @use HasFactory<\Database\Factories\OpportunityApplicationFactory> */
    use HasFactory;

    protected $fillable = ['user_id','expected_salary', 'opportunity_id','cv'];

    public function opportunity():BelongsTo{
        return $this->belongsTo(Opportunity::class);
    }

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }




}
