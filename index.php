<?php
    require('./header.php');
?>
    <body>
        <div class="alert">
            <a href="#">新型コロナウイルスに対する取り組みの最新情報をご案内</a>
        </div>

        <header>
            <h1>あなたの
                <br>
                好きな空間を作る。
            </h1>
            <nav>
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

        <div class="open_modal" style="display: none;">
            <div class="overlay">
                <div class="signin_box" style="margin-top: 50vh; opacity: 0;">
                    <h2>ログイン</h2>
                    <form action method="post">
                        <dl>
                            <dd>
                                <input type="text" name="name" placeholder="メールアドレス">
                            </dd>

                            <dd>
                                <input type="password" name="pass" placeholder="パスワード">
                            </dd>

                            <dd>
                                <button type="submit">送　信</button>
                            </dd>
                        </dl>

                        <dl class="sns">
                            <dd>
                                <button name="twitter">
                                    <img src="cafe/img/twitter.png">
                                </button>
                            </dd>

                            <dd>
                                <button name="facebook">
                                    <img src="cafe/img/fb.png">
                                </button>
                            </dd>

                            <dd>
                                <button name="google">
                                    <img src="cafe/img/google.png">
                                </button>
                            </dd>

                            <dd>
                                <button name="apple">
                                    <img src="cafe/img/apple.png">
                                </button>
                            </dd>
                        </dl>
                    </form>
                </div>
            </div>
        </div>

        <section>
            <div class="cafe">
                <div class="box">
                    <div class="info">
                        <div class="photo">
                            <img src="cafe/img/cafe1.jpg">
                        </div>
                        <div class="access">
                            <p class="area">東京</p>
                            <p class="distance">車で15分</p>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="info">
                        <div class="photo">
                            <img src="cafe/img/cafe2.jpg">
                        </div>
                        <div class="access">
                            <p class="area">神奈川</p>
                            <p class="distance">車で30分</p>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="info">
                        <div class="photo">
                            <img src="cafe/img/cafe3.jpg">
                        </div>
                        <div class="access">
                            <p class="area">愛知</p>
                            <p class="distance">車で1時間</p>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="info">
                        <div class="photo">
                            <img src="cafe/img/cafe4.jpg">
                        </div>
                        <div class="access">
                            <p class="area">京都</p>
                            <p class="distance">車で40分</p>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="info">
                        <div class="photo">
                            <img src="cafe/img/cafe5.jpg">
                        </div>
                        <div class="access">
                            <p class="area">岡山</p>
                            <p class="distance">車で1.5時間</p>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="info">
                        <div class="photo">
                            <img src="cafe/img/cafe6.jpg">
                        </div>
                        <div class="access">
                            <p class="area">鹿児島</p>
                            <p class="distance">車で50分</p>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="info">
                        <div class="photo">
                            <img src="cafe/img/cafe7.jpg">
                        </div>
                        <div class="access">
                            <p class="area">沖縄</p>
                            <p class="distance">車で2時間</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <main>
            <section class="white">
                <h2>好きなロケーションを選ぼう</h2>
                <div class="location">
                    <div class="box">
                        <div class="info">
                            <div class="photo">
                                <img src="cafe/img/intro1.jpg">
                            </div>
                            <div class="text">クラシック</div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="info">
                            <div class="photo">
                                <img src="cafe/img/intro2.jpg">
                            </div>
                            <div class="text">バー</div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="info">
                            <div class="photo">
                                <img src="cafe/img/intro3.jpg">
                            </div>
                            <div class="text">キャンプ</div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="info">
                            <div class="photo">
                                <img src="cafe/img/intro4.jpg">
                            </div>
                            <div class="text">リゾート</div>
                        </div>
                    </div>
                </div>

                <div class="goto">
                    <div class="text">
                        <h3>Go To Eats</h3>
                        <p>キャンペーンを利用して、全国で食事しよう。
                            <br>
                            いつもと違う景色に囲まれてカラダもココロもリフレッシュ。
                        </p>
                    </div>
                    <img src="cafe/img/goto.jpg">
                </div>
            </section>

            <section class="black">
                <h2>カフェ作りを体験しよう</h2>
                <p>お店のエキスパートが案内するユニークな体験(直接対面型またはオンライン)。</p>
                <div class="experience">
                    <div class="box">
                        <div class="info">
                            <div class="photo">
                                <img src="cafe/img/exp1.jpg">
                            </div>
                            <div class="text">ジョブ体験</div>
                            <p>カフェカウンターを体験しよう。</p>
                        </div>
                    </div>

                    <div class="box">
                        <div class="info">
                            <div class="photo">
                                <img src="cafe/img/exp2.jpg">
                            </div>
                            <div class="text">レシピ体験</div>
                            <p>美味しいレシピを考えてみよう。</p>
                        </div>
                    </div>

                    <div class="box">
                        <div class="info">
                            <div class="photo">
                                <img src="cafe/img/exp3.jpg">
                            </div>
                            <div class="text">プロモーション体験</div>
                            <p>お店の宣伝を手伝ってみよう。</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="white">
                <h2>全国のホストに仲間入りしよう</h2>
                <div class="host">
                    <div class="box">
                        <div class="info">
                            <div class="photo">
                                <img src="cafe/img/host1.jpg">
                            </div>
                            <div class="text">ビジネス</div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="info">
                            <div class="photo">
                                <img src="cafe/img/host2.jpg">
                            </div>
                            <div class="text">コミュニティ</div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="info">
                            <div class="photo">
                                <img src="cafe/img/host3.jpg">
                            </div>
                            <div class="text">食べ歩き</div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <?php
            require('./footer.php');
        ?>

        <div class="jump">Jump To Top</div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="script.js"></script>
    </body>
</html>
