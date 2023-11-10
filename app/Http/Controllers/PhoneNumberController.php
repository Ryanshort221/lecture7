<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\phone_number_model1s;
use App\Models\User;
use App\Models\accountsModel;

class PhoneNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     if($request->phoneNumber == null || $request->phoneNumber == ''){
    //         return redirect()->back()->withErrors(['Please enter a phone number']);
    //     }
    
    //     $phoneNumber = phone_number_model1s::findOrFail($id);
    //     $phoneNumber->phoneNumber = $request->phoneNumber;
    //     $phoneNumber->save();
    //     $user = User::findOrFail($id);
    //     $phoneNumbers = phone_number_model1s::where('user_id', $id)->get();
    //     $accounts = accountsModel::where('user_id', $id)->get();
    //     $viewData = [
    //         'user_id' => $id,
    //         'name'=> $user->name,
    //         'address'=> $user->address,
    //         'phoneNumbers' => $phoneNumbers,
    //         'accounts' => $accounts,
    //     ];
        
    //     return view('userHome', $viewData);
    // }
    
    public function update(Request $request, $id)
{
    if($request->phoneNumber == null || $request->phoneNumber == ''){
        return redirect()->back()->withErrors(['Please enter a phone number']);
    }

    $phoneNumber = phone_number_model1s::findOrFail($id);
    $phoneNumber->phoneNumber = $request->phoneNumber;
    $phoneNumber->save();

    // Redirect to the userHome route
    return redirect()->route('userHome', ['id' => $phoneNumber->user_id]);
}

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //TODO add logic to be able to delete a phone number/they can have multiple so will need to figure out how to handle
    }
}
