<?
	Class Clases{
		function load($vals){
			$line = explode(",", $vals);
			
			Picaro::$nivel = $line[0];
			Soldado::$nivel = $line[1];
			Artesano::$nivel = $line[2];
			Piloto::$nivel = $line[3];
		}
	}

	Class Picaro{
		public static $nivel;
		
		function niveles(){
			switch (self::$nivel){
				case 1:
					$robo = 5;
					break;
				case 2:
					$robo = 5;
					$esc = 5;
					break;
				case 3:
					$robo = 5;
					$esc = 5;
					$ojo = true;
					break;
				case 4:
					$robo = 10;
					$esc = 5;
					$ojo = true;
					break;
				case 5:
					$robo = 10;
					$esc = 10;
					$ojo = true;
					break;
				case 6:
					$robo = 15;
					$esc = 10;
					$ojo = true;
					break;
				case 7:
					$robo = 15;
					$esc = 15;
					$ojo = true;
					break;
				case 8:
					$robo = 20;
					$esc = 15;
					$ojo = true;
					break;
				case 9:
					$robo = 20;
					$esc = 20;
					$ojo = true;
					break;
				case 10:
					$robo = 25;
					$esc = 25;
					$ojo = true;					
					break;
			}
			
			return array($robo, $esc, $ojo);
		}
		
		function habilidades(){
			$title = "<strong>Pícaro</strong> Nv ".Picaro::$nivel."<br/><br/>";
						
			list($robo, $esc, $ojo) = self::niveles();
			if ($robo >0) 	$title .="&nbsp;&nbsp;&nbsp;&nbsp;+<var>$robo</var>% de Créditos Robados.<br />";
			if ($esc > 0) 	$title .="&nbsp;&nbsp;&nbsp;&nbsp;+<var>$esc</var> a Esconderse.<br />";
			if ($ojo) 		$title .="&nbsp;&nbsp;&nbsp;&nbsp;Ojo de Ratero.<br />";
			
			return $title;
		}
	
	}
	
	
	
	Class Soldado{
		public static $nivel;
		
		function niveles(){
			switch (self::$nivel){
				case 1:
					$dmg = 5;
					break;
				case 2:
					$dmg = 10;
					break;
				case 3:
					$dmg = 15;
					break;
				case 4:
					$dmg = 20;
					break;
				case 5:
					$dmg = 25;
					break;
				case 6:
					$dmg = 30;
					break;
				case 7:
					$dmg = 35;
					break;
				case 8:
					$dmg = 40;
					break;
				case 9:
					$dmg = 45;
					break;
				case 10:
					$dmg = 50;
					break;
			}
			
			return $dmg;
		}
		
		function habilidades(){
			$title = "<strong>Soldado</strong> Nv ".Soldado::$nivel."<br/><br/>";
						
			if (self::niveles() > 0)	$title .="&nbsp;&nbsp;&nbsp;&nbsp;+<var>".self::niveles()."</var>% de Daño Máximo.<br />";
						
			return $title;
		}
	
	}
	
	
	
	
	Class Artesano{
		public static $nivel;
		
		function niveles(){
			switch (self::$nivel){
				case 1:
					$cra = 1;
					break;
				case 2:
					$cra = 1;
					$ser = 1;
					break;
				case 3:
					$cra = 2;
					$ser = 1;
					break;
				case 4:
					$cra = 2;
					$ser = 2;
					break;
				case 5:
					$cra = 3;
					$ser = 2;
					break;
				case 6:
					$cra = 3;
					$ser = 3;
					break;
				case 7:
					$cra = 4;
					$ser = 3;
					break;
				case 8:
					$cra = 4;
					$ser = 4;
					break;
				case 9:
					$cra = 5;
					$ser = 4;
					break;
				case 10:
					$cra = 5;
					$ser = 5;
					break;
			}
			
			return array($cra, $ser);
		}
		
		function habilidades(){
			$title = "<strong>Artesano</strong> Nv ".Artesano::$nivel."<br/><br/>";
						
			list($cra, $ser) = self::niveles();
			if ($cra >0)	$title .="&nbsp;&nbsp;&nbsp;&nbsp;+<var>$cra</var> en la Manufactura de Objetos.<br />";
			if ($ser >0)	$title .="&nbsp;&nbsp;&nbsp;&nbsp;+<var>$ser</var> a encontrar Objetos Raros.<br />";
						
			return $title;
		}
	
	}
	
	
	Class Piloto{
		public static $nivel;
		
		function niveles(){
			switch (self::$nivel){
				case 1:
					$pil = true;
					break;
				case 2:
					$pilotar = 1;
					$pil = true;
					break;
				case 3:
					$repo = 1;
					$pilotar = 1;
					$pil = true;
					break;
				case 4:
					$repo = 2;
					$pilotar = 1;
					$pil = true;
					break;
				case 5:
					$repo = 2;
					$pilotar = 2;
					$pil = true;
					break;
				case 6:
					$repo = 3;
					$pilotar = 2;
					$pil = true;
					break;
				case 7:
					$repo = 3;
					$pilotar = 3;
					$pil = true;
					break;
				case 8:
					$repo = 3;
					$pilotar = 3;
					$pil = true;
					$sab = 1;
					break;
				case 9:
					$repo = 3;
					$pilotar = 3;
					$pil = true;
					$sab = 2;
					break;
				case 10:
					$repo = 3;
					$pilotar = 3;
					$pil = true;
					$sab = 3;
					break;
			}
			
			return array($pil, $repo, $pilotar, $sab);
		}
		
		function habilidades(){
			$title = "<strong>Piloto</strong> Nv ".Piloto::$nivel."<br/><br/>";
						
			list($pil, $repo, $pilotar, $sab) = self::niveles();
			if ($pil) 			$title .="&nbsp;&nbsp;&nbsp;&nbsp;Puedes abrir rutas de viaje.<br />";
			if ($pilotar > 0) 	$title .="&nbsp;&nbsp;&nbsp;&nbsp;+<var>$pilotar</var> a Pilotar.<br />";
			if ($repo > 0) 		$title .="&nbsp;&nbsp;&nbsp;&nbsp;+<var>$repo</var> a Reparar.<br />";
			if ($sab > 0) 		$title .="&nbsp;&nbsp;&nbsp;&nbsp;+<var>$sab</var> a Sabotear.<br />";
						
			return $title;
		}
	
	}	
?>