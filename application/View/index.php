<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>大地</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/base.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>

<a class="brand" href="#"><img src="../../image/logo.svg"></a>

<div class="container">

    <div id="level">
        <?php
        $db=new SQLite3('../../db/daich.db');
        $lv=$db->querySingle("SELECT COUNT(*) FROM my_task_list WHERE done = 1");
        echo '<span class="level">Lv.'.$lv.'</span>';
        echo '<a href="http://twitter.com/share?url=[シェアするURL]&text=私は今Lv'.$lv.'だよ！&via=tmk815&related=tmk815&hashtags=DAICHI" target="_blank" class="tweet">ツイート</a>'
        ?>
    </div>
    <!-- タスクの追加 -->
    <div class="list">
        <button class="btn" data-toggle="modal" data-target="#catlist">+</button>
    </div>
    <!-- タスクが追加されたらここに表示 -->
    <!-- addedはタスクリストのcssのためのクラス -->
    <div class="list added">
      <ul id="index-task" class="task-list">

        <?php
        $db=new SQLite3('../../db/daich.db');
        $sql_result=$db->query("SELECT * FROM my_task_list");
        while( $data = $sql_result->fetchArray() )  {
            if($data["done"] == 0) {
              $sub_category_name = $db->query("SELECT * FROM sub_category WHERE id =".$data["sub_category_id"]." AND"." category_id =".$data["category_id"])->fetchArray();
              echo '<li class="task-item" data-id="0">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">'
                        .$sub_category_name["name"].
                      '</label>
                    </li>';
            }
        }
        $db->close();
        ?>
      </ul>
    </div>

</div><!-- /.container -->


<div class="modal" id="catlist" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-label">タスク追加</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="cat-body">
              <div class="row">
                  <div data-toggle="modal" data-target="#soji-list" data-dismiss="modal" id="cat-soji" class="btn col-5 cat">掃除</div>
                  <div data-toggle="modal" data-target="#sentaku-list" data-dismiss="modal" id="cat-sentaku" class="btn col-5 cat">洗濯</div>
                  <div data-toggle="modal" data-target="#buy-list" data-dismiss="modal" id="cat-buy" class="btn col-5 cat">買い物</div>
                  <div data-toggle="modal" data-target="#other-list" data-dismiss="modal" id="cat-other" class="btn col-5 cat">その他</div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">キャンセル</button>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="soji-list" tabindex="-1">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">タスク追加</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul id="3"class="list-group">
                  <?php
                  $db=new SQLite3('../../db/daich.db');
                  $sql_result=$db->query("SELECT * FROM sub_category WHERE category_id=3");
                  while( $data = $sql_result->fetchArray() )  {
                    echo '<li id="'.$data['id'].'"class="list-group-item">'.$data['name'].'</li>';
                  }
                  $db->close();
                  ?>
                </ul>
                <div class="form-group">
                    <input type="text" name="" class="new-item" />
                    <button type="button" class="btn btn-primary">追加</button>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-toggle="modal" data-target="#catlist" class="btn" data-dismiss="modal">戻る</button>
                <button type="button" class="btn" data-dismiss="modal">キャンセル</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="sentaku-list" tabindex="-1">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">タスク追加</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul id="2" class="list-group">
                  <?php
                  $db=new SQLite3('../../db/daich.db');
                  $sql_result=$db->query("SELECT * FROM sub_category WHERE category_id=2");
                  while( $data = $sql_result->fetchArray() )  {
                    echo '<li id="'.$data['id'].'"class="list-group-item">'.$data['name'].'</li>';
                  }
                  $db->close();
                  ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" data-toggle="modal" data-target="#catlist" class="btn"
                        data-dismiss="modal">戻る
                </button>
                <button type="button" class="btn" data-dismiss="modal">キャンセル</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="buy-list" tabindex="-1">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">タスク追加</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul id="4" class="list-group">
                  <?php
                  $db=new SQLite3('../../db/daich.db');
                  $sql_result=$db->query("SELECT * FROM sub_category WHERE category_id=4");
                  while( $data = $sql_result->fetchArray() )  {
                    echo '<li id="'.$data['id'].'"class="list-group-item">'.$data['name'].'</li>';
                  }
                  $db->close();
                  ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" data-toggle="modal" data-target="#catlist" class="btn"
                        data-dismiss="modal">戻る
                </button>
                <button type="button" class="btn" data-dismiss="modal">キャンセル</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="other-list" tabindex="-1">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">タスク追加</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul id="1" class="list-group">
                    <li id="1" class="list-group-item">その他</li>
                    <li id="2" class="list-group-item">Dapibus ac facilisis in</li>
                    <li id="3" class="list-group-item">Morbi leo risus</li>
                    <li id="4" class="list-group-item">Porta ac consectetur ac</li>
                    <li id="5" class="list-group-item">Vestibulum at eros</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" data-toggle="modal" data-target="#catlist" class="btn"
                        data-dismiss="modal">戻る
                </button>
                <button type="button" class="btn" data-dismiss="modal">キャンセル</button>
            </div>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>
<script src="js/index.js"></script>





</body>
</html>
