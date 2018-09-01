<!-- create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel 5.6 CRUD Tutorial With Example </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
          rel="stylesheet">
    <script data-src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Pasarela de pago PSE</h2><br/>
            <form method="post" action="{{url('transaction')}}" enctype="multipart/form-data">

                @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Name">Nombre:</label>
                        <input type="text" class="form-control" name="firstName" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Name">Apellido:</label>
                        <input type="text" class="form-control" name="lastName" >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Email">Email:</label>
                        <input type="email" class="form-control" name="emailAddress" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Name">Direccion:</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <lable>Typo de documento:</lable>
                        <select name="documentType">
                            <option value="CC">Cédula de ciudanía colombiana</option>
                            <option value="CE">Cédula de extranjería</option>
                            <option value="TI">Tarjeta de identidad</option>
                            <option value="PPN">Pasaporte</option>
                            <option value="NIT">Número de identificación tributaria</option>
                            <option value="SSN">Social Security Number</option>
                        </select>
                        <input type="text" class="form-control" name="document" >
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Number">Compañia:</label>
                        <input type="text" class="form-control" name="company">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Number">Telefono:</label>
                        <input type="number" class="form-control" name="phone">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <lable>Indique el tipo de cuenta:</lable>
                        <select name="bankInterface">
                            <option value=0>Personas</option>
                            <option value=1>Empresas</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <lable>Seleccione el banco:</lable>
                        @if (is_array($banks))
                            <select name="bank">
                                @if (count($banks))
                                    @foreach($banks as $bank)
                                        <option value="{{ $bank->getCode() }}">{{ $bank->getName() }}</option>
                                    @endForeach
                                @endif
                            </select>
                        @else
                            {{$banks}}
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6" style="margin-top:60px">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <h2>Transacciones:</h2><br/>
            <div class="row">
                <div class="col-md-10">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            @if (count($columns))
                                @foreach($columns as $column)
                                    <td>{{ $column }}</td>
                                @endForeach
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($transactions))
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td> {{$transaction->transactionID}} </td>
                                    <td> {{isset($transaction->transactionInfo->responseReasonText) ? $transaction->transactionInfo->responseReasonText: $transaction->responseReasonText}} </td>
                                    <td> {{$transaction->user->firstName.' '.$transaction->user->lastName}} </td>
                                    <td> {{$transaction->user->emailAddress}} </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




</div>


</body>
</html>