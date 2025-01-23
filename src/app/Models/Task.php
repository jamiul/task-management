<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory, SoftDeletes;

    public const NOT_STARTED = 'not_started';
    public const STATUS_PENDING = 'pending';
    public const STATUS_COMPLETED = 'completed';

    protected $fillable = [
        'title',
        'description',
        'status',
    ];
}
