<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PokeController extends Controller
{
    public function index (Request $res) {
        $page = $res->page;
        $search = strtolower($res->search);
        $limit =  $res->limit;
        $sort = strtolower($res->sort);
        $data = (object) [];

        $results = $this->getPoke('pokemon?limit=100000&offset=0')->results;

        if ($search) {
            $results = array_values(array_filter($results, function ($val) use($search) {
                return strpos($val->name, $search) !== false;
            }));
        }
        
        $total_page = ceil(count($results) / ($limit ?? 20));

        if ($page) {
            if (!is_numeric($page)) {
                $page = 1;
            }

            if (!is_numeric($limit)) {
                $limit = 20;
            }

            $results = array_slice($results, ($page - 1) * $limit, $limit);
        }

        if (!$page && $limit) {
            if (!is_numeric($limit)) {
                $limit = 20;
            }

            $total_page = 1;
            $results = array_slice($results, 0, $limit);
        }

        if ($sort) {
            switch ($sort) {
                case 'asc':
                    usort($results, function ($prev, $next) {
                        return strcmp($prev->name, $next->name);
                    });

                    break;

                case 'desc':
                    usort($results, function ($prev, $next) {
                        return strcmp($prev->name, $next->name) * -1;
                    });

                    break;
            }
        }

        $total_results = count($results);
        
        $data->current_page = (int) $page;
        $data->total_page = $total_page;
        $data->total_results = $total_results;
        $data->results = $results;

        return response()->json([
            'message' => 'success display a listing of the resource',
            'data' => $data
        ], Response::HTTP_OK);
    }

    private function getPoke ($params) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pokeapi.co/api/v2/{$params}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));

        $res = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            return json_decode($res);
        }
    }
}
