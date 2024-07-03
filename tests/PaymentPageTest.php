<?php

namespace convertiq\tests;

use convertiq\PaymentPage;
use convertiq\SignatureHandler;
use convertiq\Payment;

class PaymentPageTest extends \PHPUnit\Framework\TestCase
{

    public function testGetUrl()
    {
        $handler = new SignatureHandler('secret');
        $paymentPage = new PaymentPage($handler);
        $payment = new Payment(100);

        $payment
            ->setPaymentId('test payment id')
            ->setPaymentDescription('B&W');

        $url = $paymentPage->getUrl($payment);

        self::assertEquals(
            'https://paymentpage.qcpay.tech/payment?project_id=100&interface_type=%7B%22id%22%3A23%7D'
            . '&payment_id=test+payment+id&payment_description=B%26W&signature=97JFQpAyJ4HPfGVedJh0M1MqQDOFt%2FM'
            . 'Cbdh8VrsT7DdRyTBDAF2mvUOsDANx1ZPfbvZg0%2BVUbF43xJnq0jEeLA%3D%3D',
            $url
        );
    }
}
