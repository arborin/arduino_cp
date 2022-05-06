<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ButtonLogs extends Model
{
    use HasFactory;

    protected $fillable = ['arduino_name', 'button_status', 'button_pin', 'status_value'];
}
