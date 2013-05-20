<?php

class Tracking {

    function get_tracker_user($username) {
        $setting = new Setting();
        $tracker_model = new Tracker();
        if ($username != '') {
            if (replace($setting->get_val('TRACKER')) == 'ON') {
                $this->trackers = $tracker_model->get_user_tracks($username);
            }
        } else {
            $this->trackers = $tracker_model->get_user_tracks('visitor');
        }
    }

}

?>
