<?php
class employee{
    private int $id;
    private string $firstname;
    private string $lastname;
    private int $salary;
    public function __construct(int $id,string $firstname,string $lastname,int $salary)
    {
        $this->id=$id;
        $this->firstname=$firstname;
        $this->lastname=$lastname;
        $this->salary=$salary;
    }
    public function get_id(){
        return $this->id;
    }
    public function get_firstname(){
        return $this->firstname;
    }
    public function get_lastname(){
        return $this->lastname;
    }
    public function get_name(){
        return $this->firstname." ".$this->lastname;
    }
    public function get_salary(){
        return $this->salary;
    }
    public function get_annaula_salary(){
        return $this->salary*12;
    }
    public function raise_salary($percent){
        $this->salary += ($this->salary * $percent / 100);;
        return $this->salary;
    }
    public function __toString(): string {
        return "Employee[id={$this->id},name={$this->firstname} {$this->lastname},salary={$this->salary}]";
    }
}
$emp = new Employee(1, "Mostafa", "Ali", 5000);
echo "<pre>";
echo $emp ;
echo "Annual Salary: " . $emp->get_annaula_salary() ;
$emp->raise_salary(10);
echo "After Raise: " . $emp->get_salary() ;
echo $emp ;
echo "</pre>";
?>