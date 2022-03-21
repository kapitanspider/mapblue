<!DOCTYPE HTML>
<html>
<head>
<title>Title of the document</title>
</head>
<body>
<?php
include('facecheck.php');
//print_r($_POST); 
?>
<form action="dodaj_aktywnosc_db.php" method="post">
<p>Lokalizacja:</p>
<p>Województwo:</p>
<input type="text" disabled value="<?php echo $_POST['wojewodztwo']; ?>">
<input type="hidden" id="wojewodztwo" name="wojewodztwo"  value="<?php echo $_POST['wojewodztwo']; ?>">
<p>Powiat:</p>
<input type="text" disabled value="<?php echo $_POST['powiat']; ?>">
<input type="hidden" id="powiat" name="powiat"  value="<?php echo $_POST['powiat']; ?>">
<p>Gmina:</p>
<input type="text" disabled value="<?php echo $_POST['gmina']; ?>">
<input type="hidden" id="gmina" name="gmina"  value="<?php echo $_POST['gmina']; ?>">
</br>
<a href="map.php">Zmień lokację</a>
<p>Nazwa aktywności/wydarzenia:</p>
<input type="text" id="nazwa" name="nazwa" required>
<p>Data:</p>
<input type="date" id="data" name="data" required>
<p>Ilość uczestników</p>
<input type="number" id="uczestnicy" name="uczestnicy" required>
<p>Link FB/WWW</p>
<input type="text" id="potwierdzenie" name="potwierdzenie" required>
<p>Notatka:</p>
<textarea id="notatka" name="notatka" rows="4" cols="50"></textarea>
<input type="submit">
</form>
</body>
</html>
