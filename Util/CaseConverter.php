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
     * Converts a string into underscore format (e.g. first_name)
     *
     * @param string $str String
     *
     * @return string $str In underscore format
     */
    public function toUnderscoreCase($str)
    {
        $str = trim(lcfirst($str));

        // camel case
        $str = preg_replace_callback('/([A-Z])/', create_function('$c', 'return "_" . strtolower($c[1]);'), $str);

        // title case
        $str = str_replace(' ', '', $str);

        return $str;
    }

    /**
     * Converts a string into title format (e.g. First Name)
     *
     * @param string $str String
     *
     * @return string $str Translated into title format
     */
    public function toTitleCase($str)
    {
        $str = ucfirst($str);

        // camelCase
        $str = preg_replace_callback('/([A-Z])/', create_function('$c', 'return " " . ucfirst($c[1]);'), $str);

        // lowercase title
        $str = preg_replace_callback('/ ([a-z])/', create_function('$c', 'return " " . ucfirst($c[1]);'), $str);

        // underscore
        $str = preg_replace_callback('/_([a-z])/', create_function('$c', 'return " " . strtoupper($c[1]);'), $str);

        return trim($str);
    }

    /**
     * Converts a string to camel case format (e.g. firstName)
     *
     * @param string $str String
     *
     * @return string $str translated into camel case
     */
    public function toCamelCase($str)
    {
        $str = lcfirst($str);

        // underscore
        $str = preg_replace_callback('/_([a-z])/', create_function('$c', 'return strtoupper($c[1]);'), $str);

        // title
        $str = preg_replace_callback('/ ([a-z])/', create_function('$c', 'return strtoupper($c[1]);'), $str);

        $str = str_replace(' ', '', $str);

        return $str;
    }

    /**
     * Converts a string to pascal case format (e.g. FirstName)
     *
     * @param string $str String
     *
     * @return string $str translated into camel case
     */
    public function toPascalCase($str)
    {
        $str = ucfirst($str);

        // underscore
        $str = preg_replace_callback('/_([a-z])/', create_function('$c', 'return strtoupper($c[1]);'), $str);

        // title
        $str = preg_replace_callback('/ ([a-z])/', create_function('$c', 'return strtoupper($c[1]);'), $str);

        $str = str_replace(' ', '', $str);

        return $str;
    }

    /**
     * Convert string
     *
     * @param string $str    Input string
     * @param string $format Case format
     *
     * @return string
     */
    public function convert($str, $format = 'camel')
    {
        switch($format) {
            case 'camel':
                return $this->toCamelCase($str);
                break;
            case 'pascal':
                return $this->toPascalCase($str);
                break;
            case 'title':
                return $this->toTitleCase($str);
                break;
            case 'underscore':
                return $this->toUnderscoreCase($str);
                break;
        }
    }

    /**
     * Get the format of a string
     *
     * @param string $str
     *
     * @return string The strings format
     */
    public function getFormat($str)
    {
        if (strpos($str, ' ')) {
            return 'title';
        } else if (strpos($str, '_')) {
            return 'underscore';
        } else if ($str{0} === strtoupper($str{0})) {
            return 'pascal';
        } else {
            return 'camel';
        }
    }

}
