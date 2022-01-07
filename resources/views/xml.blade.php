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


<h1 style = "text-align:center; padding-top:60px;">E-PASTI</h1>
<table class="call_table" width="100%">
			<tr>
				<td class="subhead">Šodien ienākošie</td>
				<td class="subhead">Šodien nepiesaistītie</td>
				<td class="subhead">Šodien pabeigtie</td>
				<td class="subhead">Šodien nepabeigtie</td>
			</tr>
            <tr>
                <td>{{$MasterToday}}</td>
                <td>{{$MasterTodayUnasigned}}</td>
                <td>{{$MasterTodayDone }}</td>
                <td>{{$MasterTodayUndone}}</td>
            </tr>

		</table>
<div>
  <div >
  <h2 class="sub-header" style="text-align:center;">Šodien saņemtie, bet nepiesaistītie e-pasti({{$cUnasigned}})</h2>
  <table class="table table-striped" style="text-align:center">
            <thead>
                <tr>
                    <th class="col-md-1">Directo event kods</th>
                    <th class="col-md-2">Klients</th>
                    <th class="col-md-2">E-pasta temats</th>
                    <th class="col-md-3">E-pasta saturs</th>
                    <th class="col-md-3">Iesūtīšanas laiks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($unasigned_events_today as $event)
                <tr>
                    <th scope="row">{{ $event->attributes()->Code }}</th>
                    <td>{{ $event->attributes()->Customer}}</td>
                    <td style="text-align:left;">{{ $event->attributes()->Subject}}</td>
                    <td style="text-align:left;">{{ $event->attributes()->Content}}</td>
                    <td>{{ $event->attributes()->StartDate}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
</div>
        
<table class="call_table" width="100%">
			<tr>
				<td class="subhead">Šonedēļ ienākošie</td>
				<td class="subhead">Šonedēļ nepiesaistītie</td>
				<td class="subhead">Šonedēļ pabeigtie</td>
				<td class="subhead">Šonedēļ nepabeigtie</td>
			</tr>
            <tr>
                <td>{{$MasterThisWeek}}</td>
                <td>{{$MasterThisWeekUnasigned}}</td>
                <td>{{$MasterThisWeekDone }}</td>
                <td>{{$MasterThisWeekUndone}}</td>
            </tr>

		</table>
<div>
  <div >
  <h2 class="sub-header" style="text-align:center;">Šonedēļ saņemtie, bet nepiesaistītie e-pasti({{$cUnasigned_prev}})</h2>
  <table class="table table-striped" style="text-align:center">
            <thead>
                <tr>
                    <th class="col-md-1">Directo event kods</th>
                    <th class="col-md-2">Klients</th>
                    <th class="col-md-2">E-pasta temats</th>
                    <th class="col-md-3">E-pasta saturs</th>
                    <th class="col-md-3">Iesūtīšanas laiks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($unasigned_events as $event)
                <tr>
                    <th scope="row">{{ $event->attributes()->Code }}</th>
                    <td>{{ $event->attributes()->Customer}}</td>
                    <td style="text-align:left;">{{ $event->attributes()->Subject}}</td>
                    <td style="text-align:left;">{{ $event->attributes()->Content}}</td>
                    <td>{{ $event->attributes()->StartDate}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
</div>
        @endsection