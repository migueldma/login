<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comunes_lib {

        public function getDaySpanish($day) {
		    $days = array(
		        'Monday' => 'Lunes',
		        'Tuesday' => 'Martes',
		        'Wednesday' => 'Mi&eacute;rcoles',
		        'Thursday' => 'Jueves',
		        'Friday' => 'Viernes',
		        'Saturday' => 'S&aacute;bado',
		        'Sunday' => 'Domingo',
		    );
		    return $days[$day];
		}
		public function getMonthSpanish($month)
		{
		    $months_list = array(
		        "January" => "Enero",
		        "February" => "Febrero",
		        "March" => "Marzo",
		        "April" => "Abril",
		        "May" => "Mayo",
		        "June" => "Junio",
		        "July" => "Julio",
		        "August" => "Agosto",
		        "September" => "Septiembre",
		        "October" => "Octubre",
		        "November" => "Noviembre",
		        "December" => "Diciembre"
		    );
		    return $months_list[$month];
		}
}