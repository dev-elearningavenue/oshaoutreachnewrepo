const countdownTimer = () => {
    const timeInterval = setInterval(() => {
        const countdownDateTime = new Date(
            "Mon Oct 10 2022 04:00:00 GMT-0500 (EST)"
        ).getTime();
        const currentTime = new Date().getTime();
        const remainingDayTime = countdownDateTime - currentTime;

        const totalHours = Math.floor(remainingDayTime / (1000 * 60 * 60));
        const totalMinutes = Math.floor(
            (remainingDayTime % (1000 * 3600)) / (1000 * 60)
        );
        const totalSeconds = Math.floor(
            (remainingDayTime % (1000 * 60)) / 1000
        );

        const hoursElem = $(".t-hours");
        const minElem = $(".t-minutes");
        const secondsElem = $(".t-seconds");

        // const runningCountdownTime = {
        //     countdownHours: totalHours,
        //     countdownMinutes: totalMinutes,
        //     countdownSeconds: totalSeconds,
        // };

        /* Update DOM */
        hoursElem.text(function n(n) {
            return totalHours > 9 ? "" + totalHours : "0" + totalHours;
        });
        minElem.text(function n(n) {
            return totalMinutes > 9 ? "" + totalMinutes : "0" + totalMinutes;
        });
        secondsElem.text(function n(n) {
            return totalSeconds > 9 ? "" + totalSeconds : "0" + totalSeconds;
        });

        if (remainingDayTime < 0) {
            clearInterval(timeInterval);
            // setExpiryTime(false);
        }
    }, 1000);
};

window.addEventListener("load", function () {
    setInterval(() => {
        $("#t-loader").hide();

        $("#t-container").show();
    }, 1000);

    countdownTimer();
});
