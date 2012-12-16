<?php

namespace Avro\CaseBundle\Util;

/**
 * Convert strings into different case formats
 *
 * @author Joris.w.dewit <joris.w.dewit@gmail.com>
 *
 */
class CaseConverter
{
    /**
     * Convert a string with underscores into pascal case
     *
     * @param string $str String in underscore format
     *
     * @return string in pascal case
     */
    public function underscoreToPascalCase($str)
    {
        $str = ucfirst($str);
        $func = create_function('$c', 'return strtoupper($c[1]);');

        return preg_replace_callback('/_([a-z])/', $func, $str);
    }
}
