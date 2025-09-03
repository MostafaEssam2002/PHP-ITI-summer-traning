# University Database System - Day 9 Task

**ITI PHP Summer Internship - Database Design Task**

## 📋 Project Overview

This project implements a comprehensive university database system that manages the relationships between students, courses, teachers, departments, and chairmen. The system is designed to handle course enrollment, teacher assignments, and departmental organization within a university structure.

## 🎯 Task Requirements

Design and implement a database system that handles the following scenarios:

- **Students** can take one or more courses according to their choice (minimum one course required)
- **Courses** are taught by one or more teachers (minimum one teacher required)  
- **Teachers** can teach one or more courses and belong to exactly one department
- **Departments** have exactly one chairman (weak entity relationship)
- **Chairmen** manage exactly one department each

## 📊 Entity Relationship Diagram (ERD)

### Entities and Attributes

1. **Student**
   - `university_id` (Primary Key)
   - `name`
   - `phone` (Multi-valued attribute)
   - `address` (Composite: city, street, zip)

2. **Course**
   - `course_id` (Primary Key)
   - `course_name`
   - `course_fee`

3. **Teacher**
   - `id` (Primary Key)
   - `name`
   - `type` (visitor, full_time, part_time)
   - `department_id` (Foreign Key)

4. **Department**
   - `id` (Primary Key)
   - `name`

5. **Chairman** (Weak Entity)
   - `id` (Primary Key)
   - `name`
   - `department_id` (Foreign Key - Identifying relationship)

### Relationships

- **Takes**: Student ↔ Course (M:N with semester attribute)
- **Teach**: Teacher ↔ Course (M:N)
- **Belongs To**: Teacher → Department (M:1)
- **Manage**: Chairman ↔ Department (1:1, Identifying relationship)

## 🗄️ Database Schema

### Tables Structure

```sql
-- Core Tables
- department (id, name)
- chairman (id, department_id, name)
- teacher (id, name, type, department_id)
- course (course_id, course_fee, course_name)
- student (university_id, name, city, street, zip)

-- Junction Tables
- course_teacher (course_id, teacher_id)
- student_course (course_id, university_id, semester)
- student_phone_number (student_id, phone_number)
```

### Key Constraints

- **Primary Keys**: Each entity has a designated primary key
- **Foreign Keys**: Proper referential integrity with CASCADE options
- **Check Constraints**: Teacher type limited to specific values
- **Unique Constraints**: Email field in student table (added via ALTER)

## 📁 File Structure

```
university-database/
├── university.sql          # Complete database schema and sample data
├── README.md              # This documentation
├── erd-diagram.png        # Entity Relationship Diagram
└── mapping-diagram.png    # Logical mapping diagram
```

## 🚀 Getting Started

### Prerequisites
- MySQL 5.7+ or MariaDB 10.2+
- Database management tool (phpMyAdmin, MySQL Workbench, etc.)

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/university-database.git
   cd university-database
   ```

2. **Import the database**
   ```bash
   mysql -u username -p database_name < university.sql
   ```

3. **Verify installation**
   ```sql
   SHOW TABLES;
   SELECT COUNT(*) FROM student;
   ```

## 💾 Sample Data

The database includes sample data for testing:

- **3 Departments**: Computer Science, Mathematics, Physics
- **3 Chairmen**: One for each department
- **3 Teachers**: Various types (visitor, full_time, part_time)
- **3 Courses**: Different fee structures
- **2 Students**: With complete address and phone information

## 🔧 Featured SQL Operations

The implementation includes various SQL operations:

### Data Retrieval
- Student listings with city ordering
- Filtered searches by location and name patterns
- Course information with fee-based sorting

### Data Manipulation
- Dynamic fee updates with percentage calculations
- Table structure modifications (ALTER TABLE)
- Conditional data deletion

### Aggregation
- Min/Max course fee calculations
- Student enrollment counts per course
- Statistical summaries

### Examples

```sql
-- Find students in specific cities
SELECT * FROM student WHERE city IN ('Cairo', 'Alexandria', 'Giza');

-- Get course enrollment statistics
SELECT course_id, COUNT(university_id) as enrollment_count 
FROM student_course 
GROUP BY course_id;

-- Update course fees (5% increase for fees < 1500)
UPDATE course 
SET course_fee = course_fee * 1.05 
WHERE course_fee < 1500;
```

## 🎨 Design Decisions

### Normalization
- **3NF Compliance**: All tables follow Third Normal Form
- **Separate Junction Tables**: For many-to-many relationships
- **Multi-valued Attributes**: Phone numbers stored in separate table

### Data Integrity
- **Referential Integrity**: Foreign key constraints with CASCADE
- **Domain Constraints**: ENUM for teacher types
- **Entity Integrity**: Primary keys for all entities

### Performance Considerations
- **Indexing**: Primary and foreign keys automatically indexed
- **Data Types**: Appropriate field sizes and types
- **Constraints**: Efficient constraint checking

## 🔍 Query Examples

### Basic Queries
```sql
-- List all full-time teachers
SELECT * FROM teacher WHERE type = 'full_time';

-- Find courses with fees over $1000
SELECT * FROM course WHERE course_fee > 1000;
```

### Advanced Queries
```sql
-- Teachers and their departments
SELECT t.name, d.name as department
FROM teacher t
JOIN department d ON t.department_id = d.id;

-- Students enrolled in Fall 2023
SELECT s.name, c.course_name
FROM student s
JOIN student_course sc ON s.university_id = sc.university_id
JOIN course c ON sc.course_id = c.course_id
WHERE sc.semester = 'Fall 2023';
```

## 📈 Future Enhancements

- **Grades Management**: Add grade tracking for student-course enrollments
- **Schedule System**: Implement class timing and room allocation
- **Academic Calendar**: Add semester and academic year management
- **Fee Payment**: Track payment status and financial records

## 🤝 Contributing

This is an educational project from ITI PHP Summer Internship. Suggestions for improvements are welcome!

## 📝 License

This project is created for educational purposes as part of ITI training program.

## 👨‍💻 Author

**Mustafa Essam El Din Abdel Halim Abbas Ali**  
ITI PHP Summer Internship - Day 9 Task  
Database Design and Implementation

---

*Last Updated: September 2025*
