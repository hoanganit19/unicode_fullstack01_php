<form method="post" action="">
    <textarea name="links" placeholder="Nhập link youtube...." rows="10" required></textarea> <br />
    <button type="submit">Submit</button>
</form>

<hr />

<?php
$pattern = '/^(?:http|https):\/\/(?:www\.|)(?:youtube\.com\/watch\?v=([^&]+)|youtu\.be\/([^?]+))/';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $links = $_POST['links'];
    if (!empty($links)) {
        $links = explode("\n", $links);
        foreach ($links as $link) {
            preg_match($pattern, $link, $matches);
            if (!empty($matches[1])) {
                $id = $matches[1];
                echo '<iframe width="100%" height="315" src="https://www.youtube.com/embed/'.$id.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe><br/>';
            }
        }
    }


}
