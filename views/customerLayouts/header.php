<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        .carousel-item img {
            height: 500px;
            object-fit: cover;
        }
        @media (max-width: 768px) {
            .carousel-item img {
                height: 300px;
            }
        }
        /* Custom styles for the horizontal scrollable container */
        .scroll-container {
            display: flex;
            flex-wrap: nowrap; /* Ensures items stay in a single row */
            overflow-x: auto; /* Enables horizontal scrolling */
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none; /* Hides scrollbar in Firefox */
            -ms-overflow-style: none; /* Hides scrollbar in IE and Edge */
        }
        .scroll-container::-webkit-scrollbar {
            display: none; /* Hides scrollbar in Chrome, Safari, and Opera */
        }
        .scroll-container > div {
            flex: 0 0 auto; /* Prevents cards from shrinking or growing */
            scroll-snap-align: start; /* Snaps to the start of each card */
            margin-right: 1rem; /* Space between cards */
        }
        .scroll-container > div:last-child {
            margin-right: 0; /* Removes margin from the last card */
        }
        /* Arrow buttons */
        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
        }
        .arrow-left {
            left: 10px;
        }
        .arrow-right {
            right: 10px;
        }

        .carousel-item img { height: 500px; object-fit: cover; border-radius: 15px; transition: transform 0.3s; }
        .carousel-item img:hover { transform: scale(1.05); }
        @media (max-width: 768px) { .carousel-item img { height: 300px; } }
        .container { display: flex; justify-content: center; align-items: center; position: relative; text-align: center; color: white; }
        .image { width: 70%; }
        .caption { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: rgba(0, 0, 0, 0.7); padding: 20px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5); opacity: 0; animation: fadeIn 1s forwards; }
        .title { font-size: 2.5em; font-weight: bold; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7); }
        @keyframes fadeIn { from { opacity: 0; transform: translate(-50%, -60%); } to { opacity: 1; transform: translate(-50%, -50%); } }
        .about-company { display: grid; grid-template-columns: 1fr 1fr; gap: 25px; margin: 20px 0; }
        .about-company p { width: 80%; margin: 20px 70px; }
        .con img { margin-left: 70px; }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">