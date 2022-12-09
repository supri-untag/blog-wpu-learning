<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    use HasFactory;
    public $data = [
        'person1' => [
            'name' => 'Supriyanto',
            'age'=> 21,
            'hobby' => 'programing'
        ],
        'person2' => [
            'name' => 'Supriyanto1',
            'age'=> 21,
            'hobby' => 'programing1'
        ]
    ];

    public function testModel()
    {
        return $this->data;
    }
}
