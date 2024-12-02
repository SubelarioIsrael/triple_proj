// there will be a circle in the middle of the screen

// said circle will expand with the inhale_time

// circle will stop expanding during hold_time

// circle decreases in size during exhale_time

// pass data from exercise blade to exercisestartcontroller

// make it so that the exercise adjusts according to the data in the array

// for example: Box Breathing. The circle will expand for 4 seconds, hold in 4, then shrink in another 4

// rxercise provess will depend on type of exercise

// different instructions per exercise; some will ask the user to exhale sharply like the energizing breathing

document.getElementById('startBtn').addEventListener('click', () => {
    const inhaleTime = {{ $exercise['inhale_time'] }};
    const holdTime = {{ $exercise['hold_time'] }};
    const exhaleTime = {{ $exercise['exhale_time'] }};

    const circle = document.getElementById('circle');

    function animateCircle() {
        // Inhale (Expand)
        circle.style.transition = `transform ${inhaleTime}s ease-in-out`;
        circle.style.transform = 'scale(1.5)';

        setTimeout(() => {
            // Hold
            circle.style.transition = `transform ${holdTime}s ease-in-out`;
            circle.style.transform = 'scale(1.5)';

            setTimeout(() => {
                // Exhale (Shrink)
                circle.style.transition = `transform ${exhaleTime}s ease-in-out`;
                circle.style.transform = 'scale(1)';
            }, holdTime * 1000);

        }, inhaleTime * 1000);
    }

    animateCircle();

    // Repeat the process indefinitely (loop)
    setInterval(() => {
        animateCircle();
    }, (inhaleTime + holdTime + exhaleTime) * 1000);
});