# bookstore
use PHP7.1 ,apache2.4,mysql5.7,framework:Laravel5.4,windows10</br>
網路書城-購物車(Bookstore)</br>
1.登入登出</br>
2.創立會員帳號</br>
3.修改會員密碼搜尋書籍(全部書籍、搜尋中文書、搜尋外文書)</br>
4.我的購物車(能修改下單數量或刪除該筆單據)</br>

資料表</br>
books</br>
|----------------------------------|
|int		     |  book_id		(PK)     |</br>
|String		   |  book_name          |</br>
|int		     |  book_class         |</br>
|int		     |  book_quantity      |</br>
|int		     |  book_status        |</br>
|String		   |  book_img_name      |</br>
|binary		   |  book_img           |</br>
|int		     |  book_price         |</br>
|String		   |  remember_token     |</br>
|timestamp	 |  created_at         |</br> 
|timestamp	 |  updated_at         |</br>    
|----------------------------------|

users</br>
|----------------------------------|
|int	        |  user_id	(PK)     |</br>
|string       |  user_account      |</br>
|string       |  password          |</br>
|string       |  remember_token    |</br>
|timestamp    |  created_at        |</br>
|timestamp    |  updated_at        |</br>
|----------------------------------|

shoppingcarts</br>
|----------------------------------|
|int          |  cart_id  (PK)     |</br>
|int		      |  user_id           |</br>
|int		      |  book_id           |</br>
|int		      |  book_buy_quantity |</br>
|int		      |  book_price        |</br>
|timestamp    |	 created_at        |</br>
|timestamp    |	 updated_at        |</br>
|----------------------------------|

order</br>
|----------------------------------|
|int		      |  order_id  (PK)    |</br>
|int		      |  buy_id            |</br>
|int		      |  user_id           |</br>
|int		      |  book_id           |</br>
|int		      |  book_buy_quantity |</br>
|int		      |  book_price        |</br>
|string       |  remember_token    |</br>
|timestamp	  |  created_at        |</br>
|timestamp	  |  updated_at        |</br>
|----------------------------------|
------------------------------------




