<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function table_load_content(Request $request)
    {
        $jsonData = $request->users_data;
        $objectData = json_decode(json_encode($jsonData));
        return view('tableRow', compact('objectData'));
    }

    public function table()
    {
        return view('table')->render();
    }

    public function index()
    {
        $table = $this->table();
        return view('index', compact('table'));
    }
}
