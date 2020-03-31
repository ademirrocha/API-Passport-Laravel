<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


  public function url_exists($url) {

    $ch = curl_init($url);
    
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);

    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return ($code == 200); // verifica se recebe "status OK"
}


public function YoutubeID($url)
{
    if(strlen($url) > 11)
    {
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) 
        {
            return $match[1];
        }
        else
            return false;
    }
    return $url;
}

    public function video(Request $request){


		$url = $request->video;

		$id_video = $this->YoutubeID($url);

		echo "id Video ".$id_video;

		if($id_video){

			//Verifica video do youtube

			$urlTemp = 'https://www.youtube.com/watch?v=jpW450Dt_lo&feature=youtu.be/'.$id_video.'?t=558';

			echo "</br>ID Video: ". $id_video.'<br>';

			if($this->url_exists($urlTemp)){

			 	$duration = $this->getYoutubeDuration($url);

				echo '<br> Duração: '.$duration.' segundos';
			} 

		}else{

			//Verifica video do vimeo

			$vimeoDuration = $this->getVimeoDuration($url);

   			echo "<br>Vimeo Duração: ".$vimeoDuration . ' segundos'; 
		}

		
	   
	}

	public function getYoutubeDuration($url){
		$ch = curl_init();
		$timeout = 0;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$conteudo = curl_exec ($ch);
		curl_close($ch);

		$duration = explode('<meta itemprop="duration" content="', $conteudo);

		$duration = explode('">', $duration[1]);
		$tempo = explode('PT', $duration[0]); //PT0M46S
		$min = explode('M', $tempo[1]); 
		$segundo = explode('S', $duration[0]); 
		$segundo = explode('M', $segundo[0]); 

		return (((int) $min[0] * 60) + (int) $segundo[1] - 1); //retorna tempo em segundos
		
	}

	public function getVimeoDuration($url){
		$ch = curl_init();
		$timeout = 0;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$conteudo = curl_exec ($ch);
		curl_close($ch);

		$duration = explode('"raw":205,"formatted":"', $conteudo);

		$tempo = explode('"}', $duration[1]); 

		
		$duration = explode(':', $tempo[0]);
		$min =  $duration[0];
		$segundo = $duration[1];

		 return (((int) $min * 60) + (int) $segundo); //retorna tempo em segundos
		
	}

		
}
