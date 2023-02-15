<?php
defined('_IN_CODE') or die('Access Denied');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quantityArr = $_POST['quantity'];
    $addToCartArr = $_POST['add_to_cart'];
    $productIdArr = array_keys($addToCartArr);
    $productId = reset($productIdArr);
    $quantity = $quantityArr[$productId];

    //Xây dựng cấu trúc của session
    if (!empty($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        $_SESSION['cart'][$productId] = $quantity;
    }

    echo getMessage('Thêm vào giỏ hàng thành công! <a href="?module=cart">Xem giỏ hàng</a>');
}
?>
<h1>DANH SÁCH SẢN PHẨM</h1>
<form action="" method="post">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th>Tên</th>
                <th width="10%">Giá</th>
                <th width="20%">Mua hàng</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($products)):
                foreach ($products as $key => $product):
                    extract($product);

                    ?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo number_format($price).'đ'; ?></td>
                <td class="d-grid">
                    <input type="number" name="quantity[<?php echo $id; ?>]" class="form-control mb-2" value="1"
                        min="1" />
                    <button type="submit" name="add_to_cart[<?php echo $id; ?>]" class="btn btn-danger">Thêm vào
                        giỏ</button>
                </td>
            </tr>
            <?php endforeach; endif; ?>
        </tbody>
    </table>
</form>