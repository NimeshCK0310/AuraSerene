
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around; /* Adjust spacing */
            margin: 20px;
        }

        .card {
            background-size: cover; /* Cover the entire card */
            background-position: center; /* Center the image */
            position: relative; /* Position for the overlay */
            color: white; /* Text color for better visibility */
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 200px; /* Fixed width */
            height: 200px; /* Fixed height for square */
            margin: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            display: flex; /* Center the content */
            align-items: center; /* Center vertically */
            justify-content: center; /* Center horizontally */
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.4); 
            border-radius: 8px; 
            z-index: 1; 
        }

        .card a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            text-align: center;
            position: relative; 
            z-index: 2; 
        }

        .card:hover {
            transform: scale(1.05);
        }

        .content {
            margin-left: 130px;
            padding: 20px;
        }

        .header {
            color: #009933;
            text-align: center;
            font-size: 15px;
            font-weight: bold;
            margin-left: 150px;
        }

        .headerOrders {
            color: black;
            text-align: left;
            font-size: 20px;
            margin-left: 20px;
        }

        .summary-widget {
            background-color: #00b33c;
            color: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-left: 150px;
        }

        .table-container {
            background-color: white;
            color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: black;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        .orders-list {
            background-color: #fff;
            color: #333;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .top-bar {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            width: 100%;
            top: 0;
            left: 15.6rem;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar input[type="text"] {
            padding: 8px;
            border: none;
            font-size: 16px;
            margin-right: 10px;
            border-radius: 5px;
        }

        .top-bar button {
            padding: 8px 15px;
            background-color: #555;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .top-bar button:hover {
            background-color: #333;
        }

        .top-bar .icons {
            display: flex;
            align-items: center;
        }

        .top-bar .icons i {
            margin-left: 20px;
            cursor: pointer;
        }

        .dashboard-title {
            font-size: 2.5em;
            color: #333;
            text-align: center;
            margin: 20px 0;
            font-weight: bold;
            text-transform: uppercase;
            border-bottom: 2px solid #155724;
            padding-bottom: 10px;}
    </style>
</head>

<body>
    <h1 class="dashboard-title">ADMIN DASHBOARD</h1>

<div class="card-container">
    <div class="card" style="background-image: url('./admin.jpeg');">
        <a href="./dashboard.php">Dashboard</a>
    </div>
    <div class="card" style="background-image: url('./Clensers/1.webp');">
        <a href="./Clensers/clensers.php">Clensers</a>
    </div>
    <div class="card" style="background-image: url('./Serums/5.jpg');">
        <a href="./serums/serums.php">Serums</a>
    </div>
    <div class="card" style="background-image: url('./Diffusers/16.jpg');">
        <a href="./Diffusers/diffusers.php">Diffusers</a>
    </div>
    <div class="card" style="background-image: url('./Scented/11.jpg');">
        <a href="./Scented/scented.php">Scented</a>
    </div>
</div>


    
</body>

</html>
