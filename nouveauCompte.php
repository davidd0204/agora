<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire création de compte</title>
</head>
<body>
    <h3>Veullez saisir vos données</h3>
    <form action="newAccount.php" method="post">
        <table border=1>
            <tr>
                <td>Nom : </td>
                <td><input type="text" name="Nom"></td>
            </tr>
            <tr>
                <td>Prénom : </td>
                <td><input type="text" name="Prénom"></td>
            </tr>
            <tr>
                <td>Adresse : </td>
                <td><input type="text" name="Adresse"></td>
            </tr>
            <tr>
                <td>Email : </td>
                <td><input type="text" name="Email"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="soumettre" value="Soumettre"></td>
            </tr>
        </table>
    </form>
</body>
</html>