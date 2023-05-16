
%schemes% %setting_a% %name% %link% `
<div class="main_content">
	<div class = "string_count m-2">
		<h3>%setting_a%</h3>
	</div>
	<div class = "string_count m-3">
		<h2>%name%</h2>
	</div>
	<div class="form-floating m-3">
	  <textarea class="form-control" id="floatingTextarea" rows="100">%schemes%</textarea>
	  <label for="floatingTextarea">%name%</label>
	</div>
		
	

	<div class="add_foto">
		<form name="auth" action="/app/form/FormRoute.php" enctype="multipart/form-data" method="post">
			%csrf%
			<div class="input-group mb-3">
			  <span class="input-group-text" id="inputGroup-sizing-default">Уникальный код схемы</span>
			
			  <input type="text" value = "%link%" name = "link"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
			<div class="input-group mt-2">
			
			
			  <input type="file" class="form-control"  id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name = "file1">
			 
			</div>

			 <button type="submit" class="btn btn-outline-dark mt-2" id="submit" name="nameForm" value="new_foto">Загрузить файл</button>

		</form>

	</div>
	<div class = "block_foto">
^start_repeat_fotoone^
%name_image% `
	<div class = "fotoone">
		<img src="%name_site%/resourse/data/user_image/%name_image%" class="foto_one img-thumbnail" >
		<p class="title_foto">%name_image%</p>
	</div>
^end_repeat_fotoone^
	</div>
</div>