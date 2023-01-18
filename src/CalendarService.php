<?php
namespace Jelle\Strider;

use App\Models\Timesheet;

class CalendarService {  
     
    public function __construct(){     
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }
     
    /********************* PROPERTY ********************/  
    private $dayLabels = array("Ma","Di","Wo","Do","Vr","Za","Zo");
     
    private $currentYear=0;
     
    private $currentMonth=0;
     
    private $currentDay=0;
     
    private $currentDate=null;
     
    private $daysInMonth=0;
	
	public $firstdate = '';
	
	public $lastdate = '';

    public function show($year, $month) {

        $this->currentYear=$year;
         
        $this->currentMonth=$month;
         
        $this->daysInMonth=$this->_daysInMonth($month,$year);  
         
        $content='<div id="calendar">'.
                        '<div class="box">'.
                        $this->_createNavi().
                        '</div>'.
                        '<div class="box-content">'.
                                '<ul class="label" style="width: 100%;"">'.$this->_createLabels().'</ul>';   
                                $content.='<div class="clear"></div>';     
                                $content.='<ul class="dates" style="    width: 100%;">';    
                                 
                                $weeksInMonth = $this->_weeksInMonth($month,$year);
                               
                                for( $i=0; $i<$weeksInMonth; $i++ ){
                                   
                                    for($j=1;$j<=7;$j++){
										$cellNumber = $i*7+$j;
										
										if ($this->firstdate == '')
										{
											$this->firstdate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.$cellNumber));
										}
										
										if ($cellNumber <= 31) {
											$content.= ($cellNumber%7==1?' <div style="position:relative; height: 84px;"><span style="    position: absolute; left: -76px; font-size: 30px; top: 25px;">'. date('W',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.$cellNumber)).'</span> ':($cellNumber%7==0?' ':''));
										} else {
											$content.= ($cellNumber%7==1?' <div style="position:relative; height: 84px;"><span style="    position: absolute; left: -76px; font-size: 30px; top: 25px;">'. date('W',strtotime($this->currentYear.'-'.$this->currentMonth.'-'. 31)).'</span> ':($cellNumber%7==0?' ':''));
										}
										
										$this->lastdate = date('Y-m-t',strtotime($this->currentYear.'-'.$this->currentMonth));
											
											
                                        $content.=$this->_showDay($cellNumber);
										
										$content.= ($cellNumber%7==1?'  ':($cellNumber%7==0?'</div> ':' '));
                                    }
                                }
                                 
                                $content.='</ul>';
                                 
                                $content.='<div class="clear"></div>';     
             
                        $content.='</div>';
                 
        $content.='</div>';
        return $content;   
    }

    private function _showDay($cellNumber){
         
        if($this->currentDay==0){
             
            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));
                     
            if(intval($cellNumber) == intval($firstDayOfTheWeek)){
                 
                $this->currentDay=1;
                 
            }
        }
         
        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){
             
            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
             
            $cellContent = $this->currentDay;
             
            $this->currentDay++;   
             
        }else{
             
            $this->currentDate =null;
 
            $cellContent=null;
        }
		
		$datum = $this->currentDate;
		
		$totaal = 0;
		if(\Auth::user() != null)
		{
			foreach(Timesheet::where('user_id', \Auth::user()->id)->where('date', $datum)->get() as $uur)
			{
				$from = strtotime($uur->from);
				$to = strtotime($uur->to);
				$totaal = $totaal + ($to - $from);
			}
		} else {
			foreach(Timesheet::where('tegelzetter_id', \Auth::guard('tegelzetter')->user()->id)->where('date', $datum)->get() as $uur)
			{
				$from = strtotime($uur->from);
				$to = strtotime($uur->to);
				$totaal = $totaal + ($to - $from);
			}
		}

		$totaal = $totaal / 3600;
		
		$today = date("Y-m-d");   

		$stringcontrol = '';
		$stringerror   = '';

		if ($totaal >= 8 && (strtotime($this->currentDate) < strtotime($today))) {
			$stringcontrol = 'background-color:#5da05d;';
		} else if ($totaal < 8 && (strtotime($this->currentDate) < strtotime($today)) && strtotime($this->currentDate) != 0) {
			$thisdate = date($this->currentDate);
			
			if (date("D", strtotime($this->currentDate)) == 'Sat' || date("D", strtotime($this->currentDate)) == 'Sun') {
				if ($totaal >= 1 && (strtotime($this->currentDate) < strtotime($today))) {
					$stringcontrol = 'background-color:#5da05d;';
				}
			} else {
				$stringcontrol = 'background-color:#e87d7d;';
			}
			
		}
		
		if ($this->currentDate == $today) {
			$returnstring = '<li onclick="gotourenlijst(\''.$this->currentDate.'\')" style="'.$stringcontrol.' position:relative;border: 1px solid;     background-color: #09192a;
    color: white;'.$stringcontrol.' " id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                ($cellContent==null?'mask':'').'">'.$cellContent.'<span style="font-size: 12px; position: absolute; top: 22px; text-align: center; width: 100%; left: 0px;">vandaag</span></li>';
		} else {
            $returnstring = '<li style="'.$stringcontrol.' " id="li-'.$this->currentDate.'" onclick="gotourenlijst(\''.$this->currentDate.'\')" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                ($cellContent==null?'mask':'').'">'.$cellContent.'</li>';
        }
                
		$returnstring .= '<div style="display:none;">'.$stringerror.'</div>';
		
        return $returnstring;
    }
     
 
    private function _createNavi(){
         
        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
         
        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
         
        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
         
        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
         
        return
            '<div class="headerkal col-sm-12 row" style="font-size:30px; color:#fff; width: 100%;">'.
                '<div class="col-sm-2"><a style="z-index:999;    margin-top: 5px;" class="prev" href="/timesheets/calendar/'.sprintf('%02d',$preMonth).'/'.$preYear.'"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></div>'.
                    '<div class="col-sm-8" style="text-align:center;"><span class="title">'.$this->_getmonth(date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1'))).'</span></div>'.
                '<div class="col-sm-2" style="position: absolute;
    right: 21px;"><a style="z-index:999; margin-top: 5px;" class="next" href="/timesheets/calendar/'.sprintf('%02d',$nextMonth).'/'.$nextYear.'" ><i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>'.
            '</div>';
    }
	
	private function _getmonth($month) {
		$newmonth = '';
		
		$newmonth = str_replace("Jan", "Januari", $month);
		$newmonth = str_replace("Feb", "Fabruari", $newmonth);
		$newmonth = str_replace("Mar", "Maart", $newmonth);
		$newmonth = str_replace("Apr", "April", $newmonth);
		$newmonth = str_replace("May", "Mei", $newmonth);
		$newmonth = str_replace("Jun", "Juni", $newmonth);
		$newmonth = str_replace("Jul", "Juli", $newmonth);
		$newmonth = str_replace("Aug", "Augustus", $newmonth);
		$newmonth = str_replace("Sep", "September", $newmonth);
		$newmonth = str_replace("Oct", "October", $newmonth);
		$newmonth = str_replace("Nov", "November", $newmonth);
		$newmonth = str_replace("Dec", "December", $newmonth);
		
		return $newmonth;
	}

    private function _createLabels(){  
                 
        $content='';
         
        foreach($this->dayLabels as $index=>$label){
            $content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';
        }
         
        return $content;
    }
     
 
    private function _weeksInMonth($month=null,$year=null){
         
        if( null==($year) ) {
            $year =  date("Y",time()); 
        }
         
        if(null==($month)) {
            $month = date("m",time());
        }
         
        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);
         
        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);
         
        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));
         
        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));
         
        if($monthEndingDay<$monthStartDay){
             
            $numOfweeks++;
         
        }
         
        return $numOfweeks;
    }
 

    private function _daysInMonth($month=null,$year=null){
         
        if(null==($year))
            $year =  date("Y",time()); 
 
        if(null==($month))
            $month = date("m",time());
             
        return date('t',strtotime($year.'-'.$month.'-01'));
    }

    public function PrintUren()
    {
		$totaal    = 0;
		$overuren  = 0;
		$over2uren = 0;
		$zaterdag  = 0;
		$totaalvrij = 0;
		
		if(\Auth::user() != null)
			$getter = Timesheet::where('user_id', \Auth::user()->id)->where('date', '>=', $this->firstdate)->where('date', '<=', $this->lastdate)->get();
		else
			$getter = Timesheet::where('tegelzetter_id', \Auth::guard('tegelzetter')->user()->id)->where('date', '>=', $this->firstdate)->where('date', '<=', $this->lastdate)->get();

		foreach($getter as $uur)
		{
			if (strtolower($uur->werkzaamheden) == 'vrij' || $uur->category_id == 3 || $uur->category_id == 4) 
			{
				if($uur->category_id == 4)
				{
					$uurVan = explode(' ', $uur->from)[1];
					$uurTot = explode(' ', $uur->to)[1];

					$from = strtotime($uurVan);
					$to = strtotime($uurTot);

					$totaalvrij = $totaalvrij + ($to - $from);
				}
			}
			else 
			{

				$uurVan = explode(' ', $uur->from)[1];
				$uurTot = explode(' ', $uur->to)[1];

				$from = strtotime($uurVan);
				$to = strtotime($uurTot);
				$totaal = $totaal + ($to - $from);

				if ($uurTot > '17:00:00' || $uurVan > '17:00:00')
				{
					if ($uurVan < '17:00:00')
					{
						$uurvan = strtotime('17:00:00');
					} else 
					{
						$uurvan = $from;
					}
					
					$overuren = $overuren + ($to - $uurvan);
				}

				if ($uurTot < '07:30:00' || $uurVan < '07:30:00')
				{
					
					if ($uurTot > '07:30:00')
					{
						$uurtot = strtotime('07:30:00');
					} else 
					{
						$uurtot = $to;
					}
					
					$over2uren = $over2uren + ($uurtot - $from);
				}

				if (date("D", strtotime($uur->datum)) == 'Sat')
				{
					$zaterdag = $zaterdag + ($to - $from);
				}
			}
		}
	
		$totaal = $totaal / 3600;
		$overuren = $overuren / 3600;
		$over2uren = $over2uren / 3600;
		$zaterdag = $zaterdag / 3600;
		$totaalvrij = $totaalvrij / 3600;
		
		$string = 'Totaal: ' . $totaal . ' uur gewerkt<br />';
		
		if($overuren != 0)
			$string .= 'Waarvan ' . $overuren . ' uur over de 17:00 komt <br />';
		
		if($over2uren != 0)
			$string .= 'Waarvan ' . $over2uren . ' uur onder de 07:30 komt <br />';

		if($zaterdag != 0)
			$string .= 'Waarvan ' . $zaterdag . ' uur op zaterdag valt';

		if($totaalvrij != 0)
			$string .= '<br /><br />Totaal vrij genomen: ' . $totaalvrij . ' uur';

		return $string;
    }
     
}