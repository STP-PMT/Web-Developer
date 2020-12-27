<html>
    <body>
        <form action="student.php" >
            <table>
                <tr>
                    <td colspan=2>
                        <input type="radio" name="mode" value="add">Add<br>
                        <input type="radio" name="mode" value="delete">Delete<br>
                        <input type="radio" name="mode" value="show">Show<br>

                    </td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td><input type="text" name="id"></td>

                </tr>
                <tr>
                <td>Name</td>
                    <td><input type="text" name="name"></td>

                </tr>
                <tr>
                <td>GPA</td>
                    <td><input type="text" name="gpa"></td>

                </tr>
                <tr>
                    <td colspan=2> <input type="submit" value="Send"></td>
                   
                </tr>
            </table>
        </form>
    </body>
</html>