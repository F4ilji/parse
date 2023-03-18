<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parser extends Model
{
    use HasFactory;

    private string $url;

    public function __construct($url)
    {
        $this->url = $url;

    }



    public function getData() {
        $data = json_decode($this->url, true); // парсим JSON-данные в ассоциативный массив  
        $reviews = array_values($data['reviews']);
        $reviews = array_map(function($item) {
            return [
                "name" => $item["user"]['first_name'],
                "text" => $item["text"],
            ];
        }, $reviews); 
        return $reviews;   
    }

}
