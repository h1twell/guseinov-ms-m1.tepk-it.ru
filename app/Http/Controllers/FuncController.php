<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 4 модуль
class FuncController extends Controller
{
    public function m4(ProductType $productType, MaterialType $materialType, int $quantity, float $parametr1, float $parametr2, float $storage) {
        try {
            $need_quantity = ceil($parametr1 * $parametr2 * $productType->coefficient * $quantity / (1 + $materialType->defect / 100 ));

            return max(0, (int)($need_quantity - $storage));
        } catch (\Exception $e) {
            return -1;
        }
    }

}
