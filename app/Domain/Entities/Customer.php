<?php

namespace App\Domain\Entities;

class Customer
{
    private $id;
    private $name;
    private $document;
    private $emails;
    private $contact_numbers;

    public function __construct(array $attributes)
    {
        $this->id = $attributes['id'] ?? null;
        $this->name = $attributes['name'];
        $this->document = $attributes['document'];
        $this->emails = $attributes['emails'];
        $this->contact_numbers = $attributes['contact_numbers'];
    }

    public function getId(): mixed
    {
        return $this->id;
    }

    public function getName(): mixed
    {
        return $this->name;
    }

    public function getDocument(): mixed
    {
        return $this->document;
    }

    public function getEmails(): mixed
    {
        return $this->emails;
    }

    public function getContactNumbers(): mixed
    {
        return $this->contact_numbers;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'document' => $this->document,
            'emails' => $this->emails,
            'contact_numbers' => $this->contact_numbers
        ];
    }
}
