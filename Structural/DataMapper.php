<?php

class Person
{
    public function __construct(
        private int $personId,
        private string $personName
    ) {
    }

    public function getId(): int
    {
        return $this->personId;
    }

    public function getName(): string
    {
        return $this->personName;
    }
}

interface DataMapperInterface
{
    public function insert(Person $person);
    public function update(Person $person);
    public function delete(Person $person);
    public function findById(int $id);
}

class PersonDataMapper implements DataMapperInterface
{
    private $personList = [];

    public function insert(Person $person)
    {
        if (!array_key_exists($person->getId(), $this->personList)) {
            $this->personList[$person->getId()] = $person;
        } else {
            echo "Can not added.";
        }
    }

    public function update(Person $person)
    {
        if (array_key_exists($person->getId(), $this->personList)) {
            $this->personList[$person->getId()] = $person;
        } else {
            echo "Can not updated.";
        }
    }

    public function delete(Person $person)
    {
        if (array_key_exists($person->getId(), $this->personList)) {
            unset($this->personList[$person->getId()]);
        } else {
            echo "Can not deleted.";
        }
    }

    public function findById(int $id)
    {
        return $this->personList[$id] ?? false;
    }
}

$mapper = new PersonDataMapper();
$person = new Person(1, 'Test Person');

$mapper->insert($person);
var_dump($mapper->findById($person->getId()));

$person = new Person($person->getId(), 'Test Person Updated');
$mapper->update($person);
var_dump($mapper->findById($person->getId()));

$mapper->delete($person);
var_dump($mapper->findById($person->getId()));
