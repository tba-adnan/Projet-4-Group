<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter tache</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
    <div class="col-md-6 col-lg-6">
                <form class="card" action="{{ route('task.store') }}" method="POST">
                    @csrf
                  <h5 class="card-title d-flex justify-content-center fw-400">Ajouter une tache</h5>
              <div class="card-body">
                            <div class="form-group">
                                <label class="text-muted" for="">Nom</label>
                                <input class="form-control rounded" type="text" placeholder="" value="{{old('Nom_tache')}}" name="Nom_tache">
                                @error('Nom_tache')
                                    <label style="color: red;">{{$message}}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-muted" for="">Description</label>
                                <input class="form-control rounded" type="text" placeholder="" name="Description">
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="">Duree</label>
                                <input class="form-control rounded" type="text" value="{{old('Duree')}}" placeholder="duree" name="Duree">
                                @error('Duree')
                                    <label style="color: red;">{{$message}}</label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="">Brief</label>
                                <select class="btn form-control rounded btn-secondary dropdown-toggle ml-2" name="Preparation_brief_id" id="Preparation_brief_id">
                                    <option value="">select brief</option>
                                    @foreach ($brief as $value)
                                    <option value="{{$value->id}}">{{$value->Nom_du_brief}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <button class="btn  btn-primary">Ajouter</button>
                                <a class="btn  btn-secondary" href="{{ route('task.index') }}">Annuler</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html>
<head>
	<title>Laravel Pagination With search with list of workers</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1>Laravel Pagination With search with list of workers</h2><br/>
	
	<div class="panel panel-primary">
	  <div class="panel-body">
	    	<form method="GET" action="{{ route('workers-orders') }}">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" name="titlesearch" class="form-control" placeholder="Enter Title For Search" value="{{ old('titlesearch') }}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<button class="btn btn-info ">Search</button>
						</div>
					</div>
				</div>
			</form>
			<table class="table table-bordered">
				<thead>
					<th>Id</th>
					<th>Title</th>
					<th>Creation Date</th>
					<th>Updated Date</th>
				</thead>
				<tbody>
					@if($workers->count())
						@foreach($workers as $key => $worker)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ $worker->title }}</td>
								<td>{{ $worker->created_at }}</td>
								<td>{{ $worker->updated_at }}</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan="4">There are no data.</td>
						</tr>
					@endif
				</tbody>
			</table>
			{{ $workers->links() }}
	  </div>
	</div>
</div>
</body>
</html>