<?php

function getUsers()
{
  $users = json_decode(file_get_contents(__DIR__ . "/users.json"), true);
  return $users;
}

function putJson($users)
{
  file_put_contents(__DIR__ . "/users.json", json_encode($users, JSON_PRETTY_PRINT));
}


function getUserById($id)
{
  $users = getUsers();
  foreach ($users as $user) {
    if ($user['id'] == $id) {
      return $user;
    }
  }
  return null;
}

function createUser($data)
{
  $users = getUsers();

  $data["id"] = time();

  $users[] = $data;

  putJson($users);

  return $data;
}

function updateUser($data, $id)
{
  $updateUser = [];
  $users = getUsers();
  foreach ($users as $i => $user) {
    if ($user["id"] == $id) {
      $users[$i] = $updateUser = array_merge($user, $data);
      break;
    }
  }
  putJson($users);
  return $updateUser;
}

function deleteUser($id)
{
  $users = getUsers();

  foreach ($users as $key => $user) {
    if ($user["id"] == $id) {
      array_splice($users, $key, 1);
      break;
    }
  }
  putJson($users);
}

function uploadImage($file, $user)
{
  if (!file_exists(__DIR__ . "/img")) {
    mkdir(__DIR__ . "/img");
  }
  $file_name = $file["name"];
  $name_as_array = explode(".", $file_name);
  $extention = $name_as_array[count($name_as_array) - 1];

  move_uploaded_file($_FILES['pircture']["tmp_name"], __DIR__ . "/img/{$user['id']}.$extention");
  $user["extention"] = $extention;
  updateUser($user, $user['id']);
}

function validateUser($user, &$formErrors)
{

  $isvalid = true;
  if (!$user["name"]) {
    $formErrors["name"] = "Name is mandatory";
    $isvalid = false;
  }

  if (!$user["username"] || strlen($user["username"]) < 6 || strlen($user["username"]) > 16) {
    $formErrors["username"] = "Username is required and it must be more than 6 and less than 16 characters";
    $isvalid = false;
  }

  if (!$user["email"] || !filter_var($user["email"], FILTER_VALIDATE_EMAIL)) {
    $formErrors["email"] = "This must be a valid email adresse";
    $isvalid = false;
  }

  if (!$user["phone"] || !filter_var($user["phone"], FILTER_VALIDATE_INT) || strlen($user["phone"]) > 12) {
    $formErrors["phone"] = "This must be a valid phone number";
    $isvalid = false;
  }

  return $isvalid;
}
