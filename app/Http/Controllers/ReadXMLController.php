<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReadXMLController extends Controller
{
    public function read_xml()
    {
        #Function for parsing XML

        $url = "https://login.directo.ee/xmlcore/aim_solutions_lv/xmlcore.asp?get=1&what=event2&key=2A0723811B26C14B0EDC4EE203DE9C37";
        $xml = simplexml_load_file($url); #Load XML from URL

        $z =  $xml['code'];

        if(empty($z)){
        $unasigned_events = ($xml->events2->unasigned_event_prev);
        $in_call_top = ($xml->events2->in_call_top);
        $missed_calls = ($xml->events2->missed_call);
        $customer = ( $xml->events2->unasigned_event_prev['Customer'] );
        $cUnasigned = ( $xml->events2->unasigned_event->count() );
        $cUnasigned_prev = ( $xml->events2->unasigned_event_prev->count() );  
        $incall = ( $xml->events2->call_totals['incall'] );
        $outcall = ( $xml->events2->call_totals['outcall'] );
        $missedIn = ( $xml->events2->call_totals['missedIn'] );
        $missedOut = ( $xml->events2->call_totals['missedOut'] );
        $MasterToday = ( $xml->events2->call_totals['masterTicketsToday'] );
        $MasterTodayUnasigned = ( $xml->events2->call_totals['masterTicketsTodayUnasigned'] );
        $MasterTodayDone = ( $xml->events2->call_totals['masterTicketsTodayDone'] );
        $MasterTodayUndone = ( $xml->events2->call_totals['masterTicketsTodayUnDone'] );
        $MasterThisWeek = ( $xml->events2->call_totals['masterTicketsThisWeek'] );
        $MasterThisWeekUnasigned = ( $xml->events2->call_totals['masterTicketsThisWeekUnasigned'] );
        $MasterThisWeekDone = ( $xml->events2->call_totals['masterTicketsThisWeekDoneDone'] );
        $MasterThisWeekUndone = ( $xml->events2->call_totals['masterTicketsThisWeekUnDone'] );
        $caller = ($xml->events2->in_call_top['caller']);
        $total = ($xml->events2->in_call_top['total']);
        $mins = ($xml->events2->in_call_top['mins']);
        }
        return view('xml',
            compact(
            'url',
            'xml',
            'z',
            'cUnasigned',
            'cUnasigned_prev',
            'incall',
            'outcall',
            'missedIn',
            'missedOut',
            'MasterToday',
            'MasterTodayUnasigned',
            'MasterTodayDone',
            'MasterTodayUndone',
            'MasterThisWeek',
            'MasterThisWeekUnasigned',
            'MasterThisWeekDone',
            'MasterThisWeekUndone',
            'caller',
            'customer',
            'unasigned_events',
            'total',
            'mins',
            'in_call_top',
            'missed_calls'
            ));
    }        
    public function index(){
            return view('xml');
        }
}
