<?php
session_start();
require_once 'objects/User.php';
require_once 'objects/Posts.php';
require_once 'objects/Validator.php';
require_once 'objects/Help.php';
require_once 'messages/const.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        $entry = [];
        $user = $_POST['user'];
        if (Help::isEmpty($user))
            $entry['user'] = Help::isEmpty($user);
        $_SESSION['user'] = $user;

        $phone = $_POST['phone'];
        if (Help::isEmpty($phone))
            $entry['phone'] = Help::isEmpty($phone);
        $_SESSION['phone'] = $phone;

        $gender = $_POST['gender'];
        if (Help::isEmpty($gender))
            $entry['gender'] = Help::isEmpty($gender);
        $_SESSION['gender'] = $gender;

        $email = $_POST['email'];
        if (Help::isEmpty($email))
            $entry['email'] = Help::isEmpty($email);
        $_SESSION['email'] = $email;

        $pass = Validator::vcp($_POST['password'], $_POST['re_password']);
        if (Help::isEmpty($pass))
            $entry['pass'] = Help::isEmpty($pass);
        $_SESSION['pass'] = $pass;

        if (count($entry) !== 0) {
            foreach ($entry as $index => $error) {
                if ($error) {
                    $_SESSION[$index . '_error'] = VALID_ERROR;
                    Help::location(INDEX);
                    break;
                }
            }

        } else {
            Validator::validate_string($user);
            Validator::validate_phone($phone);
            Validator::validate_email($email);
            Validator::validate_gender($gender);

            if ($_FILES['upload']['name'] == "") {
                $target = $_POST['gender'] . ".png";
            } else {
                $target = basename($_FILES['upload']['name']);
                (move_uploaded_file($_FILES['upload']['tmp_name'], $target));
            }

            $user = new User($user, $email, $pass, $phone, $target, $gender);

            $obj = Help::convert_to_array($user);
            $user->create_user($obj);
            //todo get user inserted last id
            if (isset($user)) {
                $message = "barev";
                $headers = "From:".$email;
                mail($email, $message, $headers);
                Help::location(LOGIN);
            }

        }

    } elseif (isset($_POST['post'])) {
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $post = new Posts($title, $desc);
        $obj = Help::convert_to_array($post);
        $post->create_post($obj);
        $result = $post->show_all_posts();
//    var_dump($result);
    }else {

        Help::location(INDEX);

    }
    ?>
    <!--    <table border="1">-->
    <!--    --><?php
//    $step = 0;
//    foreach ($result as $index => $items) :?>
    <!--        --><?php //if ($step < 1): ?>
    <!--            <tr>-->
    <!--                --><?php //foreach ($items as $i => $item) : ?>
    <!--                    <th>--><? //= $i ?><!--</th>-->
    <!--                --><?php //endforeach; ?>
    <!--            </tr>-->
    <!--        --><?php //endif; ?>
    <!--        --><?php //$step++;
//    endforeach; ?>
    <!---->
    <!--    --><?php //foreach ($result as $index => $items) : ?>
    <!--        <tr>-->
    <!--            --><?php //foreach ($items as $i => $item) : ?>
    <!--                <td>--><? //= $item ?><!--</td>-->
    <!--            --><?php //endforeach; ?>
    <!--        </tr>-->
    <!--    --><?php //endforeach;

} else {

    Help::location(INDEX);

}
?>