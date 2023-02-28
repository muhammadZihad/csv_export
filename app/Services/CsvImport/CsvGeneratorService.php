<?php

namespace App\Services\CsvImport;

use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class CsvGeneratorService
{
    protected string $file;

    public function __construct()
    {
        $fileName = $this->generateFileName();

        if (!$this->fileExists($fileName)) {
            $this->generateNewFile($fileName);
        }

        $this->file = $fileName;
    }

    /**
     * Check if the file exists
     *
     * @param string $filename
     * @return boolean
     */
    protected function fileExists(string $filename): bool
    {
        return Storage::disk('public')->exists($filename);
    }

    /**
     * Generate new file name
     *
     * @return string
     */
    protected function generateFileName(): string
    {
        return preg_replace('/-/', '', now()->toDateString()) . '-students.csv';
    }

    /**
     * Generate new csv file
     *
     * @param string $fileName
     * @return void
     */
    protected function generateNewFile(string $fileName): void
    {
        Storage::disk('public')->put($fileName, $this->getCsvHeaders());
    }

    /**
     * Get header columns of the csv file
     *
     * @return string
     */
    protected function getCsvHeaders(): string
    {
        return 'first_name,last_name,student_id,age,department,subjects';
    }


    public function insertColumns($data)
    {
        if (is_array($data)) {
            return $this->insertFromArray($data);
        } else if ($data instanceof Collection) {
            return $this->insertFromCollection($data);
        }
        throw new Exception("Insertable data must be array or collection.");
    }

    protected function insertFromArray(array $records)
    {
        dd('array given');
    }

    protected function insertFromCollection(Collection $records)
    {
        foreach ($records as $record) {
            dump($record->getExportableData());
        }
    }
}
