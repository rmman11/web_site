@extends('admin.layouts.template-forms')
@section('title', 'CpInfo')
@section('content')



  <link href="/assets/css/style.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico" />
       
            
              <div class="container-fluid px-1">


<h1>@section('subtitle', $viewData["subtitle"])</h1>

 <!-- Button Simulator -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  CPInfo
</button>

 <!-- Button Date Time -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dateTime">
  Date Time
</button>


<div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Bulk Data</button>
                <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>
            </form>
        </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 800px">
      <div class="modal-header">
         <script type="text/javascript" src="/assets/js/cpu.js"></script> 
        <h1 class="modal-title fs-5" id="exampleModalLabel">Info</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"  >
     <script>
   
          var nVer = navigator.appVersion;
    var nAgt = navigator.userAgent;
    var browserName  = navigator.appName;
    var fullVersion  = ''+parseFloat(navigator.appVersion); 
    var majorVersion = parseInt(navigator.appVersion,10);
    var nameOffset,verOffset,ix;
    
    // In Opera, the true version is after "Opera" or after "Version"
    if ((verOffset=nAgt.indexOf("Opera"))!=-1) {
     browserName = "Opera";
     fullVersion = nAgt.substring(verOffset+6);
     if ((verOffset=nAgt.indexOf("Version"))!=-1) 
       fullVersion = nAgt.substring(verOffset+8);
    }
    // In MSIE, the true version is after "MSIE" in userAgent
    else if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
     browserName = "Microsoft Internet Explorer";
     fullVersion = nAgt.substring(verOffset+5);
    }
    // In Chrome, the true version is after "Chrome" 
    else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
     browserName = "Chrome";
     fullVersion = nAgt.substring(verOffset+7);
    }
    // In Safari, the true version is after "Safari" or after "Version" 
    else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
     browserName = "Safari";
     fullVersion = nAgt.substring(verOffset+7);
     if ((verOffset=nAgt.indexOf("Version"))!=-1) 
       fullVersion = nAgt.substring(verOffset+8);
    }
    // In Firefox, the true version is after "Firefox" 
    else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
     browserName = "Firefox";
     fullVersion = nAgt.substring(verOffset+8);
    }
    // In most other browsers, "name/version" is at the end of userAgent 
    else if ( (nameOffset=nAgt.lastIndexOf(' ')+1) < 
              (verOffset=nAgt.lastIndexOf('/')) ) 
    {
     browserName = nAgt.substring(nameOffset,verOffset);
     fullVersion = nAgt.substring(verOffset+1);
     if (browserName.toLowerCase()==browserName.toUpperCase()) {
      browserName = navigator.appName;
     }
    }
    // trim the fullVersion string at semicolon/space if present
    if ((ix=fullVersion.indexOf(";"))!=-1)
       fullVersion=fullVersion.substring(0,ix);
    if ((ix=fullVersion.indexOf(" "))!=-1)
       fullVersion=fullVersion.substring(0,ix);
    
    majorVersion = parseInt(''+fullVersion,10);
    if (isNaN(majorVersion)) {
     fullVersion  = ''+parseFloat(navigator.appVersion); 
     majorVersion = parseInt(navigator.appVersion,10);
    }
    
    document.write(''
     +'Browser name  = '+browserName+'<br>'
     +'Full version  = '+fullVersion+'<br>'
     +'Major version = '+majorVersion+'<br>'
     +'navigator.appName = '+navigator.appName+'<br>'
     +'navigator.userAgent = '+navigator.userAgent+'<br>'
    )

    // This script sets OSName variable as follows:
    // "Windows"    for all versions of Windows
    // "MacOS"      for all versions of Macintosh OS
    // "Linux"      for all versions of Linux
    // "UNIX"       for all other UNIX flavors 
    // "Unknown OS" indicates failure to detect the OS
    
    var OSName="Unknown OS";
    if (navigator.appVersion.indexOf("Win")!=-1) OSName="Windows";
    if (navigator.appVersion.indexOf("Mac")!=-1) OSName="MacOS";
    if (navigator.appVersion.indexOf("X11")!=-1) OSName="UNIX";
    if (navigator.appVersion.indexOf("Linux")!=-1) OSName="Linux";
    
    document.write('Your OS: '+OSName);      

      </script>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>
</div>

<!-- end modal -->






<!-- Modal Time-->
<div class="modal fade" id="dateTime" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 800px">
      <div class="modal-header">
         <script type="text/javascript" src="/assets/js/cpu.js"></script> 
        <h1 class="modal-title fs-5" id="exampleModalLabel">Date Time</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"  >
<script type="text/javascript">
// Creaza matricele cu zilele saptamanii si lunile anului
var ziarray=new Array("Duminica", "Luni", "Marti", "Miercuri", "Joi", "Vineri", "Sambata")
var lunaarray=new Array("Ianuarie", "Februarie", "Martie", "Aprilie", "Mai", "Iunie", "Iulie", "August", "Septembrie", "Octombrie", "Noiembrie", "Decemberie")

// Functia care preia datele (an, luna, zi, ora)
function datacom() {
  var mydate=new Date()
  var year=mydate.getYear()
  if (year < 1000)
    year+=1900
  var day=mydate.getDay()
  var month=mydate.getMonth()
  var daym=mydate.getDate()
  if (daym<10)
    daym="0"+daym
  var hours=mydate.getHours()
  var minutes=mydate.getMinutes()
  var seconds=mydate.getSeconds()
  var dn="AM"
  if (hours>=12)
    dn="PM"
  if (hours>12) {
    hours=hours-12
  }
  if (hours==0)
    hours=12
  if (minutes<=9)
    minutes="0"+minutes
  if (seconds<=9)
    seconds="0"+seconds

// Aici poti modifica marime si tipul fontului
  var cdate="<small><font color='#fefefe' face='Arial'><b>"+ziarray[day]+", "+daym+" "+lunaarray[month]+" "+year+"<br> Ora: "+hours+":"+minutes+":"+seconds+" "+dn
+"</b></font></small>"

// Afiseaza datele in elementul HTML cu id=dataora
  document.getElementById("dataora").innerHTML=cdate
}

// Daca elementul HTML cu id=dataora exista
// Executa functia datacom() la fiecare secunda
function arata() {
  if (document.getElementById("dataora"))
    setInterval("datacom()",1000)
}
window.onload=arata;
</script> 
<div style="width:200px; background-color:#0101fe; text-align:center" id="dataora"></div> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- end modal Time -->





  </div>
</div>


 @endsection   