<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\ComplaintReport;
use App\Models\Police;

class UniqueFirstname implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the inv_case_no already exists in the database
        return !Police::where('per_firstname', $value)->exists();
    }

    public function message()
    {
        return 'The first name has already been entered.';
    }
}
