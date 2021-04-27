<!DOCTYPE html>
<html lang="ja">

    <!-- Header Start -->
    <head>
        <title>Day8</title>
    </head>
    <!-- Header End -->

    <!-- Body Start -->
    <body>

        <!-- PHP 初期処理 Start -->
        <?php
        
            // *** 外部ファイルを読み込み Start ***
            require "Day8Class.php";
            // *** 外部ファイルを読み込み End ***

            // *** Function Start ***
            // *** Function End ***            

            // *** メイン処理 Start ***

            // 商品カテゴリリスト生成
            $Members = new MemberList();
            $Members->GetList();

            // *** メイン処理 End ***
        ?>
        <!-- PHP 初期処理 End -->

        <!-- 画面共通部 Start -->
        <!-- 画面共通部 End -->

        <!-- 画面固有部 Start -->

        <table width="100%" border="0">
            <tr>
                <td align="center">
                <?php
                    // 結果表示
                    $Members->ViewAsTable();
                ?>
                </td>
            </tr>
            <tr>
                <td></td>
            </tr>
        </table>

        <!-- 画面固有部 End -->

     </body>
     <!-- Body End -->
</html>
