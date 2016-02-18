<?php
class CampoMinato{
	public $grid=array();
	public $width=10;
	public $height=10;
	public $size;
	private $nBombs;
	
	function setLevel($level='medium'){
		$this->size=$this->width*$this->height;
		$this->nBombs=(int)($this->size/6);
	}
	
	function createGrid(){
		$this->grid=array_fill(0, $this->size, 0);
		$cellsLeft=$this->size;
		$tempNBoms=$this->nBombs;
		for($i=0; $i<($this->size); $i++){
			$prob=rand(1, $cellsLeft);
			if($prob<=$tempNBoms){
				$this->grid[$i]=-1;
				$this->incCnt($i);
				$tempNBoms--;
			}
			$cellsLeft--;
		}
	}
	
	function incCnt($index){
		for($i=-1; $i<=1; $i++){
			$rowIndex=$index+($i*$this->width);
			for($j=$rowIndex-1; $j<=$rowIndex+1; $j++){
				if($j>=0 && $j<$this->size && $j!=$index){
					if($this->grid[$j]!=-1){
						$this->grid[$j]++;
					}
				}
			}
		}
	}
	
	function printGrid($grid){
		echo "<div><input id='flagBomb' type='checkbox'> Flag a bomb</div>";
		for($i=0; $i<($this->size); $i++){
			echo "<div id='cell_".$i."' class='cell' onClick='js:showCell(".$i.")'></div>";
		}
	}
	
	function testRandomness(){
		$testGridProb=array_fill(0, $this->size, 0);
		for($i=0; $i<1000; $i++){
			$this->createGrid();
			for($j=0; $j<($this->size); $j++){
				if($this->grid[$j]==1){
					$testGridProb[$j]++;
				}
			}
		}
		$this->printGrid($testGridProb);
	}
}

$campoMinato = new CampoMinato();
$campoMinato->setLevel();
$campoMinato->createGrid();

echo "<div class='grid'>";
$campoMinato->printGrid($campoMinato->grid);
echo "</div>";

//$campoMinato->testRandomness();
?>

<script type="text/javascript">
	var grid=new Array(
		<?php for($i=0; $i<($campoMinato->size); $i++){
			echo $campoMinato->grid[$i];
			if($i!=$campoMinato->size-1)
				echo ",";
		}?>
	);
	var gridShow=new Array();

	function showCell(index){
		var cellValue=grid[index];
		if(cellValue>=-1){
			var divFlagBomb = document.getElementById('flagBomb');
			var div = document.getElementById('cell_'+index);
			if(divFlagBomb.checked){
				if(cellValue<9){
					grid[index]=cellValue+10;
					div.className='cell cell_bomb';
					div.innerHTML="X";
				}else{
					grid[index]=cellValue-10;
					div.className='cell';
					div.innerHTML="";
				}
			}else if(cellValue<9){
				grid[index]=-2;
				if(cellValue==-1){
					alert('BOOOOOOM!\nGame over.');
					div.style.background="red";
				}else{
					div.style.background="#E8E8E8";
					if(cellValue==0){
						showNeighb(index);
					}else{
						styleCell(div, cellValue);
					}
				}
			}
		}
	}

	function styleCell(div, cellValue){
		div.innerHTML=cellValue;
		div.className="cell cell_"+cellValue;
	}

	function showNeighb(index){
		for(var i=-1; i<=1; i++){
			var rowIndex=index+(i*<?php echo $campoMinato->width?>);
			for(var j=rowIndex-1; j<=rowIndex+1; j++){
				if(j>=0 && j<<?php echo $campoMinato->size?> && j!=index){
					var cellValue=grid[j];
					grid[j]=-2;
					if(cellValue>=0){
						var div = document.getElementById('cell_'+j);
						div.style.background="#E8E8E8";
						if(cellValue==0){
							showNeighb(j);
						}else{
							styleCell(div, cellValue);
						}
					}
				}
			}
		}
	}
</script>

<style>
	.cell{
		background: #C0C0C0;
		margin: 2px 2px 2px 2px;
		float: left;
		width: 20px;
		height: 20px;
		text-align: center;
		cursor: pointer;
		font-weight:bold;
	}
	.cell_1{color: blue;}
	.cell_2{color: green;}
	.cell_3{color: red;}
	.cell_4{color: #000099;}
	.cell_5{color: brown;}
	.cell_6{color: orange;}
	.cell_7{color: yellow;}
	.cell_8{color: #700000;}
	.cell_bomb{background: black; color: white}
	
	.grid{
		width: <?php echo $campoMinato->width*24?>px;
		height: <?php echo $campoMinato->height*24?>px;
	}
</style>