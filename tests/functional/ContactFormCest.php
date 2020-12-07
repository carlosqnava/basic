<?php

namespace tests\unit\models;

use app\models\ContactForm;
use yii\mail\MessageInterface;

class ContactFormTest extends \Codeception\Test\Unit
{
    private $model;
    /**
     * @var \UnitTester
     */
    public $tester;

    public function testEmailIsSentOnContact()
    {
        /** @var ContactForm $model */
        $this->model = $this->getMockBuilder('app\models\ContactForm')
            ->setMethods(['validate'])
            ->getMock();

        $this->model->expects($this->once())
            ->method('validate')
            ->willReturn(true);

        $this->model->attributes = [
            'name' => 'prueba',
            'email' => 'prueba@ejemplo.com',
            'subject' => 'importante probar',
            'body' => 'hola mundo del test',
        ];

        expect_that($this->model->contact('webedufacil@gmail.com'));

        // using Yii2 module actions to check email was sent
        $this->tester->seeEmailIsSent();

        /** @var MessageInterface $emailMessage */
        $emailMessage = $this->tester->grabLastSentEmail();
        expect('Gracias por contactarse. Te responderemos lo más pronto posible.', $emailMessage)->isInstanceOf('yii\mail\MessageInterface');
        
    }
}
