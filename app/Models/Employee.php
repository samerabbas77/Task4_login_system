<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * 
     */
    protected $fillable = [
        'name',
        'email',
        'date_of_start',
        'salary',
        'employee_creator',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(related: User::class);
    }

}
