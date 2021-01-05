<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<body>

<form action="giai-ptb2-submit" method="GET">
    <table>
        <tr>
            <td>
                <lable for="">So A</lable>
                <input type="text" name="num_a">
            </td>
        </tr>
        <tr>
            <td>
                <lable for="">So B</lable>
                <input type="text" name="num_b">
            </td>
        </tr>
        <tr>
            <td>
                <lable for="">So C</lable>
                <input type="text" name="num_c">
            </td>
        </tr>
    </table>
    <button type="submit">Submit</button>
</form>
</body>
</html>
