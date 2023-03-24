<?php
require_once 'database/connect.php';
require_once 'database/functions.php';
$provinces = get('SELECT * FROM province ORDER BY _name');

?>
<select name="" id="province">
    <option value="0">Chọn Tỉnh/Thành phố</option>
    <?php if (!empty($provinces)) {
        foreach ($provinces as $province) {
            echo '<option value="'.$province['id'].'">'.$province['_name'].'</option>';
        }
    }
?>
</select>
<select name="" id="district">
    <option value="0">Chọn Quận/Huyện</option>
</select>
<select name="" id="ward">
    <option value="0">Chọn Xã/Phường</option>
</select>

<script src="js/local.js"></script>