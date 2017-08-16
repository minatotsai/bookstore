# bookstore

網路書城-購物車(Bbookstore)</br>
1.登入登出</br>
2.創立會員帳號</br>
3.修改會員密碼搜尋書籍(全部書籍、搜尋中文書、搜尋外文書)</br>
4.我的購物車(能修改下單數量或刪除該筆單據)</br>

資料表</br>
book</br>
int		book_id		(pk)</br>
String		book_name</br>
int		book_class</br>
int		book_quantity</br>
int		book_status</br>
int		book_price</br>
binary		book_img</br>
timestamp	createtime</br>
timestamp	updatetime</br>

user</br>
int		user_id		(pk)</br>
string		user_account</br>
string		user_password</br>
timestamp	createtime</br>
timestamp	updatetime</br>

shoppingcart</br>
int		user_id</br>
int		book_id</br>
int		book_buy_quantity</br>
int		book_price</br>
timestamp	createtime</br>
timestamp	updatetime</br>

order</br>
int		order_id</br>
int		user_id</br>
int		book_id</br>
int		book_buy_quantity</br>
int		book_price</br>
timestamp	createtime</br>
timestamp	updatetime</br>

------------------------------------


