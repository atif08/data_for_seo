<?php

namespace App\Http\Controllers;

use App\Http\Integrations\DataForSeo\DataForSeoConnector;
use App\Http\Integrations\DataForSeo\Requests\PostTaskRequest;
use App\Models\SearchKeyword;
use Illuminate\Http\Request;

class SearchKeywordController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'location_code' => 'required',
            'keyword' => 'required',
            'device' => 'required',
            'repetition' => 'required',
        ]);

        $item = SearchKeyword::create($data+['language_code'=>"en","user_id"=>auth()->user()->id]);

        $connector = new DataForSeoConnector();
        $connector->withBasicAuth('atifzaman08@gmail.com', 'c43c191c0fe50250');

        for ($i=1; $i <= $request->repetition;$i++){

            $data = $connector->send(new PostTaskRequest($request,$item,$i));

        }

    }
}
