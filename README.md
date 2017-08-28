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
使用教學</BR>
右上方能點選登入或是註冊
![login](https://user-images.githubusercontent.com/30998953/29787854-1324e6e0-8c63-11e7-8d45-fe070472ca6c.jpg)
登入後進去主畫面，左方能夠選擇搜尋書籍的方式，而右上方能選擇使用者功能
![index](https://user-images.githubusercontent.com/30998953/29787621-2a2c91e0-8c62-11e7-8e8b-05d994c8f397.jpg)
當選擇右上方購物車籃的功能時，則會出現以下畫面
![cart](https://user-images.githubusercontent.com/30998953/29787620-2a22ff72-8c62-11e7-9a1b-e0b21c7b10bf.jpg)
在此會顯示使用者所購買的書籍以及全部金額，也能在此修改或刪除放入購物籃內的資料，使用者無法編輯超過現有書籍的數量

