<?php

namespace App\Interfaces;

use App\Call;
use App\Contact;


interface CarrierInterface
{
    /**
     * @param Contact $contact
     * @return mixed
     */
	public function dialContact(Contact $contact);

    /**
     * @return Call
     */
	public function makeCall(): Call;

    /**
     * @param string $name
     * @param string $message
     * @return string
     */
    public function sendSMS(string $message): string;
}