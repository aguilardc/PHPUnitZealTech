<?php

namespace App;

use App\Interfaces\CarrierInterface;
use App\Services\ContactService;


class Mobile
{

    protected $provider;

    /**
     * @param CarrierInterface $provider
     */
    function __construct(CarrierInterface $provider)
    {
        $this->provider = $provider;
    }


    /**
     * @param string $name
     * @return Call|void
     */
    public function makeCallByName(string $name = '')
    {
        $contact = $this->findByName($name);
        if (!isset($contact)) return;

        if (empty($contact->getName())) return;

        $this->provider->dialContact($contact);

        return $this->provider->makeCall();
    }

    /**
     * @param string $name
     * @param string $message
     * @return string|void
     */
    public function sendSMS(string $name, string $message)
    {
        $contact = $this->findByName($name);
        if (!isset($contact)) return;

        if (empty($message)) return;

        if (!ContactService::validateNumber($contact->getNumber())) return;

        $this->provider->dialContact($contact);

        return $this->provider->sendSMS($message);
    }

    /**
     * @param $name
     * @return Contact|void
     */
    public function findByName($name)
    {
        if (empty($name)) return;

        return ContactService::findByName($name);
    }
}
