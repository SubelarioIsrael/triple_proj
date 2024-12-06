<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resources;
use App\Models\Articles;

class AdminResourcesController extends Controller
{
    public function index()
    {
        // Fetch all resources and articles
        $resources = Resources::all();
        $articles = Articles::all();

        return view('admin.admin-resources', compact('resources', 'articles'));
    }
    public function storeResource(Request $request)
    {
        Resources::create($request->all());
        return redirect()->back()->with('success', 'Resource added successfully!');
    }

    public function storeArticle(Request $request)
    {
        Articles::create($request->all());
        return redirect()->back()->with('success', 'Article added successfully!');
    }
    public function updateResource(Request $request, $id)
    {
        $resource = Resources::findOrFail($id);
        $resource->update($request->all());
        return redirect()->back()->with('success', 'Resource updated successfully!');
    }

    public function updateArticle(Request $request, $id)
    {
        $article = Articles::findOrFail($id);
        $article->update($request->all());
        return redirect()->back()->with('success', 'Article updated successfully!');
    }
}
