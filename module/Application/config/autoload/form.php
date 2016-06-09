<?php
return
[
    'form_elements' =>
    [
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