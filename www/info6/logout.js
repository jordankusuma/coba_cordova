function logout() {
  var db = window.openDatabase("login", "1.0", "Login", 10000);
  db.transaction(deleteDb, OnError);
  function deleteDb(tx) {
    tx.executeSql("DELETE FROM memberlogin", [], OnSuccess, OnError);
  }
  function OnSuccess(tx) {
    alert("Logout Sukses");
    window.location.href = "login.html";
  }
  function OnError(tx, err) {
    alert("Error");
  }
}
