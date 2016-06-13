<div class="modal fade" id="checkSheet" tabindex="-1" role="dialog" aria-labelledby="checklist">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="checklist">일일 점검표</h4>
			</div>
	  		<div class="modal-body">
				<table class='table table-condensed text-center'>
					<tr>
						<td></td>
						<?php 
						$max_diff = 7;
						if($day_diff < $max_diff) $max_diff = $day_diff;
						
						$water = array();
						$nutrition = array();
						$cleaning = array();
						foreach($actionLog as $key=>$value){
							if($value['action'] == 'water'){
								$water[substr($value['date'], 0, 10)] = 1;	
							}else if($value['action'] == 'nutrition'){
								$nutrition[substr($value['date'], 0, 10)] = 1;									
							}else if($value['action'] == 'clean'){
								$cleaning[substr($value['date'], 0, 10)] = 1;
							}
						}

						for($i = 0; $i < $max_diff ; $i++){
							$n = $i+1;	
							$c_date[] = date('Y-m-d',strtotime('+'.$i.' day', strtotime(substr($birth,0,10)))); 
							echo "<td>".$n."일차</td>";	
						}
						?>					
					</tr>
					<tr>
						<td>물주기</td>
						<?php 
						for($i = 0; $i < $max_diff ; $i++){
							if(isset($water[$c_date[$i]])) echo "<td>O</td>";
							else echo "<td>X</td>";
						}
						?>					
					</tr>
					<tr>
						<td>닦아주기</td>
						<?php 
						for($i = 0; $i < $max_diff ; $i++){
							if(isset($cleaning[$c_date[$i]])) echo "<td>O</td>";
							else echo "<td>X</td>";
						}
						?>				
					</tr>
					
					<tr>
						<td>영양</td>
						<?php 
						for($i = 0; $i < $max_diff ; $i++){
							if(isset($nutrition[$c_date[$i]])) echo "<td>O</td>";
							else echo "<td>X</td>";
						}
						?>				
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>