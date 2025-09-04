# Day 10 - Market Database Project
## ITI PHP Summer Internship

### 📚 Learning Objectives
This project demonstrates mastery of advanced SQL concepts including:
- **JOINs** - Combining data from multiple tables
- **Views** - Creating virtual tables for simplified queries
- **Stored Procedures** - Reusable SQL code blocks
- **Aggregate Functions** - GROUP BY, COUNT, SUM, MAX, MIN
- **Common Table Expressions (CTEs)** - Temporary named result sets
- **Conditional Logic** - CASE statements for data categorization

---

## 🗃️ Database Schema

### Tables Structure

#### 1. Users Table
```sql
users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(30) UNIQUE NOT NULL,
    password VARCHAR(30) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
```

#### 2. Categories Table
```sql
categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
```

#### 3. Products Table
```sql
products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL,
    category_id INT FOREIGN KEY REFERENCES categories(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
```

#### 4. Orders Table
```sql
orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    total DECIMAL(10,2) DEFAULT 0,
    user_id INT FOREIGN KEY REFERENCES users(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
```

#### 5. Order_Products Junction Table
```sql
order_products (
    order_id INT FOREIGN KEY REFERENCES orders(id),
    product_id INT FOREIGN KEY REFERENCES products(id),
    price INT NOT NULL,
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (order_id, product_id)
)
```

---

## 🔧 Key SQL Concepts Applied

### 1. **JOINs**
- **INNER JOIN**: Combining orders with products and users
- **Multiple JOINs**: Linking 3+ tables in single queries
```sql
SELECT orders.id, users.name, products.name
FROM orders 
JOIN users ON orders.user_id = users.id
JOIN order_products ON orders.id = order_products.order_id
JOIN products ON order_products.product_id = products.id;
```

### 2. **Views**
Creating reusable virtual tables:
```sql
CREATE VIEW Get_orders_count_for_each_user AS (
    SELECT users.id, users.name, COUNT(orders.id) AS orders_count
    FROM users JOIN orders ON users.id = orders.user_id
    GROUP BY users.id
);
```

### 3. **Aggregate Functions with GROUP BY**
- `COUNT()` - Counting orders per user
- `SUM()` - Total order values
- `MAX()` - Finding highest values
- `MIN()` - Finding lowest values

### 4. **Common Table Expressions (CTEs)**
```sql
WITH higher_month_for_total_number_of_orders AS (
    SELECT MONTH(created_at) as month, COUNT(*) as high 
    FROM orders 
    GROUP BY MONTH(created_at)
)
SELECT * FROM higher_month_for_total_number_of_orders;
```

### 5. **Conditional Logic (CASE Statements)**
```sql
CASE 
    WHEN products.price >= 1000 THEN 'Expensive'
    WHEN products.price BETWEEN 500 AND 999 THEN 'Moderate'
    ELSE 'Cheap'
END AS price_category
```

---

## 📊 Sample Queries and Their Purpose

### Business Intelligence Queries

1. **User Order Analysis**
   - Get order details for specific users
   - Count orders per user
   - Calculate total spending per user

2. **Time-Based Analysis**
   - Current month orders
   - Inactive users (no orders in 2 months)
   - Peak ordering months

3. **Product Performance**
   - Price categorization
   - Category-wise product distribution

4. **Revenue Analysis**
   - Monthly revenue totals
   - Highest value orders
   - User spending patterns

---

## 🚀 Setup Instructions

1. **Create Database**
   ```sql
   DROP DATABASE IF EXISTS market;
   CREATE DATABASE market;
   USE market;
   ```

2. **Run Schema Creation**
   - Execute the table creation statements
   - Set up foreign key relationships

3. **Insert Sample Data**
   - 6 users across different registration dates
   - 6 product categories
   - 10 products with varying prices
   - 10 orders with multiple products each

4. **Update Order Totals**
   ```sql
   UPDATE orders SET total = (
       SELECT SUM(quantity * price)
       FROM order_products
       WHERE order_products.order_id = orders.id
   );
   ```

---

## 🎯 Key Learning Outcomes

### Technical Skills Developed:
- ✅ Complex JOIN operations across multiple tables
- ✅ Creating and using database views
- ✅ Writing efficient GROUP BY queries
- ✅ Using aggregate functions for business analytics
- ✅ Implementing conditional logic in SQL
- ✅ Working with date/time functions
- ✅ Understanding many-to-many relationships

### Business Application Skills:
- ✅ E-commerce database design
- ✅ Customer behavior analysis
- ✅ Sales reporting and analytics
- ✅ Inventory management concepts
- ✅ Revenue tracking systems

---

## 📈 Advanced Features

### Date Functions Used:
- `MONTH(CURDATE())` - Current month
- `YEAR(CURDATE())` - Current year  
- `DATE_SUB()` - Date arithmetic
- `MAX(created_at)` - Latest dates

### Subqueries:
- Finding first user with MIN()
- Latest orders per user
- Monthly comparisons

### Data Relationships:
- One-to-Many: Users → Orders, Categories → Products
- Many-to-Many: Orders ↔ Products (via junction table)

---

## 🔮 Future Enhancements

Potential areas for expansion:
- Stored procedures for complex operations
- Triggers for automatic calculations  
- Indexes for performance optimization
- User roles and permissions
- Product reviews and ratings
- Shopping cart functionality
- Payment processing integration

---

## 📝 Files Included

- `market database.sql` - Complete database schema and data
- `task.sql` - Business intelligence queries
- `day3 task.pdf` - Original requirements document

---

*This project demonstrates practical application of advanced SQL concepts in a real-world e-commerce scenario, preparing for full-stack web development with proper database design foundations.*
