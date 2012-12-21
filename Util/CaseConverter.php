<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
     * @param string|array $input String
     *
     * @return string|array $result In underscore format
     */
    public function toUnderscoreCase($input)
    {
        if (is_array($input)) {
            $result = array();
            foreach ($input as $val) {
                $result[] = $this->convertToUnderscoreCase($val);
            }
        } else {
            $result = $this->convertToUnderscoreCase($input);
        }

        return $result;
    }

    /**
     * Converts a string into underscore format (e.g. first_name)
     *
     * @param string|array $input String
     *
     * @return string $input In underscore format
     */
    private function convertToUnderscoreCase($input)
    {
        $input = trim(lcfirst($input));

        // camel case
        $input = preg_replace_callback('/([A-Z])/', create_function('$c', 'return "_" . strtolower($c[1]);'), $input);

        // title case
        $input = str_replace(' ', '', $input);

        return $input;
    }

    /**
     * Converts a string or array into title format (e.g. First Name)
     *
     * @param string|array $input String
     *
     * @return string|array $result In title case format
     */
    public function toTitleCase($input)
    {
        if (is_array($input)) {
            $result = array();
            foreach ($input as $val) {
                $result[] = $this->convertToTitleCase($val);
            }
        } else {
            $result = $this->convertToTitleCase($input);
        }

        return $result;
    }

    /**
     * Converts a string into title format (e.g. First Name)
     *
     * @param string $input String
     *
     * @return string $input Translated into title format
     */
    public function convertToTitleCase($input)
    {
        $input = ucfirst($input);

        // camelCase
        $input = preg_replace_callback('/([A-Z])/', create_function('$c', 'return " " . ucfirst($c[1]);'), $input);

        // lowercase title
        $input = preg_replace_callback('/ ([a-z])/', create_function('$c', 'return " " . ucfirst($c[1]);'), $input);

        // underscore
        $input = preg_replace_callback('/_([a-z])/', create_function('$c', 'return " " . strtoupper($c[1]);'), $input);

        return trim(preg_replace('/\s+/', ' ', $input));
    }

    /**
     * Converts a string to camel case format (e.g. firstName)
     *
     * @param string|array $input String or array argument
     *
     * @return string $result or array with values translated into camel case
     */
    public function toCamelCase($input)
    {
        if (is_array($input)) {
            $result = array();
            foreach ($input as $val) {
                $result[] = $this->convertToCamelCase($val);
            }
        } else {
            $result = $this->convertToCamelCase($input);
        }

        return $result;
    }

    /**
     * Convert a string to camel case
     *
     * @param string $input Variable to convert
     *
     * @return string $input In Camel case format
     */
    private function convertToCamelCase($input)
    {
        $input = lcfirst($input);

        // underscore
        $input = preg_replace_callback('/_([a-z])/', create_function('$c', 'return strtoupper($c[1]);'), $input);

        // title
        $input = preg_replace_callback('/ ([a-z])/', create_function('$c', 'return strtoupper($c[1]);'), $input);

        $input = str_replace(' ', '', $input);

        return $input;
    }

    /**
     * Converts a string to pascal case format (e.g. FirstName)
     *
     * @param string|array $input String or array argument
     *
     * @return string|array $result translated into pascal case
     */
    public function toPascalCase($input)
    {
        if (is_array($input)) {
            $result = array();
            foreach ($input as $val) {
                $result[] = $this->convertToPascalCase($val);
            }
        } else {
            $result = $this->convertToPascalCase($input);
        }

        return $result;
    }

    /**
     * Converts a string to pascal case format (e.g. FirstName)
     *
     * @param string|array $input String
     *
     * @return string $input translated into pascal case
     */
    private function convertToPascalCase($input)
    {
        $input = ucfirst($input);

        // underscore
        $input = preg_replace_callback('/_([a-z])/', create_function('$c', 'return strtoupper($c[1]);'), $input);

        // title
        $input = preg_replace_callback('/ ([a-z])/', create_function('$c', 'return strtoupper($c[1]);'), $input);

        $input = str_replace(' ', '', $input);

        return $input;
    }

    /**
     * Convert string
     *
     * @param string|array $input  Input argument as string or array
     * @param string|array $format Desired Case format
     *
     * @return string
     */
    public function convert($input, $format = 'camel')
    {
        switch($format) {
            case 'camel':
                return $this->toCamelCase($input);
                break;
            case 'pascal':
                return $this->toPascalCase($input);
                break;
            case 'title':
                return $this->toTitleCase($input);
                break;
            case 'underscore':
                return $this->toUnderscoreCase($input);
                break;
        }
    }

    /**
     * Get the format of a string
     *
     * @param string $input The input string
     *
     * @return string The strings format
     */
    public function getFormat($input)
    {
        if (strpos($input, ' ')) {
            return 'title';
        } else if (strpos($input, '_')) {
            return 'underscore';
        } else if ($input{0} === strtoupper($input{0})) {
            return 'pascal';
        } else {
            return 'camel';
        }
    }

}
