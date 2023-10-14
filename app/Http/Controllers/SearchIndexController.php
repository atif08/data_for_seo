<?php

namespace App\Http\Controllers;

use App\Http\Integrations\DataForSeo\DataForSeoConnector;
use App\Http\Integrations\DataForSeo\Requests\PostTaskRequest;
use App\Models\SearchKeyword;
use Illuminate\Http\Request;

class SearchIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
       return  view('dashboard',['searches'=> SearchKeyword::where('user_id',auth()->user()->id)->get()]);
    }
}
