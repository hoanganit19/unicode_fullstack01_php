<?php

function getMessage($message, $type = 'success')
{
    return $message ? '<div class="alert alert-'.$type.'">'.$message.'</div>' : '';
}

function getProduct($id)
{
    global $products;
    $productInfo = array_filter($products, fn ($product) => $product['id'] == $id);
    return reset($productInfo);
}
