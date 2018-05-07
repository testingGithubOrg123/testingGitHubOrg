<?php 

class boardClass {
		public function Draw_Table($intPlayerX, $intPlayerY, $intHurkleX, $intHurkleY, $intPlayerScore, $intPlayerMoves){
	
			$intYCounter = 0;
			$intXCounter = 0;
			$intHurkleXDistance = 0;
			$intHurkleYDistance = 0;
			/*$intPlayerX = $_SESSION['objPlayer']->getXPos();
			$intPlayerY = $_SESSION['objPlayer']->getYPos();
			$intHurkleX = $_SESSION['objHurkle']->getXPos();
			$intHurkleY = $_SESSION['objHurkle']->getYPos();*/
			
			if (($intHurkleX == $intPlayerX) and ($intHurkleY == $intPlayerY)) {
				if (($intPlayerX != 0) and ($intPlayerY != 0)) {
					echo "You've found the Hurkle!  </br>";
				}
			} else {
				echo "You hear the Hurkle somewhere ";
				$intHurkleYDistance = abs($intHurkleY - $intPlayerY);
				$intHurkleXDistance = abs($intHurkleX - $intPlayerX);
				if (($intHurkleXDistance > 6) or ($intHurkleYDistance > 6)) {
					echo "far";
				} elseif (($intHurkleXDistance < 3) and ($intHurkleYDistance < 3)) {
					echo "very close";
				}
				echo " to the ";
				if ($intHurkleY > $intPlayerY) {
					echo "south";
				} elseif ($intHurkleY < $intPlayerY) {
					echo "north";
				}
				if ($intHurkleX < $intPlayerX) {
					echo "west";
				} elseif ($intHurkleX > $intPlayerX) {
					echo "east";
				}
				echo " of you.</br></br>";
			}
		
			echo "</br><table id=\"table1\" border=\"1\">";
			for ($intYCounter=0; $intYCounter<=10; $intYCounter++) {
				echo "<tr>";
				for ($intXCounter=0; $intXCounter<=10; $intXCounter++) {
					if ($intYCounter == 0) {
						echo "<td align=\"center\" class=\"forest\">", print_r($intXCounter,1), "</td>";
					} elseif ($intXCounter == 0) {
						echo "<td align=\"center\" class=\"forest\">", print_r($intYCounter,1), "</td>";
					} elseif (($intXCounter == $intPlayerX) and ($intYCounter == $intPlayerY)) {
						echo "<td align=\"center\" class=\"player1\">0</td>";
					} else {
						echo "<td align=\"center\" class=\"farmland\">;</td>";
					}
					if ($intXCounter == 10) {
						echo "</tr>";
					}
				}
			}
			echo "</table></br>";
			
			echo "</br>";
			# echo "</br>Hurkle X: ", $_SESSION['objHurkle']->getXPos();
			# echo "</br>Hurkle Y: ", $_SESSION['objHurkle']->getYPos();
			# echo "</br>Player X: ", $_SESSION['objPlayer']->getXPos();
			# echo "</br>Player Y: ", $_SESSION['objPlayer']->getYPos();
			# echo "</br>Player Score: ", $_SESSION['objPlayer']->getScore();
			# echo "</br>Player Moves: ", $_SESSION['objPlayer']->getMoves();
			# echo "</br>Player Moves Remaining: ", 7 - $_SESSION['objPlayer']->getMoves();
			echo "</br>Hurkle X: ", $intHurkleX;
			echo "</br>Hurkle Y: ", $intHurkleY;
			echo "</br>Player X: ", $intPlayerX;
			echo "</br>Player Y: ", $intPlayerY;
			echo "</br>Player Score: ", $intPlayerScore;
			echo "</br>Player Moves: ", $intPlayerMoves;
			echo "</br>Player Moves Remaining: ", 7 - $intPlayerMoves;
			echo "</br></br>";
		}
	}



 ?>