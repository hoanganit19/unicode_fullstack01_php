<style>
.errors-page {
    text-align: center;
    max-width: 80%;
    margin: 30px auto;
    border: 1px solid red;
    border-radius: 25px;
    padding: 20px;
    background: yellow;
}
</style>
<div class="errors-page">
    <h2>Đã có lỗi liên quan đến CSDL</h2>
    <p>Message: <?php echo $e->getMessage(); ?></p>
    <p>File: <?php echo $e->getFile(); ?></p>
    <p>Line: <?php echo $e->getLine(); ?></p>
</div>