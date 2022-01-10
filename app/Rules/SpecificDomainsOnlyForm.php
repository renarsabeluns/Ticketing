<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SpecificDomainsOnlyForm implements Rule
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
        $domain = substr($value, strpos($value, '@') + 1);

        $domains = [
            'directo.lv',
            ];
    
        return in_array($domain, $domains);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You must still use your work email!';
    }
}
