<?php

/**
 * This is controller
 * @author Oleg Roshnivskyy
 * @package
 */
class Debug {

    public static function showSystemUsage() {
        if (DEBUG) {
            echo '<div style="border: 1px solid black; background: #bbbbbb; padding: 2px; margin: 2px;"><pre>';
            echo "\nMemory:      " . memory_get_peak_usage(true) / 1048576 . 'MB';
            echo'</pre></div>';
            echo '<div style="border: 1px solid black; background: #bbbbbb; padding: 2px; margin: 2px"><pre>';
            echo "Execution time:  " . (microtime(true) - start_time);
            echo'</pre></div>';
        }
    }

}
