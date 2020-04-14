<?php
function cate_parent($categories, $parent = 0, $str="")
{
	foreach ($categories as $cat) {
		if ($cat->parent_id == $parent && count($cat->courses) > 0 ) {
			echo "<li><a href=".route('get.course',[$cat->id,$cat->slug])."><b>".$str."</b>".$cat->name."</a></li>";
			// cate_parent($categories, $cat->id, $str."- ");
		}
	}
}

function getLessions($lessions, $course_id)
{
	foreach ($lessions as $lession){
		if ($lession->course_id == $course_id && count($lession->test->questions) > 0){ ?>
			<div class="col-sm-6 mb40">
				<div class="row">
					<div class="col-sm-12 col-xs-12">
						<h5><span><?php echo $lession->name ?></span></h5>
						<p class="mb20"><?php echo $lession->description ?></p>
						<a href="<?php route('get.detail.lession', [$lession->id, $lession->slug]) ?>" class="btn btn-primary btn-green">View Lession</a>
					</div>
				</div>
			</div>
<?php
		}
	}
}
?>
