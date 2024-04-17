<?php
$messages = [
    'DORCAS OLUWASEUN ADEBAYO',
    'Student ID: CLA0008500TZ',
];

shuffle($messages);
?>
<html><head>
    <meta charset="utf-8">
    <title>Student ID: CLA0008500TZ</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="h-screen bg-white flex items-center justify-center font-sans text-gray-700" style="font-family: 'Jost', sans-serif">
    <div class="font-medium items-center text-center flex flex-col justify-center h-full">
        <div class="flex flex-col justify-center items-center">
            <h1 style="font-size: 2rem;" class="text-gray-700"><?php echo $messages[0]; ?> 🎉</h1>

            <p class="mb-6 font-semibold">Assignment title: PHP102 - Working with Files and Forms.</p>

            <div class="p-2 bg-indigo-800 text-white">🐘 PHP v<?php echo PHP_VERSION; ?></div>
        </div>
    </div>
</div>
</body>
</html>