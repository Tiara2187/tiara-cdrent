<?php
 
namespace App\Http\Controllers;
 
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
 
 
class UserController extends Controller
{
 
    public function __construct()
    {
        $this->middleware("auth");
    }
 
    public function index()
    {
        return Auth::user();
    }
}