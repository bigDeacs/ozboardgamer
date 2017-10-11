<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\GameRequest;
use App\Game;
use App\Theme;
use App\Mechanic;
use App\Type;
use App\Designer;
use App\Publisher;
use App\Family;
use App\Award;
use Storage;
use Image;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function games()
    {
        return $games = Game::all();
    }

}
