<?php

namespace Pim\Bundle\DataGridBundle\Extension\Formatter\Property\ProductValue;

use Symfony\Component\Intl\Intl;

/**
 * Price field property, able to render price attribute type
 *
 * @author    Nicolas Dupont <nicolas@akeneo.com>
 * @copyright 2014 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class PriceProperty extends FieldProperty
{
    /**
     * {@inheritdoc}
     */
    protected function convertValue($value)
    {
        $data = $this->getBackendData($value);

        $prices = [];
        foreach ($data as $price) {
            if (isset($price['data']) && $price['data'] !== null) {
                $prices[] = $price['data'].' '. Intl::getCurrencyBundle()->getCurrencySymbol($price['currency']);
            }
        }

        return implode(', ', $prices);
    }
}
