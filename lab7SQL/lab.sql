-- W1
SELECT * FROM student ORDER BY std_name;

-- W2
SELECT std_id,std_name FROM `student`;

--W3
SELECT * FROM `student` WHERE province = "ขอนแก่น";

--W4
SELECT course.course_id,title,credit FROM course INNER JOIN register ON course.course_id=register.course_id 
WHERE register.std_id = '5001100348';

--W5
SELECT std_id,SUM(credit) from register INNER JOIN course on register.course_id = course.course_id group by std_id;

--W7
SELECT name,ord_date from member INNER JOIN orders on member.username = orders.username

--W8
SELECT name,ord_date,SUM(price*item.quantity) from member INNER JOIN orders on member.username = orders.username INNER JOIN 
item on orders.ord_id = item.ord_id INNER JOIN product on product.pid = item.pid GROUP BY ord_date;

--W9
SELECT pname,SUM(quantity) from product INNER JOIN item ON product.pid = item.pid GROUP BY product.pid;

--W10
SELECT pname,ord_date from product INNER JOIN item ON product.pid = item.pid INNER JOIN orders ON item.ord_id = orders.ord_id;

--W11
SELECT pname,SUM(price*item.quantity) from product INNER JOIN item ON product.pid = item.pid GROUP BY item.pid;

--W12
SELECT name,COALESCE(SUM(price*item.quantity),0) from member LEFT JOIN orders ON member.username = orders.username LEFT JOIN 
item ON orders.ord_id = item.ord_id LEFT JOIN product ON product.pid = item.pid GROUP BY member.username;

--W13
SELECT ord_date,SUM(price*item.quantity) from orders INNER JOIN item on orders.ord_id = item.ord_id INNER JOIN 
product ON product.pid = item.pid GROUP BY ord_date;