<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerTransfer extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'customer_id',
        'branch_from',
        'branch_to',
        'officer_from',
        'officer_to',
        'status',
        'created_by'
    ];
}
