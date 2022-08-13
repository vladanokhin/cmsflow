<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SiteType
 * @package App\Models
 *
 * @property integer id
 * @property string name
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class SiteType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'created_at', 'updated_at'];

}
