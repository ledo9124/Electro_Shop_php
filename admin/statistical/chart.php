<div class="container categories-list-table p-4">
    <div class="row align-items-center">
        <div class="col-6 h1 m-4 title">Chart</div>
    </div>

    <div id="piechart_3d" style="width: 800px; height: 400px;"></div>

    <a href="index.php?act=statistical-list" class="btn btn-success add-new">Statistical</a>

</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Category_name', 'Quantity'],
            <?php 
                if ($listStatistical) {
                    foreach ($listStatistical as $statistical) {
                        extract($statistical);
                        echo "['$category_name' , $quantity],";
                    }
                }
            ?>
        ]);

        var options = {
            title: 'Chart of the number of products in the category',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>