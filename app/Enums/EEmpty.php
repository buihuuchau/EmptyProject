<?php

namespace App\Enums;

abstract class EEmpty
{
    const ONE = 1;
    const TWO = 2;
    const THREE = 3;
    const FOUR = 4;
    const FIVE = 5;
    const ArrayEEmptyType = [
        self::ONE,
        self::TWO,
        self::THREE,
        self::FOUR,
        self::FIVE,
    ];
    const ArrayEEmptyType2 = [
        self::ONE,
        self::TWO,
        self::THREE,
    ];
    const ArrayEEmptyType3 = [
        self::FOUR,
        self::FIVE,
    ];
    public static function changeValueToName($value)
    {
        switch ($value) {
            case self::ONE:
                return 'ONE';
            case self::TWO:
                return 'TWO';
            case self::THREE:
                return 'THREE';
        }
    }
    public static function changeValueToName2($value)
    {
        switch ($value) {
            case self::FOUR:
                return 'BỐN';
            case self::FIVE:
                return 'NĂM';
        }
    }
    public static function changeValueToName3($value)
    {
        switch ($value) {
            case self::ONE:
                return '1';
            case self::TWO:
                return '2';
            case self::THREE:
                return '';
        }
    }
}
