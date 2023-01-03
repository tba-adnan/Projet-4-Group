<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Briefs</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <form action="{{route('form')}}" method="post">
            @csrf

            <div class="table-title" style="text-align: center">
                <div class="row">
                    <div class="col-sm-8" >
                        <h2>Assigner un brief </h2>
                        <br>
                    </div>
                </div>
                <div class="col-sm-12 d-flex flex-end p-3">
                    {{-- select and choose Brief--}}
                    <select class="custom-select" id="select">
                        <option>Brief:</option>
                        @foreach ($brief as $value)
                        <option value="{{$value->id}}">
                            {{$value->Nom_du_brief}}
                        </option>
                        @endforeach
                    </select>
                    <span id="id_input"></span>
                    {{--  --}}

                    {{--select and filter/Promotion--}}
                    <select class="btn btn-dark dropdown-toggle" name="filter" id="filter">
                        <option>select Groupe</option>
                        @foreach ($promo as $value)
                        <option value="{{$value->id}}">{{$value->Nom_groupe}}</option>
                        @endforeach
                    </select>
                    {{--  --}}
                </div>
            </div>
            

            <table class="table table-hover">
                <thead class="table-primary">
                    <th>
                        <div class="form-check for-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" onclick='checkUncheck(this)'>
                            <label class="form-check-label" for="flexSwitchCheckDefault"
                            > Tous les Apprenants </label>
                        </div>
                    </th>
                </thead>
                    <tbody id="table1">

                    @if(count($apprenants)>0)
                        @foreach ($apprenants as $student)
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $student->id }}" id="defaultCheck1"
                                    name="ids[{{ $student->id }}]">
                                    <label class="form-check-label" for="defaultCheck1"> {{ $student->id }}&nbsp;{{ $student->Nom }}&nbsp;{{ $student->Prenom }} </label>
                                </div>
                            </td>
                        </tr>
                        @endforeach 
                    @else 
                    <tr>
                        <td>Aucun apprenant</td>
                    </tr>
                    @endif

                    </tbody>
                </table>

                <div class="d-flex justify-content-between">
                    <div class="d-flex justify-content-end">
                        <input type="submit" class="btn btn-outline-primary" value="Affecter"> 
                    </div>
                    <div class="d-flex justify-content-start">
                        {{-- {!! $apprenants->links() !!} --}}
                    </div>
                </div>

            </form>
            
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#filter').on('change',function(){
        $value=$(this).val();

        $.ajax({
            type:'get',
            url:'{{route("filter_par_group")}}',
            data:{'filter':$value},

            success:function(data){

                console.log(data);
                var apprenants=data.apprenants;
                var html='';

                if(apprenants.length>0){
                    for(let i=0;i<apprenants.length;i++){
                    html+=
                        '<tr>\
                            <td>\
                                <div class="form-check">\
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="student">\
                                    <label class="form-check-label" for="defaultCheck1">\
                                        '+apprenants[i]['Nom']+' &nbsp; '+ apprenants[i]['Prenom']+'\
                                    </label>\
                            </div>\
                            </td>\
                        </tr>';
                    }
                }
                else{
                    html+='<tr>\
                    <td>Aucun apprenant</td>\
                    </tr>';
                }
                $('#table1').html(html);
            }
        });
    })

    $('#select').on('change',function(){
        $value=$(this).val();
        // alert($value);
        document.getElementById("id_input").innerHTML = $value;
    })


    function checkUncheck(main) {
        all = document.getElementsbyName("ids[{{ $student->id }}]");
        for(var a=0;a<all.length;a++){
            all[a].checked =main.checked;
        }
    }
</script>
</body>
</html>
