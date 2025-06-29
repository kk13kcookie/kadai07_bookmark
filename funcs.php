<?php
// ==============
// 共通で使う関数
// ===============

// XSS対応
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES);
}

// データベース接続
function db_conn() {
  $db_name = ''; // データベース名
  $db_host = ''; // DBホスト
  $db_id   = ''; // ユーザー名(さくらサーバはDB名と同一)
  $db_pw   = ''; // パスワード

  // try catch構文でデータベースの情報取得を実施
  try {
      $server_info = 'mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host;
      $pdo = new PDO($server_info, $db_id, $db_pw);
  } catch (PDOException $e) {
      // エラーだった場合の情報を返す処理
      // exitした時点でそれ以降の処理は行われません
      exit('DB Connection Error:' . $e->getMessage());
  }
}