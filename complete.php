<?php
    require('./header.php');

    if (empty($_SERVER["HTTP_REFERER"])) {
        header('Location: ./contact.php');
        exit;
    }
    
    session_start();

    // dbconnect.phpからdデータを取得する
    try{
        require('./dbconnect.php');

        //日本時間を設定
        $date = new DateTime('Asia/Tokyo');

        //出力書式を設定
        $date = $date->format('Y-m-d H:i:s');

        //mysqlからカラム名を取り出す
        $sql = 'INSERT INTO contacts(name, kana, tel, email, body, created_at) VALUES(:name, :kana, :tel, :email, :body, :created_at)';
        
        //mysqlからカラム名を取り出し実行準備
        $stmt = $pdo->prepare($sql);

        //PDO::PARAM_STRにより文字列でsqlを実行準備
        $stmt->bindValue(':name', $_SESSION['name'], PDO::PARAM_STR);
        $stmt->bindValue(':kana', $_SESSION['kana'], PDO::PARAM_STR);
        $stmt->bindValue(':tel', $_SESSION['tel'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $_SESSION['email'], PDO::PARAM_STR);
        $stmt->bindValue(':body', $_SESSION['body'], PDO::PARAM_STR);
        $stmt->bindValue(':created_at', $date, PDO::PARAM_STR);

        //sqlを実行する
        $stmt->execute();

        //トランザクションを更新させる
        $pdo->commit();

    }catch(PDOException $e){
        $pdo->rollBack();
        echo "エラー;". $e->getMessage() . "<br/>";
        die();
    }  

    $_SESSION['name'] = "";
    $_SESSION['kana'] = "";
    $_SESSION['tel'] = "";
    $_SESSION['email'] = "";
    $_SESSION['body'] = "";

?>

    <body>
        <header class="contact">
            <nav class="motion">
            <div class="logo">
                    <a href="index.php">
                        <img src="cafe/img/logo.png">
                    </a>
                </div>

                <div class="g_nav">
                    <div class="menu">はじめに</div>
                    <div class="menu">体験</div>
                    <div class="menu_click">
                        <a href="contact.php">お問い合わせ</a>
                    </div>
                </div>

                <div class="sign">
                    <div class="signin">サインイン</div>
                </div>
            </nav>
        </header>

        <section>
            <div class="contact_box">
                <h2>お問い合わせ</h2>
                <div class="complete_msg">
                    <p>お問い合わせ頂きありがとうございます。</p>
                    <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
                    <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
                    <a href="index.php">トップへ戻る</a>
                </div>
            </div>
        </section>

        <?php
            require('./footer.php');
        ?>

    </body>
</html>    