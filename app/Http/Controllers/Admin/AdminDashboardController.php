<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Visitor;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $startDate = now()->subDays(7)->startOfDay(); // Get the start date 7 days ago
        $endDate = now()->endOfDay(); // Get the end date (today)

        $lastWeekUsers = User::whereBetween('created_at', [$startDate, $endDate])->count();
        $lastWeekVisitor = Visitor::whereBetween('created_at', [$startDate, $endDate])->count();

        $visitorCount = Visitor::count();

        $totalClient = User::count();

        // Calculate the percentage increase
        $increaseUser = $lastWeekUsers ? ($totalClient - $lastWeekUsers) / $lastWeekUsers * 100 : null;

        // Calculate the percentage increase
        $increaseVisitor = $lastWeekVisitor ? ($visitorCount - $lastWeekVisitor) / $lastWeekVisitor * 100 : null;

        $information = array();

        $orders = Order::all();

        return view("dashboard", ["visitorCount" => $visitorCount, "totalClient" => $totalClient, "increaseUser" => $increaseUser, "increaseVisitor" => $increaseVisitor, "orders" => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
