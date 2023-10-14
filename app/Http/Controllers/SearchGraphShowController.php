<?php

namespace App\Http\Controllers;

use App\Http\Integrations\DataForSeo\DataForSeoConnector;
use App\Http\Integrations\DataForSeo\Requests\PostTaskRequest;
use App\Models\SearchKeyword;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;

class SearchGraphShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $data =  SearchKeyword::with(['keywords'=>fn($q)=>$q->orderBy('repetition')])->findOrFail($id);
        return view('item',["data"=>$data]);
    }
}
