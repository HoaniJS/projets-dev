<?php
$lenght = 0;
$filearray = [];
$file = fopen('list.txt', 'r');
while(!feof($file)){
  $filearray[] = fgets($file);
  $lenght++;
}
fclose($file);

$id = rand(0, $lenght-1);

switch($_POST['action']){
    case 'display':
        ?>
        <form name="redirect" action="index.php" method="POST">
            <input type="hidden" name="line" value="<?php echo $id; ?>"/>
            <input type="hidden" name="item" value="<?php echo $filearray[$id]; ?>"/>
        </form>
        <?php
        break;
    case 'delete':
        unlink('list.txt');
        $file = fopen('list.txt', 'a');
        for($i=0;$i<$lenght;$i++){
            if($i!=$_POST['line']){
                fwrite($file, $filearray[$i]);
            }
        }
        ?>
        <form name="redirect" action="index.php" method="POST"></form>
        <?php
        break;
}
?>
<script>document.forms['redirect'].submit()</script>