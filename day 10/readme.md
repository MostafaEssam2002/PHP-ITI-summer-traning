\# Day 10 - Market Database Project

\## ITI PHP Summer Internship



\### 📚 Learning Objectives

This project demonstrates mastery of advanced SQL concepts including:

\- \*\*JOINs\*\* - Combining data from multiple tables

\- \*\*Views\*\* - Creating virtual tables for simplified queries

\- \*\*Stored Procedures\*\* - Reusable SQL code blocks

\- \*\*Aggregate Functions\*\* - GROUP BY, COUNT, SUM, MAX, MIN

\- \*\*Common Table Expressions (CTEs)\*\* - Temporary named result sets

\- \*\*Conditional Logic\*\* - CASE statements for data categorization



---



\## 🗃️ Database Schema



\### Tables Structure



\#### 1. Users Table

```sql

users (

&nbsp;   id INT PRIMARY KEY AUTO\_INCREMENT,

&nbsp;   name VARCHAR(30) NOT NULL,

&nbsp;   email VARCHAR(30) UNIQUE NOT NULL,

&nbsp;   password VARCHAR(30) NOT NULL,

&nbsp;   created\_at TIMESTAMP DEFAULT CURRENT\_TIMESTAMP

)

```



\#### 2. Categories Table

```sql

categories (

&nbsp;   id INT PRIMARY KEY AUTO\_INCREMENT,

&nbsp;   name VARCHAR(30) NOT NULL,

&nbsp;   created\_at TIMESTAMP DEFAULT CURRENT\_TIMESTAMP

)

```



\#### 3. Products Table

```sql

products (

&nbsp;   id INT PRIMARY KEY AUTO\_INCREMENT,

&nbsp;   name VARCHAR(30) NOT NULL,

&nbsp;   description TEXT,

&nbsp;   price DECIMAL(10,2) NOT NULL,

&nbsp;   quantity INT NOT NULL,

&nbsp;   category\_id INT FOREIGN KEY REFERENCES categories(id),

&nbsp;   created\_at TIMESTAMP DEFAULT CURRENT\_TIMESTAMP

)

```



\#### 4. Orders Table

```sql

orders (

&nbsp;   id INT PRIMARY KEY AUTO\_INCREMENT,

&nbsp;   total DECIMAL(10,2) DEFAULT 0,

&nbsp;   user\_id INT FOREIGN KEY REFERENCES users(id),

&nbsp;   created\_at TIMESTAMP DEFAULT CURRENT\_TIMESTAMP

)

```



\#### 5. Order\_Products Junction Table

```sql

order\_products (

&nbsp;   order\_id INT FOREIGN KEY REFERENCES orders(id),

&nbsp;   product\_id INT FOREIGN KEY REFERENCES products(id),

&nbsp;   price INT NOT NULL,

&nbsp;   quantity INT NOT NULL,

&nbsp;   created\_at TIMESTAMP DEFAULT CURRENT\_TIMESTAMP,

&nbsp;   PRIMARY KEY (order\_id, product\_id)

)

```



---



\## 🔧 Key SQL Concepts Applied



\### 1. \*\*JOINs\*\*

\- \*\*INNER JOIN\*\*: Combining orders with products and users

\- \*\*Multiple JOINs\*\*: Linking 3+ tables in single queries

```sql

SELECT orders.id, users.name, products.name

FROM orders 

JOIN users ON orders.user\_id = users.id

JOIN order\_products ON orders.id = order\_products.order\_id

JOIN products ON order\_products.product\_id = products.id;

```



\### 2. \*\*Views\*\*

Creating reusable virtual tables:

```sql

CREATE VIEW Get\_orders\_count\_for\_each\_user AS (

&nbsp;   SELECT users.id, users.name, COUNT(orders.id) AS orders\_count

&nbsp;   FROM users JOIN orders ON users.id = orders.user\_id

&nbsp;   GROUP BY users.id

);

```



\### 3. \*\*Aggregate Functions with GROUP BY\*\*

\- `COUNT()` - Counting orders per user

\- `SUM()` - Total order values

\- `MAX()` - Finding highest values

\- `MIN()` - Finding lowest values



\### 4. \*\*Common Table Expressions (CTEs)\*\*

```sql

WITH higher\_month\_for\_total\_number\_of\_orders AS (

&nbsp;   SELECT MONTH(created\_at) as month, COUNT(\*) as high 

&nbsp;   FROM orders 

&nbsp;   GROUP BY MONTH(created\_at)

)

SELECT \* FROM higher\_month\_for\_total\_number\_of\_orders;

```



\### 5. \*\*Conditional Logic (CASE Statements)\*\*

```sql

CASE 

&nbsp;   WHEN products.price >= 1000 THEN 'Expensive'

&nbsp;   WHEN products.price BETWEEN 500 AND 999 THEN 'Moderate'

&nbsp;   ELSE 'Cheap'

END AS price\_category

```



---



\## 📊 Sample Queries and Their Purpose



\### Business Intelligence Queries



1\. \*\*User Order Analysis\*\*

&nbsp;  - Get order details for specific users

&nbsp;  - Count orders per user

&nbsp;  - Calculate total spending per user



2\. \*\*Time-Based Analysis\*\*

&nbsp;  - Current month orders

&nbsp;  - Inactive users (no orders in 2 months)

&nbsp;  - Peak ordering months



3\. \*\*Product Performance\*\*

&nbsp;  - Price categorization

&nbsp;  - Category-wise product distribution



4\. \*\*Revenue Analysis\*\*

&nbsp;  - Monthly revenue totals

&nbsp;  - Highest value orders

&nbsp;  - User spending patterns



---



\## 🚀 Setup Instructions



1\. \*\*Create Database\*\*

&nbsp;  ```sql

&nbsp;  DROP DATABASE IF EXISTS market;

&nbsp;  CREATE DATABASE market;

&nbsp;  USE market;

&nbsp;  ```



2\. \*\*Run Schema Creation\*\*

&nbsp;  - Execute the table creation statements

&nbsp;  - Set up foreign key relationships



3\. \*\*Insert Sample Data\*\*

&nbsp;  - 6 users across different registration dates

&nbsp;  - 6 product categories

&nbsp;  - 10 products with varying prices

&nbsp;  - 10 orders with multiple products each



4\. \*\*Update Order Totals\*\*

&nbsp;  ```sql

&nbsp;  UPDATE orders SET total = (

&nbsp;      SELECT SUM(quantity \* price)

&nbsp;      FROM order\_products

&nbsp;      WHERE order\_products.order\_id = orders.id

&nbsp;  );

&nbsp;  ```



---



\## 🎯 Key Learning Outcomes



\### Technical Skills Developed:

\- ✅ Complex JOIN operations across multiple tables

\- ✅ Creating and using database views

\- ✅ Writing efficient GROUP BY queries

\- ✅ Using aggregate functions for business analytics

\- ✅ Implementing conditional logic in SQL

\- ✅ Working with date/time functions

\- ✅ Understanding many-to-many relationships



\### Business Application Skills:

\- ✅ E-commerce database design

\- ✅ Customer behavior analysis

\- ✅ Sales reporting and analytics

\- ✅ Inventory management concepts

\- ✅ Revenue tracking systems



---



\## 📈 Advanced Features



\### Date Functions Used:

\- `MONTH(CURDATE())` - Current month

\- `YEAR(CURDATE())` - Current year  

\- `DATE\_SUB()` - Date arithmetic

\- `MAX(created\_at)` - Latest dates



\### Subqueries:

\- Finding first user with MIN()

\- Latest orders per user

\- Monthly comparisons



\### Data Relationships:

\- One-to-Many: Users → Orders, Categories → Products

\- Many-to-Many: Orders ↔ Products (via junction table)



---



\## 🔮 Future Enhancements



Potential areas for expansion:

\- Stored procedures for complex operations

\- Triggers for automatic calculations  

\- Indexes for performance optimization

\- User roles and permissions

\- Product reviews and ratings

\- Shopping cart functionality

\- Payment processing integration



---



\## 📝 Files Included



\- `market database.sql` - Complete database schema and data

\- `task.sql` - Business intelligence queries

\- `day3 task.pdf` - Original requirements document



---



\*This project demonstrates practical application of advanced SQL concepts in a real-world e-commerce scenario, preparing for full-stack web development with proper database design foundations.\*

