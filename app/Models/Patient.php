<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Patient extends Model
{
    use HasFactory,Notifiable;
	// app/Models/Patient.php

 protected $fillable = ['name', 'email', 'phone', 'dob', 'address'];

	
}
