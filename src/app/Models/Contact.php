<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion'
    ];
}

static $rules = array(
    'fullname' => 'required',
    'gender' => 'required',
    'email' => 'required',
    'postcode' => 'required',
    'address' => 'required',
    'opinion' => 'required'

);

function scopeFullNameSearch($query, $fullname)
{
    if (!empty($fullname)) {
        $query->where('fullname', 'like', '%' . $fullname . '%');
    }
}

function scopeGenderSearch($query, $gender)
{
    if (!empty($gender)) {
        $query->where('gender', 'like', '$gender');
    }
}

function scopeStartCreated_atSearch($query, $startDate)
{
    if (!empty($startDate)) {
        $query->whereDate('created_at', '>=', $startDate);
    }
}

function scopeEndCreated_atSearch($query, $endDate)
{
    if (!empty($endDate)) {
        $query->whereDate('created_at', '<=', $endDate);
    }
}
function scopeEmailSearch($query, $email)
{
    if (!empty($email)) {
        +$query->where('email', 'like', '%' . $email . '%');
    }
}
