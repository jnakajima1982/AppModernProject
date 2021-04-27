<?php 

    // ****************************
    // DB共通クラス
    // ****************************
    class DBCommon{

        // メンバ
        public $connectionStatus;
        public static $mysqli;

        // コンストラクタ
        function __construct(){
            // Configを読み込み
            $config = include(__DIR__ . '/config.php');
            // DBへ接続
            $this->mysqli = new mysqli($config["DBHost"], $config["DBUser"], $config["DBPassword"], $config["DBSchema"]);
            // 接続状況をチェックします
            if ($this->mysqlit->connect_errno) {
                $this->connectionStatus = -1;
            } else {
                $this->connectionStatus = 0;
            }
            //echo 'Status:' . $this->connectionStatus . "\n";
        }

        // デストラクタ
        function __destruct(){
            // Statusが正常の場合は接続をClose
            if ($this->connection_status == 0){
                // 接続を閉じる
                mysqli_close($this->mysqli);
            }
        }

        // * Select
        function Select($argSQL){
            //echo $argSQL . "\n";
            $Ret = $this->mysqli->query($argSQL);
            return $Ret;
        }

        // * Update/Insert
        function Execute($argSQL){
            //echo $argSQL . "\n";
            $this->mysqli->query($argSQL);
        }
    }

    // ****************************
    // メンバークラス
    // ****************************
    class Member{

        // ユーザーID
        public $Id;
        // ユーザー名
        public $Name;

        // コンストラクタ
        function __construct(string $argId, string $argName = null){
            // ユーザーIDをセット
            $this->Id = $argId;
            // ユーザー名をセット
            $this->Name = $argName;
        }
    }

    // ****************************
    // メンバーリスト
    // ****************************
    class MemberList implements IteratorAggregate{

        private $array = [];

        // 追加
        public function Add(Member $argMember){
            $this->array[] = $argMember;
        }

        // マスタデータ取得
        public function GetList(){
            // DB接続
            $Dbcon = new DBCommon();
            // SQL作成
            $Sql = "SELECT id, name FROM members ORDER BY id ";
            // SQL実行
            $result = $Dbcon->Select($Sql);
            // 結果を元にクラス生成してコレクションに追加
            while($row = $result->fetch_assoc()){
                $this->array[] = new Member($row["id"], $row["name"]);
            } 
            // コネクションを破棄
            $Dbcon = null;
            // 件数をリターン
            return count($this->array);
        }

        // 現在のコレクションをドロップダウン表示
        public function ViewAsTable(){
            ?>

            <table>
                <tr>
                    <th>ID</th>
                    <th>名前</th>
                </tr>
                <!-- 全件処理 -->
                <?php foreach($this as $member){ ?>
                <tr>
                    <td><?=$member->Id?></td>
                    <td><?=$member->Name?></td>
                </tr>
                <?php } ?>
            </table>

            <?php
        }

        // 結果取得
        public function getIterator(){
            return new ArrayIterator($this->array);
        }
    }

?>