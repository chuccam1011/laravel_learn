<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Ptb2 extends Controller
{
    public function getFormGiaiPTB2()
    {
        return view('form');
    }

    public function getFormGiaiPTB2Submit(Request $request)
    {
        $result = $this->giaiPTB2($request->num_a, $request->num_b, $request->num_c);
        return view('ptb2_result', [
            'result' => $result
        ]);
    }

    public function giaiPTB2($a, $b, $c)
    {
        // kiểm tra biến đầu vào
        if ($a == "")
            $a = 0;
        if ($b == "")
            $b = 0;
        if ($c == "")
            $c = 0;
        // in phương trình ra màn hình
        echo "Phương trình: " . $a . "x2 + " . $b . "x + " . $c . " = 0";
        echo "<br>";
        // kiểm tra các hệ số
        if ($a == 0) {
            if ($b == 0) {
            } else {
                $nghiem[]= (-$c / $b);
                return $nghiem;
            }

        }
        // tính delta
        $delta = $b * $b - 4 * $a * $c;
        echo $delta;
        $nghiem = [];
        // tính nghiệm
        if ($delta > 0) {
            $nghiem[] = (-$b + sqrt($delta)) / (2 * $a);
            $nghiem[] = (-$b - sqrt($delta)) / (2 * $a);
        } else if ($delta == 0) {
            $nghiem[] = (-$b / (2 * $a));
        }
        return $nghiem;
    }
}
