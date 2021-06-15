
<?php
    if(isset($_GET['search-type'])) {
        $type = $_GET['search-type'];
        if($type == 'normal') {
            load_template(TEMPLATEPATH . '/normal-search.php');
        } elseif($type == 'blog') {
            load_template(TEMPLATEPATH . '/blog-search.php');
        } elseif($type == 'noticias') {
            load_template(TEMPLATEPATH . '/noticias-search.php');
        } elseif($type == 'faq') {
            load_template(TEMPLATEPATH . '/faq-search.php');
        }
    }
?>

