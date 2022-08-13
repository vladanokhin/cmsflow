<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Site
 * @package App\Models
 *
 * @property integer id
 * @property string name
 * @property integer type_id
 * @property string last_modified
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon deleted_at
 */
class Site extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'type_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function type()
    {
        return $this->belongsTo(SiteType::class);
    }


    public function getLastModifiedAttribute(): string
    {
        return $this->updated_at->format('Y M d');
    }

}
