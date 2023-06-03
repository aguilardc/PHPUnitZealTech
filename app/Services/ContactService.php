<?php

namespace App\Services;

use App\Contact;


class ContactService
{

    /**
     * @param $name
     * @return Contact
     */
    public static function findByName($name): Contact
    {
        $contact = new Contact();
        if ($name === 'Debbie') { // contact register in DB
            $contact->setName('Debbie');
            $contact->setLastName('Harry');
            $contact->setNumber('998917138');
        }
        if ($name === 'Bruce') { // contact register in DB
            $contact->setName('Bruce');
            $contact->setLastName('Dickinson');
            $contact->setNumber('84757+USD');
        }
        return $contact;
    }

    /**
     * @param string $number
     * @return bool
     */
    public static function validateNumber(string $number): bool
    {
        return preg_match('/^[0-9]{9}+$/', $number);
    }
}