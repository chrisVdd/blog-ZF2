<?php
return
[
    'form_elements' =>
    [
        'abstract_factories' =>
        [
            'Application\Form\AbstractFactory',
        ],
        'invokables' =>
        [
            'application.form.register-user' => 'Application\Form\User\Register',
        ],
        'initializers' =>
        [
            'Application\Form\Initializer',
        ],
    ],
];