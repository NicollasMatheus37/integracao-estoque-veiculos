<?php

namespace App\Services;

use App\Models\ImportLog;
use Exception;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Storage;

class ImportVehicleService
{
    public static function import(TemporaryUploadedFile $file, int $supplierId): ImportLog
    {
        $importLog = self::initImportModel($file, $supplierId);

        try {
            self::executeImport($file, $importLog);
            $importLog->success();
        } catch (Exception $e) {
            \Log::info(print_r($e->getMessage(), true));
            $importLog->fail();
        } finally {
            $importLog->save();
        }

        return $importLog;
    }

    public static function initImportModel(TemporaryUploadedFile $file, int $supplierId): ImportLog
    {
        return ImportLog::init([
            'supplier_id' => $supplierId,
            'original_file_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getMimeType(),
        ]);
    }

    private static function executeImport(TemporaryUploadedFile $file, ImportLog $importLog): void
    {
        $filename = self::saveFile($file);
        $importLog->filename = $filename;

        if ($importLog->mime_type === 'application/json') {
            ProcessJsonFileService::process($filename, $importLog);
        } elseif ($importLog->mime_type === 'text/xml') {
            ProcessXmlFileService::process($filename, $importLog);
        } else {
            throw new Exception('Invalid file format');
        }
    }

    private static function saveFile($file)
    {
        $filename = $file->store('imports');
        Storage::put($filename, $file->get());

        if (!Storage::exists($filename)) {
            throw new Exception('File not found');
        }

        return $filename;
    }
}
