<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Nicebooks\Isbn\IsbnTools;

class Isbn implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $tools = new IsbnTools();

        if (!$tools->isValidIsbn($value))
            $fail('The :attribute must be a isbn10 or isbn13 value.');
    }
}
