<div>
  @if($message)
                            <div class="alert alert-danger">
                              <h5   class="text-center">{{ $message }}</h5>
                            </div>
                            @endif
<!-- s -->
<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" /> -->

 <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<!-- Above are the custom library by wawa-->
<div class="row">
</div>


            <div class="row">
                  <!-- <h4 class="title font-weight-bold text-center">List of Metaname</h4> -->
                  <div class="col-xl-12 col-md-12"><h5 class="title font-weight-bold text-center" >Checklist Master</h5></div>


            <div class="col-xl-12 col-md-12">                       
            @isset($metadatas)
                                  <div class="card card-custom gutter-b bg-white border-0">
                                    <div class="card-body">                                                      

    <form  method="post"  action="{{ route('checklist.store') }}" enctype="multipart/form-data">
                             @csrf                           
    <input type="hidden" name="_method" value="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="pd" id="pd">
            <!-- <input type="text" name="index[]" id="index">   -->

  

 <div class="form-group row">
  <select id="select_page" style="width:200px;" class="operator"> 
         <option value="">Select a Page...</option>
         <option value="alpha">alpha</option> 
         <option value="beta">beta</option>
         <option value="theta">theta</option>
         <option value="omega">omega</option>
  </select>
</div>

 <div class="form-group row">
              <label for="" class="col-sm-2 form-control-label">Metaname</label>
 <div class="col-sm-10">
<input list="brow" class="form-control">
<datalist id="brow"> 
  <option value="">--- Select Metaname ---</option>
    @foreach ($acts as $key=>$activity)
                          <option value="{{$activity->metaname_name}}">{{$activity->metaname_name}}</option>

                            @endforeach
</datalist>
         </div>     
             

              </div>
            </div>

     <label class="text-dark" ><b>Indicator Question</b></label>
      
 <div class="panel-group"  style="background-color:#fff !important">
  <div class="panel panel-default">
  @foreach ($pp as $p )
 
    
      <div class="panel-heading">
        <h4 class="panel-title">
         <div class="card">   
         <a data-toggle="collapse" href="#collapse{{$p->id}}" id="pid{{$p->id}}" class="panel-group btn-sm" onclick="myFunction({{$p->id}})" onkeyup ="myFunction({{$p->id}})" style="background-color:#6d802b !important">{{ $p->property_name  }}</a>
        <!-- <input type="text" name="prop[]" value="{{$p->id}}"> -->

       </div>
      </div>
      <div id="collapse{{$p->id}}" class="panel-collapse collapse">
               

      @foreach ($qns as $qn )    
       <div class="panel-group btn-sm" style="background-color:#f49d2a !important">{{ $qn->qns  }}</div>
            <div class="form-group">
       @foreach ($metadatas as $metadata)                                           
                                                                                                                                                                    
           @if($metadata->indicator_id ==$qn->id) 
           <div class="row">
             <div class="col-xl-6 col-md-6">
          <label>{{$metadata->answer}}</label>
          <input type="{{$metadata->datatype}}" name="ids[]" value="{{$metadata->id}}">
         </div> 
         </div>            
           @endif
    @endforeach 
              </div>
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title"> <div class="card"><a data-toggle="collapse" href="#collaps{{ $qn->id }}{{$p->id}}">Description if any</a>
       </div>
      </div>
      <div id="collaps{{ $qn->id}}{{$p->id}}" class="panel-collapse collapse">
        <textarea id="desc" name="desc{{$p->id}}[]" placeholder="---enter description if any---" class="form-control"></textarea>
              </div>
    </div>
  </div>

 <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title"> <div class="card">    <a data-toggle="collapse" href="#collap{{ $qn->id  }}{{$p->id}}">Photo if any</a>
       </div>
      </div>
      <div id="collap{{ $qn->id }}{{$p->id}}" class="panel-collapse collapse">
        
<div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group">
                                    <input type="file" name="attachment{{$p->id}}[]" onChange="displayImage(this)" id="attachment" accept="image/*" class="" style="display:block;"> 
                                   
                                </div>
                                </div>
        <div class="col-lg-8 col-md-6 col-sm-12">

            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
              </div>
              <img src="images/no.png" onClick="triggerClick()" id="profileDisplay">
            </span>
            </div>
      </div>

      </div>
    </div>
  </div>
   <!-- <button  class="btn-sm btn btn-primary float-right" type="submit">Savex <i class="fas fa-save"></i></button>  -->
               @endforeach
  <div class="row">
 <div class="col-md-12 col-sm-12">
 <div class="wawa-bgcolor">
                                    <button  class="btn-sm btn btn-dark float-right" type="submit">Save</button>
                                 </div> 
</div>
<hr>
</div>
   </div>   
   
   @endforeach
             </div>   
           </div>                       
                                </div>
                                 </div>
                                 <button  class="btn-sm btn btn-primary float-right" type="submit">Finish<i class="fas fa-save"></i></button> 

                                  @endisset 
                                 </div>
                                                                          
                                  
                                   

                                   </form>

                                </div>
                                 </div>
                                 </div>
                                 </div>

  
<script type="text/javascript">
  $(document).ready(function() {
$('.qnNo').materialSelect();
});
</script>

<script>
const ages = [3, 10, 18,42, 20];

document.getElementById("demo").innerHTML = ages.findIndex(checkAge);

function checkAge(age) {
  return age >18;
}
</script>


<script>
     function numberWithCommas(n) {
    return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
     }

function myFunction(id) {
  //  alert(id);
    var pid="pd"+(id);
    $('#pd').val(id);


// const ages = [3, 10, 18, 20];
// ages.findIndex(checkAge);
// function checkAge(age) {
//   return age > 18;
// }
 //$('#index').val(id);
//alert(pid);
    // var upv="up_"+(id);
    // var anQty="qty"+(id);
    //   var antQty="tqty"+(id);
    // var aprice="price_"+(id);
    //   var asubtotal="subtotal_"+(id);
 //$('#'+pid+'').val(id);

    var descs=document.getElementById(desc).value;
     // var up=document.getElementById(upv).value;
     // var unitPrice=document.getElementById(aprice).value;      
     //    var StoreQty=document.getElementById(antQty).value;
      alert(descs);

 
//  var soldQty=numberWithCommas((ur*up).toFixed(2));
// if(ur>=0 && up>=0)
// { 
// //var soldQty=numberWithCommas((ur*up));
// //var subtotal=(unitPrice*soldQty).toFixed(2);   
//    //totalCost +=subtotal;

// //  if(Number(soldQty)<=Number(StoreQty))
// //  {
// //   $('#'+anQty+'').val(soldQty);
// //   $('#'+asubtotal+'').val(subtotal);
 //alert('kk');
const arr = [{id: 'a'}, {id: 'b'}, {id: 'c'}];
const index = arr.map(object => object.id).indexOf('c');
// alert(desc);
}


const fruits = ["apple", "banana", "cantaloupe", "blueberries", "grapefruit"];

const index = fruits.findIndex(fruit => fruit === "grapefruit");
 //alert(index);
// function numberWithCommas(n) {
//     return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
//      }

 //     function sum()
 //     {
 //        $('.amount').each(function(){
 //            alert('df');
 //    //if statement here 
 //    // use $(this) to reference the current div in the loop
 //    //you can try something like...
 //    // if(condition){
 //    // }
 // });
 //     }
</script>

<script type="text/javascript">
  $(function() {
  $('.selectpicker').selectpicker();
});
</script>
</div>
