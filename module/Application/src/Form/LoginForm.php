<?php 

namespace Application\Form;

use Laminas\Filter\StringTrim;
use Laminas\Filter\StripTags;
use Laminas\Form\Element\Checkbox;
use Laminas\Form\Element\Csrf;
use Laminas\Form\Element\Password;
use Laminas\Form\Element\Submit;
use Laminas\Form\Element\Text;
use Laminas\Form\Form;
use Laminas\InputFilter\InputFilterProviderInterface;
use Laminas\Validator\StringLength;

class LoginForm extends Form implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('LoginForm');

        $this->add([
            'type' => Csrf::class,
            'name' => 'csrf',
        ]);

        $this->add([
            'type' => Text::class,
            'name' => 'username',
            'options' => [
                'label' => 'Usuario',
            ],
            'attributes' => [
                'autocomplete' => 'off',
            ],
        ]);

        $this->add([
            'type' => Password::class,
            'name' => 'password',
            'options' => [
                'label' => 'Contraseña',
            ],
        ]);

        $this->add([
            'type' => Checkbox::class,
            'name' => 'remember_me',
            'options' => [
                'label' => 'Recuérdame',
            ],
            'attributes' => [
                'id' => 'remember_me'
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'type'  => Submit::class,
            'attributes' => [
                'value' => 'Entrar',
            ],
        ]);
    }

    public function getInputFilterSpecification() : array
    {
        return [
            [
                'name' => 'username',
                'required' => true,
                'filters' => [
                    [ 'name' => StringTrim::class ],
                    [ 'name' => StripTags::class ],
                ],
                'validators' => [
                    [ 
                        'name' => StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                    ],
                ],
            ],
            [
                'name' => 'password',
                'required' => true,
                'filters' => [
                    [ 'name' => StringTrim::class ],
                    [ 'name' => StripTags::class ],
                ],
                'validators' => [
                    [ 
                        'name' => StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                    ],
                ],
            ],
        ];
    }
}
