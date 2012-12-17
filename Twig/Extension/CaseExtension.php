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
            'camel'   => new \Twig_Filter_Method($this, 'camelCase'),
            'pascal'   => new \Twig_Filter_Method($this, 'pascalCase'),
            'underscore'   => new \Twig_Filter_Method($this, 'underscoreCase'),
            'title'   => new \Twig_Filter_Method($this, 'titleCase')
        );
    }

    /**
     * Convert string to camel case format
     *
     * @param string $input
     *
     * @return string In camel case
     */
    public function camelCase($input)
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
    public function pascalCase($input)
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
    public function underscoreCase($input)
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
    public function titleCase($input)
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
