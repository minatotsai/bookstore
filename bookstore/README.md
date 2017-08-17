# bookstore

網路書城-購物車(Bbookstore)</br>
1.登入登出</br>
2.創立會員帳號</br>
3.修改會員密碼搜尋書籍(全部書籍、搜尋中文書、搜尋外文書)</br>
4.我的購物車(能修改下單數量或刪除該筆單據)</br>

資料表</br>
books</br>
int		book_id		(PRIMARY KEY)</br>
String		book_name</br>
int		book_class</br>
int		book_quantity</br>
int		book_status</br>
binary		book_img</br>
timestamp	createtime</br>
timestamp	updatetime</br>

members</br>
int		member_id	(PRIMARY KEY)</br>
string		member_account</br>
string		member_password</br>
timestamp	createtime</br>
timestamp	updatetime</br>

shoppingcart</br>
int		member_id</br>
int		book_id</br>
int		book_buy_quantity</br>
timestamp	createtime</br>
timestamp	updatetime</br>

order</br>
int		order_id</br>
int		member_id</br>
int		book_id</br>
int		book_buy_quantity</br>
timestamp	createtime</br>
timestamp	updatetime</br>

------------------------------------


