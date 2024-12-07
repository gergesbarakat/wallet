<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Subscribtion;
use Illuminate\Http\Request;

class SubscribtionController extends Controller
{

    public function index()
    {
        return view('admin.subscribtions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show(Subscribtion $subscribtion)
    {
        return view('admin.subscribtions.index');
    }

    public function create()
    {
        return view('admin.subscribtions.add');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|min:3|unique:subscribtions|max:30',
            'subscribtion_type' => 'required|min:3|max:30',
            'subscribtion_price' => 'required|numeric|min:1|max:9999',
            'subscribtion_maximum_price' => 'required|numeric|min:1|max:10000',
            'duration' => 'required|min:1|max:30',

        ]);
        if ($request->subscribtion_maximum_price < $request->subscribtion_price) {
            return redirect()->back()->with('error', ' subscribtion price cant be bigger then maximum price');
        } else {
            subscribtion::create([
                'name' => $request->name,
                'price' => $request->subscribtion_price,
                'maximum_price' => $request->subscribtion_maximum_price,
                'type' => $request->subscribtion_type,
                'status' => 'active',
                'duration' => $request->duration,

            ]);

            return redirect()->route('admin.subscribtions.index')->with('success', 'subscribtions created successfully.');
        }
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(subscribtion $subscribtion)
    {
        return view('admin.subscribtions.edit', ['id' => $subscribtion->id]);

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, subscribtion $subscribtion)
    {
        $request->validate([
            'subscribtion_name' => 'required|min:3|unique:subscribtions,name,'.$subscribtion->name.',name|max:30',
            'subscribtion_type' => 'required|min:3|max:30',
            'subscribtion_price' => 'required|integer|min:0',
            'subscribtion_maximum_price' => 'required|integer|min:0',
            'duration' => 'required|min:1|max:30',

        ]);
         if ($request->subscribtion_maximum_price < $request->subscribtion_price) {
            return redirect()->back()->with('error', ' subscribtion price cant be bigger then maximum price');
        } else {
            $subscribtion->update([
                'name' => $request->subscribtion_name,
                'price' => $request->subscribtion_price,
                'maximum_price' => $request->subscribtion_maximum_price,
                'type' => $request->subscribtion_type,
                'status' => 'active',
                'duration' => $request->duration,

            ]);
            return redirect()->route('admin.subscribtions.index')->with('success','subscribtion Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(subscribtion $subscribtion)
    {
        $subscribtion->update([
            'status' => 'inactive',
        ]);
        return redirect()->route('admin.subscribtions.index')->with('success','subscribtion Deactivated Successfully');
    }
}
