<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // ✅ Add User model for relationship


class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'target',
        'full_name',
        'id_no',
        'mobile_no',
        'branch',
        'scored_amount',
        'record_status',
        'registered_by',

        // Step 1 fields
        'type',
        'pf_number',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'dob',
        'email',
        'tax_pin',
        'alternative_phone',
        'identity_type',
        'identity_number',
        'marital_status',
        'industry_type',
        'business_type',
        'income_range',
        'customer_source',
        'is_employed',
        'relationship_officer',
        'referee',
        'guarantor',
    ];


    // ✅ Registered By Relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'registered_by');
    }
}
