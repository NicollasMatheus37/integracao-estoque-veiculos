<?php

namespace App\Models;

use App\Base\BaseModel;
use App\Enums\ImportLogStatusEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\ImportLog
 *
 * @property int $id
 * @property int $supplier_id
 * @property string $original_file_name
 * @property string $filename
 * @property string $mime_type
 * @property int|ImportLogStatusEnum $status
 * @property int $processed_items
 * @property int $error_items
 *
 * @property-read int $total_items
 * @property-read Supplier $supplier
 */
class ImportLog extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'filename',
        'original_file_name',
        'mime_type',
        'status',
        'processed_items',
        'error_items',
    ];

    protected function totalItems(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->processed_items + $this->error_items
        );
    }

    public function status(): Attribute
    {
        return Attribute::make(
            get: fn (int $value) => ImportLogStatusEnum::getDescription($value),
            set: fn (ImportLogStatusEnum $value) => $value->value
        );
    }

    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value ? $this->asDateTime($value)->format('d/m/Y H:i') : null
        );
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class)->withTrashed();
    }

    public function fail(): void
    {
        $this->status = ImportLogStatusEnum::FAILED;
    }

    public function success(): void
    {
        $this->status = ImportLogStatusEnum::SUCCESS;
    }

    public static function init(?array $attributes = []): ImportLog
    {
        $importLog = new ImportLog($attributes);
        $importLog->status = ImportLogStatusEnum::PROCESSING;

        return $importLog;
    }
}
