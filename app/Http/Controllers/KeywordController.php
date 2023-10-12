<?php

namespace App\Http\Controllers;

use App\Http\Integrations\DataForSeo\DataForSeoConnector;
use App\Http\Integrations\DataForSeo\Requests\PostTaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KeywordController extends Controller
{
    public function index(){
        $connector = new DataForSeoConnector();
        $connector->withBasicAuth('atifzaman08@gmail.com','c43c191c0fe50250');
        $data = $connector->send(new PostTaskRequest());
        dd($data->body());
    }
    public function saveKeywordResult(Request $request)
    {
        Log::info(json_encode($request->post()));

    }
    //
}
