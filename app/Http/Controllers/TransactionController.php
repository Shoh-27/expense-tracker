<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $transactions = $request->user()->transactions()->with('category')->latest()->paginate(10);
        $income = $request->user()->transactions()->where('kind','income')->sum('amount');
        $expense = $request->user()->transactions()->where('kind','expense')->sum('amount');
        $balance = $income - $expense;

        return view('transactions.index', compact('transactions','income','expense','balance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('transactions.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'kind' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0.01',
            'date' => 'required|date',
            'note' => 'nullable|string|max:255',
        ]);

        $data['user_id'] = $request->user()->id;
        Transaction::create($data);

        return redirect()->route('transactions.index')->with('success', 'Transaction created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $this->authorize('update', $transaction);
        $categories = Category::all();
        return view('transactions.edit', compact('transaction','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $this->authorize('update',$transaction);

        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'kind' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0.01',
            'date' => 'required|date',
            'note' => 'nullable|string|max:255',
        ]);

        $transaction->update($data);
        return redirect()->route('transactions.index')->with('success','Transaction o‘zgartirildi');
    }

    public function destroy(Transaction $transaction)
    {
        $this->authorize('delete',$transaction);
        $transaction->delete();
        return back()->with('success','Transaction o‘chirildi');
    }
}
