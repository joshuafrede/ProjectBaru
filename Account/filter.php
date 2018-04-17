<?php
$btn = "btn-default";
$filter = '';
if (isset($_SESSION[$filtervariable])) {
    $filter = $_SESSION[$filtervariable];
}
if ($filter == "") {
    $btn = "btn-success";
}
?>
<form method='post' action='Fungsi/changesession'style='display:inline-block'>
    <input type='hidden' name='url' value='<?php echo current_url() ?>'>
    <input type='hidden' name='session' value='<?php echo $filtervariable ?>'>
    <input type='hidden' name='value' value=''>
    <button class='btn <?php echo $btn ?> btn-sm' style='display:inline-block;margin-bottom: 5px'>All</button>
</form>
<?php
$no = 0;
$queryfilter = mysql_query($filterquery);
while ($row = mysql_fetch_array($queryfilter)) {
    $btn = "btn-default";
    if ($filter == $row['value']) {
        $btn = "btn-success";
    }
    ?>
    <form method='post' action='Fungsi/changesession'style='display:inline-block'>
        <input type='hidden' name='url' value='<?php echo current_url() ?>'>
        <input type='hidden' name='session' value='<?php echo $filtervariable ?>'>
        <input type='hidden' name='value' value='<?php echo $row['value'] ?>'>
        <button class='btn <?php echo $btn ?> btn-sm' style='display:inline-block;margin-bottom: 5px'><?php echo $row['value'] ?></button>
    </form>
    <?php
    $no++;
}
?>  