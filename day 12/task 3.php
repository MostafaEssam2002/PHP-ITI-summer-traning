<?php
    class Account{
        private int $id;
        private string $name;
        private int $balance;
        public function __construct(int $id,string $name,int $balance=0){
            $this->id=$id;
            $this->name=$name;
            $this->balance=$balance;
        }
        public function getId():int{
            return $this->id;
        }
        public function getName():string{
            return $this->name;
        }
        public function getBalance():int{
            return $this->balance;
        }
        public function credit(int $amount):int {
            $this->balance += $amount;
            return $this->balance;
        }
        public function debit(int $amount):int {
            if($amount<=$this->balance){
                $this->balance -= $amount;
            }else{
                echo "<h1>Amount exceeded balance</h1>";
            }
            return $this->balance;
        }
        public function transferTo(Account $anotherAccount,int $amount):int {
            if($amount<=$this->balance){
                $this->balance -= $amount;
                $anotherAccount->credit($amount);
            }else{
                echo "<h1>Amount exceeded balance</h1>";
            }
            return $this->balance;
        }
        public function __toString(): string {
            return "Account[id={$this->id},name={$this->name},balance={$this->balance}]";
        }
    }

// Create two account objects
$account1 = new Account(1, "John Doe", 1000);  // Account with balance 1000
$account2 = new Account(2, "Jane Doe", 500);   // Account with balance 500

// Display initial account details
echo $account1 . "\n";  // Account[id=1,name=John Doe,balance=1000]
echo $account2 . "\n";  // Account[id=2,name=Jane Doe,balance=500]

// Credit (deposit) an amount to account1
$account1->credit(500);  // Adding 500 to account1
echo "After crediting 500 to account1: " . $account1 . "\n";  // Account[id=1,name=John Doe,balance=1500]

// Debit (withdraw) an amount from account1
$account1->debit(200);   // Subtracting 200 from account1
echo "After debiting 200 from account1: " . $account1 . "\n";  // Account[id=1,name=John Doe,balance=1300]
// Attempting to debit more than the available balance in account2
$account2->debit(600);  // Should print "Amount exceeded balance"
echo "After trying to debit 600 from account2: " . $account2 . "\n";  // Account[id=2,name=Jane Doe,balance=500]
// Transfer from account1 to account2
$account1->transferTo($account2, 300);  // Transfer 300 from account1 to account2
echo "After transferring 300 from account1 to account2:\n";
echo $account1 . "\n";  // Account[id=1,name=John Doe,balance=1000]
echo $account2 . "\n";  // Account[id=2,name=Jane Doe,balance=800]

?>