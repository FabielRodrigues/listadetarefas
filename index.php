<?php
require_once ('conexao.php');
/*
* Seleciona a tabela de tarefas
*/
$sth = $pdo->prepare("SELECT * FROM lista ORDER BY data ASC");
$sth->execute();
$result = $sth->fetchAll();
$q1 = 0;
$q2 = 0;
foreach ($result as $t1) :
    if ($t1['status'] == 1) {
        $q1++;
    } else {
        $q2++;
    }

endforeach;
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Data Tables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" />

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<meta charset="utf-8">
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Tarefas', 'Quantidade'],
            ['Feitas',     <?php echo $q1; ?>],
            ['Pendentes',  <?php echo $q2; ?>],
        ]);

        var options = {
            title: 'Relatório de tarefas'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>

<div class="container">
    <h1 class="alert alert-info text-center">LISTA DE TAREFAS</h1>
    <form method="post" action="insert.php">
        <input type="text" name="tarefa" PLACEHOLDER="INSERIR TAREFA..." class="form-control"/><br />

        <input type="submit" value="ENVIAR" class="btn btn-success btn-block" />
    </form>
    <br />
    <table class="table table-striped table-hover" id="table">
        <thead>
            <tr>
                <th>
                    NOME
                </th>
                <th>
                    DATA
                </th>
                <th>
                    STATUS
                </th>
                <th>
                    DELETAR
                </th>
            </tr>
        </thead>
        <?php foreach ($result as $r) : ?>
            <tbody>
                <tr>
                    <td>
                        <?php  echo $r['nome']; ?>
                    </td>

                    <td>
                        <?php
                        $data = date("d/m/Y - h:i:s", strtotime($r['data']));
                        echo $data;
                        ?>

                    </td>

                    <td>
                        <?php if($r['status'] == 1 ){ ?>
                            <a href="update.php?id=<?php echo $r['idlista']; ?>&s=0" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></a>
                        <?php } else { ?>
                            <a href="update.php?id=<?php echo $r['idlista']; ?>&s=1" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span></a>
                        <?php } ?>
                    </td>
                    <td>
                        <a href="delete.php?id=<?php echo $r['idlista']; ?>" class="btn btn-danger btn-sm">DELETAR</a>
                    </td>
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
</div>
<script src="//code.jquery.com/jquery-1.12.0.min.js" ></script>
<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js" ></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            "order": [[ 1, "desc" ]],
            language: {
                url:'http://cdn.datatables.net/plug-ins/1.10.9/i18n/Portuguese-Brasil.json'
            }
        });

    } );
</script>