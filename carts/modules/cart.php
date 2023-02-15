<h1>GIỎ HÀNG</h1>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['delete']) && !isset($_POST['delete_all'])) {
        $quantity = $_POST['quantity'];
        if (!empty($_SESSION['cart'])) {
            $productIdArr = array_keys($_SESSION['cart']);
            foreach ($productIdArr as $productId) {
                $_SESSION['cart'][$productId] = $quantity[$productId];
            }
            echo getMessage('Cập nhật giỏ hàng thành công');
        }
    } else {
        if (isset($_POST['delete'])) {
            $productIdArr = array_keys($_POST['delete']);
            $productId = reset($productIdArr);
            unset($_SESSION['cart'][$productId]);
            echo getMessage('Xóa sản phẩm giỏ hàng thành công');
        } else {
            unset($_SESSION['cart']);
            echo getMessage('Xóa giỏ hàng thành công');
        }
    }
}

if (!empty($_SESSION['cart'])):
    ?>
<form action="" method="post">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th>Tên</th>
                <th width="10%">Giá</th>
                <th width="10%">Số lượng</th>
                <th width="20%">Thành tiền</th>
                <th width="5%">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $count=0;
    $total = 0;
    $totalQuantity = 0;
    foreach ($_SESSION['cart'] as $productId => $quantity):
        $count++;
        $productInfo = getProduct($productId);

        $amount = $quantity * $productInfo['price'];

        $total+=$amount;

        $totalQuantity+=$quantity;

        ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $productInfo['name']; ?></td>
                <td><?php echo number_format($productInfo['price']).'đ'; ?></td>
                <td>
                    <input type="number" name="quantity[<?php echo $productId; ?>]" class="form-control"
                        value="<?php echo $quantity; ?>" />
                </td>
                <td><?php echo number_format($amount).'đ'; ?></td(>
                <td><button type="submit" onclick="return confirm('Bạn có chắc chắn?')"
                        name="delete[<?php echo $productId; ?>]" class="btn btn-danger">&times;</button></td>
            </tr>
            <?php endforeach; ?>

        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Tổng</th>
                <th><?php echo $totalQuantity; ?></th>
                <th colspan="2"><?php echo number_format($total).'đ'; ?></th>
            </tr>
        </tfoot>
    </table>
    <a href="index.php" class="btn btn-primary">Tiếp tục mua hàng</a>
    <a href="?module=checkout" class="btn btn-success">Thanh toán</a>
    <button type="submit" class="btn btn-primary" name="update_cart">Cập nhật giỏ hàng</button>
    <button type="submit" name="delete_all" onclick="return confirm('Bạn có chắc chắn?')" class="btn btn-danger">Xóa giỏ
        hàng</button>
</form>
<?php else: ?>
<?php echo getMessage('Không có sản phẩm trong giỏ hàng', 'danger'); ?>
<?php endif; ?>