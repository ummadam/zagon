<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sheep;
use App\Charts\SheepChart;

class SheepController extends Controller
{
    public function index()
    {
        $sheeps = Sheep::limit(10)->where('status', 1)->get();
        $zagon1 = [];
        foreach($sheeps as $sheep) {
            if($sheep->zagon == 1) {
                $zagon1[] = $sheep;
            }
        }
        $zagon2 = [];
        foreach($sheeps as $sheep) {
            if($sheep->zagon == 2) {
                $zagon2[] = $sheep;
            }
        }
        $zagon3 = [];
        foreach($sheeps as $sheep) {
            if($sheep->zagon == 3) {
                $zagon3[] = $sheep;
            }
        }
        $zagon4 = [];
        foreach($sheeps as $sheep) {
            if($sheep->zagon == 4) {
                $zagon4[] = $sheep;
            }
        }

        //диаграма
        $chart = new SheepChart();
        $chart->labels(['Общее количество овечек ', 'Количество живых овечек', ' Количество убитых овечек']);
        $chart->height(400);
        $chart->width(500);
        $all = Sheep::all();
        $live = Sheep::all()->where('status', 1);
        $die = Sheep::all()->where('status', 0);
        $chart->dataset('Мясо рубка отчет', 'line',[$all->count(), $live->count(), $die->count()]);

        return view('sheep.index', compact('zagon1','zagon2', 'zagon3', 'zagon4', 'chart'));
    }

    public function update(Request $request)
    {
        foreach($request->all() as $value) {
            if(is_array($value)) {
                foreach($value as $key=>$items) {
                    if($key === 'ms-1') {
                        foreach($items as $item) {
                            $sheep = Sheep::find($item);
                            $sheep->zagon = 1;
                            $sheep->save();
                        }
                    }
                    if($key === 'ms-2') {
                        foreach($items as $item) {
                            $sheep = Sheep::find($item);
                            $sheep->zagon = 2;
                            $sheep->save();
                        }
                    }
                    if($key === 'ms-3') {
                        foreach($items as $item) {
                            $sheep = Sheep::find($item);
                            $sheep->zagon = 3;
                            $sheep->save();
                        }
                    }
                    if($key === 'ms-4') {
                        foreach($items as $item) {
                            $sheep = Sheep::find($item);
                            $sheep->zagon = 4;
                            $sheep->save();
                        }
                    }
                }
            }
        }
        
        return redirect()->route('sheep.index');
    }
    
    public function isdead(Request $request)
    {
        foreach($request->all() as $key=>$item) {
            if($key === '_token' || $key === '_method') {
                continue;
            }
            $sheep = Sheep::find($item);
            $sheep->status = 0;
            $sheep->save();
        }
        return redirect()->back();
    }

    public function save(Request $request) 
    {
        foreach($request->all() as $item) {
            if($item === 'ms-1') {
                Sheep::create([
                    'name' => 'New sheep',
                    'zagon' => 1,
                    'status' => 1
                ]);
            }
            if($item === 'ms-2') {
                Sheep::create([
                    'name' => 'New sheep',
                    'zagon' => 2,
                    'status' => 1
                ]);
            }
            if($item === 'ms-3') {
                Sheep::create([
                    'name' => 'New sheep',
                    'zagon' => 3,
                    'status' => 1
                ]);
            }
            if($item === 'ms-3') {
                Sheep::create([
                    'name' => 'New sheep',
                    'zagon' => 3,
                    'status' => 1
                ]);
            }
        }
        return redirect()->back();
    }
}