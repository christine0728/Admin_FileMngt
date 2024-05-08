<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\ComplaintReport;
use App\Models\Police;

class UniqueMiddlename implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the inv_case_no already exists in the database
        return !Police::where('per_middlename', $value)->exists();
    }

    public function message()
    {
        return 'The middle name has already been entered.';
    }
}
