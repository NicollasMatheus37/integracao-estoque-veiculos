<?php

namespace App\Models;

use App\Base\BaseModel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Supplier
 *
 * @property int $id
 * @property string $name
 *
 * // Mutators/Casts
 * @property-read string $last_imported_log_date
 * @property-read int|null $import_logs_count
 * @property-read int|null $imported_vehicles_count
 *
 * // Relationships
 * @property-read Collection|Vehicle[] $vehicles
 * @property-read Collection|ImportLog[] $importLogs
 * @property-read ImportLog $lastImportLog
 */
class Supplier extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected function importLogsCount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->importLogs->count()
        );
    }

    protected function importedVehiclesCount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->vehicles->count()
        );
    }

    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }

    public function importLogs(): HasMany
    {
        return $this->hasMany(ImportLog::class);
    }

    public function lastImportLog(): HasOne
    {
        return $this->hasOne(ImportLog::class)->latest()->withDefault();
    }
}
