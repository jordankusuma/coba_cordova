// Wait for Cordova to load
document.addEventListener("deviceready", onDeviceReady, false);
var currentRow;
// Populate the database
function populateDB(tx) {
    tx.executeSql('CREATE TABLE IF NOT EXISTS mahasiswa (id INTEGER PRIMARY KEY AUTOINCREMENT, nama,nrp,jurusan)');
}
// Query the database
function queryDB(tx) {
    tx.executeSql('SELECT * FROM mahasiswa', [], querySuccess, errorCB);
}
function searchQueryDB(tx) {
    tx.executeSql("SELECT * FROM mahasiswa where nama like ('%" + document.getElementById("txtNama").value + "%')", [], querySuccess, errorCB);
}
// Query the success callback
function querySuccess(tx, results) {
    var tblText = '<table id="t01"><tr> <th>ID</th> <th>Nama</th> <th>Nrp</th> <th>Jurusan</th> </tr>';
    var len = results.rows.length;
    for (var i = 0; i < len; i++) {
        var tmpArgs = results.rows.item(i).id + ",'" + results.rows.item(i).nama + "','" + results.rows.item(i).nrp + "','" + results.rows.item(i).jurusan + "'";
        tblText += '<tr onclick="goPopup(' + tmpArgs + ');"><td>' + results.rows.item(i).id + '</td><td>' + results.rows.item(i).nama + '</td><td>' + 
        results.rows.item(i).nrp + '</td><td>' + results.rows.item(i).jurusan + '</td></tr>';
    }
    tblText += "</table>";
    document.getElementById("tblDiv").innerHTML = tblText;
}
//Delete query
function deleteRow(tx) {
    tx.executeSql('DELETE FROM mahasiswa WHERE id = ' + currentRow, [], queryDB, errorCB);
}
// Transaction error callback
function errorCB(err) {
    alert("Error processing SQL: " + err.code);
}
// Transaction success callback
function successCB() {
    var db = window.openDatabase("Database", "1.0", "Cordova Demo", 200000);
    db.transaction(queryDB, errorCB);
}
// Cordova is ready
function onDeviceReady() {
    var db = window.openDatabase("Database", "1.0", "Cordova Demo", 200000);
    db.transaction(populateDB, errorCB, successCB);
}
//Insert query
function insertDB(tx) {
    tx.executeSql('INSERT INTO mahasiswa (nama,nrp,jurusan) VALUES ("' + document.getElementById("txtNama").value + '","' + 
    document.getElementById("txtNrp").value + '","' + document.getElementById("txtJurusan").value + '")');
}
function goInsert() {
    var db = window.openDatabase("Database", "1.0", "Cordova Demo", 200000);
    db.transaction(insertDB, errorCB, successCB);
}

function goSearch() {
    var db = window.openDatabase("Database", "1.0", "Cordova Demo", 200000);
    db.transaction(searchQueryDB, errorCB);
}
function goDelete() {
    var db = window.openDatabase("Database", "1.0", "Cordova Demo", 200000);
    db.transaction(deleteRow, errorCB);
    document.getElementById('qrpopup').style.display = 'none';
}
//Show the popup after tapping a row in table
function goPopup(row, rownama, rownrp, rowjurusan) {
    currentRow = row;
    document.getElementById("qrpopup").style.display = "block";
    document.getElementById("editNama").value = rownama;
    document.getElementById("editNrp").value = rownrp;
    document.getElementById("editJurusan").value = rowjurusan;
}

function editRow(tx) {
    tx.executeSql('UPDATE mahasiswa SET nama ="' + document.getElementById("editNama").value + '", nrp= "' + 
    document.getElementById("editNrp").value + '", jurusan= "' + document.getElementById("editJurusan").value + '" WHERE id = ' + currentRow, [], 
    queryDB, errorCB);
}

function goEdit() {
    var db = window.openDatabase("Database", "1.0", "Cordova Demo", 200000);
    db.transaction(editRow, errorCB);
    document.getElementById('qrpopup').style.display = 'none';
}