<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class IsValidPassword implements Rule
{
   
    /**
     * Determine if the Length Validation Rule passes.
     *
     * @var boolean
     */
    public $lengthPasses = true;

    /**
     * Determine if the Uppercase Validation Rule passes.
     *
     * @var boolean
     */
    public $uppercasePasses = true;

    /**
     * Determine if the Numeric Validation Rule passes.
     *
     * @var boolean
     */
    public $numericPasses = true;

    /**
     * Determine if the Special Character Validation Rule passes.
     *
     * @var boolean
     */
    public $specialCharacterPasses = true;

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->lengthPasses = (Str::length($value) >= 10);
        $this->uppercasePasses = (Str::lower($value) !== $value);
        $this->numericPasses = ((bool) preg_match('/[0-9]/', $value));
        $this->specialCharacterPasses = ((bool) preg_match('/[^A-Za-z0-9]/', $value));

        return ($this->lengthPasses && $this->uppercasePasses && $this->numericPasses && $this->specialCharacterPasses);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        switch (true) {
            case ! $this->uppercasePasses
                && $this->numericPasses
                && $this->specialCharacterPasses:
                return 'La contraseña debe contener al menos 10 caracteres y al menos 1 caracter en mayúscula.';

            case ! $this->numericPasses
                && $this->uppercasePasses
                && $this->specialCharacterPasses:
                return 'La contraseña debe contener al menos 10 caracteres y al menos 1 numero';

            case ! $this->specialCharacterPasses
                && $this->uppercasePasses
                && $this->numericPasses:
                return 'La contraseña debe contener al menos 10 caracteres y al menos 1 caracter especial.';

            case ! $this->uppercasePasses
                && ! $this->numericPasses
                && $this->specialCharacterPasses:
                return 'La contraseña debe contener al menos 10 caracteres y al menos 1 caracter en mayúscula y 1 numero.';

            case ! $this->uppercasePasses
                && ! $this->specialCharacterPasses
                && $this->numericPasses:
                return 'La contraseña debe contener al menos 10 caracteres y al menos 1 caracter en mayúscula y 1 caracter especial.';

            case ! $this->uppercasePasses
                && ! $this->numericPasses
                && ! $this->specialCharacterPasses:
                return 'La contraseña debe contener al menos 10 caracteres y al menos 1 caracter en mayúscula, 1 numero y 1 caracter especial.';

            default:
                return 'La contraseña debe de ser de al menos 10 caracteres de longitud';
        }
    }
}
