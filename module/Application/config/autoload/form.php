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
            'application.form.login-user'    => 'Application\Form\User\Login',
        ],
        'initializers' =>
        [
            'Application\Form\Initializer',
        ],
    ],
];