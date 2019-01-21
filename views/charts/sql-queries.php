<?php

global $wpdb;

              $userid  = wp_get_current_user()->ID;



              if (!$_GET['t']) {

              	$datatype = 'wp_viewlog';
              	$column   = 'view_time';
              	echo '<script>jQuery("#views").css("opacity","1");</script>';
              	$idname   = 'authorid';

              	}
              if ($_GET['t'] == 'clicks') {

              	$datatype = 'wp_clicklog';
              	$column   = 'click_time';
              	echo '<script>jQuery("#clicks").css("opacity","1");</script>';
              	$idname   = 'authorid';

              	}
              if ($_GET['t'] == 'claps') {

              	$datatype = 'wp_waves';
              	$column   = 'wave_time';
              	echo '<script>jQuery("#claps").css("opacity","1");</script>';
              	$idname   = 'user_id';

              	}
              if ($_GET['t'] == 'loves') {

              	$datatype = 'wp_loves';
              	$column   = 'love_time';
              	echo '<script>jQuery("#loves").css("opacity","1");</script>';
              	$idname   = 'user_id';

              	}



               $minus1 = $wpdb->get_var(
                  "
                  SELECT COUNT(*) FROM $datatype WHERE $idname = '" . $userid . "'
                       and $column between DATE_ADD(NOW(), INTERVAL -2 DAY) and DATE_ADD(NOW(), INTERVAL -1 DAY)
                  "
                );
                $minus2 = $wpdb->get_var(
                   "
                   SELECT COUNT(*) FROM $datatype WHERE $idname = '" . $userid . "'
                        and $column between DATE_ADD(NOW(), INTERVAL -3 DAY) and DATE_ADD(NOW(), INTERVAL -2 DAY)
                   "
                );
                 $minus3 = $wpdb->get_var(
                    "
                    SELECT COUNT(*) FROM $datatype WHERE $idname = '" . $userid . "'
                         and $column between DATE_ADD(NOW(), INTERVAL -4 DAY) and DATE_ADD(NOW(), INTERVAL -3 DAY)
                    "
                  );
                $minus4 = $wpdb->get_var(
                     "
                     SELECT COUNT(*) FROM $datatype WHERE $idname = '" . $userid . "'
                          and $column between DATE_ADD(NOW(), INTERVAL -5 DAY) and DATE_ADD(NOW(), INTERVAL -4 DAY)
                     "
                  );
                   $minus5 = $wpdb->get_var(
                      "
                      SELECT COUNT(*) FROM $datatype WHERE $idname = '" . $userid . "'
                           and $column between DATE_ADD(NOW(), INTERVAL -6 DAY) and DATE_ADD(NOW(), INTERVAL -5 DAY)
                      "
                    );
                    $minus6 = $wpdb->get_var(
                       "
                       SELECT COUNT(*) FROM $datatype WHERE $idname = '" . $userid . "'
                            and $column between DATE_ADD(NOW(), INTERVAL -7 DAY) and DATE_ADD(NOW(), INTERVAL -6 DAY)
                       "
                     );
                     $minus7 = $wpdb->get_var(
                        "
                        SELECT COUNT(*) FROM $datatype WHERE $idname = '" . $userid . "'
                             and $column between DATE_ADD(NOW(), INTERVAL -8 DAY) and DATE_ADD(NOW(), INTERVAL -7 DAY)
                        "
                      );
                      $minus8 = $wpdb->get_var(
                  "
                  SELECT COUNT(*) FROM $datatype WHERE $idname = '" . $userid . "'
                       and $column between DATE_ADD(NOW(), INTERVAL -9 DAY) and DATE_ADD(NOW(), INTERVAL -8 DAY)
                  "
                );
                $minus9 = $wpdb->get_var(
                   "
                   SELECT COUNT(*) FROM $datatype WHERE $idname = '" . $userid . "'
                        and $column between DATE_ADD(NOW(), INTERVAL -10 DAY) and DATE_ADD(NOW(), INTERVAL -9 DAY)
                   "
                );
                 $minus10 = $wpdb->get_var(
                    "
                    SELECT COUNT(*) FROM $datatype WHERE $idname = '" . $userid . "'
                         and $column between DATE_ADD(NOW(), INTERVAL -11 DAY) and DATE_ADD(NOW(), INTERVAL -10 DAY)
                    "
                  );
                $minus11 = $wpdb->get_var(
                     "
                     SELECT COUNT(*) FROM $datatype WHERE $idname = '" . $userid . "'
                          and $column between DATE_ADD(NOW(), INTERVAL -12 DAY) and DATE_ADD(NOW(), INTERVAL -11 DAY)
                     "
                  );
                   $minus12 = $wpdb->get_var(
                      "
                      SELECT COUNT(*) FROM $datatype WHERE $idname = '" . $userid . "'
                           and $column between DATE_ADD(NOW(), INTERVAL -13 DAY) and DATE_ADD(NOW(), INTERVAL -12 DAY)
                      "
                    );
                    $minus13 = $wpdb->get_var(
                       "
                       SELECT COUNT(*) FROM $datatype WHERE $idname = '" . $userid . "'
                            and $column between DATE_ADD(NOW(), INTERVAL -14 DAY) and DATE_ADD(NOW(), INTERVAL -13 DAY)
                       "
                     );
                     $minus14 = $wpdb->get_var(
                        "
                        SELECT COUNT(*) FROM $datatype WHERE $idname = '" . $userid . "'
                             and $column between DATE_ADD(NOW(), INTERVAL -15 DAY) and DATE_ADD(NOW(), INTERVAL -14 DAY)
                        "
                      );


$total = $minus1 + $minus2 + $minus3 + $minus4 + $minus5 + $minus6 + $minus7;
$total2 = $minus8 + $minus9 + $minus10 + $minus11 + $minus12 + $minus13 + $minus14;

?>
