<?php
include_once 'user.php';
function validReg($post)
{

    if (isset($post['register'])) {
        $login = $post['login'];
        $pass = $post['password'];
        $passSecond = $post['Confirm_password'];
        $email = $post['email'];
        $name = $post['name'];

        // проверка валидации
        if (strlen($login) < 6) {
            echo 'логин должен состоять из минимум 6 символов';
        } elseif (strlen($pass) < 6) {
            die("Пароль должен состоять минимум из 6 символов");
        } elseif ((!preg_match('/[A-zА-я]+/', $pass))) {
            echo "Пароль должен содержать хотя бы одну букву!";
        } elseif ((!preg_match('/[0-9]+/', $pass))) {
            echo "Пароль должен содержать хотябы 1 цифру!";
        } elseif ($pass !== $passSecond) {
            echo "Пароли должны совпадать!";
        } elseif (!preg_match('/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/', $email)) {
            echo "Введите нормально mail";
        } elseif (strlen($name) < 2) {
            echo "Имя должно состоять минимум из 2 символов!";
        } elseif (!ctype_alpha($name)) {
            echo "Имя должно состоять только из буквенных символов!";
        } else {
            $pass = md5($pass);
            $user = new User($login, $pass, $email, $name);
            $userCollection = json_decode(file_get_contents('../data.json'));

            if ($userCollection) {
                $isRegistered = false;  //пользователь не зарегистрирован
                foreach ($userCollection as $object) {
                    if ($user->email === $object->email || $user->login === $object->login) {
                        $isRegistered = true;
                        echo "Такой пользователь зарегистрирован!";
                        break;
                    }

                }
                // если пользователь не зарегистрирован - добавить его в data.json
                if (!$isRegistered) {
                    dataAdd($userCollection, $user, $name);
                }

            } else {
                dataAdd($userCollection, $user, $name);
            }
        }
    }
}

// добавление пользователя в data.json
function dataAdd($userCollection, $user, $name)
{
    $userCollection[] = $user;
    file_put_contents('../data.json', json_encode($userCollection));
    echo "Hello $name!";
}

function logIn($post)
{
    if (isset($post['loginIn'])) {
        $login = $post['log'];
        $pass = md5($post['password']);
        $userCollection = json_decode(file_get_contents('../data.json'));
        foreach ($userCollection as $object) {
            if ($login === $object->login && $pass === $object->password) {
                $name = $object->name;
                $isRegistered = true;
                break;
            }else{
                $isRegistered = false;
            }

        }
        if($isRegistered) {
            echo "Hello $name!";
        }else{
            echo "Неверный логин или пароль";
        }
    }
}
