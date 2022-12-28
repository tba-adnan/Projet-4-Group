<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
    <div class="col-md-6 col-lg-6">
                <form class="card" action="{{ route('task.update',$edit->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                  <h5 class="card-title d-flex justify-content-center fw-400">Modifier une tache </h5>
                <div class="col-md-6 col-lg-6">
                    <form class="card" action="{{ route('task.update',$edit->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <h5 class="card-title d-flex justify-content-center fw-400">Ajouter une tache dans le brief X</h5>

                        <div class="card-body">
                            <div class="form-group">
                                <label class="text-muted" for="">Nom</label>
                                <input class="form-control rounded" type="text" value="{{$edit->Nom_tache}}" placeholder="" name="Nom_tache">
                                @error('Nom_tache')
                                <label style="color: red;">{{$message}}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-muted" for="">Description</label>
                                <input class="form-control rounded" type="text" value="{{$edit->Description}}" placeholder="" name="Description">
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="">Duree</label>
                                <input class="form-control rounded" value="{{$edit->Duree}}" type="text" placeholder="duree" name="Duree">
                                @error('Duree')
                                <label style="color: red;">{{$message}}</label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="">Brief</label>
                                <select class="btn form-control rounded btn-secondary dropdown-toggle ml-2" name="Preparation_brief_id" id="Preparation_brief_id">
                                    <option value="{{$edit->Preparation_brief_id}}">{{$edit->Preparation_brief_id}}</option>
                                    @foreach ($brief as $value)
                                    <option value="{{$value->id}}">{{$value->Nom_du_brief}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button class="btn  btn-primary">Enregirter</button>
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