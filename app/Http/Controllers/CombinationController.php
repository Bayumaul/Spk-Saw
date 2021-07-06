<?php

namespace App\Http\Controllers;

use DB;
use App\Alternatif;
use App\Kriteria;
use Illuminate\Http\Request;

class CombinationController extends Controller
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
        $kriteria_id = "4";
        $created_at = "2021-01-01";
        $updated_at = "2021-01-01";

        $mySet = array(
            'Adobe PS',
            'Adobe Ilustrator',
            'Adobe XD',
            'Corel Draw',
            'Sketch',
            'Figma',
            'Blender'
        );

        $myArr = [];

        for ($i=0; $i < count($mySet); $i++) {
            array_push($myArr, $this->array_combination($i+1, $mySet));
        }

        // foreach ($myArr as $value) {
        //     $data_crip = array(
        //         'id' => null,
        //         'kriteria_id' => $kriteria_id,
        //         'nama_crip' => implode(", ", $myArr),
        //         'nilai_crip' => count($value)
        //     );
        //     // print_r($data_crip);
        //     // $this->db->insert('crip', $data_crip);
        //     DB::table('crip')->insert($data_crip);
        // }

        // return $myArr;

        $query = [];
        foreach ($myArr as $value) {
            foreach ($value as $values) {
                $data_crip = array(
                    'id' => null,
                    'kriteria_id' => $kriteria_id,
                    'nama_crip' => implode(", ", $values),
                    'nilai_crip' => count($values),
                );

                array_push($query, $data_crip);
                DB::table('crip')->insert($data_crip);
            }
        }

        return $query;
    }
}
