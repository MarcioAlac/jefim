<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Cases;

class Case_company_detail extends Model
{
    use HasFactory;

    public function cases()
    {
        return $this->belongsTo(Cases::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
