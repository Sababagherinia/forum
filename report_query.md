۱.تعداد افرادی که حداقل یکبار سفارش دادن
SELECT COUNT(US.id) FROM users as US
WHERE 
US.confirmed = 1
AND US.phone != '09119351172'
AND US.phone != '09118183007'
AND US.phone != '09112307016'
AND US.phone != '09350805855'
AND US.phone != '09308548290'
AND ( SELECT COUNT(orders.id) FROM orders WHERE orders.user_id = US.id AND orders.status = 'DELIVERED' AND orders.created_at <= '2020-11-15 23:59:59' ) >= 1



۲.از افراد بند شماره ۱ چند نفرشون از کد تخفیف استفاده کردن
SELECT COUNT(US.id) FROM users as US
WHERE 
US.confirmed = 1
AND US.phone != '09119351172'
AND US.phone != '09118183007'
AND US.phone != '09112307016'
AND US.phone != '09350805855'
AND US.phone != '09308548290'
AND ( SELECT COUNT(orders.id) FROM orders WHERE orders.user_id = US.id AND orders.status = 'DELIVERED' AND orders.created_at <= '2020-11-15 23:59:59' ) >= 1
AND ( SELECT COUNT(discount_order_user.id) FROM discount_order_user WHERE discount_order_user.user_id = US.id AND discount_order_user.status = 'USED' AND discount_order_user.created_at <= '2020-11-15 23:59:59' ) >= 1




۳. تعداد افرادی که فقط ۲ بار سفارش دادن
SELECT COUNT(US.id) FROM users as US
WHERE 
US.confirmed = 1
AND US.phone != '09119351172'
AND US.phone != '09118183007'
AND US.phone != '09112307016'
AND US.phone != '09350805855'
AND US.phone != '09308548290'
AND ( SELECT COUNT(orders.id) FROM orders WHERE orders.user_id = US.id AND orders.status = 'DELIVERED' AND orders.created_at <= '2020-11-15 23:59:59' ) = 2


۴. عداد افرادی که ۳ بار به بالا سفارش داده اند
SELECT COUNT(US.id) FROM users as US
WHERE 
US.confirmed = 1
AND US.phone != '09119351172'
AND US.phone != '09118183007'
AND US.phone != '09112307016'
AND US.phone != '09350805855'
AND US.phone != '09308548290'
AND ( SELECT COUNT(orders.id) FROM orders WHERE orders.user_id = US.id AND orders.status = 'DELIVERED' AND orders.created_at <= '2020-11-15 23:59:59' ) >= 3


۵. تعداد افرادی که ثبت نام کردن
SELECT COUNT(US.id) FROM users as US
WHERE 
US.confirmed = 1
AND US.phone != '09119351172'
AND US.phone != '09118183007'
AND US.phone != '09112307016'
AND US.phone != '09350805855'
AND US.phone != '09308548290'
AND US.created_at <= '2020-11-15 23:59:59'


6. بیشترین محصولی که فروش رفته

SELECT products.title , SUM(order_product.qty) AS QTY   FROM order_product
LEFT JOIN products ON products.id = order_product.product_id
LEFT JOIN orders ON orders.id = order_product.order_id
LEFT JOIN users ON users.id = orders.user_id

WHERE 

	orders.status = 'DELIVERED' 
    AND orders.created_at <= '2020-11-15 23:59:59'
    AND users.phone != '09119351172'
    AND users.phone != '09118183007'
    AND users.phone != '09112307016'
    AND users.phone != '09350805855'
    AND users.phone != '09308548290'

GROUP BY order_product.product_id
ORDER BY QTY DESC

7.تعداد افرادی که حداقل ۷ بار سفارش داشتن
SELECT COUNT(US.id) FROM users as US
WHERE 
US.confirmed = 1
AND US.phone != '09119351172'
AND US.phone != '09118183007'
AND US.phone != '09112307016'
AND US.phone != '09350805855'
AND US.phone != '09308548290'
AND ( SELECT COUNT(orders.id) FROM orders WHERE orders.user_id = US.id AND orders.status = 'DELIVERED' AND orders.created_at <= '2020-11-15 23:59:59' ) >= 3




7 ba esm
SELECT ( SELECT COUNT(orders.id) FROM orders WHERE orders.user_id = US.id AND orders.status = 'DELIVERED' AND orders.created_at <= '2020-11-15 23:59:59' ) AS cc ,
		US.name , 
        US.phone FROM users as US
WHERE 
US.confirmed = 1
AND US.phone != '09119351172'
AND US.phone != '09118183007'
AND US.phone != '09112307016'
AND US.phone != '09350805855'
AND US.phone != '09308548290'
AND ( SELECT COUNT(orders.id) FROM orders WHERE orders.user_id = US.id AND orders.status = 'DELIVERED' AND orders.created_at <= '2020-11-15 23:59:59' ) >= 7

GROUP BY US.id
