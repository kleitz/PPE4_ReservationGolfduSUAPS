function deplacer_calendrier($av) {

    if ($av === 0) {
        window.location.href = 'http://localhost/Git/PPE4_ReservationGolfduSUAPS/ReservationGolf/vue/reservation.php?con=0&pseudo=$pseudo&page=0';
    } else {

        window.location.href = 'http://localhost/Git/PPE4_ReservationGolfduSUAPS/ReservationGolf/vue/reservation.php?con=0&pseudo=$pseudo&page=2';

    }
}
