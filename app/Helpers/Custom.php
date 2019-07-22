<?php

if ( !function_exists( 'bijoyToAvro' ) ) {
    function bijoyToAvro( $text = NULL )
    {
        if ( $text ) {
            $converter = new \MirazMac\BanglaString\BanglaString( $text );

            return $converter->toAvro();
        }

        return FALSE;
    }
}

if ( !function_exists( 'avroToBijoy' ) ) {
    function avroToBijoy( $text = NULL )
    {
        if ( $text ) {
            $converter = new \MirazMac\BanglaString\BanglaString( $text );

            return $converter->toBijoy();
        }

        return FALSE;
    }
}

if ( !function_exists( 'status' ) ) {
    function status( $val = NULL, $badge = FALSE )
    {
        $status = [
            1 => "সক্রিয়",
            9 => "নিষ্ক্রিয়"
        ];

        if ( $val ) {
            if ( $badge ) {
                if ( $val == 1 ) return "<span class='new badge green' data-badge-caption=''>{$status[$val]}</span>";
                elseif ( $val == 9 ) return "<span class='new badge orange' data-badge-caption=''>{$status[$val]}</span>";
            } else {
                return isset( $status[$val] ) ? $status[$val] : "";
            }
        } else {
            return $status;
        }
    }
}

if ( !function_exists( 'income_expense' ) ) {
    function income_expense( $val = NULL, $badge = false )
    {
        $data = [
            "I" => "আয়",
            "E" => "ব্যায়"
        ];

        if ( $val ) {
            if ( $badge ) {
                if ( $val == "I" ) return "<span class='new badge green' data-badge-caption=''>{$data[$val]}</span>";
                elseif ( $val == "E" ) return "<span class='new badge orange' data-badge-caption=''>{$data[$val]}</span>";
            } else {
                return isset( $data[$val] ) ? $data[$val] : "";
            }
        } else {
            return $data;
        }
    }
}

if ( !function_exists( 'year_list' ) ) {
    function year_list()
    {
        $years = [ '' => "নির্বাচন করুন" ];

        $current = date( 'Y' );

        for ( $i = $current; $i >= 2017; $i-- ) {
            $years[$i] = $i;
        }

        return $years;
    }
}

if ( !function_exists( 'month_list' ) ) {
    function month_list()
    {
        $months = [ '' => "নির্বাচন করুন" ];

        for ( $i = 1; $i <= 12; $i++ ) {
            $name = \Carbon\Carbon::createFromFormat( 'm', $i )->format( "F" );
            $months[$i] = $name;
        }

        return $months;
    }
}
