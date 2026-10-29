<?php
 
namespace App\Http\Controllers;
 
use App\Models\equipments;
 
class BookController extends Controller
{
    public function index()
    {
        $equipments = action::with('category')->latest()->get();
        return view('loans.index', compact('request'));
    }
}
