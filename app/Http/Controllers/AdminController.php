<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Проверка, является ли пользователь администратором
        if (Auth::check() && Auth::user()->role === 'admin') {
            return view('admin.index'); // создайте представление admin/index.blade.php
        }

        return redirect('/'); // или на другую страницу, если доступ запрещен
    }
}