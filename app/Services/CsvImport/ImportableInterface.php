<?php

namespace App\Services\CsvImport;

/**
 * Must implement this interface in the exportable models
 */
interface ImportableInterface
{
    /**
     * Returns the data which should be written in the importable file
     * Sequence of the data must be same as the header columns
     * @return array
     */
    public function  getExportableData(): array;
}
