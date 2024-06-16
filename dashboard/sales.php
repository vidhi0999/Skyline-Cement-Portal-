<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php include('header.php') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<!-- CONTENT -->
<section id="content">
    <!-- MAIN -->
    <main>
        <div class="orders" style="color:var(--dark)">
            <br>
            <div class="head-title">
                <!-- <hr> -->
                <div class="left">
                    <h1> Sales</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">line Graph </a>
                        </li>
                        <li><i class='fa fa-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Sales of July(2023)</a>
                        </li>
                    </ul>
                </div>
            </div>
            <br>
            <br>
            <br>

            <div class="line-chart-container">

                <canvas id="lineChart" width="500" height="300"></canvas>
            </div>
            <br>
            <br>
            <hr>
            <br>
            <div class="head-title">
                <div class="left">
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Pie Chart </a>
                        </li>
                        <li><i class='fa fa-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Sales of July(2023)</a>
                        </li>
                    </ul>
                </div>
            </div>
            <br>
            <!-- <br> -->
            <br>


            <div class="pie-chart-container">
                <canvas id="pieChart" width="500" height="300"></canvas>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>

<script>
    // Sample data
    const salesData = {
        labels: ["July Sales", "Target", "On-Going"],
        datasets: [{
            label: "Sales (in MT)",
            data: [100.5, 90, 0],
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
            ],
            borderWidth: 1,
        }]
    };

    // Line chart
    const lineCtx = document.getElementById('lineChart').getContext('2d');
    const lineChart = new Chart(lineCtx, {
        type: 'line',
        data: salesData,
        options: {
            responsive: false, // Ensure the chart uses the specified dimensions
            maintainAspectRatio: false,
            width: 400, // Set the desired width
            height: 200, // Set the desired height
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });


    // Pie chart
    const pieCtx = document.getElementById('pieChart').getContext('2d');
    const pieChart = new Chart(pieCtx, {
        type: 'pie',
        data: salesData,
        options: {
            responsive: false, // Ensure the chart uses the specified dimensions
            maintainAspectRatio: false,
            width: 400, // Set the desired width
            height: 200, // Set the desired height

        },
    });


</script>