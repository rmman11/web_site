<?php

namespace App\Imports;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
  
        public function model(array $row)
        {
            return new User([
                'name' => $row[1],
                'email' => $row[2],
                'password' => bcrypt($row[3]),
            ]);
        }
}
