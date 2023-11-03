<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function manageDashboard() {
        return view('admin.dashboard');
    }
    public function manageUsers()
    {

        $data['userAll'] = User::all();

        return view('admin.users', $data);
    }

    public function manageOrders()
    {
        return view('admin.orders.index');
    }

    public function managePayments()
    {
        return view('admin.payments');
    }

    public function manageFulfillment()
    {
        return view('admin.fulfillment');
    }

    public function manageReports()
    {
        return view('admin.reports');
    }

    public function manageProducts()
    {
        return view('admin.products.index');
    }

    public function manageBrands()
    {
        return view('admin.products.suppliers.index');
    }

    public function manageGallery()
    {
        return view('admin.gallery');
    }

    public function managePromotion()
    {
        return view('admin.promotion');
    }

    public function manageSettings()
    {
        return view('admin.settings');
    }

    public function manageCategories()
    {
        return view('admin.category.index');
    }
}
