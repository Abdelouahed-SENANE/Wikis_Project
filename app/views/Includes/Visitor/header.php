<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ============ File css ==================== -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/main.css">
    <!-- =================  Multi SELECT ============= -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css
">
    <!-- =============== Font Poppins =============== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- ================ Tailwind Css ============= -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#f97316',
                    },
                    backgroundImage: {
                        'hero-back': "url('/assets/images/background.jpg')",
                    },
                    fontFamily: {
                        'poppins': ['poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <title><?= SITENAME; ?></title>
</head>

<body class="font-[poppins] relative">