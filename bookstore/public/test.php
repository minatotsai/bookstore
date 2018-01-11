<?php 
echo "test";
?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="tony262733@yahoo.com.tw">
    <input type="hidden" name="item_name" value="test">
	<input type="hidden" name="mc_currency" value="USD">
    <input type="hidden" name="amount" value="0.01">
	<input type="hidden" name="notify_url" value="https://minatotsai.de/see.php">
    <input type="hidden" name="return" value="https://minatotsai.de/ok.php">
    <input type="hidden" name="cancel_return" value="https://minatotsai.de/cc.php">
    <input type="image" border="0" name="submit" src="http://images.paypal.com/images/x-click-but5.gif" alt="請使用 PayPal 付款 － 快捷、免費和安全的付款方式！">
</form>