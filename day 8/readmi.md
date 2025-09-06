\# Restaurant Website



A modern, responsive restaurant website with dynamic menu functionality, featuring a beautiful image slider, interactive product catalog, and seamless user experience.



\## 🍽️ Features



\### Frontend Features

\- \*\*Dynamic Image Slider\*\*: Auto-playing hero section with 4 restaurant images

\- \*\*Responsive Navigation\*\*: Fixed navbar with smooth scrolling to sections

\- \*\*Interactive Menu System\*\*: Category-based product filtering

\- \*\*Shopping Cart\*\*: Add-to-cart functionality with real-time counter

\- \*\*Smooth Animations\*\*: Fade-in effects, hover animations, and scroll-triggered animations

\- \*\*Mobile Responsive\*\*: Optimized for all device sizes

\- \*\*Accessibility\*\*: Keyboard navigation support and touch/swipe gestures



\### Backend Features

\- \*\*MySQL Database Integration\*\*: Dynamic product and category loading

\- \*\*RESTful API\*\*: PHP endpoint for retrieving products and categories

\- \*\*CORS Support\*\*: Cross-origin resource sharing enabled



\## 🛠️ Tech Stack



\### Frontend

\- \*\*HTML5\*\*: Semantic markup structure

\- \*\*CSS3\*\*: Modern styling with animations and responsive design

\- \*\*JavaScript (ES6+)\*\*: Interactive functionality and API integration

\- \*\*Google Fonts\*\*: Poppins and Merriweather typography



\### Backend

\- \*\*PHP\*\*: Server-side scripting

\- \*\*MySQL\*\*: Database management

\- \*\*PDO\*\*: Database connectivity and prepared statements



\## 📁 Project Structure



```

restaurant-website/

├── index.html          # Main HTML file

├── style.css           # CSS styles and animations

├── script.js           # JavaScript functionality

├── get\_products.php    # PHP API endpoint

├── images/             # Image assets folder

│   ├── logo.png

│   ├── slide\_1.jpg

│   ├── slide\_2.jpg

│   ├── slide\_3.jpg

│   └── res\_img\_5.jpg

└── README.md           # This file

```



\## 🗄️ Database Schema



\### Tables Required



\#### `categories` Table

```sql

CREATE TABLE categories (

&nbsp;   id INT AUTO\_INCREMENT PRIMARY KEY,

&nbsp;   name VARCHAR(100) NOT NULL

);

```



\#### `products` Table

```sql

CREATE TABLE products (

&nbsp;   id INT AUTO\_INCREMENT PRIMARY KEY,

&nbsp;   name VARCHAR(200) NOT NULL,

&nbsp;   price DECIMAL(10,2),

&nbsp;   image VARCHAR(500),

&nbsp;   category\_id INT,

&nbsp;   FOREIGN KEY (category\_id) REFERENCES categories(id)

);

```



\### Sample Data

```sql

-- Categories

INSERT INTO categories (name) VALUES 

('All'), ('Appetizers'), ('Main Courses'), ('Desserts'), ('Beverages');



-- Products

INSERT INTO products (name, price, image, category\_id) VALUES 

('Caesar Salad', 12.99, 'images/caesar-salad.jpg', 2),

('Grilled Chicken', 18.99, 'images/grilled-chicken.jpg', 3),

('Chocolate Cake', 8.99, 'images/chocolate-cake.jpg', 4);

```



\## 🚀 Setup Instructions



\### Prerequisites

\- Web server (Apache/Nginx)

\- PHP 7.0 or higher

\- MySQL 5.7 or higher

\- Modern web browser



\### Installation Steps



1\. \*\*Clone/Download the project files\*\*

&nbsp;  ```bash

&nbsp;  git clone <repository-url>

&nbsp;  cd restaurant-website

&nbsp;  ```



2\. \*\*Database Setup\*\*

&nbsp;  - Create a MySQL database named `test`

&nbsp;  - Import the required tables (see Database Schema section)

&nbsp;  - Update database credentials in `get\_products.php` if needed:

&nbsp;    ```php

&nbsp;    $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "");

&nbsp;    ```



3\. \*\*Web Server Configuration\*\*

&nbsp;  - Place files in your web server's document root

&nbsp;  - Ensure PHP has MySQL PDO extension enabled

&nbsp;  - Update the API endpoint URL in `script.js` if needed:

&nbsp;    ```javascript

&nbsp;    const response = await fetch('http://localhost/task6-9/get\_products.php')

&nbsp;    ```



4\. \*\*Image Assets\*\*

&nbsp;  - Add restaurant images to the `images/` folder

&nbsp;  - Ensure image paths in the database match actual file locations



\## 🔧 Configuration



\### API Endpoint

The PHP script `get\_products.php` serves as the API endpoint that:

\- Fetches all categories from the database

\- Retrieves products with their associated category names

\- Returns JSON response with CORS headers enabled



\### JavaScript Configuration

Key configurable elements in `script.js`:

\- Auto-slide interval (currently 5 seconds)

\- API endpoint URL

\- Animation delays and durations

\- Touch/swipe sensitivity



\## 🎨 Customization



\### Styling

\- Primary colors: Gold (#d4af37) and Navy (#0f172b)

\- Fonts: Merriweather (serif) and Nunito (sans-serif)

\- Animations: CSS transitions and keyframe animations



\### Content Sections

\- Hero slider with 4 image slots

\- About Us section with fade-in animation

\- Dynamic menu with category filtering

\- Footer with restaurant information



\## 📱 Responsive Design



The website is fully responsive with breakpoints at:

\- Desktop: 1200px+

\- Tablet: 768px - 1199px

\- Mobile: 480px - 767px

\- Small Mobile: < 480px



\## 🔍 Browser Support



\- Chrome 60+

\- Firefox 55+

\- Safari 12+

\- Edge 79+



\## 🚀 Performance Features



\- Lazy loading for images

\- CSS animations with GPU acceleration

\- Efficient DOM manipulation

\- Optimized image sizes and formats



\## 🔒 Security Features



\- PDO prepared statements prevent SQL injection

\- CORS headers properly configured

\- Input validation on frontend and backend



\## 📊 API Response Format



```json

{

&nbsp; "categories": \["All", "Appetizers", "Main Courses", "Desserts"],

&nbsp; "products": \[

&nbsp;   {

&nbsp;     "id": 1,

&nbsp;     "name": "Caesar Salad",

&nbsp;     "price": "12.99",

&nbsp;     "image": "images/caesar-salad.jpg",

&nbsp;     "category": "Appetizers"

&nbsp;   }

&nbsp; ]

}

```



\## 🐛 Troubleshooting



\### Common Issues

1\. \*\*Products not loading\*\*: Check database connection and API endpoint URL

2\. \*\*Images not displaying\*\*: Verify image paths and file permissions

3\. \*\*CORS errors\*\*: Ensure proper headers in PHP file

4\. \*\*Animations not working\*\*: Check CSS animation support in browser



\### Debug Mode

Enable console logging by uncommenting debug statements in `script.js`



\## 🤝 Contributing



1\. Fork the repository

2\. Create a feature branch

3\. Make your changes

4\. Test thoroughly

5\. Submit a pull request



