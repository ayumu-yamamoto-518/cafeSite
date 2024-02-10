<?php
    require('./header.php');
      
    session_start();

    if(!isset($_SESSION['name'])){
        $_SESSION['name'] = "";
    }

    if(!isset($_SESSION['kana'])){
        $_SESSION['kana'] = "";
    }

    if(!isset($_SESSION['tel'])){
        $_SESSION['tel'] = "";
    }

    if(!isset($_SESSION['email'])){
        $_SESSION['email'] = "";
    }

    if(!isset($_SESSION['body'])){
        $_SESSION['body'] = "";
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
                <h2>お問い合わせ</h2>
                <form action="complete.php" method="post">
                    <p>下記の内容をご確認の上送信ボタンを押してください</p>
                    <p>内容を訂正する場合は戻るを押してください。</p>

                    <dl class="confirm">
                        <dt>氏名</dt>
                        <?php
                            echo htmlspecialchars($_SESSION['name'], ENT_QUOTES, "UTF-8");
                        ?>

                        <dt>フリガナ</dt>
                        <?php
                            echo htmlspecialchars($_SESSION['kana'], ENT_QUOTES, "UTF-8");
                        ?>

                        <dt>電話番号</dt>
                        <?php
                            echo $_SESSION['tel'];
                        ?>

                        <dt>メールアドレス</dt>
                        <?php
                            echo $_SESSION['email'];
                        ?>

                        <dt>お問い合わせ内容</dt>
                        <div style="overflow-wrap: break-word;"><?php echo nl2br(htmlspecialchars($_SESSION['body'])); ?></div>

                        <dd class="confirm_btn">
                            <button type="submit" name="btn_confirm">送　信</button>
                            <a href="contact.php">戻　る</a>
                        </dd>
                    </dl>
                </form>
            </div>
        </section>

        <?php
            require('./footer.php');
        ?>

    </body>
</html>