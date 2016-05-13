<?php
namespace Excellence\Hello\Block\Rewrite\Checkout\Checkout;

class LayoutProcessor extends \Magento\Checkout\Block\Checkout\LayoutProcessor
{
    private function processPaymentConfiguration(array &$configuration, array $elements)
    {
        // print_r('tst'); die();
        parent::processPaymentConfiguration($configuration,$elements);
        $output[$paymentCode . '-form']['children']['form-fields']['children']['etech_select'] = [
                    'component' => 'Magento_Ui/js/form/element/select',
                    'config' => [
                        'customScope' => 'billingAddress'. $paymentCode,
                        'customEntry' => '',
                        'template' => 'ui/form/field',
                        'elementTmpl' => 'ui/form/element/select',
                        'tooltip' => ''
                    ],
                    'dataScope' => 'billingAddress'. $paymentCode.'.etech_select',
                    'label' => __('etech test select'),
                    'provider' => 'checkoutProvider',
                    'sortOrder' => "1",
                    'options' => [
                         [
                            'value' => '-1',
                            'label' => ' ',
                            'title' => ' '
                         ],
                         [
                            'value' => '1',
                            'label' => 'test1',
                            'title' => 'test1'
                         ],
                     ],
                     'visible' => '1',
                     'filterBy' => [
                        [
                          'target' => '${ $.provider }:${ $.parentScope }.etech_select',
                          'field' => 'etech_select'
                        ]
                     ],
                     'customEntry' => ''
                ];
        return $output;
    }

}