@if(count($clients) > 0)
<div class="courses">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="teachers_title text-center">Our Clients</div>
			</div>
		</div>
		<div class="row">
			<div class="col">

				<!-- Courses Slider -->
				<div class="courses_slider_container">
					<div class="owl-carousel owl-theme courses_slider">

						@foreach($clients as $data)
						<!-- Slider Item -->
						<div class="teacher">
							<div class="teacher_image">
								<a href="{{$data['website_link']}}" target="_blank"><img id="detail_teacher" src="{{$data['logo']}}" class="img-thumbnail" style="width:100%;height:230px;"></a>
							</div>
						</div>
						@endforeach

					</div>



				</div>
			</div>
		</div>
	</div>
</div>
@endif