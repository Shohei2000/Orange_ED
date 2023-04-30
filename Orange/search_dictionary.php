<?php session_start()?>
<?php require '../old/header2.php';?>

<?php
    $search_word = $_POST['search_word'];

    $sql=$pdo->prepare('select *, count(*) as count from dictionary where english_words like ?');
    $sql->execute([$search_word]);
    foreach($sql as $row){
        $count = $row['count'];
        $dictionary_id = $row['dictionary_id'];
    }
    if($count==1){//if the searching word excists in the dictionary
        ?>
        <script><!-- G3-1ページに遷移 -->
        	location.href = "G3-1.php?dictionary_id=<?php echo $dictionary_id;?>";
        </script>
        <?php
    }else{//if the searching word doesn't excist in the dictionary
        ?>
        <script><!-- G3-2ページに遷移 -->
        	location.href = "G3-2.php?sw=<?php echo $search_word;?>";
        </script>
        <?php
    }

?>