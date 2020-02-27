<?php

namespace app\widgets\abstractFactory;

class Starter 
{
    public function __construct() {
        /**
         * Теперь в других частях приложения клиентский код может принимать фабричные
         * объекты любого типа.
         */
        // $page = new Page('Sample page', 'This it the body.');

        $products = [
            [
                'name'          => 'Notebook',
                'description'   => 'Core i7',
                'value'         =>  800.00,
                'date_register' => '2017-06-22',
            ],
            [
                'name'          => 'Mouse',
                'description'   => 'Razer',
                'value'         =>  125.00,
                'date_register' => '2017-10-25',
            ],
            [
                'name'          => 'Keyboard',
                'description'   => 'Mechanical Keyboard',
                'value'         =>  250.00,
                'date_register' => '2017-06-23',
            ],
        ];

        $page = new Page('index.html.twig', ['products' => $products]);

        echo "Testing actual rendering with the PHPTemplate factory:\n";
        echo $page->render(new TwigTemplateFactory);
    }
}