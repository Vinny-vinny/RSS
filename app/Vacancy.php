<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $guarded =[];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function location(){
        return $this->belongsTo(Location::class);
    }
    public function jobtype(){
        return $this->belongsTo(JobType::class,'job_type_id');
    }
}
