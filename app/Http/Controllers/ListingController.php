<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Listing/Index',[
            'listings' => Listing::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Listing/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Listing::create($request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'price' => 'required|numeric|min:0|max:20000000',
                'area' => 'required|integer|min:15|max:255',
                'city' => 'required|string|max:255',
                'street_nr' => 'required|min:1|max:1000',
                'street' => 'required|string|max:255',
                'code' => 'required|integer|min:1000|max:9999',

            ])
        );
        return redirect()->route('listing.index')->with('success', 'Listing created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Listing  $listing)
    {
        return inertia('Listing/Show',[
            'listing' => $listing
        ]);
    }

    public function edit(Listing $listing)
    {
        return inertia('Listing/Edit',
        [
            'listing' => $listing
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $listing->update($request->validate([
            'beds' => 'required|integer|min:0|max:20',
            'baths' => 'required|integer|min:0|max:20',
            'price' => 'required|numeric|min:0|max:20000000',
            'area' => 'required|integer|min:15|max:255',
            'city' => 'required|string|max:255',
            'street_nr' => 'required|min:1|max:1000',
            'street' => 'required|string|max:255',
            'code' => 'required|integer|min:1000|max:9999',

        ])
    );
    return redirect()->route('listing.index')->with('success', 'Listing was changed successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->back()->with('success', 'Listing was deleted successfully.');
    }
}
