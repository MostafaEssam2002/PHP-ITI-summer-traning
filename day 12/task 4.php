<?php
    abstract class  Person{
        protected $name;
        protected $address;
        public function __construct(string $name,string $address){
            $this->name=$name;
            $this->address=$address;
        }
        public function getName():string{
            return $this->name;
        }
        public function getAddress():string{
            return $this->address;
        }
        public function setAddress($address):void{
            $this->address=$address;
        }
        abstract public function __toString();
    }
    class Student extends Person{
        private string $program;
        private int $year;
        private float $fee;
        public function __construct(string $name,string $address,string $program,int $year,float $fee){
            parent::__construct($name,$address);
            $this->name=$name;
            $this->address=$address;
            $this->program=$program;
            $this->year=$year;
            $this->fee=$fee;
        }
        public function getProgram():string{
            return $this->program;
        }
        public function setProgram(string $program){
            $this->program=$program;
        }
        public function getYear():int{
            return $this->year;
        }
        public function setYear(int $year){
            $this->year=$year;
        }
        public function getFee():float{
            return $this->fee;
        }
        public function setFee(float $fee){
            $this->fee=$fee;
        }
        public function __toString(): string {
            return "Student[Person[name={$this->name},address={$this->address}],program={$this->program},year={$this->year},fee={$this->fee}]";
        }
    }
    class Staff extends Person{
        private string $school;
        private float $pay;
        public function __construct(string $name,string $address,string $school,float $pay)
        {
            parent::__construct($name,$address);
            $this->name=$name;
            $this->address=$address;
            $this->school=$school;
            $this->pay=$pay;
        }
        public function getSchool():string{
            return $this->school;
        }
        public function setSchool(string $school){
            $this->school=$school;
        }
        public function getPay():float{
            return $this->pay;
        }
        public function setPay(float $pay){
            $this->pay=$pay;
        }
        public function __toString(): string {
            return "Staff[Person[name={$this->name},address={$this->address}],school={$this->school},pay={$this->pay}]";
        }
    }
    $student = new Student("Alice", "123 Main St", "Computer Science", 2, 5000.00);
    $staff = new Staff("Bob", "456 Elm St", "Engineering Department", 60000.00);
    echo $student . "\n"; 
    echo $staff . "\n";    
    echo "Student's name: " . $student->getName() . "\n";
    echo "Staff's pay: " . $staff->getPay() . "\n";
    $student->setProgram("Data Science");
    $staff->setPay(65000);
    echo $student . "\n";
    echo $staff . "\n";

?>
<?php
// class Employee {
//     private int $id;
//     private string $firstName;
//     private string $lastName;
//     private int $salary;
//     // Constructor
//     public function __construct(int $id, string $firstName, string $lastName, int $salary) {
//         $this->id = $id;
//         $this->firstName = $firstName;
//         $this->lastName = $lastName;
//         $this->salary = $salary;
//     }
//     // Getters
//     public function getId(): int {
//         return $this->id;
//     }
//     public function getFirstName(): string {
//         return $this->firstName;
//     }
//     public function getLastName(): string {
//         return $this->lastName;
//     }
//     public function getName(): string {
//         return $this->firstName . " " . $this->lastName;
//     }
//     public function getSalary(): int {
//         return $this->salary;
//     }
//     // Setter
//     public function setSalary(int $salary): void {
//         $this->salary = $salary;
//     }
//     // Annual salary
//     public function getAnnualSalary(): int {
//         return $this->salary * 12;
//     }
//     // Raise salary by percent
//     public function raiseSalary(int $percent): int {
//         $this->salary += ($this->salary * $percent / 100);
//         return $this->salary;
//     }
//     // To String
//     public function __toString(): string {
//         return "Employee[id={$this->id},name={$this->firstName} {$this->lastName},salary={$this->salary}]";
//     }
// }

// // مثال للتجربة
// $emp = new Employee(1, "Mostafa", "Ali", 5000);
// echo "<pre>";
// echo $emp ;
// echo "Annual Salary: " . $emp->getAnnualSalary() ;
// $emp->raiseSalary(10);
// echo "After Raise: " . $emp->getSalary() ;
// echo $emp ;
// echo "</pre>";
?>
<!---------------------------------- task 2 ---------------------------------->
<?php
// class InvoiceItem {
//     // Private attributes
//     private string $id;
//     private string $desc;
//     private int $qty;
//     private float $unitPrice;
//     // Constructor
//     public function __construct(string $id, string $desc, int $qty, float $unitPrice) {
//         $this->id = $id;
//         $this->desc = $desc;
//         $this->qty = $qty;
//         $this->unitPrice = $unitPrice;
//     }
//     // Getters
//     public function getId(): string {
//         return $this->id;
//     }
//     public function getDesc(): string {
//         return $this->desc;
//     }
//     public function getQty(): int {
//         return $this->qty;
//     }
//     public function getUnitPrice(): float {
//         return $this->unitPrice;
//     }
//     // Setters
//     public function setQty(int $qty): void {
//         $this->qty = $qty;
//     }
//     public function setUnitPrice(float $unitPrice): void {
//         $this->unitPrice = $unitPrice;
//     }
//     // Business logic
//     public function getTotal(): float {
//         return $this->unitPrice * $this->qty;
//     }
//     // toString
//     public function __toString(): string {
//         return "InvoiceItem[id={$this->id},desc={$this->desc},qty={$this->qty},unitPrice={$this->unitPrice}]";
//     }
// }

// // Example usage
// echo "<pre>";
// $item = new InvoiceItem("A101", "Pen Red", 10, 1.20);
// echo $item . PHP_EOL;              // Calls __toString()
// echo "Total = " . $item->getTotal();
// echo "</pre>";
?>
<!---------------------------------- task 3 ---------------------------------->
<?php
// class Account {
//     // Private attributes
//     private string $id;
//     private string $name;
//     private int $balance = 0;
//     // Constructors
//     public function __construct(string $id, string $name, int $balance = 0) {
//         $this->id = $id;
//         $this->name = $name;
//         $this->balance = $balance;
//     }
//     // Getters
//     public function getId(): string {
//         return $this->id;
//     }
//     public function getName(): string {
//         return $this->name;
//     }
//     public function getBalance(): int {
//         return $this->balance;
//     }
//     // credit amount (deposit money)
//     public function credit(int $amount): int {
//         $this->balance += $amount;
//         return $this->balance;
//     }
//     // Debit amount (withdraw money if balance is enough)
//     public function debit(int $amount): int {
//         if ($amount <= $this->balance) {
//             $this->balance -= $amount;
//         } else {
//             echo "Amount exceeded balance" . PHP_EOL;
//         }
//         return $this->balance;
//     }
//     // Transfer money to another account
//     public function transferTo(Account $anotherAccount, int $amount): int {
//         if ($amount <= $this->balance) {
//             $this->balance -= $amount;
//             $anotherAccount->credit($amount);
//         } else {
//             echo "Amount exceeded balance" . PHP_EOL;
//         }
//         return $this->balance;
//     }
//     // toString method
//     public function __toString(): string {
//         return "Account[id={$this->id},name={$this->name},balance={$this->balance}]";
//     }
// }
// echo "<pre>";
// // Example usage
// $acc1 = new Account("A101", "Alice", 500);
// $acc2 = new Account("A102", "Bob", 300);
// echo $acc1 . PHP_EOL;
// echo $acc2 . PHP_EOL;
// $acc1->credit(200);
// $acc1->debit(100);
// $acc1->transferTo($acc2, 250);
// echo "After transactions:" . PHP_EOL;
// echo $acc1 . PHP_EOL;
// echo $acc2 . PHP_EOL;
// echo "</pre>";
?>
<!---------------------------------- task 4 ---------------------------------->
<?php
// Abstract base class
// abstract class Person {
//     protected string $name;
//     protected string $address;
//     public function __construct(string $name, string $address) {
//         $this->name = $name;
//         $this->address = $address;
//     }
//     public function getName(): string {
//         return $this->name;
//     }
//     public function getAddress(): string {
//         return $this->address;
//     }
//     public function setAddress(string $address): void {
//         $this->address = $address;
//     }
//     // Abstract method (must be overridden)
//     abstract public function __toString(): string;
// }
// // Student class
// class Student extends Person {
//     private string $program;
//     private int $year;
//     private float $fee;
//     public function __construct(string $name, string $address, string $program, int $year, float $fee) {
//         parent::__construct($name, $address);
//         $this->program = $program;
//         $this->year = $year;
//         $this->fee = $fee;
//     }
//     public function getProgram(): string {
//         return $this->program;
//     }
//     public function setProgram(string $program): void {
//         $this->program = $program;
//     }
//     public function getYear(): int {
//         return $this->year;
//     }
//     public function setYear(int $year): void {
//         $this->year = $year;
//     }
//     public function getFee(): float {
//         return $this->fee;
//     }
//     public function setFee(float $fee): void {
//         $this->fee = $fee;
//     }
//     // @Override
//     public function __toString(): string {
//         return "Student[Person[name={$this->name},address={$this->address}],program={$this->program},year={$this->year},fee={$this->fee}]";
//     }
// }
// // Staff class
// class Staff extends Person {
//     private string $school;
//     private float $pay;
//     public function __construct(string $name, string $address, string $school, float $pay) {
//         parent::__construct($name, $address);
//         $this->school = $school;
//         $this->pay = $pay;
//     }
//     public function getSchool(): string {
//         return $this->school;
//     }
//     public function setSchool(string $school): void {
//         $this->school = $school;
//     }
//     public function getPay(): float {
//         return $this->pay;
//     }
//     public function setPay(float $pay): void {
//         $this->pay = $pay;
//     }
//     // @Override
//     public function __toString(): string {
//         return "Staff[Person[name={$this->name},address={$this->address}],school={$this->school},pay={$this->pay}]";
//     }
// }
// // Example usage
// echo "<pre>";
// $student = new Student("Alice", "Cairo", "Computer Science", 2025, 15000.50);
// $staff = new Staff("Bob", "Giza", "Engineering School", 20000.00);
// echo $student . PHP_EOL;
// echo $staff . PHP_EOL;
// echo "</pre>";