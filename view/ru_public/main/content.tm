
%module_paginate% `
<div class="container-fluid scheme_all">

^start_repeat_scheme^
%name% %date% %little_scheme% %link% %setting_a% `
	<div class="card mt-3">
		<div class="card-body">
		<h5 class="card-title">%date% %name%</h5>
		<p class="card-text">%setting_a%</p>
		<p class="card-text">%little_scheme%</p>
		<a href="%name_site%/scheme/%link%" class="btn btn-dark">Открыть</a>
		<a href="%name_site%/scheme/redaction/%link%" class="btn btn-dark">Редактировать</a>
		</div>
	</div>
^end_repeat_scheme^
<br />
%module_paginate%



</div>