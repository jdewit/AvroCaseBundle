<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Avro\CaseBundle\Twig\Extension;

use Avro\CaseBundle\Util\CaseConverter;

/**
 * Twig extension for case conversion
 *
 * @author Joris de Wit <joris.w.dewit@gmail.com>
 */
class CaseExtension extends \Twig_Extension
{
    protected $caseConverter;

    /**
     * @param CaseConverter $caseConverter
     */
    public function __construct(CaseConverter $caseConverter)
    {
        $this->caseConverter = $caseConverter;
    }

    /**
     * Get twig filters
     *
     * @return array filters
     */
    public function getFilters()
    {
        return array(
            'camel'   => new \Twig_Filter_Method($this, 'toCamelCase'),
            'pascal'   => new \Twig_Filter_Method($this, 'toPascalCase'),
            'underscore'   => new \Twig_Filter_Method($this, 'toUnderscoreCase'),
            'title'   => new \Twig_Filter_Method($this, 'toTitleCase')
        );
    }

    /**
     * Convert string to camel case format
     *
     * @param string $input
     *
     * @return string In camel case
     */
    public function toCamelCase($input)
    {
        return $this->caseConverter->toCamelCase($input);
    }

    /**
     * Convert string to pascal case format
     *
     * @param string $input
     *
     * @return string In pascal case
     */
    public function toPascalCase($input)
    {
        return $this->caseConverter->toPascalCase($input);
    }

    /**
     * Convert string to underscore case format
     *
     * @param string $input
     *
     * @return string In underscore case
     */
    public function toUnderscoreCase($input)
    {
        return $this->caseConverter->toUnderscoreCase($input);
    }

    /**
     * Convert string to title case format
     *
     * @param string $input
     *
     * @return string In title case
     */
    public function toTitleCase($input)
    {
        return $this->caseConverter->toTitleCase($input);
    }

    /**
     * Get twig extension name
     *
     * @return string
     */
    public function getName()
    {
        return 'CaseExtension';
    }
}
