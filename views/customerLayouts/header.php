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
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased"></body>