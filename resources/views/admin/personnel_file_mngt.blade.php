<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <title>Admin | Personnel File Mngt.</title>
</head>
<body>
    <a href="">Add Personnel</a>
    <br>
    <br><table id="harvTbl" class="display">
        <thead>
          <tr>
            <th>Harvest Date</th>
            <th>Species</th>
            <th>Percentage of survived fish</th>
            <th>Location of stocking</th>
            <th>Name of Client</th>
            <th>Birthday of Client</th>
            <th>Cultured period</th>
            <th style="width: 8rem;">Action</th>
          </tr>
        </thead>
        <tbody> 
            <tr>
              <td>csd </td>
              <td>cds </td>
              <td> csd</td>
              <td> csd</td>
              <td>csd </td>
              <td> cds</td>
              <td> csd</td>
              <td>
                csdvds
              </td>
            </tr> 
          </form>
        </tbody>
      </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
          $('#harvTbl').DataTable({
            "order": [[0, "desc"]]
          });
        });
    </script>
</body>
</html>