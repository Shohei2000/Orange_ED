<?php
//エスケープ処理
function escape($s) {
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

//     function check()の代わり
function check($success_url,$PDO,$signup){
//             if(false){
    if(empty($_POST['mail1'])||empty($_POST['mail2'])||empty($_POST['password1'])||empty($_POST['password2'])||
        empty($_POST['name_kanji1'])||empty($_POST['name_kanji2'])||empty($_POST['name_kana1'])||empty($_POST['name_kana2'])||
        empty($_POST['birth_year'])||empty($_POST['birth_month'])||empty($_POST['birth_day'])||empty($_POST['postcode1'])||empty($_POST['postcode2'])||
        empty($_POST['pref_id'])||empty($_POST['address1'])||empty($_POST['address2'])||empty($_POST['phone1'])||empty($_POST['phone2'])||empty($_POST['phone3'])){
            echo '<script type="text/javascript">alert("必須項目を全て入力してください。");</script>';
            return;

    }elseif($_POST['mail1'] != $_POST['mail2'] && $_POST['password1'] != $_POST['password2']){
        echo '<script type="text/javascript">alert("確認用メールアドレスと一致しません。\n確認用パスワードと一致しません。");</script>';
        return;
    }elseif($_POST['mail1'] != $_POST['mail2']){
        echo '<script type="text/javascript">alert("確認用メールアドレスと一致しません。");</script>';
        return;
    }elseif($_POST['password1'] != $_POST['password2']){
        echo '<script type="text/javascript">alert("確認用パスワードと一致しません。");</script>';
        return;
    }else{
        if($signup){//新規登録の時のみ

            //既に登録されたメールアドレスの場合にエラー
            $sql=$PDO->prepare('SELECT * FROM customer WHERE mail_address=?');
            $sql->execute([$_POST['mail1']]);
            //                 echo '<script type="text/javascript">alert("確認用パスワードと一致しません。");</script>';
            foreach($sql as $row){
                $mail = $row['mail_address'];
            }
            if(!empty($mail[0])){
                echo '<script type="text/javascript">alert("既に登録されたメールアドレスです。");</script>';
                return;
            }
        }
        //すべてのエラー条件を通るとセッションに格納し、$success_urlへ
        $_SESSION['mail1']=$_POST['mail1'];
        $_SESSION['mail2']=$_POST['mail2'];
        $_SESSION['password1']=$_POST['password1'];
        $_SESSION['password2']=$_POST['password2'];
        $_SESSION['name_kanji1']=$_POST['name_kanji1'];
        $_SESSION['name_kanji2']=$_POST['name_kanji2'];
        $_SESSION['name_kana1']=$_POST['name_kana1'];
        $_SESSION['name_kana2']=$_POST['name_kana2'];
        //誕生日
        $_SESSION['birth_year']=$_POST['birth_year'];
        if(strlen($_POST['birth_month'])==1){//誕生日月を2文字にする
            $_SESSION['birth_month']='0'.$_POST['birth_month'];
        }else{
            $_SESSION['birth_month']=$_POST['birth_month'];
        }
        if(strlen($_POST['birth_day'])==1){//誕生日日を2文字にする
            $_SESSION['birth_day']='0'.$_POST['birth_day'];
        }else{
            $_SESSION['birth_day']=$_POST['birth_day'];
        }
        $_SESSION['zip_code']=$_POST['postcode1']."-".$_POST['postcode2'];
        $_SESSION['pref_id']=$_POST['pref_id'];
        $_SESSION['city']=$_POST['address1'];
        $_SESSION['house_number']=$_POST['address2'];
        $_SESSION['building']=$_POST['address3'];
        $_SESSION['tell']=$_POST['phone1']."-".$_POST['phone2']."-".$_POST['phone3'];
        $_SESSION['gd_class']=$_POST['gender'];
       ?>
        <script>
        location.href= '<?php echo $success_url;?>';
        </script>
        <?php
        exit();
    }

}

if(isset($_POST['check'])){
    check($_POST['success_url'],$pdo,$_POST['signup']);
}

?>