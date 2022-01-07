@extends('layouts.app')

@section('content')
<h1 style = "text-align:center;">ZVANI</h1>
<table class="call_table" width="100%">
			<tr>
				<td class="subhead">Ienākošie</td>
				<td class="subhead">Izejošie</td>
				<td class="subhead">Ienākošie<br />neatbildēti</td>
				<td class="subhead">Izejošie)<br />neatbildēti</td>
			</tr>
            <tr>
                <td>{{$incall}}</td>
                <td>{{$outcall}}</td>
                <td>{{$missedIn}}</td>
                <td>{{$missedOut}}</td>
            </tr>

		</table>
<div class="row">
  <div class="column">
  <h2 class="sub-header" style="text-align:center;">Top zvanītāji</h2>
  <table class="table table-striped" style="text-align:center">
            <thead>
                <tr>
                    <th class="col-md-1">Kontaktpersona</th>
                    <th class="col-md-2">Kopā sekundes</th>
                    <th class="col-md-3">Kopā minūtes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($in_call_top as $call)
                <tr>
                    <th scope="row">{{ $call->attributes()->caller }}</th>
                    <td>{{ $call->attributes()->mins}}</td>
                    <td>{{ $call->attributes()->total}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
  <div class="column">
  <table class="table table-striped" style="text-align:center">
  <h2 class="sub-header" style="text-align:center;">Ienākošie neatbildētie zvani</h2>
            <thead>
                <tr>
                    <th class="col-md-1">Kontaktpersona</th>
                    <th class="col-md-2">Laiks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($missed_calls as $mcall)
                <tr>
                    <th scope="row">{{ $mcall->attributes()->caller }}</th>
                    <td>{{ $mcall->attributes()->CallTime}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
  <div class="column">
  <table class="table table-striped" style="text-align:center">
  <h2 class="sub-header" style="text-align:center;">Izejošie zvani</h2>
            <thead>
                <tr>
                    <th class="col-md-1">Kontaktpersona</th>
                    <th class="col-md-2">Laiks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($out_call as $ocall)
                <tr>
                    <th scope="row">{{ $ocall->attributes()->caller }}</th>
                    <td>{{ $ocall->attributes()->CallTime}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
</div>
        
        @endsection