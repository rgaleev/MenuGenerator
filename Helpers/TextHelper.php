<?php
/**
 * User: Roman Galeev <roman.galeev@lazada.com>
 * Date: 24/10/15
 * Time: 00:46
 */

namespace Helpers;

class TextHelper
{
    /**
     * Преобразует строку к URL-виду. Фактически производит транслитерацию и заменяет пробелы и некоторые другие
     * символы в знаки подчёркивания
     *
     * @param $string
     * @return string
     */
    public static function urlFormat($string)
    {
        mb_internal_encoding('utf-8');

        $string = mb_strtolower(trim($string));

        $replacement = array(
            'а'  => 'a',
            'б'  => 'b',
            'в'  => 'v',
            'г'  => 'g',
            'д'  => 'd',
            'е'  => 'e',
            'ё'  => 'yo',
            'ж'  => 'zh',
            'з'  => 'z',
            'и'  => 'i',
            'й'  => 'y',
            'к'  => 'k',
            'л'  => 'l',
            'м'  => 'm',
            'н'  => 'n',
            'о'  => 'o',
            'п'  => 'p',
            'р'  => 'r',
            'с'  => 's',
            'т'  => 't',
            'у'  => 'u',
            'ф'  => 'f',
            'х'  => 'h',
            'ц'  => 'c',
            'ч'  => 'ch',
            'ш'  => 'sh',
            'щ'  => 'shch',
            'ъ'  => '',
            'ы'  => 'y',
            'ь'  => '',
            'э'  => 'e',
            'ю'  => 'yu',
            'я'  => 'ya',
            ' '  => '-',
            '&'  => 'and',
            '/'  => '-',
            '\\' => '-',
        );

        $string = strtr($string, $replacement);

        $string = preg_replace('/[^0-9a-z-]+/i', '', $string);
        $string = preg_replace('/-{2,}/', '-', $string);

        return $string;
    }
}
