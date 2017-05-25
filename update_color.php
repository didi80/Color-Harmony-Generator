<?php

if(isset($_POST['color'])) {

	include('class/color_harmony.class.php'); 
	$c = new colorHarmony;  
	$hex = $_POST['color'];	
	$c->isHEX($hex);

	if($c->HEXError==0) {

		echo '<hr />';

		if($_POST['type']==0) {

			// Monochromatic
			$RH1= $c->Monochromatic($hex);			

			for($i=0;$i<8;$i++) {
				$RGB1[$i] = $c->HEX2RGB($RH1[$i]);
			}
			
			echo '<h3>Monochromatic</h3>';
			echo '<table class="result-colors" border="0" cellspacing="10" cellpadding="0">
			<tr>
				<th>Color 1</th>
				<th>Color 2</th>
				<th>Color 3</th>
				<th>Color 4</th>
				<th>Color 5</th>
				<th>Color 6</th>
				<th>Color 7</th>
				<th>Color 8</th>
			</tr>
			<tr>
				<td class="cr" bgcolor="'.$RH1[0].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH1[1].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH1[2].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH1[3].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH1[4].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH1[5].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH1[6].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH1[7].'">&nbsp;</td>
			<tr>
				<td>'.$RH1[0].'<br />Red = '.$RGB1[0][0].'<br />Green = '.$RGB1[0][1].'<br />Blue = '.$RGB1[0][2].'</td>
				<td>'.$RH1[1].'<br />Red = '.$RGB1[1][0].'<br />Green = '.$RGB1[1][1].'<br />Blue = '.$RGB1[1][2].'</td>
				<td>'.$RH1[2].'<br />Red = '.$RGB1[2][0].'<br />Green = '.$RGB1[2][1].'<br />Blue = '.$RGB1[2][2].'</td>
				<td>'.$RH1[3].'<br />Red = '.$RGB1[3][0].'<br />Green = '.$RGB1[3][1].'<br />Blue = '.$RGB1[3][2].'</td>
				<td>'.$RH1[4].'<br />Red = '.$RGB1[4][0].'<br />Green = '.$RGB1[4][1].'<br />Blue = '.$RGB1[4][2].'</td>
				<td>'.$RH1[5].'<br />Red = '.$RGB1[5][0].'<br />Green = '.$RGB1[5][1].'<br />Blue = '.$RGB1[5][2].'</td>
				<td>'.$RH1[6].'<br />Red = '.$RGB1[6][0].'<br />Green = '.$RGB1[6][1].'<br />Blue = '.$RGB1[6][2].'</td>
				<td>'.$RH1[7].'<br />Red = '.$RGB1[7][0].'<br />Green = '.$RGB1[7][1].'<br />Blue = '.$RGB1[7][2].'</td>
			</tr>
			</tr>
			</table>';

			// Analogous
			$RH2= $c->Analogous($hex);			

			for($i=0;$i<8;$i++) {
				$RGB2[$i] = $c->HEX2RGB($RH2[$i]);
			}
			
			echo '<h3>Analogous</h3>';
			echo '<table class="result-colors" border="0" cellspacing="10" cellpadding="0">
			<tr>
				<th>Color 1</th>
				<th>Color 2</th>
				<th>Color 3</th>
				<th>Color 4</th>
				<th>Color 5</th>
				<th>Color 6</th>
				<th>Color 7</th>
				<th>Color 8</th>
			</tr>
			<tr>
				<td class="cr" bgcolor="'.$RH2[0].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH2[1].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH2[2].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH2[3].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH2[4].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH2[5].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH2[6].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH2[7].'">&nbsp;</td>
			<tr>
				<td>'.$RH2[0].'<br />Red = '.$RGB2[0][0].'<br />Green = '.$RGB2[0][1].'<br />Blue = '.$RGB2[0][2].'</td>
				<td>'.$RH2[1].'<br />Red = '.$RGB2[1][0].'<br />Green = '.$RGB2[1][1].'<br />Blue = '.$RGB2[1][2].'</td>
				<td>'.$RH2[2].'<br />Red = '.$RGB2[2][0].'<br />Green = '.$RGB2[2][1].'<br />Blue = '.$RGB2[2][2].'</td>
				<td>'.$RH2[3].'<br />Red = '.$RGB2[3][0].'<br />Green = '.$RGB2[3][1].'<br />Blue = '.$RGB2[3][2].'</td>
				<td>'.$RH2[4].'<br />Red = '.$RGB2[4][0].'<br />Green = '.$RGB2[4][1].'<br />Blue = '.$RGB2[4][2].'</td>
				<td>'.$RH2[5].'<br />Red = '.$RGB2[5][0].'<br />Green = '.$RGB2[5][1].'<br />Blue = '.$RGB2[5][2].'</td>
				<td>'.$RH2[6].'<br />Red = '.$RGB2[6][0].'<br />Green = '.$RGB2[6][1].'<br />Blue = '.$RGB2[6][2].'</td>
				<td>'.$RH2[7].'<br />Red = '.$RGB2[7][0].'<br />Green = '.$RGB2[7][1].'<br />Blue = '.$RGB2[7][2].'</td>
			</tr>
			</tr>
			</table>';

			// Complementary
			$RH3= $c->Complementary($hex);			

			for($i=0;$i<8;$i++) {
				$RGB3[$i] = $c->HEX2RGB($RH3[$i]);
			}
			
			echo '<h3>Complementary</h3>';
			echo '<table class="result-colors" border="0" cellspacing="10" cellpadding="0">
			<tr>
				<th>Color 1</th>
				<th>Color 2</th>
				<th>Color 3</th>
				<th>Color 4</th>
				<th>Color 5</th>
				<th>Color 6</th>
				<th>Color 7</th>
				<th>Color 8</th>
			</tr>
			<tr>
				<td class="cr" bgcolor="'.$RH3[0].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH3[1].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH3[2].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH3[3].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH3[4].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH3[5].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH3[6].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH3[7].'">&nbsp;</td>
			<tr>
				<td>'.$RH3[0].'<br />Red = '.$RGB3[0][0].'<br />Green = '.$RGB3[0][1].'<br />Blue = '.$RGB3[0][2].'</td>
				<td>'.$RH3[1].'<br />Red = '.$RGB3[1][0].'<br />Green = '.$RGB3[1][1].'<br />Blue = '.$RGB3[1][2].'</td>
				<td>'.$RH3[2].'<br />Red = '.$RGB3[2][0].'<br />Green = '.$RGB3[2][1].'<br />Blue = '.$RGB3[2][2].'</td>
				<td>'.$RH3[3].'<br />Red = '.$RGB3[3][0].'<br />Green = '.$RGB3[3][1].'<br />Blue = '.$RGB3[3][2].'</td>
				<td>'.$RH3[4].'<br />Red = '.$RGB3[4][0].'<br />Green = '.$RGB3[4][1].'<br />Blue = '.$RGB3[4][2].'</td>
				<td>'.$RH3[5].'<br />Red = '.$RGB3[5][0].'<br />Green = '.$RGB3[5][1].'<br />Blue = '.$RGB3[5][2].'</td>
				<td>'.$RH3[6].'<br />Red = '.$RGB3[6][0].'<br />Green = '.$RGB3[6][1].'<br />Blue = '.$RGB3[6][2].'</td>
				<td>'.$RH3[7].'<br />Red = '.$RGB3[7][0].'<br />Green = '.$RGB3[7][1].'<br />Blue = '.$RGB3[7][2].'</td>
			</tr>
			</tr>
			</table>';

			// Triads
			$RH4= $c->Triads($hex);			

			for($i=0;$i<8;$i++) {
				$RGB4[$i] = $c->HEX2RGB($RH4[$i]);
			}
			
			echo '<h3>Triads</h3>';
			echo '<table class="result-colors" border="0" cellspacing="10" cellpadding="0">
			<tr>
				<th>Color 1</th>
				<th>Color 2</th>
				<th>Color 3</th>
				<th>Color 4</th>
				<th>Color 5</th>
				<th>Color 6</th>
				<th>Color 7</th>
				<th>Color 8</th>
			</tr>
			<tr>
				<td class="cr" bgcolor="'.$RH4[0].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH4[1].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH4[2].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH4[3].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH4[4].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH4[5].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH4[6].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH4[7].'">&nbsp;</td>
			<tr>
				<td>'.$RH4[0].'<br />Red = '.$RGB4[0][0].'<br />Green = '.$RGB4[0][1].'<br />Blue = '.$RGB4[0][2].'</td>
				<td>'.$RH4[1].'<br />Red = '.$RGB4[1][0].'<br />Green = '.$RGB4[1][1].'<br />Blue = '.$RGB4[1][2].'</td>
				<td>'.$RH4[2].'<br />Red = '.$RGB4[2][0].'<br />Green = '.$RGB4[2][1].'<br />Blue = '.$RGB4[2][2].'</td>
				<td>'.$RH4[3].'<br />Red = '.$RGB4[3][0].'<br />Green = '.$RGB4[3][1].'<br />Blue = '.$RGB4[3][2].'</td>
				<td>'.$RH4[4].'<br />Red = '.$RGB4[4][0].'<br />Green = '.$RGB4[4][1].'<br />Blue = '.$RGB4[4][2].'</td>
				<td>'.$RH4[5].'<br />Red = '.$RGB4[5][0].'<br />Green = '.$RGB4[5][1].'<br />Blue = '.$RGB4[5][2].'</td>
				<td>'.$RH4[6].'<br />Red = '.$RGB4[6][0].'<br />Green = '.$RGB4[6][1].'<br />Blue = '.$RGB4[6][2].'</td>
				<td>'.$RH4[7].'<br />Red = '.$RGB4[7][0].'<br />Green = '.$RGB4[7][1].'<br />Blue = '.$RGB4[7][2].'</td>
			</tr>
			</tr>
			</table>';

		} else {

			if($_POST['type']==1) {
				$RH= $c->Monochromatic($hex);
				$color_title = 'Monochromatic';
			}

			if($_POST['type']==2) {
				$RH= $c->Analogous($hex);
				$color_title = 'Analogous';
			}

			if($_POST['type']==3) {
				$RH= $c->Complementary($hex);
				$color_title = 'Complementary';
			}

			if($_POST['type']==4) {
				$RH= $c->Triads($hex);
				$color_title = 'Triads';
			}

			for($i=0;$i<8;$i++) {
				$RGB[$i] = $c->HEX2RGB($RH[$i]);
			}

			echo '<h3>'.$color_title.'</h3>';
			echo '<table class="result-colors" border="0" cellspacing="10" cellpadding="0">
			<tr>
				<th>Color 1</th>
				<th>Color 2</th>
				<th>Color 3</th>
				<th>Color 4</th>
				<th>Color 5</th>
				<th>Color 6</th>
				<th>Color 7</th>
				<th>Color 8</th>
			</tr>
			<tr>
				<td class="cr" bgcolor="'.$RH[0].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH[1].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH[2].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH[3].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH[4].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH[5].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH[6].'">&nbsp;</td>
				<td class="cr" bgcolor="'.$RH[7].'">&nbsp;</td>
			<tr>
				<td>'.$RH[0].'<br />Red = '.$RGB[0][0].'<br />Green = '.$RGB[0][1].'<br />Blue = '.$RGB[0][2].'</td>
				<td>'.$RH[1].'<br />Red = '.$RGB[1][0].'<br />Green = '.$RGB[1][1].'<br />Blue = '.$RGB[1][2].'</td>
				<td>'.$RH[2].'<br />Red = '.$RGB[2][0].'<br />Green = '.$RGB[2][1].'<br />Blue = '.$RGB[2][2].'</td>
				<td>'.$RH[3].'<br />Red = '.$RGB[3][0].'<br />Green = '.$RGB[3][1].'<br />Blue = '.$RGB[3][2].'</td>
				<td>'.$RH[4].'<br />Red = '.$RGB[4][0].'<br />Green = '.$RGB[4][1].'<br />Blue = '.$RGB[4][2].'</td>
				<td>'.$RH[5].'<br />Red = '.$RGB[5][0].'<br />Green = '.$RGB[5][1].'<br />Blue = '.$RGB[5][2].'</td>
				<td>'.$RH[6].'<br />Red = '.$RGB[6][0].'<br />Green = '.$RGB[6][1].'<br />Blue = '.$RGB[6][2].'</td>
				<td>'.$RH[7].'<br />Red = '.$RGB[7][0].'<br />Green = '.$RGB[7][1].'<br />Blue = '.$RGB[7][2].'</td>
			</tr>
			</tr>
			</table>';

		}

	}
}

?>