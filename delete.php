<?php
    require('./header.php');

    if (empty($_SERVER["HTTP_REFERER"])) {
        header('Location: ./contact.php');
        exit;
    }

    try{
        require('./dbconnect.php');

        $id = $_GET['id'];
        $sql = 'DELETE FROM contacts WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $pdo->commit();

    }catch(PDOException $e){
        $pdo->rollBack();
        echo "エラー;". $e->getMessage() . "<br/>";
        die();
    }  

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
                <h2>お問い合わせ内容の削除</h2>
                <div class="complete_msg">
                    <p>お問い合わせ内容の削除が完了いたしました。</p>
                    <a href="index.php">トップへ戻る</a>
                </div>
            </div>
        </section>

        <?php
            require('./footer.php');
        ?>

    </body>
</html>    