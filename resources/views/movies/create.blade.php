{{-- NOT USED --}}
{{-- NOT USED --}}
{{-- NOT USED --}}
{{-- NOT USED --}}
{{-- NOT USED --}}
{{-- NOT USED --}}
{{-- FOR TESTING --}}
<!DOCTYPE html>
<html>
<head>
	<title>Create Movie</title>
	<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
</head>
<body>
	<div class="container">
		<form action="{{ route('storemovie') }}" method="POST">
			@csrf
			<input type="text" class="form-control" name="title" placeholder="Movie Title">
			<input type="text" class="form-control" name="cover" placeholder="Movie Cover Image URL">
			<input type="number" class="form-control" name="length" placeholder="Movie Length In Minutes">
			<input type="text" class="form-control" name="lang" placeholder="Movie Language">
			<label for="rel_date">Release Date:</label>
  			<input type="date" id="rel_date" name="rel_date">
			<input type="text" class="form-control" name="rel_loc" placeholder="Movie Release Country">
			<label for="directors">Choose director for this movie:</label>
			<select name="directors" id="directors">
				@foreach ($directors as $director)
			    	<option value="{{ $director->dir_id }}">{{ $director->dir_name }}</option>
	        	@endforeach
        	</select></br>
        	<label><strong>Select Genre :</strong></label><br/>
            <select data-placeholder="Begin typing a name to filter..." multiple class="chosen-select form-control" name="genres[]">
              	@foreach ($genres as $genre)
		    		<option value="{{ $genre->gen_id }}">{{ $genre->gen_title }}</option>
        		@endforeach
            </select><br><br>

            <div class="input_fields_wrap">
			    <button type="button" class='create-actor'>Add Actor</button>
			    
			</div>

            <br>
			<button class="btn btn-primary">Submit</button>
		</form>
	</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>

<script type="text/javascript">
	const genres = {!! $genres->toJson() !!};
	const actors = {!! $actors->toJson() !!};
	//console.log(actors);
	$(".create-actor").click(function() {
		addActorField();
	});

	function addActorField() {
	    var wrapper = $(".input_fields_wrap");
	    var options;
		$.each( actors, function( key, value ) {
			console.log(value);
			options += '<option value="'+value.act_id+'">'+value.name+'</option>';
		});

		var actorField = '<div><select data-placeholder="Begin typing a name to filter..." class="chosen-select form-control" name="actors[]">' + options + '</select><input type="text" name="roles[]"/><a href="#" class="remove_field">Remove</a></div>';
		$(wrapper).append(actorField);
		//console.log(options);
	    //$(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>');

	    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	        e.preventDefault(); $(this).parent('div').remove();
	    })
	    $("select").chosen({
		  no_results_text: "Oops, nothing found!"
		});
	}
	$("select").chosen({
  		no_results_text: "Oops, nothing found!"
	});
    

</script>

</body>
</html>