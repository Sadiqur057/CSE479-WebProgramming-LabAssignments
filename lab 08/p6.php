<?php
class Account {
    private $accountID;
    private $accountBalance;
    private static $count = 0;

    public function __construct($id, $balance) {
        $this->accountID = $id;
        $this->accountBalance = $balance;
        self::$count++;
    }

    public function showInformation() {
        echo "Account ID: " . $this->accountID . "<br>";
        echo "Account Balance: " . $this->accountBalance . "<br><br>";
    }

    public function deposit($amount) {
        if ($amount > 0) {
            $this->accountBalance += $amount;
            echo "Deposited: " . $amount . "<br>";
        } else {
            echo "Invalid deposit amount.<br>";
        }
    }

    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->accountBalance) {
            $this->accountBalance -= $amount;
            echo "Withdrawn: " . $amount . "<br>";
        } else {
            echo "Invalid withdrawal amount.<br>";
        }
    }

    public function showAccountInfo() {
        echo "Account Information:<br>";
        $this->showInformation();
    }

    public function transferMoney($receiverAccount, $amount) {
        if ($amount > 0 && $amount <= $this->accountBalance) {
            $this->accountBalance -= $amount;
            $receiverAccount->accountBalance += $amount;
            echo "Transferred: " . $amount . " to Account ID " . $receiverAccount->accountID . "<br><br>";
        } else {
            echo "Invalid transfer amount.<br>";
        }
    }

    public static function getCount() {
        return self::$count;
    }
}

// Create two Account objects
$account1 = new Account("A123", 1000);
$account2 = new Account("B456", 2000);

// Show account information
$account1->showAccountInfo();
$account2->showAccountInfo();

// Deposit and withdraw
$account1->deposit(500);
$account1->withdraw(200);

// Transfer money between accounts
$account1->transferMoney($account2, 300);

// Show updated account information
$account1 = new showAccountInfo();
$account1 = new showAccountInfo();

echo "Total accounts created: " . Account::getCount() . "<br>";

?>