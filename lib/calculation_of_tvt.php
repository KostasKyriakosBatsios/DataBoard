<?php
    // marking the watched seconds
    function markWatchedSeconds($videoSeconds, $begin, $end) {
        for ($second = $begin; $second <= $end; $second++) {
            $videoSeconds[$second] = 1;
        }
    }

    // calculating the total viewing time
    function calculateTotalViewTime($entries) {
        $totalSeconds = max(array_column($entries, 'end')) + 1;
        $videoSeconds = array_fill(0, $totalSeconds, 0);

        foreach ($entries as $entry) {
            markWatchedSeconds($videoSeconds, $entry['begin'], $entry['end']);
        }

        $tvt = array_sum($videoSeconds);
        return $tvt;
    }
?>