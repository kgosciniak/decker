<html>
<head>
<title>Decker</title>

<style type="text/css">
table#cards th {
    color: white;
    background-color: black;
}
table#cards tr:nth-child(even) {
    background-color: #eee;
}
table#cards tr:nth-child(odd) {
   background-color:#fff;
}
a:visited {
	color: #0000FF;
}
</style>
<base target="_blank" />
</head>

<body>
<script type='text/javascript' src='http://www.bu.edu/tech/wp-includes/js/jquery/jquery.js?ver=1.11.1'></script>
<?php if($_SERVER['REQUEST_METHOD'] == 'POST') {
	// XXX: do i actually have to make a new one?
	$_controller = new Controller();
	$_controller->submit();
	die();
}
?>

<form name="deckForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div style="overflow: auto; width:420px; height:700px; float:left"><table id="cards" class="searchable sortable"><thead>
	<tr><th>In Pool</th><th>Index</th><th>Name</th><th>Mana Cost</th></tr></thead><tbody>
	<?php 
		
		foreach ($cards as $index => $card) {
			echo '<tr>';
			// XXX: rewrite this as a loop?
			echo '<td><select name="count['.$card->index.']">'
					.'<option selected="selected" value="0">0</option>'
					.'<option value="1">1</option>'
					.'<option value="2">2</option>'
					.'<option value="3">3</option>'
					.'<option value="4">4</option>'
					.'<option value="5">5</option>'
					.'<option value="6">6</option>'
					.'<option value="7">7</option>'
					.'<option value="8">8</option>'
					.'<option value="9">9</option>'
					.'<option value="10">10</option>'
					.'<option value="11">11</option>'
					.'<option value="12">12</option>'
				.'</select></td>';
			echo '<td align="right">'.$card->index.'</td><td><a href="index.php?card='.$card->name.'">'.$card->name.'</a></td>';
			echo '<td>'.$card->manaCost.'</td></tr>';
		}

	?>
</tbody></table></div>

<div style="float:left">
Deck size<br>
<input type="radio" name="size" value="40" checked>40<br>
<input type="radio" name="size" value="60" checked>60<br>
<br>Colors<br>
<input type="checkbox" name="colors[]" value="W">W<br>
<input type="checkbox" name="colors[]" value="U">U<br>
<input type="checkbox" name="colors[]" value="B">B<br>
<input type="checkbox" name="colors[]" value="R">R<br>
<input type="checkbox" name="colors[]" value="G">G<br>
<br>
<input type="submit" name="submit" value="Deck!">
</div>
</form>

</body>
</html>
