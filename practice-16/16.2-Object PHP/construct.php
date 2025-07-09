<?php

class Company
{
    public $companyName;
    public $location;

    public function __construct($companyName, $location)
    {
        $this->companyName = $companyName;
        $this->location = $location;
    }

    public function showCompanyInfo()
    {
        echo "Company: $this->companyName<br>";
        echo "Location: $this->location<br>";
    }
}

class Employee extends Company
{
    public $name;
    public $position;

    public function __construct($companyName, $location, $name, $position)
    {
        parent::__construct($companyName, $location);
        $this->name = $name;
        $this->position = $position;
    }

    public function showEmployeeInfo()
    {
        $this->showCompanyInfo();
        echo "Employee Name: $this->name<br>";
        echo "Position: $this->position<br>";
    }
}

class Manager extends Employee
{
    public $department;

    public function __construct($companyName, $location, $name, $position, $department)
    {
        parent::__construct($companyName, $location, $name, $position);
        $this->department = $department;
    }

    public function showManagerInfo()
    {
        $this->showEmployeeInfo();
        echo "Department: $this->department<br>";
    }
}

class Intern extends Employee
{
    public $university;

    public function __construct($companyName, $location, $name, $position, $university)
    {
        parent::__construct($companyName, $location, $name, $position);
        $this->university = $university;
    }

    public function showInternInfo()
    {
        $this->showEmployeeInfo();
        echo "University: $this->university<br>";
    }
}


$employee = new Employee("TechSoft Ltd.", "Dhaka", "Asif", "Software Engineer");
$manager = new Manager("TechSoft Ltd.", "Dhaka", "Nadia", "Project Manager", "Development");
$intern = new Intern("TechSoft Ltd.", "Dhaka", "Rifat", "Intern Developer", "BUET");


echo "<h3>Employee Info:</h3>";
$employee->showEmployeeInfo();

echo "<h3>Manager Info:</h3>";
$manager->showManagerInfo();

echo "<h3>Intern Info:</h3>";
$intern->showInternInfo();
