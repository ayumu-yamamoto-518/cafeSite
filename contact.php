<?php
    require('./header.php');

    session_start();

    // 初期化（変数に最初の値を設定）する
    if(!isset($_SESSION['name']) || $_SESSION['name'] === ""){
        $_SESSION['name'] = "";
    }
    if(!isset($_SESSION['kana']) || $_SESSION['kana'] === ""){
        $_SESSION['kana'] = "";
    }
    if(!isset($_SESSION['tel']) || $_SESSION['tel'] === ""){
        $_SESSION['tel'] = "";
    }
    if(!isset($_SESSION['email']) || $_SESSION['email'] === ""){
        $_SESSION['email'] = "";
    }
    if(!isset($_SESSION['body']) || $_SESSION['body'] === ""){
        $_SESSION['body'] = "";
    }

    $error = [];

    $error['name'] = filter_input(INPUT_POST,'name');
    $error['kana'] = filter_input(INPUT_POST,'kana');
    $error['tel'] = filter_input(INPUT_POST,'tel');
    $error['email'] = filter_input(INPUT_POST,'email');
    $error['body'] = filter_input(INPUT_POST,'body');

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $name = filter_input(INPUT_POST,'name');
        $kana = filter_input(INPUT_POST,'kana');
        $tel = filter_input(INPUT_POST,'tel');
        $email = filter_input(INPUT_POST,'email');
        $body = filter_input(INPUT_POST,'body');    

        $_SESSION['name'] = $name;
        $_SESSION['kana'] = $kana;
        $_SESSION['tel'] = $tel;
        $_SESSION['email'] = $email;
        $_SESSION['body'] = $body;
    
        if(!isset($_POST['name']) || $_POST['name'] === "" || mb_strlen($_POST['name']) > 10){
            $error['name'] = "氏名は必須入力です。10文字以内でご入力ください。";
        }else{
            $error['name'] = "";
        }
        
        if(!isset($_POST['kana']) || $_POST['kana'] === "" || mb_strlen($_POST['kana']) > 10){
            $error['kana'] = "フリガナは必須入力です。10文字以内でご入力ください。";
        }else{
            $error['kana'] = "";
        }
        
        if(isset($_POST['tel']) && $_POST['tel'] != "" && !preg_match("/^[0-9]+$/", $_POST['tel'])){
            $error['tel'] = "電話番号は0-9の数字のみでご入力ください。";
        }else{
            $error['tel'] = "";
        }
        
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $error['email'] = "メールアドレスは正しくご入力ください。";
        }else{
            $error['email'] = "";
        }
        
        if(!isset($_POST['body']) || $_POST['body'] === ""){
            $error['body'] = "お問い合わせ内容は必須入力です。";
        }else{
            $error['body'] = "";
        }

        if(isset($_POST['name']) && $_POST['name'] != "" && mb_strlen($_POST['name']) < 10 && 
            isset($_POST['kana']) && $_POST['kana'] != "" && mb_strlen($_POST['kana']) < 10 && 
            filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && isset($_POST['body']) && 
            $_POST['body'] != "" && $_POST['tel'] === "") {
            header('Location: ./confirm.php');
        }

        if(isset($_POST['name']) && $_POST['name'] != "" && mb_strlen($_POST['name']) < 10 && 
            isset($_POST['kana']) && $_POST['kana'] != "" && mb_strlen($_POST['kana']) < 10 && 
            filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && 
            isset($_POST['body']) && $_POST['body'] != "" && 
            preg_match("/^[0-9]+$/", $_POST['tel'])) {
            header('Location: ./confirm.php');
        }
    }

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
                <form action="" method="post">
                    <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
                    <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
                    <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
                    <p><span class="required">*</span>は必須項目となります。</p>

                    <dl>
                        <dt>
                            <label for="name">氏名</label><span class="required">*</span>
                        </dt>

                        <div style="color: red"><?php echo $error['name']; ?></div>

                        <dd>
                            <input type="text" name="name" id="name" placeholder="山田太郎" value="<?php echo htmlspecialchars($_SESSION['name'], ENT_QUOTES, "UTF-8"); ?>">
                        </dd>

                        <dt>
                            <label for="kana">フリガナ</label><span class="required">*</span>
                        </dt>

                        <div style="color: red"><?php echo $error['kana']; ?></div>

                        <dd>
                            <input type="text" name="kana" id="kana" placeholder="ヤマダタロウ" value="<?php echo htmlspecialchars($_SESSION['kana'], ENT_QUOTES, "UTF-8"); ?>">
                        </dd>

                        <dt>
                            <label for="tel">電話番号</label>
                        </dt>

                        <div style="color: red"><?php echo $error['tel']; ?></div>

                        <dd>
                            <input type="text" name="tel" id="tel" placeholder="09012345678" value="<?php echo $_SESSION['tel'] ?>">
                        </dd>

                        <dt>
                            <label for="email">メールアドレス</label><span class="required">*</span>
                        </dt>

                        <div style="color: red"><?php echo $error['email']; ?></div>

                        <dd>
                            <input type="text" name="email" id="email" placeholder="test@test.co.jp" value="<?php echo $_SESSION['email'] ?>">
                        </dd>
                    </dl>

                    <h3>
                        <label for="body">お問い合わせ内容をご記入ください<span class="required">*</span></label>
                    </h3>

                    <div style="color: red"><?php echo $error['body']; ?></div>

                    <dl class="body">
                        <dd>
                            <textarea cols="50" rows="8" wrap="hard" name="body" id="body"><?php echo htmlspecialchars($_SESSION['body'], ENT_QUOTES, "UTF-8");?></textarea>
                        </dd>
                        <dd>
                            <button type="submit" name="btn_confirm" id="btn_confirm">送　信</button>
                        </dd>
                    </dl>
                </form>
            </div>
        </section>

        <table border="1">
            <tr>
                <th>id</th>
                <th>氏名</th>
                <th>フリガナ</th>
                <th>電話番号</th>
                <th>メールアドレス</th>
                <th>お問い合わせ内容</th>
                <th>送信日時</th>
            </tr>
        </table>

        <?php
            require('./footer.php');
        ?>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="validation.js"></script>
    </body>
</html>
