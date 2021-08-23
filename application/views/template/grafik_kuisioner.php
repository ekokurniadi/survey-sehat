<section class="grafik_kuisioner">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <img src="<?php echo base_url() ?>image/default/images/home/icon_05.gif" width="30px" alt="">
                <strong>Penukaran Poin</strong>
            </div>
        </div>
        <div class="row container-perkenalan mt-2 mb-3">
            
            <div class="col-md-12">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        getData();
    });

    $('#filter').change(function() {
        getData();
    })

    function getData() {
        $.ajax({
            url: '<?= base_url('publics/grafikData') ?>',
            type: "POST",
            dataType: "JSON",
            data: {
                id: '<?php echo $header->row()->kode_kuisioner ?>',
                filter: $('#filter').val()
            },
            success: function(response) {
                showGraph(response);
            }
        });

    }

    function showGraph(response) {
        var dataPoints = [];
        var persent = 0;
        var total = 0;
        for (var i = 0; i < response.data.length; i++) {
            dataPoints.push({
                x: response.data[i]['jawaban'],
                jumlah: response.data[i]['total'],
                y: response.data[i]['percent'],
            })
        }
        console.log(dataPoints);
        renderGraph(dataPoints);
    }
</script>
<script>
    function renderGraph(dataPoints) {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "<?= $header->row()->pertanyaan ?>"
            },
            data: [{
                type: "pie",
                startAngle: 240,
              
                toolTipContent: "{x}: <strong>{y}% ({jumlah} orang menjawab) </strong>",
                indexLabel: "{x} - {y}% ({jumlah} orang menjawab)",
                dataPoints: dataPoints,
            }]
        });
        chart.render();
    }
</script>