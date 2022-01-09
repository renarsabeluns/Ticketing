<?php

namespace App\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;

class ReadXMLController extends Controller
{
    public function read_xml()
    {
        #Function for parsing XML

        $url = "https://login.directo.ee/xmlcore/aim_solutions_lv/xmlcore.asp?get=1&what=event2&key=2A0723811B26C14B0EDC4EE203DE9C37";
        $xml = simplexml_load_file($url); #Load XML from URL

        $z =  $xml['code'];

        if(isset($z) && $xml['code'] != '16' && isset($xml['description']) ){
        $unasigned_events = ($xml->events2->unasigned_event_prev);
        $unasigned_events_today = ($xml->events2->unasigned_event);
        $in_call_top = ($xml->events2->in_call_top);
        $out_call = ($xml->events2->out_call);
        $missed_calls = ($xml->events2->missed_call);
        $customer = isset(( $xml->events2->unasigned_event_prev['Customer'] )) ? ( $xml->events2->unasigned_event_prev['Customer'] ) : 0 ;
        $cUnasigned = null!==(( $xml->events2->unasigned_event->count() )) ? ( $xml->events2->unasigned_event->count() ) : 0 ;
        $cUnasigned_prev = ( $xml->events2->unasigned_event_prev->count() );  
        $incall = isset(( $xml->events2->call_totals['incall'] )) ? ( $xml->events2->call_totals['incall'] ) : 0 ;
        $outcall = isset(( $xml->events2->call_totals['outcall'] )) ? ( $xml->events2->call_totals['outcall'] ) : 0 ;
        $missedIn = isset(( $xml->events2->call_totals['missedIn'] )) ? ( $xml->events2->call_totals['missedIn'] ) : 0;
        $missedOut = isset(( $xml->events2->call_totals['missedOut'] )) ? ( $xml->events2->call_totals['missedOut'] ) : 0;
        $MasterToday = isset(( $xml->events2->call_totals['masterTicketsToday'] )) ? ( $xml->events2->call_totals['masterTicketsToday'] ) : 0;
        $MasterTodayUnasigned = isset(( $xml->events2->call_totals['masterTicketsTodayUnasigned'] )) ? ( $xml->events2->call_totals['masterTicketsTodayUnasigned'] ) : 0;
        $MasterTodayDone = isset(( $xml->events2->call_totals['masterTicketsTodayDone'] )) ? ( $xml->events2->call_totals['masterTicketsTodayDone'] ) : 0;
        $MasterTodayUndone = isset(( $xml->events2->call_totals['masterTicketsTodayUnDone'] )) ? ( $xml->events2->call_totals['masterTicketsTodayUnDone'] ) : 0;
        $MasterThisWeek = isset(( $xml->events2->call_totals['masterTicketsThisWeek'] )) ? ( $xml->events2->call_totals['masterTicketsThisWeek'] ) : 0;
        $MasterThisWeekUnasigned = isset(( $xml->events2->call_totals['masterTicketsThisWeekUnasigned'] )) ? ( $xml->events2->call_totals['masterTicketsThisWeekUnasigned'] ) : 0;
        $MasterThisWeekDone = isset(( $xml->events2->call_totals['masterTicketsThisWeekDoneDone'] )) ? ( $xml->events2->call_totals['masterTicketsThisWeekDoneDone'] ) : 0;
        $MasterThisWeekUndone = isset(( $xml->events2->call_totals['masterTicketsThisWeekUnDone'] )) ? ( $xml->events2->call_totals['masterTicketsThisWeekUnDone'] ) : 0;
        $caller = isset(($xml->events2->in_call_top['caller'])) ? ($xml->events2->in_call_top['caller']) : 'none';
        $total = isset(($xml->events2->in_call_top['total'])) ? ($xml->events2->in_call_top['total']) : 0;
        $mins = isset(($xml->events2->in_call_top['mins'])) ? ($xml->events2->in_call_top['mins']): 0;
        } else{
            session()->flash('msg', 'Successfully done the operation.');
    return redirect()->back();
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
            'missed_calls',
            'out_call',
            'unasigned_events_today'
            ));
    }        
    public function index(){
            return view('xml');
        }
}
