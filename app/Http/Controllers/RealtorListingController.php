<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Listing;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller; //important for the construct method to work

class RealtorListingController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(Request $request)
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
             ...$request->only(['by', 'order'])
        ];
        return inertia('Realtor/Index',
    [
        'filters' => $filters,
        'listings' => Auth::user()->listings()->mostRecent()->filter($filters)->paginate(5)->withQueryString(),
    ]);
    }


    public function edit(Listing $listing)
    {
        return inertia(
            'Realtor/Edit',
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $listing->update(
            $request->validate([
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
        return redirect()->route('realtor.listing.index')->with('success', 'Listing was changed successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $this->authorize('create', Listing::class);
        return inertia('Realtor/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->user()->listings()->create(
            $request->validate([
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
        return redirect()->route('realtor.index')->with('success', 'Listing created successfully.');
    }


    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();
        return redirect()->back()->with('success', 'Listing was deleted successfully.');
    }

    public function restore(Listing $listing){
        $listing->restore();
        return redirect()->back()->with('success', 'Listing was restored successfully.');
    }
}
