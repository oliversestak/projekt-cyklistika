<link rel="stylesheet" href="<?= base_url("node_modules/bootstrap/dist/css/bootstrap.min.css") ?>">
<link rel="stylesheet" href="<?= base_url("node_modules/bootswatch/dist/navbar") ?>">
<script src = "node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="<?=base_url("node_modules/fontawesome-free/css/all.css")?>">
<script src="<?=base_url("node_modules/fontawesome-free/js/all.js")?>"> </script>

<style>
.carousel-indicators {
    position: static;
    margin-top: 10px; /* Adjust the space between the carousel and the dots */
    text-align: center; /* Center align the indicators */
}

.carousel-indicators button {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: white;
}

.carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.8); /* Dark background */
        border-radius: 50%; /* Optional: makes the background circular */
    }

    .carousel-control-prev-icon {
        filter: invert(100%); /* Makes the white arrow dark */
    }

    .carousel-control-next-icon {
        filter: invert(100%); /* Makes the white arrow dark */
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 5%; /* Control size */
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        background-color: rgba(0, 0, 0, 0.5); /* Optional: slightly darker on hover */
    }

    .carousel-inner p {
        color: white; /* Set font color to white */
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.8); /* Dark background */
        border-radius: 50%;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        filter: invert(100%); /* Darken arrow icons */
    }

    .carousel-indicators button {
        background-color: #000; /* Dark color for indicators */
    }
    </style>