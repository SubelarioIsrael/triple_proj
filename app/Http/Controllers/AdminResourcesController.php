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
        $validated = $request->validate([
            'url' => 'required|url',
            'thumbnail' => 'required|max:255',
            'title' => 'required|string|max:255',
        ]);

        Resources::create($validated);

        return redirect()->back()->with('success', 'Resource added successfully!');
    }


    public function storeArticle(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'url' => 'required|url',
        ]);

        Articles::create($validated);

        return redirect()->back()->with('success', 'Article added successfully!');
    }


    public function updateResource(Request $request, $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'url' => 'required|url|max:255',
            'thumbnail' => 'required|max:255',
            'title' => 'required|string|max:255',
        ]);

        // Find the resource and update its data
        $resource = Resources::findOrFail($id);
        $resource->update($validated);

        // Redirect back with success message
        return redirect()->route('admin-resources.index')->with('success', 'Resource updated successfully!');
    }

    public function updateArticle(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'url' => 'required|url',
        ]);

        $article = Articles::findOrFail($id);
        $article->update($validated);

        return redirect()->route('admin-resources.index')->with('success', 'Article updated successfully!');
    }
    public function editResource($id)
    {
        $resource = Resources::findOrFail($id); // Fetch the resource
        return view('admin.edit-resource', compact('resource')); // Pass to the view
    }
    public function editArticle($id)
    {
        $article = Articles::findOrFail($id);
        return view('admin.edit-article', compact('article'));
    }

}
