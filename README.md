# bookstore
use PHP7.1</br>
apache2.4</br>
mysql5.7</br>
framework:Laravel5.4</br>
windows10</br>
網路書城-購物車(Bookstore)</br>
1.登入登出</br>
2.創立會員帳號</br>
3.修改會員密碼搜尋書籍(全部書籍、搜尋中文書、搜尋外文書)</br>
4.我的購物車(能修改下單數量或刪除該筆單據)</br>

資料表</br>
books

Datatype|Column Name
---|---
int|book_id (PK)
String|book_name
int|book_class
int|book_quantity
int|book_status
String|book_img_name
binary|book_img
int|book_price
String|remember_token
timestamp|created_at
timestamp|updated_at

users

Datatype|Column Name
---|---
int|user_id	(PK)
string|user_account
string|password
string|remember_token
timestamp|created_at
timestamp|updated_at

shoppingcarts

Datatype|Column Name
---|---
int|cart_id  (PK)
int|user_id
int|book_id
int|book_buy_quantity
int|book_price
timestamp|created_at
timestamp|updated_at

orders

Datatype|Column Name
---|---
int|order_id  (PK)
int|buy_id
int|user_id
int|book_id
int|book_buy_quantity
int|book_price
string|remember_token
timestamp|created_at
timestamp|updated_at

------------------------------------




