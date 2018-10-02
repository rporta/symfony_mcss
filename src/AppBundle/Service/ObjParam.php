<?
namespace AppBundle\Service;

class ObjParam
{
	protected function textColor($arg = NULL){	

		$textColor['red,0'] = "red-text text-lighten-5";
		$textColor['red,1'] = "red-text text-lighten-4";
		$textColor['red,2'] = "red-text text-lighten-3";
		$textColor['red,3'] = "red-text text-lighten-2";
		$textColor['red,4'] = "red-text text-lighten-1";
		$textColor['red,5'] = "red-text";
		$textColor['red,6'] = "red-text text-darken-1";
		$textColor['red,7'] = "red-text text-darken-2";
		$textColor['red,8'] = "red-text text-darken-3";
		$textColor['red,9'] = "red-text text-darken-4";
		$textColor['red,10'] = "red-text text-accent-1";
		$textColor['red,11'] = "red-text text-accent-2";
		$textColor['red,12'] = "red-text text-accent-3";
		$textColor['red,13'] = "red-text text-accent-4";

		$textColor['pink,0'] = "pink-text text-lighten-5";
		$textColor['pink,1'] = "pink-text text-lighten-4";
		$textColor['pink,2'] = "pink-text text-lighten-3";
		$textColor['pink,3'] = "pink-text text-lighten-2";
		$textColor['pink,4'] = "pink-text text-lighten-1";
		$textColor['pink,5'] = "pink-text";
		$textColor['pink,6'] = "pink-text text-darken-1";
		$textColor['pink,7'] = "pink-text text-darken-2";
		$textColor['pink,8'] = "pink-text text-darken-3";
		$textColor['pink,9'] = "pink-text text-darken-4";
		$textColor['pink,10'] = "pink-text text-accent-1";
		$textColor['pink,11'] = "pink-text text-accent-2";
		$textColor['pink,12'] = "pink-text text-accent-3";
		$textColor['pink,13'] = "pink-text text-accent-4";

		$textColor['purple,0'] = "purple-text text-lighten-5";
		$textColor['purple,1'] = "purple-text text-lighten-4";
		$textColor['purple,2'] = "purple-text text-lighten-3";
		$textColor['purple,3'] = "purple-text text-lighten-2";
		$textColor['purple,4'] = "purple-text text-lighten-1";
		$textColor['purple,5'] = "purple-text";
		$textColor['purple,6'] = "purple-text text-darken-1";
		$textColor['purple,7'] = "purple-text text-darken-2";
		$textColor['purple,8'] = "purple-text text-darken-3";
		$textColor['purple,9'] = "purple-text text-darken-4";
		$textColor['purple,10'] = "purple-text text-accent-1";
		$textColor['purple,11'] = "purple-text text-accent-2";
		$textColor['purple,12'] = "purple-text text-accent-3";
		$textColor['purple,13'] = "purple-text text-accent-4";

		$textColor['deep-purple,0'] = "deep-purple-text text-lighten-5";
		$textColor['deep-purple,1'] = "deep-purple-text text-lighten-4";
		$textColor['deep-purple,2'] = "deep-purple-text text-lighten-3";
		$textColor['deep-purple,3'] = "deep-purple-text text-lighten-2";
		$textColor['deep-purple,4'] = "deep-purple-text text-lighten-1";
		$textColor['deep-purple,5'] = "deep-purple-text";
		$textColor['deep-purple,6'] = "deep-purple-text text-darken-1";
		$textColor['deep-purple,7'] = "deep-purple-text text-darken-2";
		$textColor['deep-purple,8'] = "deep-purple-text text-darken-3";
		$textColor['deep-purple,9'] = "deep-purple-text text-darken-4";
		$textColor['deep-purple,10'] = "deep-purple-text text-accent-1";
		$textColor['deep-purple,11'] = "deep-purple-text text-accent-2";
		$textColor['deep-purple,12'] = "deep-purple-text text-accent-3";
		$textColor['deep-purple,13'] = "deep-purple-text text-accent-4";

		$textColor['indigo,0'] = "indigo-text text-lighten-5";
		$textColor['indigo,1'] = "indigo-text text-lighten-4";
		$textColor['indigo,2'] = "indigo-text text-lighten-3";
		$textColor['indigo,3'] = "indigo-text text-lighten-2";
		$textColor['indigo,4'] = "indigo-text text-lighten-1";
		$textColor['indigo,5'] = "indigo-text";
		$textColor['indigo,6'] = "indigo-text text-darken-1";
		$textColor['indigo,7'] = "indigo-text text-darken-2";
		$textColor['indigo,8'] = "indigo-text text-darken-3";
		$textColor['indigo,9'] = "indigo-text text-darken-4";
		$textColor['indigo,10'] = "indigo-text text-accent-1";
		$textColor['indigo,11'] = "indigo-text text-accent-2";
		$textColor['indigo,12'] = "indigo-text text-accent-3";
		$textColor['indigo,13'] = "indigo-text text-accent-4";

		$textColor['blue,0'] = "blue-text text-lighten-5";
		$textColor['blue,1'] = "blue-text text-lighten-4";
		$textColor['blue,2'] = "blue-text text-lighten-3";
		$textColor['blue,3'] = "blue-text text-lighten-2";
		$textColor['blue,4'] = "blue-text text-lighten-1";
		$textColor['blue,5'] = "blue-text";
		$textColor['blue,6'] = "blue-text text-darken-1";
		$textColor['blue,7'] = "blue-text text-darken-2";
		$textColor['blue,8'] = "blue-text text-darken-3";
		$textColor['blue,9'] = "blue-text text-darken-4";
		$textColor['blue,10'] = "blue-text text-accent-1";
		$textColor['blue,11'] = "blue-text text-accent-2";
		$textColor['blue,12'] = "blue-text text-accent-3";
		$textColor['blue,13'] = "blue-text text-accent-4";

		$textColor['light-blue,0'] = "light-blue-text text-lighten-5";
		$textColor['light-blue,1'] = "light-blue-text text-lighten-4";
		$textColor['light-blue,2'] = "light-blue-text text-lighten-3";
		$textColor['light-blue,3'] = "light-blue-text text-lighten-2";
		$textColor['light-blue,4'] = "light-blue-text text-lighten-1";
		$textColor['light-blue,5'] = "light-blue-text";
		$textColor['light-blue,6'] = "light-blue-text text-darken-1";
		$textColor['light-blue,7'] = "light-blue-text text-darken-2";
		$textColor['light-blue,8'] = "light-blue-text text-darken-3";
		$textColor['light-blue,9'] = "light-blue-text text-darken-4";
		$textColor['light-blue,10'] = "light-blue-text text-accent-1";
		$textColor['light-blue,11'] = "light-blue-text text-accent-2";
		$textColor['light-blue,12'] = "light-blue-text text-accent-3";
		$textColor['light-blue,13'] = "light-blue-text text-accent-4";

		$textColor['cyan,0'] = "cyan-text text-lighten-5";
		$textColor['cyan,1'] = "cyan-text text-lighten-4";
		$textColor['cyan,2'] = "cyan-text text-lighten-3";
		$textColor['cyan,3'] = "cyan-text text-lighten-2";
		$textColor['cyan,4'] = "cyan-text text-lighten-1";
		$textColor['cyan,5'] = "cyan-text";
		$textColor['cyan,6'] = "cyan-text text-darken-1";
		$textColor['cyan,7'] = "cyan-text text-darken-2";
		$textColor['cyan,8'] = "cyan-text text-darken-3";
		$textColor['cyan,9'] = "cyan-text text-darken-4";
		$textColor['cyan,10'] = "cyan-text text-accent-1";
		$textColor['cyan,11'] = "cyan-text text-accent-2";
		$textColor['cyan,12'] = "cyan-text text-accent-3";
		$textColor['cyan,13'] = "cyan-text text-accent-4";

		$textColor['teal,0'] = "teal-text text-lighten-5";
		$textColor['teal,1'] = "teal-text text-lighten-4";
		$textColor['teal,2'] = "teal-text text-lighten-3";
		$textColor['teal,3'] = "teal-text text-lighten-2";
		$textColor['teal,4'] = "teal-text text-lighten-1";
		$textColor['teal,5'] = "teal-text";
		$textColor['teal,6'] = "teal-text text-darken-1";
		$textColor['teal,7'] = "teal-text text-darken-2";
		$textColor['teal,8'] = "teal-text text-darken-3";
		$textColor['teal,9'] = "teal-text text-darken-4";
		$textColor['teal,10'] = "teal-text text-accent-1";
		$textColor['teal,11'] = "teal-text text-accent-2";
		$textColor['teal,12'] = "teal-text text-accent-3";
		$textColor['teal,13'] = "teal-text text-accent-4";

		$textColor['green,0'] = "green-text text-lighten-5";
		$textColor['green,1'] = "green-text text-lighten-4";
		$textColor['green,2'] = "green-text text-lighten-3";
		$textColor['green,3'] = "green-text text-lighten-2";
		$textColor['green,4'] = "green-text text-lighten-1";
		$textColor['green,5'] = "green-text";
		$textColor['green,6'] = "green-text text-darken-1";
		$textColor['green,7'] = "green-text text-darken-2";
		$textColor['green,8'] = "green-text text-darken-3";
		$textColor['green,9'] = "green-text text-darken-4";
		$textColor['green,10'] = "green-text text-accent-1";
		$textColor['green,11'] = "green-text text-accent-2";
		$textColor['green,12'] = "green-text text-accent-3";
		$textColor['green,13'] = "green-text text-accent-4";

		$textColor['light-green,0'] = "light-green-text text-lighten-5";
		$textColor['light-green,1'] = "light-green-text text-lighten-4";
		$textColor['light-green,2'] = "light-green-text text-lighten-3";
		$textColor['light-green,3'] = "light-green-text text-lighten-2";
		$textColor['light-green,4'] = "light-green-text text-lighten-1";
		$textColor['light-green,5'] = "light-green-text";
		$textColor['light-green,6'] = "light-green-text text-darken-1";
		$textColor['light-green,7'] = "light-green-text text-darken-2";
		$textColor['light-green,8'] = "light-green-text text-darken-3";
		$textColor['light-green,9'] = "light-green-text text-darken-4";
		$textColor['light-green,10'] = "light-green-text text-accent-1";
		$textColor['light-green,11'] = "light-green-text text-accent-2";
		$textColor['light-green,12'] = "light-green-text text-accent-3";
		$textColor['light-green,13'] = "light-green-text text-accent-4";

		$textColor['lime,0'] = "lime-text text-lighten-5";
		$textColor['lime,1'] = "lime-text text-lighten-4";
		$textColor['lime,2'] = "lime-text text-lighten-3";
		$textColor['lime,3'] = "lime-text text-lighten-2";
		$textColor['lime,4'] = "lime-text text-lighten-1";
		$textColor['lime,5'] = "lime-text";
		$textColor['lime,6'] = "lime-text text-darken-1";
		$textColor['lime,7'] = "lime-text text-darken-2";
		$textColor['lime,8'] = "lime-text text-darken-3";
		$textColor['lime,9'] = "lime-text text-darken-4";
		$textColor['lime,10'] = "lime-text text-accent-1";
		$textColor['lime,11'] = "lime-text text-accent-2";
		$textColor['lime,12'] = "lime-text text-accent-3";
		$textColor['lime,13'] = "lime-text text-accent-4";

		$textColor['yellow,0'] = "yellow-text text-lighten-5";
		$textColor['yellow,1'] = "yellow-text text-lighten-4";
		$textColor['yellow,2'] = "yellow-text text-lighten-3";
		$textColor['yellow,3'] = "yellow-text text-lighten-2";
		$textColor['yellow,4'] = "yellow-text text-lighten-1";
		$textColor['yellow,5'] = "yellow-text";
		$textColor['yellow,6'] = "yellow-text text-darken-1";
		$textColor['yellow,7'] = "yellow-text text-darken-2";
		$textColor['yellow,8'] = "yellow-text text-darken-3";
		$textColor['yellow,9'] = "yellow-text text-darken-4";
		$textColor['yellow,10'] = "yellow-text text-accent-1";
		$textColor['yellow,11'] = "yellow-text text-accent-2";
		$textColor['yellow,12'] = "yellow-text text-accent-3";
		$textColor['yellow,13'] = "yellow-text text-accent-4";

		$textColor['amber,0'] = "amber-text text-lighten-5";
		$textColor['amber,1'] = "amber-text text-lighten-4";
		$textColor['amber,2'] = "amber-text text-lighten-3";
		$textColor['amber,3'] = "amber-text text-lighten-2";
		$textColor['amber,4'] = "amber-text text-lighten-1";
		$textColor['amber,5'] = "amber-text";
		$textColor['amber,6'] = "amber-text text-darken-1";
		$textColor['amber,7'] = "amber-text text-darken-2";
		$textColor['amber,8'] = "amber-text text-darken-3";
		$textColor['amber,9'] = "amber-text text-darken-4";
		$textColor['amber,10'] = "amber-text text-accent-1";
		$textColor['amber,11'] = "amber-text text-accent-2";
		$textColor['amber,12'] = "amber-text text-accent-3";
		$textColor['amber,13'] = "amber-text text-accent-4";

		$textColor['orange,0'] = "orange-text text-lighten-5";
		$textColor['orange,1'] = "orange-text text-lighten-4";
		$textColor['orange,2'] = "orange-text text-lighten-3";
		$textColor['orange,3'] = "orange-text text-lighten-2";
		$textColor['orange,4'] = "orange-text text-lighten-1";
		$textColor['orange,5'] = "orange-text";
		$textColor['orange,6'] = "orange-text text-darken-1";
		$textColor['orange,7'] = "orange-text text-darken-2";
		$textColor['orange,8'] = "orange-text text-darken-3";
		$textColor['orange,9'] = "orange-text text-darken-4";
		$textColor['orange,10'] = "orange-text text-accent-1";
		$textColor['orange,11'] = "orange-text text-accent-2";
		$textColor['orange,12'] = "orange-text text-accent-3";
		$textColor['orange,13'] = "orange-text text-accent-4";

		$textColor['deep-orange,0'] = "deep-orange-text text-lighten-5";
		$textColor['deep-orange,1'] = "deep-orange-text text-lighten-4";
		$textColor['deep-orange,2'] = "deep-orange-text text-lighten-3";
		$textColor['deep-orange,3'] = "deep-orange-text text-lighten-2";
		$textColor['deep-orange,4'] = "deep-orange-text text-lighten-1";
		$textColor['deep-orange,5'] = "deep-orange-text";
		$textColor['deep-orange,6'] = "deep-orange-text text-darken-1";
		$textColor['deep-orange,7'] = "deep-orange-text text-darken-2";
		$textColor['deep-orange,8'] = "deep-orange-text text-darken-3";
		$textColor['deep-orange,9'] = "deep-orange-text text-darken-4";
		$textColor['deep-orange,10'] = "deep-orange-text text-accent-1";
		$textColor['deep-orange,11'] = "deep-orange-text text-accent-2";
		$textColor['deep-orange,12'] = "deep-orange-text text-accent-3";
		$textColor['deep-orange,13'] = "deep-orange-text text-accent-4";

		$textColor['brown,0'] = "brown-text text-lighten-5";
		$textColor['brown,1'] = "brown-text text-lighten-4";
		$textColor['brown,2'] = "brown-text text-lighten-3";
		$textColor['brown,3'] = "brown-text text-lighten-2";
		$textColor['brown,4'] = "brown-text text-lighten-1";
		$textColor['brown,5'] = "brown-text";
		$textColor['brown,6'] = "brown-text text-darken-1";
		$textColor['brown,7'] = "brown-text text-darken-2";
		$textColor['brown,8'] = "brown-text text-darken-3";
		$textColor['brown,9'] = "brown-text text-darken-4";

		$textColor['grey,0'] = "grey-text text-lighten-5";
		$textColor['grey,1'] = "grey-text text-lighten-4";
		$textColor['grey,2'] = "grey-text text-lighten-3";
		$textColor['grey,3'] = "grey-text text-lighten-2";
		$textColor['grey,4'] = "grey-text text-lighten-1";
		$textColor['grey,5'] = "grey-text";
		$textColor['grey,6'] = "grey-text text-darken-1";
		$textColor['grey,7'] = "grey-text text-darken-2";
		$textColor['grey,8'] = "grey-text text-darken-3";
		$textColor['grey,9'] = "grey-text text-darken-4";

		$textColor['blue-grey,0'] = "blue-grey-text text-lighten-5";
		$textColor['blue-grey,1'] = "blue-grey-text text-lighten-4";
		$textColor['blue-grey,2'] = "blue-grey-text text-lighten-3";
		$textColor['blue-grey,3'] = "blue-grey-text text-lighten-2";
		$textColor['blue-grey,4'] = "blue-grey-text text-lighten-1";
		$textColor['blue-grey,5'] = "blue-grey-text";
		$textColor['blue-grey,6'] = "blue-grey-text text-darken-1";
		$textColor['blue-grey,7'] = "blue-grey-text text-darken-2";
		$textColor['blue-grey,8'] = "blue-grey-text text-darken-3";
		$textColor['blue-grey,9'] = "blue-grey-text text-darken-4";

		$textColor['b-w-t,0'] = "black-text";
		$textColor['b-w-t,1'] = "white-text";
		if(is_null($arg)) return ($textColor);
		foreach ($textColor as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function backgroundColor($arg = NULL){
		$backgroundColor['red,0'] = "red lighten-5";
		$backgroundColor['red,1'] = "red lighten-4";
		$backgroundColor['red,2'] = "red lighten-3";
		$backgroundColor['red,3'] = "red lighten-2";
		$backgroundColor['red,4'] = "red lighten-1";
		$backgroundColor['red,5'] = "red";
		$backgroundColor['red,6'] = "red darken-1";
		$backgroundColor['red,7'] = "red darken-2";
		$backgroundColor['red,8'] = "red darken-3";
		$backgroundColor['red,9'] = "red darken-4";
		$backgroundColor['red,10'] = "red accent-1";
		$backgroundColor['red,11'] = "red accent-2";
		$backgroundColor['red,12'] = "red accent-3";
		$backgroundColor['red,13'] = "red accent-4";

		$backgroundColor['pink,0'] = "pink lighten-5";
		$backgroundColor['pink,1'] = "pink lighten-4";
		$backgroundColor['pink,2'] = "pink lighten-3";
		$backgroundColor['pink,3'] = "pink lighten-2";
		$backgroundColor['pink,4'] = "pink lighten-1";
		$backgroundColor['pink,5'] = "pink";
		$backgroundColor['pink,6'] = "pink darken-1";
		$backgroundColor['pink,7'] = "pink darken-2";
		$backgroundColor['pink,8'] = "pink darken-3";
		$backgroundColor['pink,9'] = "pink darken-4";
		$backgroundColor['pink,10'] = "pink accent-1";
		$backgroundColor['pink,11'] = "pink accent-2";
		$backgroundColor['pink,12'] = "pink accent-3";
		$backgroundColor['pink,13'] = "pink accent-4";

		$backgroundColor['purple,0'] = "purple lighten-5";
		$backgroundColor['purple,1'] = "purple lighten-4";
		$backgroundColor['purple,2'] = "purple lighten-3";
		$backgroundColor['purple,3'] = "purple lighten-2";
		$backgroundColor['purple,4'] = "purple lighten-1";
		$backgroundColor['purple,5'] = "purple";
		$backgroundColor['purple,6'] = "purple darken-1";
		$backgroundColor['purple,7'] = "purple darken-2";
		$backgroundColor['purple,8'] = "purple darken-3";
		$backgroundColor['purple,9'] = "purple darken-4";
		$backgroundColor['purple,10'] = "purple accent-1";
		$backgroundColor['purple,11'] = "purple accent-2";
		$backgroundColor['purple,12'] = "purple accent-3";
		$backgroundColor['purple,13'] = "purple accent-4";

		$backgroundColor['deep-purple,0'] = "deep-purple lighten-5";
		$backgroundColor['deep-purple,1'] = "deep-purple lighten-4";
		$backgroundColor['deep-purple,2'] = "deep-purple lighten-3";
		$backgroundColor['deep-purple,3'] = "deep-purple lighten-2";
		$backgroundColor['deep-purple,4'] = "deep-purple lighten-1";
		$backgroundColor['deep-purple,5'] = "deep-purple";
		$backgroundColor['deep-purple,6'] = "deep-purple darken-1";
		$backgroundColor['deep-purple,7'] = "deep-purple darken-2";
		$backgroundColor['deep-purple,8'] = "deep-purple darken-3";
		$backgroundColor['deep-purple,9'] = "deep-purple darken-4";
		$backgroundColor['deep-purple,10'] = "deep-purple accent-1";
		$backgroundColor['deep-purple,11'] = "deep-purple accent-2";
		$backgroundColor['deep-purple,12'] = "deep-purple accent-3";
		$backgroundColor['deep-purple,13'] = "deep-purple accent-4";

		$backgroundColor['indigo,0'] = "indigo lighten-5";
		$backgroundColor['indigo,1'] = "indigo lighten-4";
		$backgroundColor['indigo,2'] = "indigo lighten-3";
		$backgroundColor['indigo,3'] = "indigo lighten-2";
		$backgroundColor['indigo,4'] = "indigo lighten-1";
		$backgroundColor['indigo,5'] = "indigo";
		$backgroundColor['indigo,6'] = "indigo darken-1";
		$backgroundColor['indigo,7'] = "indigo darken-2";
		$backgroundColor['indigo,8'] = "indigo darken-3";
		$backgroundColor['indigo,9'] = "indigo darken-4";
		$backgroundColor['indigo,10'] = "indigo accent-1";
		$backgroundColor['indigo,11'] = "indigo accent-2";
		$backgroundColor['indigo,12'] = "indigo accent-3";
		$backgroundColor['indigo,13'] = "indigo accent-4";

		$backgroundColor['blue,0'] = "blue lighten-5";
		$backgroundColor['blue,1'] = "blue lighten-4";
		$backgroundColor['blue,2'] = "blue lighten-3";
		$backgroundColor['blue,3'] = "blue lighten-2";
		$backgroundColor['blue,4'] = "blue lighten-1";
		$backgroundColor['blue,5'] = "blue";
		$backgroundColor['blue,6'] = "blue darken-1";
		$backgroundColor['blue,7'] = "blue darken-2";
		$backgroundColor['blue,8'] = "blue darken-3";
		$backgroundColor['blue,9'] = "blue darken-4";
		$backgroundColor['blue,10'] = "blue accent-1";
		$backgroundColor['blue,11'] = "blue accent-2";
		$backgroundColor['blue,12'] = "blue accent-3";
		$backgroundColor['blue,13'] = "blue accent-4";

		$backgroundColor['light-blue,0'] = "light-blue lighten-5";
		$backgroundColor['light-blue,1'] = "light-blue lighten-4";
		$backgroundColor['light-blue,2'] = "light-blue lighten-3";
		$backgroundColor['light-blue,3'] = "light-blue lighten-2";
		$backgroundColor['light-blue,4'] = "light-blue lighten-1";
		$backgroundColor['light-blue,5'] = "light-blue";
		$backgroundColor['light-blue,6'] = "light-blue darken-1";
		$backgroundColor['light-blue,7'] = "light-blue darken-2";
		$backgroundColor['light-blue,8'] = "light-blue darken-3";
		$backgroundColor['light-blue,9'] = "light-blue darken-4";
		$backgroundColor['light-blue,10'] = "light-blue accent-1";
		$backgroundColor['light-blue,11'] = "light-blue accent-2";
		$backgroundColor['light-blue,12'] = "light-blue accent-3";
		$backgroundColor['light-blue,13'] = "light-blue accent-4";

		$backgroundColor['cyan,0'] = "cyan lighten-5";
		$backgroundColor['cyan,1'] = "cyan lighten-4";
		$backgroundColor['cyan,2'] = "cyan lighten-3";
		$backgroundColor['cyan,3'] = "cyan lighten-2";
		$backgroundColor['cyan,4'] = "cyan lighten-1";
		$backgroundColor['cyan,5'] = "cyan";
		$backgroundColor['cyan,6'] = "cyan darken-1";
		$backgroundColor['cyan,7'] = "cyan darken-2";
		$backgroundColor['cyan,8'] = "cyan darken-3";
		$backgroundColor['cyan,9'] = "cyan darken-4";
		$backgroundColor['cyan,10'] = "cyan accent-1";
		$backgroundColor['cyan,11'] = "cyan accent-2";
		$backgroundColor['cyan,12'] = "cyan accent-3";
		$backgroundColor['cyan,13'] = "cyan accent-4";

		$backgroundColor['teal,0'] = "teal lighten-5";
		$backgroundColor['teal,1'] = "teal lighten-4";
		$backgroundColor['teal,2'] = "teal lighten-3";
		$backgroundColor['teal,3'] = "teal lighten-2";
		$backgroundColor['teal,4'] = "teal lighten-1";
		$backgroundColor['teal,5'] = "teal";
		$backgroundColor['teal,6'] = "teal darken-1";
		$backgroundColor['teal,7'] = "teal darken-2";
		$backgroundColor['teal,8'] = "teal darken-3";
		$backgroundColor['teal,9'] = "teal darken-4";
		$backgroundColor['teal,10'] = "teal accent-1";
		$backgroundColor['teal,11'] = "teal accent-2";
		$backgroundColor['teal,12'] = "teal accent-3";
		$backgroundColor['teal,13'] = "teal accent-4";

		$backgroundColor['green,0'] = "green lighten-5";
		$backgroundColor['green,1'] = "green lighten-4";
		$backgroundColor['green,2'] = "green lighten-3";
		$backgroundColor['green,3'] = "green lighten-2";
		$backgroundColor['green,4'] = "green lighten-1";
		$backgroundColor['green,5'] = "green";
		$backgroundColor['green,6'] = "green darken-1";
		$backgroundColor['green,7'] = "green darken-2";
		$backgroundColor['green,8'] = "green darken-3";
		$backgroundColor['green,9'] = "green darken-4";
		$backgroundColor['green,10'] = "green accent-1";
		$backgroundColor['green,11'] = "green accent-2";
		$backgroundColor['green,12'] = "green accent-3";
		$backgroundColor['green,13'] = "green accent-4";

		$backgroundColor['light-green,0'] = "light-green lighten-5";
		$backgroundColor['light-green,1'] = "light-green lighten-4";
		$backgroundColor['light-green,2'] = "light-green lighten-3";
		$backgroundColor['light-green,3'] = "light-green lighten-2";
		$backgroundColor['light-green,4'] = "light-green lighten-1";
		$backgroundColor['light-green,5'] = "light-green";
		$backgroundColor['light-green,6'] = "light-green darken-1";
		$backgroundColor['light-green,7'] = "light-green darken-2";
		$backgroundColor['light-green,8'] = "light-green darken-3";
		$backgroundColor['light-green,9'] = "light-green darken-4";
		$backgroundColor['light-green,10'] = "light-green accent-1";
		$backgroundColor['light-green,11'] = "light-green accent-2";
		$backgroundColor['light-green,12'] = "light-green accent-3";
		$backgroundColor['light-green,13'] = "light-green accent-4";

		$backgroundColor['lime,0'] = "lime lighten-5";
		$backgroundColor['lime,1'] = "lime lighten-4";
		$backgroundColor['lime,2'] = "lime lighten-3";
		$backgroundColor['lime,3'] = "lime lighten-2";
		$backgroundColor['lime,4'] = "lime lighten-1";
		$backgroundColor['lime,5'] = "lime";
		$backgroundColor['lime,6'] = "lime darken-1";
		$backgroundColor['lime,7'] = "lime darken-2";
		$backgroundColor['lime,8'] = "lime darken-3";
		$backgroundColor['lime,9'] = "lime darken-4";
		$backgroundColor['lime,10'] = "lime accent-1";
		$backgroundColor['lime,11'] = "lime accent-2";
		$backgroundColor['lime,12'] = "lime accent-3";
		$backgroundColor['lime,13'] = "lime accent-4";

		$backgroundColor['yellow,0'] = "yellow lighten-5";
		$backgroundColor['yellow,1'] = "yellow lighten-4";
		$backgroundColor['yellow,2'] = "yellow lighten-3";
		$backgroundColor['yellow,3'] = "yellow lighten-2";
		$backgroundColor['yellow,4'] = "yellow lighten-1";
		$backgroundColor['yellow,5'] = "yellow";
		$backgroundColor['yellow,6'] = "yellow darken-1";
		$backgroundColor['yellow,7'] = "yellow darken-2";
		$backgroundColor['yellow,8'] = "yellow darken-3";
		$backgroundColor['yellow,9'] = "yellow darken-4";
		$backgroundColor['yellow,10'] = "yellow accent-1";
		$backgroundColor['yellow,11'] = "yellow accent-2";
		$backgroundColor['yellow,12'] = "yellow accent-3";
		$backgroundColor['yellow,13'] = "yellow accent-4";

		$backgroundColor['amber,0'] = "amber lighten-5";
		$backgroundColor['amber,1'] = "amber lighten-4";
		$backgroundColor['amber,2'] = "amber lighten-3";
		$backgroundColor['amber,3'] = "amber lighten-2";
		$backgroundColor['amber,4'] = "amber lighten-1";
		$backgroundColor['amber,5'] = "amber";
		$backgroundColor['amber,6'] = "amber darken-1";
		$backgroundColor['amber,7'] = "amber darken-2";
		$backgroundColor['amber,8'] = "amber darken-3";
		$backgroundColor['amber,9'] = "amber darken-4";
		$backgroundColor['amber,10'] = "amber accent-1";
		$backgroundColor['amber,11'] = "amber accent-2";
		$backgroundColor['amber,12'] = "amber accent-3";
		$backgroundColor['amber,13'] = "amber accent-4";

		$backgroundColor['orange,0'] = "orange lighten-5";
		$backgroundColor['orange,1'] = "orange lighten-4";
		$backgroundColor['orange,2'] = "orange lighten-3";
		$backgroundColor['orange,3'] = "orange lighten-2";
		$backgroundColor['orange,4'] = "orange lighten-1";
		$backgroundColor['orange,5'] = "orange";
		$backgroundColor['orange,6'] = "orange darken-1";
		$backgroundColor['orange,7'] = "orange darken-2";
		$backgroundColor['orange,8'] = "orange darken-3";
		$backgroundColor['orange,9'] = "orange darken-4";
		$backgroundColor['orange,10'] = "orange accent-1";
		$backgroundColor['orange,11'] = "orange accent-2";
		$backgroundColor['orange,12'] = "orange accent-3";
		$backgroundColor['orange,13'] = "orange accent-4";

		$backgroundColor['deep-orange,0'] = "deep-orange lighten-5";
		$backgroundColor['deep-orange,1'] = "deep-orange lighten-4";
		$backgroundColor['deep-orange,2'] = "deep-orange lighten-3";
		$backgroundColor['deep-orange,3'] = "deep-orange lighten-2";
		$backgroundColor['deep-orange,4'] = "deep-orange lighten-1";
		$backgroundColor['deep-orange,5'] = "deep-orange";
		$backgroundColor['deep-orange,6'] = "deep-orange darken-1";
		$backgroundColor['deep-orange,7'] = "deep-orange darken-2";
		$backgroundColor['deep-orange,8'] = "deep-orange darken-3";
		$backgroundColor['deep-orange,9'] = "deep-orange darken-4";
		$backgroundColor['deep-orange,10'] = "deep-orange accent-1";
		$backgroundColor['deep-orange,11'] = "deep-orange accent-2";
		$backgroundColor['deep-orange,12'] = "deep-orange accent-3";
		$backgroundColor['deep-orange,13'] = "deep-orange accent-4";

		$backgroundColor['brown,0'] = "brown lighten-5";
		$backgroundColor['brown,1'] = "brown lighten-4";
		$backgroundColor['brown,2'] = "brown lighten-3";
		$backgroundColor['brown,3'] = "brown lighten-2";
		$backgroundColor['brown,4'] = "brown lighten-1";
		$backgroundColor['brown,5'] = "brown";
		$backgroundColor['brown,6'] = "brown darken-1";
		$backgroundColor['brown,7'] = "brown darken-2";
		$backgroundColor['brown,8'] = "brown darken-3";
		$backgroundColor['brown,9'] = "brown darken-4";

		$backgroundColor['grey,0'] = "grey lighten-5";
		$backgroundColor['grey,1'] = "grey lighten-4";
		$backgroundColor['grey,2'] = "grey lighten-3";
		$backgroundColor['grey,3'] = "grey lighten-2";
		$backgroundColor['grey,4'] = "grey lighten-1";
		$backgroundColor['grey,5'] = "grey";
		$backgroundColor['grey,6'] = "grey darken-1";
		$backgroundColor['grey,7'] = "grey darken-2";
		$backgroundColor['grey,8'] = "grey darken-3";
		$backgroundColor['grey,9'] = "grey darken-4";

		$backgroundColor['blue-grey,0'] = "blue-grey lighten-5";
		$backgroundColor['blue-grey,1'] = "blue-grey lighten-4";
		$backgroundColor['blue-grey,2'] = "blue-grey lighten-3";
		$backgroundColor['blue-grey,3'] = "blue-grey lighten-2";
		$backgroundColor['blue-grey,4'] = "blue-grey lighten-1";
		$backgroundColor['blue-grey,5'] = "blue-grey";
		$backgroundColor['blue-grey,6'] = "blue-grey darken-1";
		$backgroundColor['blue-grey,7'] = "blue-grey darken-2";
		$backgroundColor['blue-grey,8'] = "blue-grey darken-3";
		$backgroundColor['blue-grey,9'] = "blue-grey darken-4";

		$backgroundColor['b-w-t,0'] = "black";
		$backgroundColor['b-w-t,1'] = "white";
		$backgroundColor['b-w-t,2'] = "transparent";
		if(is_null($arg)) return ($backgroundColor);
		foreach ($backgroundColor as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function float($arg = NULL){
		$float['l'] = "left";
		$float['c'] = "center";
		$float['r'] = "right";
		if(is_null($arg)) return ($float);
		foreach ($float as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function textAling($arg = NULL){
		$textAling['l'] = "left-align";
		$textAling['c'] = "center-align";
		$textAling['r'] = "right-align";
		if(is_null($arg)) return ($textAling);
		foreach ($textAling as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function waves($arg = NULL){
		$waves[] = "waves-effect";
		$waves[] = "waves-effect waves-light";
		$waves[] = "waves-effect waves-red";
		$waves[] = "waves-effect waves-yellow";
		$waves[] = "waves-effect waves-orange";
		$waves[] = "waves-effect waves-purple";
		$waves[] = "waves-effect waves-green";
		$waves[] = "waves-effect waves-teal";
		if(is_null($arg)) return ($waves);
		foreach ($waves as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function shadow($arg = NULL){
		$shadow[] = "z-depth-1";
		$shadow[] = "z-depth-2";
		$shadow[] = "z-depth-3";
		$shadow[] = "z-depth-4";
		$shadow[] = "z-depth-5";
		if(is_null($arg)) return ($shadow);
		foreach ($shadow as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function modeAlert($arg = NULL){
		$modeAlert['redirect'] = "redirect";
		$modeAlert['custom'] = "custom";
		if(is_null($arg)) return ($modeAlert);
		foreach ($modeAlert as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function modeCard($arg = NULL){
		$modeCard['basic'] = "basic";
		$modeCard['reveal'] = "reveal";
		if(is_null($arg)) return ($modeCard);
		foreach ($modeCard as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function orientationCard($arg = NULL){
		$orientationCard['horizontal'] = "horizontal";
		if(is_null($arg)) return ($orientationCard);
		foreach ($orientationCard as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function modePreloader($arg = NULL){
		$modePreloader['linear'] = "linear";
		$modePreloader['circular'] = "circular";
		$modePreloader['circularFlashing'] = "circularFlashing";
		if(is_null($arg)) return ($modePreloader);
		foreach ($modePreloader as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function sizeCard($arg = NULL){
		$sizeCard['s'] = "small";
		$sizeCard['m'] = "medium";
		$sizeCard['l'] = "large";
		if(is_null($arg)) return ($sizeCard);
		foreach ($sizeCard as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function edge($arg = NULL){
		$edge['l'] = "left";
		$edge['r'] = "right";
		if(is_null($arg)) return ($edge);
		foreach ($edge as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function sizeIcon($arg = NULL){
		$sizeIcon['t'] = "tiny";
		$sizeIcon['s'] = "small";
		$sizeIcon['m'] = "medium";
		$sizeIcon['l'] = "large";
		if(is_null($arg)) return ($sizeIcon);
		foreach ($sizeIcon as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function sizePreloader($arg = NULL){
		$sizePreloader['s'] = "small";
		$sizePreloader['m'] = "medium";
		$sizePreloader['b'] = "big";
		if(is_null($arg)) return ($sizePreloader);
		foreach ($sizePreloader as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function modeTable($arg = NULL){
		$sizePreloader['bordered'] = "bordered";
		$sizePreloader['striped'] = "striped";
		$sizePreloader['highlight'] = "highlight";
		$sizePreloader['responsive-table'] = "responsive-table";
		if(is_null($arg)) return ($sizePreloader);
		foreach ($sizePreloader as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function modeMedia($arg = NULL){
		$modeMedia['img'] = "img";
		$modeMedia['MaterialBox'] = "MaterialBox";
		$modeMedia['video'] = "video";
		if(is_null($arg)) return ($modeMedia);
		foreach ($modeMedia as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function modeChip($arg = NULL){
		$modeMedia['Contactos'] = "Contactos";
		$modeMedia['Etiquetas'] = "Etiquetas";
		if(is_null($arg)) return ($modeMedia);
		foreach ($modeMedia as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function sizeTitle($arg = NULL){
		$sizeTitle[1] = "1";
		$sizeTitle[2] = "2";
		$sizeTitle[3] = "3";
		$sizeTitle[4] = "4";
		$sizeTitle[5] = "5";
		$sizeTitle[6] = "6";

		if(is_null($arg)) return ($sizeTitle);
		foreach ($sizeTitle as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function modeInputinputButton($arg = NULL){
		$modeInputinputButton['a'] = "a";
		$modeInputinputButton['button'] = "button";
		if(is_null($arg)) return ($modeInputinputButton);
		foreach ($modeInputinputButton as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function modeInputRange($arg = NULL){
		$modeInputRange['noUiSlider'] = "noUiSlider";
		$modeInputRange['HTML5 Range'] = "HTML5 Range";
		if(is_null($arg)) return ($modeInputRange);
		foreach ($modeInputRange as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function modeInputSelect($arg = NULL){
		$modeInputSelect['single'] = "single";
		$modeInputSelect['icon'] = "icon";
		$modeInputSelect['browser'] = "browser";
		if(is_null($arg)) return ($modeInputSelect);
		foreach ($modeInputSelect as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function modeInputRadioButtons($arg = NULL){
		$modeInputRadioButtons['default'] = "";
		$modeInputRadioButtons['gap'] = "with-gap";
		if(is_null($arg)) return ($modeInputRadioButtons);
		foreach ($modeInputRadioButtons as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function modeInputCheckboxes($arg = NULL){
		$modeInputCheckboxes['default'] = "";
		$modeInputCheckboxes['filled'] = "filled-in";
		if(is_null($arg)) return ($modeInputCheckboxes);
		foreach ($modeInputCheckboxes as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}
	protected function modeInputFields($arg = NULL){
		$modeInputFields['text'] = "text";
		$modeInputFields['password'] = "password";
		$modeInputFields['email'] = "email";
		if(is_null($arg)) return ($modeInputFields);
		foreach ($modeInputFields as $key => $value) {
			if($value == $arg){
				return $key;
			}
		}
	}

}