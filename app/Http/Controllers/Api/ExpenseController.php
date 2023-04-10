<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ExpenseController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'date'      => 'required',
            'merchant'  => 'required',
            'total'     => 'required',
            'comment'   => '',
        ]);
        $path = $request->file('receipt')?->store('uploads');
        $attributes['receipt'] = $path;
        $attributes['status'] = 'New';
        auth()->user()->expenses()->create($attributes);

        return Response::api('Added Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $attributes = $request->validate([
            'date'      => 'required',
            'merchant'  => 'required',
            'total'     => 'required',
            'comment'   => '',
        ]);
        $path = $request->file('receipt')?->store('uploads');
        $attributes['receipt'] = $path ?? $expense->receipt;
        $expense->update($attributes);

        return Response::api('Updated Successfully');

    }

}
