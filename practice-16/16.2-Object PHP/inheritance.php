<?php


class Person
{
    public $name, $age;

    public function showINfo()
    {
        echo "Name: $this->name<br>";
        echo "Age: $this->age<br>";
    }
}


class Student extends Person
{
    public $studentId;

    public function showStudentInfo()
    {
        echo "Student ID: $this->studentId<br>";
    }
}



class Teacher extends Person
{
    public $subject;

    public function showTeacherInfo()
    {
        echo "Subject: $this->subject<br>";
    }
}

class Headmaster extends Teacher
{
    public $school;

    public function showHeadmasterInfo()
    {
        echo "School: $this->school<br>";
    }
}


$student = new Student();
$student->name = "Rahim";
$student->age = 16;
$student->studentId = "ST101";

$teacher = new Teacher();
$teacher->name = "Karim Sir";
$teacher->age = 40;
$teacher->subject = "Physics";

$headmaster = new Headmaster();
$headmaster->name = "Jamal Sir";
$headmaster->age = 55;
$headmaster->subject = "Administration";
$headmaster->school = "Green Hill High School";

echo "<h3>Student Info:</h3>";
$student->showStudentInfo();

echo "<h3>Teacher Info:</h3>";
$teacher->showTeacherInfo();

echo "<h3>Headmaster Info:</h3>";
$headmaster->showHeadmasterInfo();
