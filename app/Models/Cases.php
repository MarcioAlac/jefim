<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Case_person_detail;
use App\Models\Case_company_detail;

use App\Models\User_cases;

class Cases extends Model
{
    use HasFactory;

    public function person()
    {
        return $this->hasMany(Case_person_detail::class);
    }

    public function company()
    {
        return $this->hasMany(Case_company_detail::class);
    }

    public function cases()
    {
        return $this->belongTo(User::class);
    }
}
