<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Opportunity extends Model
{
    /** @use HasFactory<\Database\Factories\OpportunityFactory> */
    use HasFactory;
    public static array $experience = ['entry', 'intermediate', 'senior'];
    public static array $category = ['IT', 'Finance', 'Accounting', 'Marketing', 'Sales', 'Programming'];

    public function scopeFilter(Builder|QueryBuilder $query, array $filters){
        $query->when($filters['search'] ?? null, function ($query, $title) {
            $query->title($title);
        })->when($filters['category'] ?? null, function ($query, $category) {
                $query->category($category);
            })->when($filters['experience'] ?? null, function ($query, $experience) {
                $query->experience($experience);
            });
    }
    public function scopeTitle(Builder $query, string $title)
    {
        return $query
            ->where('title', 'like', '%'.$title.'%')
            ->orWhere('description', 'like', '%'.$title.'%')
            ->orWhereHas('employer', function ($query)use($title){
                $query->where('Company_name', 'like', '%'.$title.'%');
            });
    }

    public function scopeCategory(Builder $query, string $category){
       return $query->where('category' ,$category);
    }

    public function scopeExperience(Builder $query, string $experience){
        return $query->where('experience' ,$experience);
    }

    public function scopeSalary(Builder $query, ?string $minSalary=null,?string $maxSalary=null){
        if($minSalary !== null && $maxSalary !== null){
            return $query->whereBetween('salary', [$minSalary, $maxSalary]);
        }elseif ($minSalary && !$maxSalary){
            return $query->where('salary', '>=', $minSalary);
        }elseif ($maxSalary && !$minSalary){
            return $query->where('salary', '<=', $maxSalary);
        }else{
            return $query;
        }
    }

    public function employer(): BelongsTo{
        return $this->belongsTo(Employer::class);
    }

    public function opportunity_applications(): HasMany{
        return $this->hasMany(OpportunityApplication::class);
    }

    public function hasApplied(Authenticatable|User|int $user):bool{
        return $this->where('id',$this->id)
            ->whereHas(
                  'opportunity_applications',
                  function ($query) use ($user){
                $query->where('user_id', $user->id);
            })->exists();

    }


//    public function averageSalary(){
//        return $this->opportunity_applications()->avg('expected_salary');
//    }
}
