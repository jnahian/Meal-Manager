<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use MirazMac\BanglaString\BanglaString;

if (!function_exists('hasPermission')) {
    function hasPermission()
    {
        if (Auth::check()) {

            $today = Carbon::now()->toDateString();
            $user  = Auth::user();

            if ($user->role == 1) return true;

//            $hasPerm = User::where('id', $user->id)->where('perm_from', '<=', $today)->where('perm_to', '>=', $today)->first();
            $hasPerm = $user->permissions()->where('from', '<=', $today)->where('to', '>=', $today)->first();

            if ($hasPerm) return true;

        }

        return false;
    }
}
if (!function_exists('isAdmin')) {
    function isAdmin()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 1) return true;
        }

        return false;
    }
}

if (!function_exists('bijoyToAvro')) {
    function bijoyToAvro($text = null)
    {
        if ($text) {
            $converter = new BanglaString($text);

            return $converter->toAvro();
        }

        return false;
    }
}

if (!function_exists('avroToBijoy')) {
    function avroToBijoy($text = null)
    {
        if ($text) {
            $converter = new BanglaString($text);

            return $converter->toBijoy();
        }

        return false;
    }
}

if (!function_exists('status')) {
    function status($val = null, $badge = false)
    {
        $status = [
            1 => "Active",
            9 => "Inactive"
        ];

        if ($val) {
            if ($badge) {
                if ($val == 1) return "<span class='new badge green' data-badge-caption=''>{$status[$val]}</span>";
                elseif ($val == 9) return "<span class='new badge orange' data-badge-caption=''>{$status[$val]}</span>";
            } else {
                return isset($status[$val]) ? $status[$val] : "";
            }
        } else {
            return $status;
        }
    }
}

if (!function_exists('Expense_types')) {
    function Expense_types($val = null, $badge = false)
    {
        $status = [
            'R' => "Regular",
            'O' => "Others"
        ];

        if ($val) {
            if ($badge) {
                if ($val == 1) return "<span class='new badge green' data-badge-caption=''>{$status[$val]}</span>";
                elseif ($val == 9) return "<span class='new badge orange' data-badge-caption=''>{$status[$val]}</span>";
            } else {
                return isset($status[$val]) ? $status[$val] : "";
            }
        } else {
            return $status;
        }
    }
}

if (!function_exists('income_expense')) {
    function income_expense($val = null, $badge = false)
    {
        $data = [
            "I" => "আয়",
            "E" => "ব্যায়"
        ];

        if ($val) {
            if ($badge) {
                if ($val == "I") return "<span class='new badge green' data-badge-caption=''>{$data[$val]}</span>";
                elseif ($val == "E") return "<span class='new badge orange' data-badge-caption=''>{$data[$val]}</span>";
            } else {
                return isset($data[$val]) ? $data[$val] : "";
            }
        } else {
            return $data;
        }
    }
}

if (!function_exists('year_list')) {
    function year_list()
    {
        $years = ['' => "Choose"];

        $current = date('Y');

        for ($i = $current; $i >= 2017; $i--) {
            $years[$i] = $i;
        }

        return $years;
    }
}

if (!function_exists('month_list')) {
    function month_list($format = "F")
    {
        $months = ['' => "Choose"];

        for ($i = 1; $i <= 12; $i++) {
            $name       = Carbon::createFromFormat('m', $i)->format($format);
            $months[$i] = $name;
        }

        return $months;
    }
}

if (!function_exists('month_name')) {
    function month_name($month_no = null, $format = "F")
    {
        $months = month_list($format);

        return array_key_exists($month_no, $months) ? $months[$month_no] : false;
    }
}

if (!function_exists('isActiveMenu')) {
    function isActiveMenu($routeName)
    {
        return Request::route()->getName() == $routeName ? 'active' : '';
    }
}
