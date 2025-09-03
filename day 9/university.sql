CREATE TABLE department (
    id INT PRIMARY KEY auto_increment,
    name VARCHAR(100) NOT NULL,
);

CREATE TABLE chairman (
    id INT,
    department_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    CONSTRAINT pk_chairman PRIMARY KEY (id),
    CONSTRAINT fk_chairman_department FOREIGN KEY (department_id) REFERENCES department(id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE teacher (
    id INT,
    name VARCHAR(100) NOT NULL ,
    type ENUM("visitor","full_time","part_time") NOT NULL default "full_time",
    department_id INT NOT NULL,
    CONSTRAINT pk_teacher PRIMARY KEY (id),
    CONSTRAINT fk_teacher_department FOREIGN KEY (department_id) REFERENCES department(id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE course (
    course_id INT,
    course_fee int NOT NULL,
    course_name VARCHAR(100) NOT NULL,
    CONSTRAINT pk_course PRIMARY KEY (course_id)
);

CREATE TABLE student (
    university_id INT,
    name VARCHAR(100) NOT NULL,
    city VARCHAR(50),
    street VARCHAR(100),
    zip VARCHAR(20),
    CONSTRAINT pk_student PRIMARY KEY (university_id)
);

CREATE TABLE student_phone_number (
    student_id INT,
    phone_number VARCHAR(20),
    CONSTRAINT pk_student_phone PRIMARY KEY (student_id, phone_number),
    CONSTRAINT fk_student_phone_student FOREIGN KEY (student_id) REFERENCES student(university_id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE course_teacher (
    course_id INT,
    teacher_id INT,
    CONSTRAINT pk_course_teacher PRIMARY KEY (course_id, teacher_id),
    CONSTRAINT fk_course_teacher_course FOREIGN KEY (course_id) REFERENCES course(course_id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_course_teacher_teacher FOREIGN KEY (teacher_id) REFERENCES teacher(id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE student_course (
    course_id INT,
    university_id INT,
    semester VARCHAR(20),
    CONSTRAINT pk_student_course PRIMARY KEY (course_id, university_id,semester),
    CONSTRAINT fk_student_course_course FOREIGN KEY (course_id) REFERENCES course(course_id) 
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_student_course_student FOREIGN KEY (university_id) REFERENCES student(university_id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- Add some sample data to demonstrate the relationships
INSERT INTO department (id, name) VALUES 
(1, 'Computer Science'),
(2, 'Mathematics'),
(3, 'Physics');

INSERT INTO chairman (id, department_id, name) VALUES 
(1, 1, 'Dr. John Smith'),
(2, 2, 'Dr. Sarah Johnson'),
(3, 3, 'Dr. Michael Brown');

INSERT INTO teacher (id, name, type, department_id) VALUES 
(1, 'Prof. Alice Wilson', 'visitor', 1),
(2, 'Dr. Bob Davis', 'full_time', 1),
(3, 'Dr. Carol White', 'part_time', 2);

INSERT INTO course (course_id, course_fee, course_name) VALUES 
(101, 1500.00, 'Database Systems'),
(102, 1200.00, 'Data Structures'),
(201, 1000.00, 'Calculus I');

INSERT INTO student (university_id, name, city, street, zip) VALUES 
(2023001, 'Emma Thompson', 'Cairo', '123 Main St', '12345'),
(2023002, 'James Wilson', 'Alexandria', '456 Oak Ave', '02101');

INSERT INTO student_phone_number (student_id, phone_number) VALUES 
(2023001, '555-1234'),
(2023001, '555-5678'),
(2023002, '555-9999');

INSERT INTO course_teacher (course_id, teacher_id) VALUES 
(101, 1),
(102, 2),
(201, 3);

INSERT INTO student_course (course_id, university_id, semester) VALUES 
(101, 2023001, 'Fall 2023'),
(102, 2023001, 'Fall 2023'),
(101, 2023002, 'Spring 2024');

-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- List all students with their names and city ordered by name (A–Z).
SELECT student.name,student.city FROM student ORDER BY student.city ASC

-- Get students who live in cities IN ('Cairo', 'Alexandria', 'Giza').
SELECT * FROM student WHERE student.city in ('Cairo', 'Alexandria', 'Giza')

-- Select students where their names contain ‘med’
SELECT * from student WHERE student.name LIKE '%med%'

-- Find all students who live in Cairo and have zip = 12345.
SELECT * from student WHERE student.city = "Cairo" and student.zip = 12345

-- Add a new column email to Student table.
ALTER TABLE student add COLUMN email varchar(100) NOT NULL unique

-- Show all courses with their fee ordered by course fee descending.
SELECT * FROM course ORDER BY course.course_fee DESC

-- Get courses where course_fee > 5000 or course_fee < 1000.
SELECT * FROM course WHERE course.course_fee >5000 or course.course_fee <1000

-- Find the minimum and maximum course_fee.
SELECT MIN(course.course_fee) , MAX(course.course_fee) FROM course

-- Update courses fee, increase the fee by 5% when fees are less than 1500.
UPDATE course SET course.course_fee = course.course_fee+course.course_fee*.05 WHERE course.course_fee <1500 

-- Modify column course_fee in Course table to be decimal(10,2)
ALTER TABLE MODIFY COLUMN course.course_fee DECIMAL(10,2) not NULL;

-- Show teachers who are not part_time.
SELECT * FROM teacher WHERE teacher.type != "part_time"

-- Display all teachers who work full_time
SELECT * FROM teacher WHERE teacher.type = "full_time"

-- Delete all visiting teachers from Teacher table.
DELETE FROM teacher WHERE teacher.type ="visitor"

-- Count the number of students that enroll on specific course
SELECT student_course.course_id ,COUNT(student_course.university_id) FROM student_course GROUP BY student_course.course_id

-- Delete chairman of id=3.
DELETE FROM chairman WHERE chairman.id=3