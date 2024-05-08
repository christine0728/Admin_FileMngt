<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\ComplaintReport;
use App\Models\Police;

class UniqueFullname implements Rule
{
    // public function passes($attribute, $value)
    // {
    //     // Check if the inv_case_no already exists in the database
    //     // return !Police::where('per_lastname', $value)->exists();
    // }

    public function passes($attribute, $value)
    {
        $nameParts = explode(' ', $value);

        // Check if the array contains at least three elements (first name, middle name, last name)
        if (count($nameParts) >= 3) {
            $firstname = $nameParts[0]; 
            $middlename = $nameParts[1];
            $lastname = implode(' ', array_slice($nameParts, 2));

            // Check if a police record with the same combination of first name, middle name, and last name exists
            // Also, allow null middle names to be considered as separate entities
            return !Police::where(function($query) use ($firstname, $middlename, $lastname) {
                $query->where('per_firstname', $firstname)
                    ->orWhere('per_lastname', $lastname)
                    ->orWhere(function($query) use ($middlename) {
                        $query->where('per_middlename', $middlename)
                            ->orWhereNull('per_middlename');
                    });
            })->exists();
        }

        // If there are less than three name parts, return true to indicate the validation passes
        return true;
    }

    public function message()
    {
        return 'The full name has already been entered.';
    }
}
