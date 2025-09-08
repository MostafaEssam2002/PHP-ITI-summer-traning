# Day 12 - PHP Object-Oriented Programming Tasks
## ITI PHP Summer Internship

This repository contains four PHP OOP tasks completed on Day 12 of the ITI PHP Summer Internship program. Each task demonstrates different aspects of object-oriented programming concepts including classes, inheritance, abstraction, and encapsulation.

## 📁 Project Structure

```
day12-php-oop/
├── task1.php          # Employee Management System
├── task2.php          # Invoice Item Calculator
├── task3.php          # Bank Account System
├── task4.php          # Person-Student-Staff Hierarchy
└── README.md          # This file
```

## 🎯 Task Overview

### Task 1: Employee Management System
**File:** `task1.php`

A complete employee management class that handles:
- Employee basic information (ID, first name, last name, salary)
- Annual salary calculation
- Salary raise functionality with percentage-based increases
- String representation of employee data

**Key Features:**
- Private properties with getter methods
- Salary manipulation methods
- Professional string formatting

**Example Output:**
```
Employee[id=1,name=Mostafa Ali,salary=5000]
Annual Salary: 60000
After Raise: 5500
Employee[id=1,name=Mostafa Ali,salary=5500]
```

### Task 2: Invoice Item Calculator
**File:** `task2.php`

An invoice item management system that calculates totals:
- Item identification and description
- Quantity and unit price management
- Automatic total calculation
- Flexible property modification

**Key Features:**
- Encapsulated item properties
- Business logic for total calculation
- Setter methods for quantity and price updates

**Example Output:**
```
InvoiceItem[id=A101,desc=Pen Red,qty=10,unitPrice=1.2]
Total = 12
```

### Task 3: Bank Account System
**File:** `task3.php`

A comprehensive banking system with multiple account operations:
- Account creation with ID, name, and initial balance
- Credit (deposit) operations
- Debit (withdrawal) with balance validation
- Money transfer between accounts
- Overdraft protection

**Key Features:**
- Balance validation for all transactions
- Error handling for insufficient funds
- Inter-account money transfers
- Transaction safety measures

**Example Output:**
```
Account[id=1,name=John Doe,balance=1000]
Account[id=2,name=Jane Doe,balance=500]
After crediting 500 to account1: Account[id=1,name=John Doe,balance=1500]
After debiting 200 from account1: Account[id=1,name=John Doe,balance=1300]
Amount exceeded balance
After trying to debit 600 from account2: Account[id=2,name=Jane Doe,balance=500]
After transferring 300 from account1 to account2:
Account[id=1,name=John Doe,balance=1000]
Account[id=2,name=Jane Doe,balance=800]
```

### Task 4: Person-Student-Staff Hierarchy
**File:** `task4.php`

An advanced inheritance system demonstrating:
- Abstract base class (Person)
- Concrete implementations (Student, Staff)
- Polymorphic behavior
- Protected property inheritance

**Key Features:**
- Abstract class implementation
- Inheritance hierarchy
- Method overriding
- Polymorphic string representation

**Class Hierarchy:**
```
Person (Abstract)
├── Student
└── Staff
```

**Example Output:**
```
Student[Person[name=Alice,address=123 Main St],program=Computer Science,year=2,fee=5000]
Staff[Person[name=Bob,address=456 Elm St],school=Engineering Department,pay=60000]
Student's name: Alice
Staff's pay: 60000
Student[Person[name=Alice,address=123 Main St],program=Data Science,year=2,fee=5000]
Staff[Person[name=Bob,address=456 Elm St],school=Engineering Department,pay=65000]
```

## 🔧 How to Run

### Prerequisites
- PHP 7.4 or higher
- Web server (Apache/Nginx) or PHP built-in server

### Running Individual Tasks

**Option 1: Using PHP Built-in Server**
```bash
# Navigate to the project directory
cd day12-php-oop

# Run individual tasks
php task1.php
php task2.php
php task3.php
php task4.php
```

**Option 2: Using Web Browser**
1. Place files in your web server directory (e.g., `htdocs`, `www`)
2. Access via browser:
   - `http://localhost/day12-php-oop/task1.php`
   - `http://localhost/day12-php-oop/task2.php`
   - `http://localhost/day12-php-oop/task3.php`
   - `http://localhost/day12-php-oop/task4.php`

## 📚 OOP Concepts Demonstrated

### 1. Encapsulation
- Private properties with public getter/setter methods
- Data hiding and controlled access
- Property validation in setter methods

### 2. Inheritance
- Parent-child class relationships
- Method inheritance and overriding
- Constructor chaining with `parent::__construct()`

### 3. Abstraction
- Abstract classes and methods
- Interface-like behavior through abstract methods
- Enforced method implementation in child classes

### 4. Polymorphism
- Method overriding in child classes
- Different implementations of `__toString()` method
- Type-specific behavior through inheritance

## 🎓 Learning Objectives

By completing these tasks, you will understand:

1. **Class Design Principles**
   - How to structure classes with appropriate properties and methods
   - When to use private, protected, and public access modifiers

2. **Object Interaction**
   - How objects can interact with each other (Account transfers)
   - Method chaining and return value utilization

3. **Inheritance Hierarchies**
   - Creating parent-child relationships between classes
   - Extending functionality through inheritance

4. **Error Handling**
   - Implementing business logic validation
   - Providing user feedback for invalid operations

5. **Professional Code Structure**
   - Consistent naming conventions
   - Proper method organization
   - Clean, readable code formatting

## 🔍 Code Quality Features

- **Type Declarations:** All methods use proper PHP type hints
- **Error Handling:** Validation for business logic (e.g., insufficient funds)
- **Documentation:** Clear method names and logical code structure
- **Consistency:** Uniform coding style across all tasks
- **Best Practices:** Following PHP OOP conventions and standards

## 📝 Notes

- All tasks include practical examples with real-world scenarios
- Error messages are user-friendly and informative
- Code follows PHP PSR standards for formatting and structure
- Each class is self-contained and reusable
