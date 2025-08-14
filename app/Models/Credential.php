<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Credential extends Model
{
    /** @use HasFactory<\Database\Factories\CredentialFactory> */
    use HasFactory,HasUlids;

    protected $fillable = [
        'name',
        'type',
        'value',
        'user_id'
    ];

    protected function casts(): array
    {
        return [
            'type'=>'array',
            'value'=>'encrypted'
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);

    }

  public function checks(): HasMany{
        return $this->hasMany(Check::class);
  }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
