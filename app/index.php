<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>POSTのサンプル</title>
  </head>
  <body>
    <?php
        if(isset($_POST["title"])) {//titleがPOSTされているなら
            $title = htmlspecialchars($_POST["title"]);
            print("あなたのタイトルは「 ${title} 」です。");
            if(isset($_POST["name"])) {//かつnameがPOSTされているなら
                $name = htmlspecialchars($_POST["name"]);
                print("あなたの名前は「 ${name} 」です。");
                if(isset($_POST["email"])) {//かつemailがPOSTされているなら
                    $email = htmlspecialchars($_POST["email"]);
                    print("あなたのメールアドレスは「 ${email} 」です。");
                    if(isset($_POST["color"])) {//かつcolorがPOSTされているなら
                        $color = htmlspecialchars($_POST["color"]);
                        print("あなたの文字色は「 ${color} 」です。");
                        if(isset($_POST["comment"])) {
                            $comment = htmlspecialchars($_POST["comment"]);
                            print("あなたの文字色は「 ${comment} 」です。");
                        }//comment
                    }//color
                }//email
            }//name
        }//title
       else {
    ?>
        <p>コメントしてください。</p>
        <form method="POST" action="index.php">
          <input type="text" name="title" placeholder="タイトル">
          <input type="text" name="name" placeholder="名前">
          <input type="email" name="email" placeholder="メールアドレス">
          <input type="text" name="color" placeholder="文字色">
          <input type="text" name="comment" placeholder="コメント">
          <input type="submit" value="送信" />
        </form>
    <?php
      }
    ?>
  </body>
</html>
