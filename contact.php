<?php

    //データベース接続確認
    try{
        require('./dbconnect.php');

        //データベースにSQL文を発行してデータを取得
        $contacts = $pdo->query('select * from contacts order by id asc');

        //カラム名のみ取得
        $contact = $contacts->fetch(PDO::FETCH_ASSOC);

        //トランザクションの処理を確定させる
        $pdo->commit();

        //例外処理を受け取る
    }catch(PDOException $e){

        //トランザクションの処理を破棄させる
        $pdo->rollBack();
   
        echo "エラー;". $e->getMessage() . "<br/>";
        die();
    }  

?>


