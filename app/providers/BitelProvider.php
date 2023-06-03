<?php

namespace App\providers;

use App\Call;
use App\Contact;
use App\Interfaces\CarrierInterface;

class BitelProvider implements CarrierInterface
{

    private $contact;

    /**
     * @param Contact $contact
     * @return void
     */
    public function dialContact(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return Call
     */
    public function makeCall(): Call
    {
        return new Call();
    }

    /**
     * @param string $message
     * @return string
     */
    public function sendSMS(string $message): string
    {
        return "Hi {$this->contact->getName()}, this is a message: {$message}";
    }
}