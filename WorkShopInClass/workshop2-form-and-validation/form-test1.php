<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
</head>

<body>
    <form action="form-echo.php" method="get">
        USERNAME :
        <input type="text" name="username" placeholder="Username">
        <p><label>สาขาวิชา:</label>
            <select name="dept">
                <option value="">--Please choose an option--</option>
                <option value="CS">CS</option>
                <option value="IC">IC</option>
                <option value="MA">MA</option>
                <option value="IMI">IMI</option>
                <option value="AS">AS</option>
                <option value="AFET">AFET</option>
            </select>
        <p><input type="submit" value="Submit">
    </form>
</body>

</html>