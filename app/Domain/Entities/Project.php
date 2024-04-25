<?php

namespace App\Domain\Entities;

class Project
{
    private $id;
    private $description;
    private $state;
    private $installation_type;
    private $equipments;
    private Customer $customer;

    public function __construct(array $attributes)
    {
        $this->id = $attributes['id'] ?? null;
        $this->description = $attributes['description'];
        $this->state = $attributes['state'];
        $this->installation_type = $attributes['installation_type'];
        $this->equipments = $attributes['equipments'];
        $this->customer_document = $attributes['customer_document'] ?? null;
        $this->customer_id = $attributes['customer_id'] ?? null;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return mixed
     */
    public function getInstallationType()
    {
        return $this->installation_type;
    }

    /**
     * @return mixed
     */
    public function getEquipments()
    {
        return $this->equipments;
    }

    public function getCustomerId()
    {
        return $this->customer_id;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function setCustomer(array $attributes)
    {
        $this->customer = new Customer($attributes);
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'state' => $this->state,
            'installation_type' => $this->installation_type,
            'equipments' => $this->equipments,
            'customer' => $this->customer->toArray()
        ];
    }
}
