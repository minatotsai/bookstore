# bookstore

網路書城-購物車(Bbookstore)
1.登入登出
2.創立會員帳號
3.修改會員密碼搜尋書籍(全部書籍、搜尋中文書、搜尋外文書)
4.我的購物車(能修改下單數量或刪除該筆單據)

資料表
book
int		book_id		pk
String		book_name
int		book_class
int		book_quantity
int		book_status
binary		book_img
timestamp	createtime
timestamp	updatetime

user
int		user_id		pk
string		user_account
string		user_password
timestamp	createtime
timestamp	updatetime

shoppingcart
int		user_id
int		book_id
int		book_buy_quantity
timestamp	createtime
timestamp	updatetime

order
int		order_id
int		user_id
int		book_id
int		book_buy_quantity
timestamp	createtime
timestamp	updatetime

-----------------------------------


