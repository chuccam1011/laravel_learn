<?php

namespace App\Http\Controllers;


class PageController extends \Illuminate\Routing\Controller
{
    public function Hello()
    {
        $date1 = [
            'date' => date('H:i:s d/m/Y'),
            'total' => 6
        ];
        return view('hello', $date1);
    }
}
