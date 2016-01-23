<?php

namespace LegacyBundle\Entity;

class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $facebookId;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $emailWaiting;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var int
     */
    private $logins;

    /**
     * @var int
     */
    private $lastLogin;

    /**
     * @var string
     */
    private $hash;

    /**
     * @var string
     */
    private $resetToken;

    /**
     * @var string
     */
    private $emailToken;

    /**
     * @var bool
     */
    private $company;

    /**
     * @var string
     */
    private $lat;

    /**
     * @var string
     */
    private $lng;

    /**
     * @var int
     */
    private $device;

    /**
     * @var string
     */
    private $pnsid;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $postcode;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var bool
     */
    private $talent;

    /**
     * @var int
     */
    private $unreadActivities;

    /**
     * @var string
     */
    private $unsubscribeToken;

    /**
     * @var bool
     */
    private $subscribed;

    /**
     * @var \DateTime
     */
    private $notifiedDaily;

    /**
     * @var \DateTime
     */
    private $notifiedWeekly;

    public function getId(): int
    {
        return $this->id;
    }

    public function getFacebookId(): int
    {
        return $this->facebookId;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getEmailWaiting(): string
    {
        return $this->emailWaiting;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getLogins(): int
    {
        return $this->logins;
    }

    public function getLastLogin(): int
    {
        return $this->lastLogin;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function getResetToken(): string
    {
        return $this->resetToken;
    }

    public function getEmailToken(): string
    {
        return $this->emailToken;
    }

    public function isCompany(): boolean
    {
        return $this->company;
    }

    public function getLat(): string
    {
        return $this->lat;
    }

    public function getLng(): string
    {
        return $this->lng;
    }

    public function getDevice(): int
    {
        return $this->device;
    }

    public function getPnsid(): string
    {
        return $this->pnsid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getPostcode(): string
    {
        return $this->postcode;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function isTalent(): boolean
    {
        return $this->talent;
    }

    public function getUnreadActivities(): int
    {
        return $this->unreadActivities;
    }

    public function getUnsubscribeToken(): string
    {
        return $this->unsubscribeToken;
    }

    public function isSubscribed(): boolean
    {
        return $this->subscribed;
    }

    public function getNotifiedDaily(): \DateTime
    {
        return $this->notifiedDaily;
    }

    public function getNotifiedWeekly(): \DateTime
    {
        return $this->notifiedWeekly;
    }
}
