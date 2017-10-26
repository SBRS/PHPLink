 <?php
// Include MySQL class
require_once("/php-shopping/data_layer/data.inc.php");

class Business {

	public static function writeShoppingCart()
	{
		if (isset($_SESSION['cart']))
		{
			__DIR__$cart = $_SESSION['cart'];
		}

		if (!isset($cart) || $cart=='')
		{
			return '<p>You have no items in your shopping cart</p>';
		}
		else
		{
			// Parse the cart session variable
			$items = explode(',',$cart);
			$s = (count($items) > 1) ? 's':'';
			return '<p>You have <a href="index.php?content_page=php-shopping/cart&action=display">'.count($items).' item'.$s.' in your shopping cart</a></p>';
		}
    }

}
?>

