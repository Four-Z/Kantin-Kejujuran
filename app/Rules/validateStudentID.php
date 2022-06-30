<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class validateStudentID implements Rule
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
        $array = str_split($value);
        $arrLength = count($array);
        if ($arrLength < 5) {
            return false;
        }
        $total = 0;
        for ($i = 0; $i < 3; $i++) {
            $total += (int) $array[$i];
        }

        $two_last_digits = $array[3] . $array[4];

        if ($total == (int) $two_last_digits) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Student ID is not valid';
    }
}
