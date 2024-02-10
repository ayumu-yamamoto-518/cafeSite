<?php
    require('./header.php');

    if (empty($_SERVER["HTTP_REFERER"])) {
        header('Location: ./contact.php');
        exit;
    }

    session_start();

    try{
        require('./dbconnect.php');

        $sql = 'UPDATE contacts SET name = :name, kana = :kana, tel = :tel, email = :email, body = :body WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $_SESSION['name'], PDO::PARAM_STR);
        $stmt->bindParam(':kana', $_SESSION['kana'], PDO::PARAM_STR);
        $stmt->bindParam(':tel', $_SESSION['tel'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $_SESSION['email'], PDO::PARAM_STR);
        $stmt->bindParam(':body', $_SESSION['body'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
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
                <h2>更新完了</h2>
                <div class="complete_msg">
                    <p>更新が完了いたしました。</p>
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