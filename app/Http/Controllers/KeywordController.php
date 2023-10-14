<?php

namespace App\Http\Controllers;

use App\Http\Integrations\DataForSeo\DataForSeoConnector;
use App\Http\Integrations\DataForSeo\Requests\PostTaskRequest;
use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KeywordController extends Controller
{
    public function index()
    {

    }

    public function saveKeywordResult(Request $request)
    {
        $post_data_in = file_get_contents('php://input');
        if (!empty($post_data_in)) {
            $post_arr = json_decode(gzdecode($post_data_in), true);
            // you can find the full list of the response codes here https://docs.dataforseo.com/v3/appendix/errors
            if (isset($post_arr['status_code']) and $post_arr['status_code'] === 20000) {
                $this->createKeyword($post_arr);
            } else {
                Log::info('error');
            }
        } else {
            echo "empty POST";
        }

    }

    public function createKeyword(array $data)
    {
        Log::info($data);

        foreach ($data['tasks'] as $task) {
            $explode = explode(',',$task['data']['tag']);
            foreach ($task['result'] as $result) {
                // Log::info($item);
                if (isset($result['items']) && is_array($result['items']) && count($result['items'])  > 0 ) {
                    foreach ($result['items'] as $keyword) {
                        Keyword::create([
                            "search_keyword_id" => @$explode[0],
                            "repetition" => @$explode[1],
                            "type" => @$keyword['type'],
                            "rank_group" => @$keyword['rank_group'],
                            "rank_absolute" => @$keyword['rank_absolute'],
                            "position" => @$keyword['position'],
                            "domain" => @$keyword['domain'],
                            "url" => @$keyword['url'],
                            "title" => @$keyword['title'],
                            "description" => @$keyword['description'],
                        ]);
                    }
                }
            }
        }
    }

}
