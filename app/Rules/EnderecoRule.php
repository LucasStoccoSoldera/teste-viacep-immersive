<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EnderecoRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $viacep = "https://viacep.com.br/ws/{$value}/json/";
        $response = json_decode(file_get_contents($viacep));

        if (isset($response->erro)) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'CEP Inexistente no Via CEP.';
    }
}
