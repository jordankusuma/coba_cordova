var db = window.openDatabase("login", "1.0", "Login", 10000);
db.transaction(queryData, OnError);   

function queryData(tx) {
  tx.executeSql("SELECT * FROM memberlogin", [], OnSuccess, OnError);
}
function OnSuccess(tx, result) {
  var jml = result.rows.length;
  if (jml > 0) {
    window.location.href = "data_karyawan.html";
  } else {
    alert("Login Dulu");
    window.location.href = "login.html";
  }
}
function OnError(tx, err) {
  window.location.href = "login.html";
}
