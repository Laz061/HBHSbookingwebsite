<?php
require_once "./config.php";
require_once "includes/dbh.inc.php";
if (!isset($_SESSION["userid"]) && $_SESSION["userid"] !== true) {
    header("Location: ./index.php");
}

$query = "SELECT * FROM gym_booking WHERE reservation_email = :email";
$stmt = $pdo->prepare($query);
$stmt->bindParam(":email", $_SESSION['user']['email']);
$stmt->execute();
$bookings = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="EN-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <title>HBHS booking website</title>
    <link rel="stylesheet" href="bookingstyle.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@400;500;600;700&family=Sawarabi+Mincho&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@event-calendar/build/event-calendar.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@event-calendar/build/event-calendar.min.js"></script>
</head>

<body>
    <div class="content-wrapper">
        <header>
            <img src="images/logo.png" class="logo">
        </header>
        <nav>
            <ul class="navList">
                <li class="navListItem"><a class="navLinks" href="booking.php">Book</a></li>
                <li class="navListItem"><a class="navLinks" href="indexli.php">Home</a></li>
            </ul>

            <i data-feather="user" class="user-pic" onclick="toggleMenu()"></i>

            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <i data-feather="user" class="user-info-icon"></i>
                        <h3><?php echo $_SESSION['user']['first_name'] ?> <?php echo $_SESSION['user']['last_name'] ?></h3>
                    </div>

                    <hr>

                    <a href="#" class="sub-menu-link">
                        <i data-feather="user" class="user-info-icon"></i>
                        <p>profile</p>
                        <span>></span>
                    </a>

                    <a href="#" class="sub-menu-link">
                        <i data-feather="help-circle" class="user-info-icon"></i>
                        <p>Help</p>
                        <span>></span>
                    </a>

                    <a href="includes/logout.inc.php" class="sub-menu-link">
                        <i data-feather="log-out" class="user-info-icon"></i>
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>

        <div id="booking-content-wrapper">
            <!-- Side navigation -->
            <div class="sidenav-container">
                <div class="sidenav">
                    <a href="#">Gym 1</a>
                    <a href="#">Gym 2</a>
                    <a href="#">Pool</a>
                </div>
            </div>

            <div id="calendar-container">
                <h1>My Bookings</h1>
                <div id="ec">

                </div>
                <div class="booking-list-container">
                    <table class="booking-list">

                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Start time</th>
                                <th scope="col">End time</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Event name</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                foreach ($bookings as $booking) {
                                    if ($booking["status"] == true) {
                                        $status = "Approved";
                                    }
                                    if ($booking["status"] == false) {
                                        $status = "Pending";
                                    }

                                    echo "<tr>
                                        <td>{$booking["id"]}</td>
                                        <td>{$booking["start_time"]}</td>
                                        <td>{$booking["end_time"]}</td>
                                        <td>{$booking["reservation_name"]}</td>
                                        <td>{$booking["reservation_email"]}</td>
                                        <td>{$booking["event_name"]}</td>
                                        <td>{$status}</td>
                                        </tr>";
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script>
            feather.replace();
        </script>

        <script>
            let subMenu = document.getElementById("subMenu");

            function toggleMenu() {
                subMenu.classList.toggle("open-menu")
            }
        </script>
        <script>
            let ec = new EventCalendar(document.getElementById('ec'), {
                view: 'timeGridWeek',
                height: '100%',
                outerWidth: '100%',
                headerToolbar: {
                    start: 'prev,next today',
                    center: 'title',
                    end: 'timeGridWeek,timeGridDay,listWeek'
                },
                buttonText: function(texts) {
                    texts.resourceTimeGridWeek = 'resources';
                    return texts;
                },
                resources: [{
                        id: 1,
                        title: 'Resource A'
                    },
                    {
                        id: 2,
                        title: 'Resource B'
                    }
                ],
                scrollTime: '09:00:00',
                eventColor: '#5a181a',
                eventTextColor: '#837651',
                events: createEvents(),
                views: {
                    timeGridWeek: {
                        pointer: true
                    },
                    resourceTimeGridWeek: {
                        pointer: true
                    }
                },
                dayMaxEvents: true,
                nowIndicator: true,
                selectable: false,
                eventStartEditable: false,
                eventDurationEditable: false,
            });

            function createEvents() {
                return [
                    <?php
                    foreach ($bookings as $booking) {
                        echo "{
                            start: '{$booking["start_time"]}',
                            end: '{$booking["end_time"]}',
                            title: {
                                html: 'Reservation Name: {$booking["reservation_name"]}<br>Event Name: {$booking["event_name"]}'
                            }
                        },";
                    }
                    ?>
                ];
            }

            function _pad(num) {
                let norm = Math.floor(Math.abs(num));
                return (norm < 10 ? '0' : '') + norm;
            }
        </script>

</body>

</html>