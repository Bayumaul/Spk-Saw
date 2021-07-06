<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\Kriteria;
use Illuminate\Http\Request;

class CombinationsController extends Controller
{
    function combination_number($k,$n){
        $n = intval($n);
        $k = intval($k);
        if ($k > $n){
            return 0;
        } elseif ($n == $k) {
            return 1;
        } else {
            if ($k >= $n - $k){
                $l = $k+1;
                for ($i = $l+1 ; $i <= $n ; $i++)
                    $l *= $i;
                $m = 1;
                for ($i = 2 ; $i <= $n-$k ; $i++)
                    $m *= $i;
            } else {
                $l = ($n-$k) + 1;
                for ($i = $l+1 ; $i <= $n ; $i++)
                    $l *= $i;
                $m = 1;
                for ($i = 2 ; $i <= $k ; $i++)
                    $m *= $i;            
            }
        }
        return $l/$m;
    }

    function array_combination($le, $set){

        $lk = $this->combination_number($le, count($set));
        $ret = array_fill(0, $lk, array_fill(0, $le, '') );

        $temp = array();
        for ($i = 0 ; $i < $le ; $i++)
            $temp[$i] = $i;

        $ret[0] = $temp;

        for ($i = 1 ; $i < $lk ; $i++){
            if ($temp[$le-1] != count($set)-1){
                $temp[$le-1]++;
            } else {
                $od = -1;
                for ($j = $le-2 ; $j >= 0 ; $j--)
                    if ($temp[$j]+1 != $temp[$j+1]){
                        $od = $j;
                        break;
                    }
                if ($od == -1)
                    break;
                $temp[$od]++;
                for ($j = $od+1 ; $j < $le ; $j++)    
                    $temp[$j] = $temp[$od]+$j-$od;
            }
            $ret[$i] = $temp;
        }
        for ($i = 0 ; $i < $lk ; $i++)
            for ($j = 0 ; $j < $le ; $j++)
                $ret[$i][$j] = $set[$ret[$i][$j]];   

        return $ret;
    }

    public function index()
    {
        $mySet = array(
            'A',
            'B',
            'C',
            // 'Adobe PS',
            // 'Adobe Ilustrator',
            // 'Adobe XD',
            // 'Corel Draw',
            // 'Sketch',
            // 'Figma',
            // 'Blender',
        );
        // $mySet = array('1','4','5','2');
        $myArr = [];

        for ($i=0; $i < count($mySet); $i++) {
            array_push($myArr, $this->array_combination($i+1, $mySet));
        }

        // for ($i=1; $i <= count($mySet); $i++) { 
        //     echo "INSERT INTO `crip` (`id`, `kriteria_id`, `nama_crip`, `nilai_crip`, `created_at`, `updated_at`) VALUES (NULL, '4', 'Adobe PS, Adobe Ilustrator, Adobe XD, Corel Draw', '4', CURRENT_TIME(), CURRENT_TIME())";
        // }
        // print_r($myArr);

        // for ($i=0; $i < count($myArr[0]); $i++) { 
        //     // echo $i; //qty crit
        //     print_r($myArr[$i]);
        //     // for ($j=0; $j < count($myArr[0][$i]); $j++) { 
        //     //     // print_r($myArr[0][$i]);
        //     //     // echo $j;
        //     // }
        // }

        return $myArr;

        // for ($i=0; $i < count($mySet); $i++) { 
        //     # code...
        // }
        // return $this->array_combination(4, $mySet)[3][2];
    }
}
