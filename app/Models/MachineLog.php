<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineLog extends Model
{
    use HasFactory;

    protected $connection = 'external';

    protected $fillable = ['created_at', 'temperatura', 'eficiencia'];
}