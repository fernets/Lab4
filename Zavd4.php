<?php

    // 1) конкакетанація:

    $first = "Num";
    $second = "py\n";
    echo $first.$second; // Numpy
    $third = "To";
    $fourth = "day\n";
    $third .= $fourth;
    echo $third;
    echo "\n";

    // 2) хеш-масиви:

    $fruits = array("Apple"=>"Red", "Pear"=>"Yellow", "Watermelon"=>"Green");
    foreach($fruits as $fr => $color) {
        echo "Fruit: " . $fr . ", Color: " . $color . "\n";
}
    echo "\n";

    // 3) explode:

    $seq1 = "Hey";
    $seq2 = "Hey,stop!";
    var_dump( explode( ',', $seq1 ) );
    var_dump( explode( ',', $seq2 ) );
    echo "\n";

    // 4) implode:

    $arr1 = array("a","b","c");
    $arr2 = array("d");

    echo "arr1 is: '".implode("','",$arr1)."\n";
    echo "arr2 is: '".implode("','",$arr2)."\n";

    // 5) розіменування:

    $a = "hello ";
    $$a = "world";

    echo "$a ${$a}"; // hello world

    echo "\n\n";

    // 6) порівняння:

    var_dump(1 == TRUE);  // True
    var_dump(0 == FALSE); // True
    var_dump(20 < TRUE); // False
    var_dump(1 == "1"); // True
    var_dump(1 === "1"); // False

    // 7) приведення типів:

    $num = 22;            // число
    $word = "$num";        // рядок
    $newWord = (string) $num; // рядок

    // змінні мають однакове значення і тип - виведеться True
    if ($word === $newWord) {
        echo "True";
}
    echo "\n\n";

    // 8) ООП:
class Person
{
    protected $name;
    protected $age;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    private function privateInfo()
    {
        return "Person {$this->name} is {$this->age} years old.";
    }

    protected function protectedInfo()
    {
        return "Person {$this->name} is {$this->age} years old.";
    }
}

class Student extends Person
{
    private $specialty;
    private $course;

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getSpecialty()
    {
        return $this->specialty;
    }

    public function setSpecialty($specialty)
    {
        $this->specialty = $specialty;
    }

    public function getCourse()
    {
        return $this->course;
    }

    public function setCourse($course)
    {
        $this->course = $course;
    }

    public function protInf()
    {
        return $this->protectedInfo();
    }
}

$student = new Student();

$student->setName('Carl Johnson');
$student->setAge(19);
$student->setSpecialty('Software Engineering');
$student->setCourse(2);

echo $student->getName(); // Carl Johnson
echo $student->getAge(); // 19
echo $student->getSpecialty(); // Software Engineering
echo $student->getCourse(); // 2
echo $student->protInf(); // Carl Johnson is 19 years old.


    // 9) pattern, singleton
class Singleton
{

    private static $instances = [];

    protected function __construct() { }


    protected function __clone() { }


    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }


    public static function getInstance(): Singleton
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }
}


function CheckInstance()
{
    $s1 = Singleton::getInstance();
    $s2 = Singleton::getInstance();
    if ($s1 === $s2) {
        echo "змінні мають однакове посилання";
    } else {
        echo "змінні мають різне посилання";
    }
}

CheckInstance();
