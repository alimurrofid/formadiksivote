<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class UsersImport implements ToModel, WithCustomCsvSettings
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row[0]) || trim($row[0]) === '') {
            return null;
        }

        $nim = trim($row[0]);
        $name = isset($row[1]) ? trim($row[1]) : '';

        if (preg_match('/E\+\d+$/i', $nim)) {
            $nim = str_replace(',', '.', $nim);
            $nim = sprintf('%.0f', (float) $nim);
        }

        return new User([
            'name' => $name,
            'username' => $nim,
            'password' => bcrypt($nim),
        ]);
    }
}
