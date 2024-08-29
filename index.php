<?php
$servername = "localhost";  
$username = "root";        
$password = "";            
$dbname = "schoolperformance";  


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Kết nối thành công";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Performance Chart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php 
        $sql = "SELECT descriptionlabels.descriptionlabel, descriptionlabels.bgcolor, descriptionlabels.bordercolor, datapoints.datapoint 
        FROM schoolperformance.descriptionlabels
        INNER JOIN schoolperformance.datapoints
        ON descriptionlabels.id  = datapoints.descriptionlabelid";
        $result = $conn->query($sql);

        if ($result === false) {
            die("Lỗi truy vấn: " . $conn->error);
        }

    $thisweek = array();
    $lastweek = array();
    $bgcolor = array();
    $bordercolor = array();
    $descriptionlabels = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if ($row["descriptionlabel"] === 'thisweek') {
                $thisweek[] = $row["datapoint"];
            } else if ($row["descriptionlabel"] === 'lastweek') {
                $lastweek[] = $row["datapoint"];
            }
            if (!in_array($row["descriptionlabel"], $descriptionlabels)) {
                $descriptionlabels[] = $row["descriptionlabel"];
                $bgcolor[] = $row["bgcolor"];
                $bordercolor[] = $row["bordercolor"];
            }
        }
    } else {
        echo "0 kết quả";
    }   
    ?>
    <h5 class="card-title">School Performance</h5>
    <div class="chartBox">
        <canvas id="myChart"></canvas>
    </div>
          
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Chart -->
    <script>
        // setup block
        const thisweek = <?php echo json_encode($thisweek); ?>;
    const lastweek = <?php echo json_encode($lastweek); ?>;
    const descriptionlabels = <?php echo json_encode($descriptionlabels); ?>;
    const bgcolors = <?php echo json_encode($bgcolor); ?>;
    const bordercolors = <?php echo json_encode($bordercolor); ?>;

    const data = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [
            {
                label: descriptionlabels[0],
                data: thisweek,
                backgroundColor: bgcolors[0],
                borderColor: bordercolors[0],
                borderWidth: 2,
                fill: true,
                tension: 0.4
            },
            {
                label: descriptionlabels[1],
                data: lastweek,
                backgroundColor: bgcolors[1],
                borderColor: bordercolors[1],
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }
        ]
    };
        // config block
        const config = {
            type : 'line',
            data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMax: 120,
                        grid: {
                            color: 'rgba(201, 203, 207, 0.3)', // Màu lưới nhẹ
                        },
                        ticks: {
                            color: '#666', // Màu cho nhãn dọc
                            font: {
                                family: 'Arial',
                                size: 14,
                                weight: '500'
                            }
                        }
                    },
                    x: {
                        grid: {
                            display:true 
                        },
                        ticks: {
                            color: '#999', // Màu cho nhãn ngang
                            font: {
                                family: 'Arial',
                                size: 14,
                                weight: '600'
                            }
                        }
                    }
                },
                // chỉnh chú thích
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        align: 'end',
                        labels: {
                            usePointStyle:true, // cho phép dùng pointStyles
                            pointStyle: 'circle',
                            color: '#333',
                            font: {
                                family: 'Arial',
                                size: 16,
                                weight: 'bold'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(201, 203, 207, 0.3)',
                        titleFont: {
                            family: 'Arial',
                            size: 16,
                            weight: 'bold'
                        },
                        bodyFont: {
                            family: 'Arial',
                            size: 14,
                            weight: 'normal'    
                        }
                    }
                }
            }
        }
        // render block

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
    
    
</body>
</html>
