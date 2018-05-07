<?php 

	class characterClass {
		/*
		Each object of class Character can have an X position, a Y position, and a score.
		The X and Y positions can be set randomly, or they can be set by an external source.
		*/
		public $intXPos = 0;
		public $intYPos = 0;
		public $intScore = 0;
		public $intMoves = 0;
		
		#Functions for setting values within class object.
		public function setXPos($intNewXPos){
			$this->intXPos = $intNewXPos;
		}
		public function setYPos($intNewYPos){
			$this->intYPos = $intNewYPos;
		}
		public function setScore($intNewScore){
			$this->intScore = $intNewScore;
		}
		public function setMoves($intNewMoves){
			$this->intMoves = $intNewMoves;
		}
	#Functions for returning values from within class object.
		public function getXPos(){
			return $this->intXPos;
		}
		public function getYPos(){
			return $this->intYPos;
		}
		public function getScore(){
			return $this->intScore;
		}
		public function getMoves(){
			return $this->intMoves;
		}
		#Set a random position.
		public function setRandomPos(){
			$this->intXPos = rand(1,10);
			$this->intYPos = rand(1,10);
		}
		#Reset the position to baseline.
		public function resetPos() {
			$this->intXPos = 0;
			$this->intYPos = 0;
			$this->intMoves = 0;
		}
		#Reset the score to baseline.
		public function resetScore() {
			$this->intScore = 0;
		}
		
	}




 ?>