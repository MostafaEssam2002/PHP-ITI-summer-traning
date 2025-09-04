-- get orders details for first user.
SELECT   orders.id AS order_id,
	orders.user_id,
    orders.created_at AS order_date,
    products.name AS product,
    order_products.quantity,
    order_products.price,
    (order_products.quantity * order_products.price) AS total_price 
from orders 
JOIN order_products ON orders.id=order_products.order_id 
JOIN products on order_products.product_id = products.id 
WHERE user_id=(SELECT min(users.id) from users );

-- Create view to Get orders count for each user
CREATE VIEW Get_orders_count_for_each_user AS(
    SELECT 
        users.id,
        users.name,
        users.email,
        COUNT(orders.id) AS orders_count
    FROM users
    JOIN orders ON users.id = orders.user_id
    GROUP BY users.id
)
SELECT * FROM `get_orders_count_for_each_user`;

-- Get total orders price for each user
SELECT     
    users.id,
    users.name,
    users.email,
    SUM(orders.total) as `total_orders_price`  
FROM users , orders WHERE users.id=orders.user_id GROUP by users.id

-- select last order for each user
SELECT users.id, users.name, users.email, orders.id AS order_id, orders.created_at, orders.total
FROM users 
JOIN orders  ON users.id = orders.user_id
WHERE orders.created_at = (
    SELECT MAX(created_at) 
    FROM orders 
    WHERE user_id = users.id
)
ORDER BY users.id,orders.id DESC;

-- select user that has higher order price
SELECT users.id,users.email,users.name,MAX(orders.total) 
FROM users JOIN orders on users.id = orders.user_id GROUP BY users.id ORDER BY MAX(orders.total) DESC LIMIT 1;

-- select users that has orders in this month
SELECT users.id,users.name,users.email,orders.created_at FROM users,orders 
WHERE orders.user_id=users.id AND month(orders.created_at)=MONTH(CURDATE()) AND year(orders.created_at)=YEAR(CURDATE());

-- select users that didn’t have orders in last 2 months
SELECT users.id,users.email,users.name,orders.created_at FROM users JOIN orders on orders.user_id=users.id 
GROUP BY users.id,users.email,users.name HAVING  MAX(orders.created_at) < DATE_SUB(CURDATE(), INTERVAL 2 MONTH);

-- select higher month for total number of orders
WITH higher_month_for_total_number_of_orders AS (
    SELECT month(orders.created_at) as `month`,COUNT(*) as high FROM orders 
    GROUP BY (month(orders.created_at))  order by high DESC ,orders.created_at DESC LIMIT 1 )
SELECT * FROM higher_month_for_total_number_of_orders  ;

-- select higher month for orders price
with cte AS (
    SELECT *,SUM(orders.total) as `month_total` FROM orders GROUP BY month(orders.created_at) 
    order BY `month_total` DESC,orders.created_at DESC LIMIT 1
)
SELECT month(created_at) FROM cte

-- select user that has higher order price in last month (current month)
SELECT users.id,users.name,users.email,orders.created_at,orders.total FROM orders,users 
WHERE orders.user_id=users.id and month(orders.created_at)=month(curdate()) HAVING MAX(orders.total);

-- select products name and category name and price and the category of price if it is expensive or moderate or cheap.
SELECT 
    products.name AS product_name,
    categories.name AS category_name,
    products.price,
    CASE 
        WHEN products.price >= 1000 THEN 'Expensive'
        WHEN products.price BETWEEN 500 AND 999 THEN 'Moderate'
        ELSE 'Cheap'
    END AS price_category
FROM products
JOIN categories ON products.category_id = categories.id;
