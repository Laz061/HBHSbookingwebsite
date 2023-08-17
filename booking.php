<?php
require_once "./config.php";
require_once "includes/dbh.inc.php";
if (!isset($_SESSION["userid"]) && $_SESSION["userid"] !== true) {
    header("Location: ./index.php");
}

$query = "SELECT * FROM gym_booking";
$stmt = $pdo->prepare($query);
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@event-calendar/build@1.5.1/event-calendar.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@event-calendar/build@1.5.1/event-calendar.min.js"></script>
</head>

<body>
    <div class="content-wrapper">
        <header>
            <img src="images/logo.png" class="logo">
        </header>
        <nav>
            <ul class="navList">
                <li class="navListItem"><a class="navLinks" href="#">Book</a></li>
                <li class="navListItem"><a class="navLinks" href="register.php">About</a></li>
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
                <div id="ec">

                </div>
                <div id="booking-form">
                    <form action="includes/bookingform.inc.php" method="post">

                        <h2>Gym 1 Booking</h2>

                        <div class="booking-input-box">
                            <span class="icon">
                                <i data-feather="mail"></i>
                            </span>
                            <input type="text" required name="event_name" placeholder=" ">
                            <label>Event Name</label>
                        </div>

                        <div class="booking-input-box">
                            <span class="icon">
                                <i data-feather="user"></i>
                            </span>
                            <input type="datetime-local" required name="start_time" placeholder=" ">
                            <label>Start time</label>
                        </div>

                        <div class="booking-input-box">
                            <span class="icon">
                                <i data-feather="user"></i>
                            </span>
                            <input type="datetime-local" required name="end_time" placeholder=" ">
                            <label>End time</label>
                        </div>
                        <button class="form-button" type="submit">Book</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="scripts.js"></script>
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
                let days = [];
                for (let i = 0; i < 7; ++i) {
                    let day = new Date();
                    let diff = i - day.getDay();
                    day.setDate(day.getDate() + diff);
                    days[i] = day.getFullYear() + "-" + _pad(day.getMonth() + 1) + "-" + _pad(day.getDate());
                }

                return [
                    <?php
                    foreach ($bookings as $booking) {
                        echo "{
                            start: '{$booking["start_time"]}',
                            end: '{$booking["end_time"]}',
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