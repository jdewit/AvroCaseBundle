<?php

declare(strict_types=1);

/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Avro\CaseBundle\Util;

/**
 * Convert strings into different case formats.
 *
 * @author Joris.w.dewit <joris.w.dewit@gmail.com>
 */
class CaseConverter
{
    /**
     * Converts a string into underscore format (e.g. first_name).
     *
     * @param string|array $input String
     *
     * @return string|array $result In underscore format
     */
    public function toUnderscoreCase($input)
    {
        if (is_array($input)) {
            return array_map([$this, 'toUnderscoreCase'], $input);
        }
        if (is_string($input)) {
            return $this->convertToUnderscoreCase($input);
        }

        return $input;
    }

    /**
     * Converts a string or array into title format (e.g. First Name).
     *
     * @param string|array $input String
     *
     * @return string|array $result In title case format
     */
    public function toTitleCase($input)
    {
        if (is_array($input)) {
            return array_map([$this, 'toTitleCase'], $input);
        }
        if (is_string($input)) {
            return $this->convertToTitleCase($input);
        }

        return $input;
    }

    /**
     * Converts a string to camel case format (e.g. firstName).
     *
     * @param string|array $input String or array argument
     *
     * @return string|array $result In camel case format
     */
    public function toCamelCase($input)
    {
        if (is_array($input)) {
            return array_map([$this, 'toCamelCase'], $input);
        }
        if (is_string($input)) {
            return $this->convertToCamelCase($input);
        }

        return $input;
    }

    /**
     * Converts a string to pascal case format (e.g. FirstName).
     *
     * @param string|array $input String or array argument
     *
     * @return string|array $result In pascal case format
     */
    public function toPascalCase($input)
    {
        if (is_array($input)) {
            return array_map([$this, 'toPascalCase'], $input);
        }
        if (is_string($input)) {
            return $this->convertToPascalCase($input);
        }

        return $input;
    }

    /**
     * Convert string.
     *
     * @param string|array $input  Input argument as string or array
     * @param string|array $format Desired Case format
     *
     * @return string|array
     */
    public function convert($input, $format = 'camel')
    {
        switch ($format) {
            case 'pascal':
                return $this->toPascalCase($input);
                break;
            case 'title':
                return $this->toTitleCase($input);
                break;
            case 'underscore':
                return $this->toUnderscoreCase($input);
                break;
            case 'camel':
            default:
                return $this->toCamelCase($input);
                break;
        }
    }

    /**
     * Get the format of a string.
     *
     * @param string $input The input string
     *
     * @return string The strings format
     */
    public function getFormat(string $input): string
    {
        if (strpos($input, ' ')) {
            return 'title';
        }
        if (strpos($input, '_')) {
            return 'underscore';
        }
        if ($input[0] === strtoupper($input[0])) {
            return 'pascal';
        }

        return 'camel';
    }

    /**
     * Converts a string into title format (e.g. First Name).
     *
     * @param string $input String
     *
     * @return string $input Translated into title format
     */
    private function convertToTitleCase(string $input): string
    {
        $input = ucfirst($input);

        // camelCase
        $input = preg_replace_callback(
            '/([A-Z])/',
            static function ($c) {
                return ' '.ucfirst($c[1]);
            },
            $input
        );

        // lowercase title
        $input = preg_replace_callback(
            '/ ([a-z])/',
            static function ($c) {
                return ' '.ucfirst($c[1]);
            },
            $input
        );

        // underscore
        $input = preg_replace_callback(
            '/_([a-z])/',
            static function ($c) {
                return ' '.strtoupper($c[1]);
            },
            $input
        );

        return trim(preg_replace('/\s+/', ' ', $input));
    }

    /**
     * Converts a string into underscore format (e.g. first_name).
     *
     * @param string $input String
     *
     * @return string $input In underscore format
     */
    private function convertToUnderscoreCase(string $input): string
    {
        $input = lcfirst(trim($input));

        // camel case
        $input = preg_replace_callback(
            '/([A-Z])/',
            static function ($c) {
                return '_'.strtolower($c[1]);
            },
            $input
        );

        // title case
        $input = str_replace(' ', '', $input);

        return $input;
    }

    /**
     * Convert a string to camel case.
     *
     * @param string $input Variable to convert
     *
     * @return string $input In Camel case format
     */
    private function convertToCamelCase(string $input): string
    {
        $input = lcfirst($input);

        // underscore
        $input = preg_replace_callback(
            '/_([a-z])/',
            static function ($c) {
                return strtoupper($c[1]);
            },
            $input
        );

        // title
        $input = preg_replace_callback(
            '/ ([a-z])/',
            static function ($c) {
                return strtoupper($c[1]);
            },
            $input
        );

        $input = str_replace(' ', '', $input);

        return $input;
    }

    /**
     * Converts a string to pascal case format (e.g. FirstName).
     *
     * @param string|array $input String
     *
     * @return string $input translated into pascal case
     */
    private function convertToPascalCase(string $input): string
    {
        $input = ucfirst($input);

        // underscore
        $input = preg_replace_callback(
            '/_([a-z])/',
            static function ($c) {
                return strtoupper($c[1]);
            },
            $input
        );

        // title
        $input = preg_replace_callback(
            '/ ([a-z])/',
            static function ($c) {
                return strtoupper($c[1]);
            },
            $input
        );

        $input = str_replace(' ', '', $input);

        return $input;
    }
}
