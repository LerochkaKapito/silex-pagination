<h4>Array given:</h4>
<pre><?php var_dump($this->pages) ?></pre>
<h4>Raw PHP</h4>
<?php
foreach ($this->pages as $page => $label) {
    if (is_string($label)) {
        echo '<span>' . $label . '</span> ';
    } elseif ($label === false) {
        echo '<span>' . $page . '</span> ';
    } else {
        echo '<a href="#' . $page . '">' . $label . '</a> ';
    }
}
?>
<hr />