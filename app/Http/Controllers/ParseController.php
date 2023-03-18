<?php

namespace App\Http\Controllers;

use App\Models\Parser;
use App\Models\Report;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class ParseController extends Controller
{
    function index() {

        $result = Report::find(2);
        $back = ['name' => $result->name,
        'text' => $result->text];

        $url = file_get_contents('https://public-api.reviews.2gis.com/2.0/branches/70000001032789824/reviews?limit=12&is_advertiser=false&fields=meta.providers,meta.branch_rating,meta.branch_reviews_count,meta.total_count,reviews.hiding_reason,reviews.is_verified&without_my_first_review=false&rated=true&sort_by=date_edited&key=37c04fe6-a560-4549-b459-02309cf643ad&locale=ru_RU'); // получаем JSON-данные из API
        
        $parse = new Parser($url);

        
        foreach ($parse->getData() as $review) {
            if (empty(array_diff_assoc($back, $review))) {
                echo "1".'<br>';
            } else {
                echo "0".'<br>';
            }
        }
        
        }


    }

